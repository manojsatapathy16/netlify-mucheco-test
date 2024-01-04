<?php
session_cache_limiter('private, must-revalidate');

require_once("../../config/header.php");
header('Content-type: application/json');

require_once("../../config/dbconnect.php");
require_once("../../config/env.php");
require_once("../../config/validator.php");
$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];

    $table = 'meta_tag_lists';

    if ($request_type == 'add_meta_tag') {

        $data = reqValidator('meta_tag', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            $page_id = $_POST['pageId'];
            $meta_title = addslashes($_POST['meta_title']);
            $meta_description = addslashes($_POST['meta_description']);
            $meta_keyword = !empty($_POST['meta_keyword']) ? addslashes($_POST['meta_keyword'])  : null;

            if (empty($page_id)) {
                $responce['status'] = 0;
                $responce['message'] = "Page Required.";
            } else {
                $query = "SELECT * FROM $table WHERE page_id='" . $page_id . "'";
                $result = $con->query($query) or die("MetaTag ADD ERROR: " . mysqli_error($con));
                $row = mysqli_num_rows($result);

                if ($row > 0) {
                    $responce['status'] = 0;
                    $responce['message'] = "Meta tag already exist for this page.";
                } else {
                    $query = "INSERT IGNORE INTO $table(page_id,meta_title,meta_description,meta_keyword) VALUES('$page_id','$meta_title','$meta_description','$meta_keyword')";
                    $result = $con->query($query) or die("MetaTag ADD ERROR: " . mysqli_error($con));

                    $insert_id = mysqli_insert_id($con);
                    if ($insert_id) {
                        $responce['status'] = 1;
                        $responce['message'] = "Meta tag details saved successfully.";
                    } else {
                        $responce['status'] = 0;
                        $responce['message'] = "Unable to upload meta tag details.";
                    }
                }
            }
        }
    } elseif ($request_type == 'get_meta_tag_by_id') {
        if ($_POST['metaId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['metaId'] . "'";
            $result = $con->query($query) or die("MetaTag ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();
                $responce['status'] = 1;
                $responce['data'] = $record;
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect page meta details';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Please select page';
        }
    } elseif ($request_type == 'edit_meta_tag') {

        $data = reqValidator('meta_tag', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            if ($_POST['metaId']) {
                $query = "SELECT * FROM $table WHERE id='" . $_POST['metaId'] . "'";
                $result = $con->query($query) or die("MetaTag Edit ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $record = $result->fetch_assoc();
                    $meta_title = addslashes($_POST['meta_title']);
                    $meta_description = addslashes($_POST['meta_description']);
                    $meta_keyword = !empty($_POST['meta_keyword']) ? addslashes($_POST['meta_keyword'])  : null;

                    $update_query = "UPDATE $table SET meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                    $result = $con->query($update_query) or die("MetaTag Edit ERROR: " . mysqli_error($con));
                    if ($result) {
                        $responce['status'] = 1;
                        $responce['message'] = 'Meta details updated successfully.';
                    } else {
                        $responce['status'] = 0;
                        $responce['message'] = 'Unable to update meta details';
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Incorect Meta id.';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Meta detais Required';
            }
        }
    } elseif ($request_type == 'delete_meta_tag') {
        if ($_POST['metaId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['metaId'] . "'";
            $result = $con->query($query) or die("MetaTag Delete ERROR: " . mysqli_error($con));

            if (mysqli_num_rows($result) > 0) {
                $record = $result->fetch_assoc();
                $del_res = $con->query("DELETE FROM $table WHERE id=" . $record['id'] . ";") or die("MetaTag Delete ERROR: " . mysqli_error($con));
                if ($del_res) {
                    $responce['status'] = 1;
                    $responce['message'] = "Meta details Deleted Successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Unable to delete meta details';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect Meta Id';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Meta id Required';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
