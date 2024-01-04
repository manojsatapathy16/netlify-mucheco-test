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

    $table = 'testimonials';

    if ($request_type == 'add_testimonial') {

        $data = reqValidator('testimonial', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {

            $customer_name = addslashes($_POST['customer_name']);
            $company = addslashes($_POST['company']);
            $key_point = addslashes($_POST['key_point']);
            $description = addslashes($_POST['description']);
            $hasError = 0;

            if (!empty($_FILES['profile'])) {
                $path_parts = pathinfo($_FILES["profile"]["name"]);
                $image = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                $image_temp = $_FILES['profile']['tmp_name'];
                $image_path = '../../assets/images/testimonial/' . $image;
                $db_media_path = 'assets/images/testimonial/' . $image;

                $file_extensions    = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
                $mimetype = mime_content_type($image_temp);

                /**
                 * check mimetype of the file given
                 */
                if (in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png', 'image/webp'))) {
                    move_uploaded_file($image_temp, $image_path);
                    if (file_exists($image_path)) {
                        $hasError = 0;
                    } else {
                        $hasError = 1;
                        $responce['status'] = 0;
                        $responce['message'] = "Unable to upload media file.";
                    }
                } else {
                    $hasError = 1;
                    $responce['status'] = 0;
                    $responce['message'] = "Invalid file format. allowed extensions " . implode(', ', $file_extensions);
                }
            } else {
                $db_media_path = null;
            }

            if (!$hasError) {
                $query = "INSERT INTO $table(key_point,description,customer_name,company,profile) VALUES('$key_point','$description','$customer_name','$company','$db_media_path')";
                $result = $con->query($query) or die("Testimonial ADD ERROR: " . mysqli_error($con));

                $insert_id = mysqli_insert_id($con);
                if ($insert_id) {
                    $responce['status'] = 1;
                    $responce['message'] = "Testimonial details saved successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = "Unable to upload testimonial details.";
                }
            }
        }
    } elseif ($request_type == 'get_testimonial_by_id') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Testimonial ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();
                $responce['status'] = 1;
                $responce['data'] = $record;
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect Testimonial';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Testimonial id required';
        }
    } elseif ($request_type == 'edit_testimonial') {

        $data = reqValidator('testimonial', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            if ($_POST['dataId']) {
                $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
                $result = $con->query($query) or die("Testimonial Edit ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $record = $result->fetch_assoc();

                    $customer_name = addslashes($_POST['customer_name']);
                    $company = addslashes($_POST['company']);
                    $key_point = addslashes($_POST['key_point']);
                    $description = addslashes($_POST['description']);
                    $hasError = 0;

                    if (!empty($_FILES['profile'])) {
                        $path_parts = pathinfo($_FILES["profile"]["name"]);
                        $image = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                        $image_temp = $_FILES['profile']['tmp_name'];
                        $image_path = '../../assets/images/testimonial/' . $image;
                        $db_media_path = 'assets/images/testimonial/' . $image;

                        $file_extensions    = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
                        $mimetype = mime_content_type($image_temp);

                        /**
                         * check mimetype of the file given
                         */
                        if (in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png', 'image/webp'))) {
                            move_uploaded_file($image_temp, $image_path);
                            if (file_exists($image_path)) {
                                $hasError = 0;
                            } else {
                                $hasError = 1;
                                $responce['status'] = 0;
                                $responce['message'] = "Unable to upload profile file.";
                            }
                        } else {
                            $hasError = 1;
                            $responce['status'] = 0;
                            $responce['message'] = "Invalid file format. allowed extensions " . implode(', ', $file_extensions);
                        }
                    } else {
                        $db_media_path = $record['profile'];
                    }

                    if (!$hasError) {
                        $update_query = "UPDATE $table SET key_point='$key_point',description='$description',customer_name='$customer_name',company='$company',profile='$db_media_path',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                        $result = $con->query($update_query) or die("Testimonial Edit ERROR-2: " . mysqli_error($con));

                        if ($result) {
                            $image_path = !empty($record['profile']) ? '../../' . $record['profile'] : '';

                            if ($image_path != '' && $image_path != $db_media_path && file_exists($image_path)) {
                                unlink($image_path);
                            }

                            $responce['status'] = 1;
                            $responce['message'] = 'Testimonial updated successfully.';
                        } else {
                            $responce['status'] = 0;
                            $responce['message'] = 'Unable to update Testimonial';
                        }
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Incorect Testimonial id.';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Testimonial id Required';
            }
        }
    } elseif ($request_type == 'delete_testimonial') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Testimonial Delete ERROR: " . mysqli_error($con));

            if (mysqli_num_rows($result) > 0) {
                $record = $result->fetch_assoc();

                $image_path = !empty($record['profile']) ? '../../' . $record['profile'] : '';

                $del_res = $con->query("DELETE FROM $table WHERE id=" . $record['id'] . ";") or die("Testimonial Delete ERROR: " . mysqli_error($con));
                if ($del_res) {
                    if ($image_path != '' && file_exists($image_path)) {
                        unlink($image_path);
                    }
                    $responce['status'] = 1;
                    $responce['message'] = "Testimonial Deleted Successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Unable to delete Testimonial';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect Testimonial';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Testimonial Required';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
