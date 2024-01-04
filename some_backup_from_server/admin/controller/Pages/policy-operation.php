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

    $table = 'policy_table';

    if ($request_type == 'add_policy') {

        $data = reqValidator('policy', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {

            $policy_name = addslashes($_POST['policy_name']);
            $description = addslashes($_POST['description']);

            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $policy_name)));

            $query = "SELECT * FROM $table WHERE slug='" . $slug . "'";
            $result = $con->query($query) or die("Policy ADD ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);

            if ($row > 0) {
                $responce['status'] = 0;
                $responce['message'] = "Policy already exist.";
            } else {
                $query = "INSERT IGNORE INTO $table(policy_name,slug,description) VALUES('$policy_name','$slug','$description')";
                $result = $con->query($query) or die("Policy ADD ERROR: " . mysqli_error($con));

                $insert_id = mysqli_insert_id($con);
                if ($insert_id) {
                    $responce['status'] = 1;
                    $responce['message'] = "Policy saved successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = "Unable to upload policy.";
                }
            }
        }
    } elseif ($request_type == 'get_policy_by_id') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Policy ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();
                $responce['status'] = 1;
                $responce['data'] = $record;
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect policy';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Please set policy';
        }
    } elseif ($request_type == 'edit_policy') {

        $data = reqValidator('policy', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            if ($_POST['dataId']) {
                $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
                $result = $con->query($query) or die("Policy Edit ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $record = $result->fetch_assoc();

                    $policy_name = addslashes($_POST['policy_name']);
                    $description = addslashes($_POST['description']);

                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $policy_name)));

                    $query = "SELECT * FROM $table WHERE slug='" . $slug . "' AND id !=" . $record['id'];
                    $result = $con->query($query) or die("Policy ADD ERROR: " . mysqli_error($con));
                    $row = mysqli_num_rows($result);

                    if ($row > 0) {
                        $responce['status'] = 0;
                        $responce['message'] = "Policy already exist.";
                    } else {
                        $update_query = "UPDATE $table SET policy_name='$policy_name',slug='$slug',description='$description',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                        $result = $con->query($update_query) or die("Policy Edit ERROR: " . mysqli_error($con));
                        if ($result) {
                            $responce['status'] = 1;
                            $responce['message'] = 'Policy details updated successfully.';
                        } else {
                            $responce['status'] = 0;
                            $responce['message'] = 'Unable to update policy details';
                        }
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Incorect Policy.';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Policy Required';
            }
        }
    } elseif ($request_type == 'delete_policy') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Policy Delete ERROR: " . mysqli_error($con));

            if (mysqli_num_rows($result) > 0) {
                $record = $result->fetch_assoc();
                $del_res = $con->query("DELETE FROM $table WHERE id=" . $record['id'] . ";") or die("Policy Delete ERROR: " . mysqli_error($con));
                if ($del_res) {
                    $responce['status'] = 1;
                    $responce['message'] = "Policy Deleted Successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Unable to delete policy';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect policy';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Policy Required';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
