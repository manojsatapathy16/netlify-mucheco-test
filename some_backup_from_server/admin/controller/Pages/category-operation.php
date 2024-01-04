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

    $table = 'category';

    if ($request_type == 'add_category') {


        if ($_POST['name'] == '') {
            $responce['status'] = 0;
            $responce['message'] = "Name Required";
        } else {

            $name = addslashes($_POST['name']);
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $name)));
            $type = addslashes($_POST['type']);

            $query = "INSERT INTO $table(name,slug,type) VALUES('$name','$slug','$type')";
            $result = $con->query($query) or die("Category ADD ERROR: " . mysqli_error($con));

            $insert_id = mysqli_insert_id($con);
            if ($insert_id) {
                $responce['status'] = 1;
                $responce['message'] = "Category saved successfully.";
            } else {
                $responce['status'] = 0;
                $responce['message'] = "Unable to add Category.";
            }
        }
    } elseif ($request_type == 'get_category_by_id') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Category ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();
                $responce['status'] = 1;
                $responce['data'] = $record;
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect Category';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Please set Category';
        }
    } elseif ($request_type == 'edit_category') {

        if ($_POST['name'] == '') {
            $responce['status'] = 0;
            $responce['message'] = "Name Required";
        } else {
            if ($_POST['dataId']) {
                $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
                $result = $con->query($query) or die("Category Edit ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $record = $result->fetch_assoc();

                    $name = addslashes($_POST['name']);
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $name)));
                    $type = addslashes($_POST['type']);

                    $update_query = "UPDATE $table SET name='$name',slug='$slug',type='$type',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                    $result = $con->query($update_query) or die("Category Edit ERROR: " . mysqli_error($con));
                    if ($result) {
                        $responce['status'] = 1;
                        $responce['message'] = 'Category details updated successfully.';
                    } else {
                        $responce['status'] = 0;
                        $responce['message'] = 'Unable to update Category details';
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Incorect Category.';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Category Required';
            }
        }
    } elseif ($request_type == 'delete_category') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Category Delete ERROR: " . mysqli_error($con));

            if (mysqli_num_rows($result) > 0) {
                $record = $result->fetch_assoc();
                $del_res = $con->query("DELETE FROM $table WHERE id=" . $record['id'] . ";") or die("Policy Delete ERROR: " . mysqli_error($con));
                if ($del_res) {
                    $responce['status'] = 1;
                    $responce['message'] = "Category Deleted Successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Unable to delete Category';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect Category';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Category Required';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
