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

    $table = 'portfolio';

    if ($request_type == 'add_portfolio') {

        $data = reqValidator('portfolio', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {

            $site_name = addslashes($_POST['site_name']);
            $site_link = addslashes($_POST['site_link']);
            $technology = addslashes($_POST['technology']);
            $category = addslashes($_POST['category']);

            if (!empty($_FILES['image'])) {
                $path_parts = pathinfo($_FILES["image"]["name"]);
                $image = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                $image_temp = $_FILES['image']['tmp_name'];
                $image_path = '../../assets/images/portfolio/' . $image;
                $db_media_path = 'assets/images/portfolio/' . $image;

                $file_extensions    = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
                $mimetype = mime_content_type($image_temp);

                /**
                 * check mimetype of the file given
                 */
                if (in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png', 'image/webp'))) {
                    move_uploaded_file($image_temp, $image_path);
                    if (file_exists($image_path)) {

                        $query = "INSERT INTO $table(category,site_name,site_link,language,image) VALUES('$category','$site_name','$site_link','$technology','$db_media_path')";
                        $result = $con->query($query) or die("Portfolio ADD ERROR: " . mysqli_error($con));

                        $insert_id = mysqli_insert_id($con);
                        if ($insert_id) {
                            $responce['status'] = 1;
                            $responce['message'] = "Portfolio details saved successfully.";
                        } else {
                            $responce['status'] = 0;
                            $responce['message'] = "Unable to upload portfolio details.";
                        }
                    } else {

                        $responce['status'] = 0;
                        $responce['message'] = "Unable to upload media file.";
                    }
                } else {
                    $hasError = 1;
                    $responce['status'] = 0;
                    $responce['message'] = "Invalid file format. allowed extensions " . implode(', ', $file_extensions);
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = "image File Required.";
            }
        }
    } elseif ($request_type == 'get_portfolio_by_id') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Portfolio ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();

                $query = "SELECT * FROM category WHERE type = 'portfolio'";
                $query_result = $con->query($query) or die("Portfolio ERROR: " . mysqli_error($con));

                $Category = '<option value="">-Select Category-</option>';
                while ($data = $query_result->fetch_assoc()) {
                    $selected = $data['id'] == $record['category'] ? "selected" : "";
                    $Category .= '<option value="' . $data['id'] . '" ' . $selected . '>' . $data['name'] . '</option>';;
                }

                $record['categories'] = $Category;

                $responce['status'] = 1;
                $responce['data'] = $record;
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect portfolio';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Portfolio id required';
        }
    } elseif ($request_type == 'edit_portfolio') {

        $data = reqValidator('portfolio', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            if ($_POST['dataId']) {
                $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
                $result = $con->query($query) or die("Portfolio Edit ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $record = $result->fetch_assoc();

                    $site_name = addslashes($_POST['site_name']);
                    $site_link = addslashes($_POST['site_link']);
                    $technology = addslashes($_POST['technology']);
                    $category = addslashes($_POST['category']);
                    $hasError = 0;

                    if (!empty($_FILES['image'])) {
                        $path_parts = pathinfo($_FILES["image"]["name"]);
                        $image = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                        $image_temp = $_FILES['image']['tmp_name'];
                        $image_path = '../../assets/images/portfolio/' . $image;
                        $db_media_path = 'assets/images/portfolio/' . $image;

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
                                $responce['message'] = "Unable to upload image file.";
                            }
                        } else {
                            $hasError = 1;
                            $responce['status'] = 0;
                            $responce['message'] = "Invalid file format. allowed extensions " . implode(', ', $file_extensions);
                        }
                    } else {
                        $db_media_path = $record['image'];
                    }

                    if (!$hasError) {
                        $update_query = "UPDATE $table SET site_name='$site_name',site_link='$site_link',language='$technology',category='$category',image='$db_media_path',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                        $result = $con->query($update_query) or die("Portfolio Edit ERROR-2: " . mysqli_error($con));

                        if ($result) {
                            $old_path = !empty($record['image']) ? '../../' . $record['image'] : '';
                            $new_path = '../../' . $db_media_path;
                            
                            if ($old_path != '' && $old_path != $new_path && file_exists($old_path)) {
                                unlink($old_path);
                            }

                            $responce['status'] = 1;
                            $responce['message'] = 'Portfolio updated successfully.';
                        } else {
                            $responce['status'] = 0;
                            $responce['message'] = 'Unable to update Portfolio';
                        }
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Incorect Portfolio id.';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Portfolio id Required';
            }
        }
    } elseif ($request_type == 'delete_portfolio') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Testimonial Delete ERROR: " . mysqli_error($con));

            if (mysqli_num_rows($result) > 0) {
                $record = $result->fetch_assoc();

                $image_path = !empty($record['image']) ? '../../' . $record['image'] : '';

                $del_res = $con->query("DELETE FROM $table WHERE id=" . $record['id'] . ";") or die("Testimonial Delete ERROR: " . mysqli_error($con));
                if ($del_res) {
                    if ($image_path != '' && file_exists($image_path)) {
                        unlink($image_path);
                    }
                    $responce['status'] = 1;
                    $responce['message'] = "Portfolio Deleted Successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Unable to delete Portfolio.';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect Portfolio';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Portfolio id Required';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
