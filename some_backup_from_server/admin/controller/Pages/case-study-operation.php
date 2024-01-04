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

    $table = 'casestudy_table';

    if ($request_type == 'add_casestudy') {

        $data = reqValidator('casestudy', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {

            $site_name = addslashes($_POST['site_name']);
            $site_work = addslashes($_POST['site_work']);
            $description = addslashes($_POST['description']);
            $requirements = addslashes($_POST['requirements']);
            $challenges = addslashes($_POST['challenges']);
            $solutions = addslashes($_POST['solutions']);
            $result = addslashes($_POST['result']);
            $hasError = 0;
            $file_extensions = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
            $mime_types = array('image/jpeg', 'image/gif', 'image/png', 'image/webp');

            if (!empty($_FILES['card_image'])) {
                $path_parts = pathinfo($_FILES["card_image"]["name"]);
                $card_image = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                $card_image_temp = $_FILES['card_image']['tmp_name'];
                $card_image_path = '../../assets/images/case_study/' . $card_image;
                $card_db_media_path = 'assets/images/case_study/' . $card_image;

                $mimetype = mime_content_type($card_image_temp);

                /**
                 * check mimetype of the file given
                 */
                if (in_array($mimetype, $mime_types)) {
                    move_uploaded_file($card_image_temp, $card_image_path);
                    if (file_exists($card_image_path)) {
                        $hasError = 0;
                    } else {
                        $hasError = 1;
                        $responce['status'] = 0;
                        $responce['message'] = "Unable to upload card image file.";
                    }
                } else {
                    $hasError = 1;
                    $responce['status'] = 0;
                    $responce['message'] = "Invalid card image format. allowed extensions " . implode(', ', $file_extensions);
                }
            } else {
                $hasError = 1;
                $responce['status'] = 0;
                $responce['message'] = "Card image Required.";
            }

            if (!empty($_FILES['banner_image'])) {
                $path_parts = pathinfo($_FILES["banner_image"]["name"]);
                $banner_image = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                $banner_image_temp = $_FILES['banner_image']['tmp_name'];
                $banner_image_path = '../../assets/images/case_study/' . $banner_image;
                $banner_db_media_path = 'assets/images/case_study/' . $banner_image;


                $mimetype = mime_content_type($banner_image_temp);

                /**
                 * check mimetype of the file given
                 */
                if (in_array($mimetype, $mime_types)) {
                    move_uploaded_file($banner_image_temp, $banner_image_path);
                    if (file_exists($banner_image_path)) {
                        $hasError = 0;
                    } else {
                        $hasError = 1;
                        $responce['status'] = 0;
                        $responce['message'] = "Unable to upload banner image file.";
                    }
                } else {
                    $hasError = 1;
                    $responce['status'] = 0;
                    $responce['message'] = "Invalid banner image format. allowed extensions " . implode(', ', $file_extensions);
                }
            } else {
                $hasError = 1;
                $responce['status'] = 0;
                $responce['message'] = "Banner image Required.";
            }

            if (!empty($_FILES['result_image'])) {
                // Count total files
                $countfiles = count($_FILES['result_image']['name']);

                // Upload Location
                $result_image_path = '../../assets/images/case_study/';
                $result_db_media_path = 'assets/images/case_study/';

                // To store uploaded result image files path
                $result_files_arr = array();

                // Loop through all files
                for ($index = 0; $index < $countfiles; $index++) {

                    if (isset($_FILES['result_image']['name'][$index]) && $_FILES['result_image']['name'][$index] != '') {
                        // File name
                        $path_parts = pathinfo($_FILES['result_image']['name'][$index]);
                        $filename = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];

                        // Get extension
                        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                        // Check valid extension
                        if (in_array($ext, $file_extensions)) {

                            // File path
                            $path = $result_image_path . $filename;
                            $db_media_path = $result_db_media_path . $filename;

                            // Upload file
                            if (move_uploaded_file($_FILES['result_image']['tmp_name'][$index], $path)) {
                                $result_files_arr[] = $db_media_path;
                            }
                        }
                    }
                }
            } else {
                $result_files_arr = [];
            }


            if (!$hasError) {
                $result_files_arr = json_encode($result_files_arr);
                $query = "INSERT INTO $table(site_name,site_work,card_image,banner_image,description,requirements,challenges,solutions,result,result_image) VALUES('$site_name','$site_work','$card_db_media_path','$banner_db_media_path','$description','$requirements','$challenges','$solutions','$result','$result_files_arr')";
                $result = $con->query($query) or die("Casestudy ADD ERROR: " . mysqli_error($con));

                $insert_id = mysqli_insert_id($con);
                if ($insert_id) {
                    $responce['status'] = 1;
                    $responce['message'] = "Casestudy details saved successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = "Unable to upload Casestudy details.";
                }
            }
        }
    } elseif ($request_type == 'get_casestudy_by_id') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Casestudy ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();
                $responce['status'] = 1;
                $responce['data'] = $record;
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect casestudy';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Please set casestudy';
        }
    } elseif ($request_type == 'edit_casestudy') {

        $data = reqValidator('casestudy', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            if ($_POST['dataId']) {
                $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
                $result = $con->query($query) or die("Casestudy Edit ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $record = $result->fetch_assoc();

                    $site_name = addslashes($_POST['site_name']);
                    $site_work = addslashes($_POST['site_work']);
                    $description = addslashes($_POST['description']);
                    $requirements = addslashes($_POST['requirements']);
                    $challenges = addslashes($_POST['challenges']);
                    $solutions = addslashes($_POST['solutions']);
                    $result = addslashes($_POST['result']);
                    $hasError = 0;

                    $old_result_image = json_decode($record['result_image']);
                    $file_extensions = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
                    $mime_types = array('image/jpeg', 'image/gif', 'image/png', 'image/webp');

                    if (!empty($_FILES['card_image'])) {
                        $path_parts = pathinfo($_FILES["card_image"]["name"]);
                        $card_image = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                        $card_image_temp = $_FILES['card_image']['tmp_name'];
                        $card_image_path = '../../assets/images/case_study/' . $card_image;
                        $card_db_media_path = 'assets/images/case_study/' . $card_image;

                        $mimetype = mime_content_type($card_image_temp);

                        /**
                         * check mimetype of the file given
                         */
                        if (in_array($mimetype, $mime_types)) {
                            move_uploaded_file($card_image_temp, $card_image_path);
                            if (file_exists($card_image_path)) {
                                $hasError = 0;
                            } else {
                                $hasError = 1;
                                $responce['status'] = 0;
                                $responce['message'] = "Unable to upload card image file.";
                            }
                        } else {
                            $hasError = 1;
                            $responce['status'] = 0;
                            $responce['message'] = "Invalid card image format. allowed extensions " . implode(', ', $file_extensions);
                        }
                    } else {
                        $card_db_media_path = $record['card_image'];
                    }

                    if (!empty($_FILES['banner_image'])) {
                        $path_parts = pathinfo($_FILES["banner_image"]["name"]);
                        $banner_image = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                        $banner_image_temp = $_FILES['banner_image']['tmp_name'];
                        $banner_image_path = '../../assets/images/case_study/' . $banner_image;
                        $banner_db_media_path = 'assets/images/case_study/' . $banner_image;


                        $mimetype = mime_content_type($banner_image_temp);

                        /**
                         * check mimetype of the file given
                         */
                        if (in_array($mimetype, $mime_types)) {
                            move_uploaded_file($banner_image_temp, $banner_image_path);
                            if (file_exists($banner_image_path)) {
                                $hasError = 0;
                            } else {
                                $hasError = 1;
                                $responce['status'] = 0;
                                $responce['message'] = "Unable to upload banner image file.";
                            }
                        } else {
                            $hasError = 1;
                            $responce['status'] = 0;
                            $responce['message'] = "Invalid banner image format. allowed extensions " . implode(', ', $file_extensions);
                        }
                    } else {
                        $banner_db_media_path = $record['banner_image'];
                    }

                    if (!empty($_FILES['result_image'])) {
                        // Count total files
                        $countfiles = count($_FILES['result_image']['name']);

                        // Upload Location
                        $result_image_path = '../../assets/images/case_study/';
                        $result_db_media_path = 'assets/images/case_study/';

                        // To store uploaded result image files path
                        $result_files_arr = array();

                        // Loop through all files
                        for ($index = 0; $index < $countfiles; $index++) {

                            if (isset($_FILES['result_image']['name'][$index]) && $_FILES['result_image']['name'][$index] != '') {
                                // File name
                                $path_parts = pathinfo($_FILES['result_image']['name'][$index]);
                                $filename = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];

                                // Get extension
                                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                                // Check valid extension
                                if (in_array($ext, $file_extensions)) {

                                    // File path
                                    $path = $result_image_path . $filename;
                                    $db_media_path = $result_db_media_path . $filename;

                                    // Upload file
                                    if (move_uploaded_file($_FILES['result_image']['tmp_name'][$index], $path)) {
                                        $result_files_arr[] = $db_media_path;
                                    }
                                }
                            }
                        }
                        if (!empty($result_files_arr) && !empty($old_result_image)) {
                            foreach ($old_result_image as $old_image) {
                                $old_image_path = "../../" . $old_image;
                                if (file_exists($old_image_path)) {
                                    unlink($old_image_path);
                                }
                            }
                        }
                    } else {
                        $result_files_arr = $old_result_image;
                    }

                    if (!$hasError) {
                        $result_files_arr = json_encode($result_files_arr);
                        $update_query = "UPDATE $table SET site_name='$site_name',site_work='$site_work',card_image='$card_db_media_path',banner_image='$banner_db_media_path',description='$description',requirements='$requirements',challenges='$challenges',solutions='$solutions',result='$result',result_image='$result_files_arr',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                        $result = $con->query($update_query) or die("Casestudy Edit ERROR: " . mysqli_error($con));
                        if ($result) {
                            $responce['status'] = 1;
                            $responce['message'] = 'Casestudy details updated successfully.';
                        } else {
                            $responce['status'] = 0;
                            $responce['message'] = 'Unable to update casestudy details';
                        }
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Incorect casestudy.';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Casestudy Required';
            }
        }
    } elseif ($request_type == 'delete_casestudy') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Casestudy Delete ERROR: " . mysqli_error($con));

            if (mysqli_num_rows($result) > 0) {
                $record = $result->fetch_assoc();

                $card_image_path = !empty($record['card_image']) ? '../../' . $record['card_image'] : '';
                $banner_image_path = !empty($record['banner_image']) ? '../../' . $record['banner_image'] : '';
                $result_image_array = json_decode($record['result_image']);

                $del_res = $con->query("DELETE FROM $table WHERE id=" . $record['id'] . ";") or die("Policy Delete ERROR: " . mysqli_error($con));
                if ($del_res) {
                    if ($card_image_path != '' && file_exists($card_image_path)) {
                        unlink($card_image_path);
                    }
                    if ($banner_image_path != '' && file_exists($banner_image_path)) {
                        unlink($banner_image_path);
                    }
                    if (!empty($result_image_array)) {
                        foreach ($result_image_array as $result_image) {
                            $result_image_path = '../../' . $result_image;
                            if (file_exists($result_image_path)) {
                                unlink($result_image_path);
                            }
                        }
                    }

                    $responce['status'] = 1;
                    $responce['message'] = "Casestudy Deleted Successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Unable to delete casestudy';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect casestudy';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Casestudy Required';
        }
    } elseif ($request_type == 'get_result_image') {
        if ($_POST['dataId']) {
            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Casestudy ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();
                $record['result_image'] = json_decode($record['result_image'], 1);
                if (!empty($record['result_image'])) {
                    $arr = [];
                    foreach ($record['result_image'] as $key => $value) {
                        $arr[] =  $base_url . $value;
                    }
                    $record['result_image'] = $arr;
                }
                $responce['status'] = 1;
                $responce['data'] = $record;
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect casestudy';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Please set casestudy';
        }
    } elseif ($request_type == 'delete_result_image') {
        if ($_POST['dataId']) {

            $dataImg = $_POST['dataImg'];

            $query = "SELECT * FROM $table WHERE id='" . $_POST['dataId'] . "'";
            $result = $con->query($query) or die("Casestudy ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $record = $result->fetch_assoc();
                $result_image = json_decode($record['result_image'], 1);

                if (!empty($result_image)) {
                    // remove ase url from string
                    $dataImg = str_replace($base_url, "", $dataImg);

                    // search image in the result_image array and get the index
                    $result_key = array_search($dataImg, $result_image);

                    // remove the image of the above index from result_array
                    if ($result_key === 0 || $result_key > 0) {
                        array_splice($result_image, $result_key, 1);
                        unlink('../../' . $dataImg);

                        $result_files_arr = json_encode($result_image);
                        $update_query = "UPDATE $table SET result_image='$result_files_arr',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                        $result = $con->query($update_query) or die("Casestudy Edit ERROR: " . mysqli_error($con));
                        if ($result) {
                            $responce['status'] = 1;
                            $responce['message'] = 'Result Image deleted successfully.';
                        } else {
                            $responce['status'] = 0;
                            $responce['message'] = 'Unable to delete result image';
                        }
                    } else {
                        $responce['status'] = 0;
                        $responce['message'] = 'image not matched';
                        $responce['image'] = $dataImg;
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'no image found';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect casestudy';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Please set casestudy';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
