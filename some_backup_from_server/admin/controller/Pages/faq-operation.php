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

    $table = 'faq_table';

    if ($request_type == 'add_faq') {

        $data = reqValidator('faq', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {

            $question = addslashes($_POST['question']);
            $answer = addslashes($_POST['answer']);


            $query = "INSERT INTO $table(question,answer) VALUES('$question','$answer')";
            $result = $con->query($query) or die("FAQ ADD ERROR: " . mysqli_error($con));

            $insert_id = mysqli_insert_id($con);
            if ($insert_id) {
                $responce['status'] = 1;
                $responce['message'] = "FAQ saved successfully.";
            } else {
                $responce['status'] = 0;
                $responce['message'] = "Unable to upload FAQ.";
            }
        }
    } elseif ($request_type == 'get_faq_by_id') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("FAQ ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();
                $responce['status'] = 1;
                $responce['data'] = $record;
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect FAQ';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Please set FAQ';
        }
    } elseif ($request_type == 'edit_faq') {

        $data = reqValidator('faq', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            if ($_POST['dataId']) {
                $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
                $result = $con->query($query) or die("FAQ Edit ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $record = $result->fetch_assoc();

                    $question = addslashes($_POST['question']);
                    $answer = addslashes($_POST['answer']);


                    $update_query = "UPDATE $table SET question='$question',answer='$answer',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                    $result = $con->query($update_query) or die("FAQ Edit ERROR: " . mysqli_error($con));
                    if ($result) {
                        $responce['status'] = 1;
                        $responce['message'] = 'FAQ details updated successfully.';
                    } else {
                        $responce['status'] = 0;
                        $responce['message'] = 'Unable to update FAQ details';
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Incorect FAQ.';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'FAQ Required';
            }
        }
    } elseif ($request_type == 'delete_faq') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("FAQ Delete ERROR: " . mysqli_error($con));

            if (mysqli_num_rows($result) > 0) {
                $record = $result->fetch_assoc();
                $del_res = $con->query("DELETE FROM $table WHERE id=" . $record['id'] . ";") or die("Policy Delete ERROR: " . mysqli_error($con));
                if ($del_res) {
                    $responce['status'] = 1;
                    $responce['message'] = "FAQ Deleted Successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Unable to delete FAQ';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect FAQ';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'FAQ Required';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
