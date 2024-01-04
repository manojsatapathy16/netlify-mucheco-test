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

    if ($request_type == 'add_blog') {
        /**
         * validate title and description field
         */
        $data = reqValidator('article', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {

            $title = addslashes($_POST['title']);
            $media_type = $_POST['media_type'];
            $description = addslashes($_POST['description']);
            $meta_title = addslashes($_POST['meta_title']);
            $meta_description = addslashes($_POST['meta_description']);
            $meta_keyword = addslashes($_POST['meta_keyword']);
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $title)));
            /**
             * if media_link key is given, then don't check for any files.
             */
            $query = "SELECT * FROM articles WHERE slug='" . $slug . "'";
            $result = $con->query($query) or die("Insight ADD ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $responce['status'] = 0;
                $responce['message'] = "Blog already exist.";
            } else {
                if (array_key_exists('media_link', $_POST)) {
                    $media_link = trim($_POST['media_link']);
                    if (isset($media_link) && !empty($media_link)) {
                        $query = "INSERT INTO articles(title,slug,description,media_type,media_link,meta_title,meta_description,meta_keyword) VALUES('$title','$slug','$description','$media_type','$media_link','$meta_title','$meta_description','$meta_keyword')";
                        $result = $con->query($query) or die("Insight ERROR-1: " . mysqli_error($con));

                        $insert_id = mysqli_insert_id($con);
                        if ($insert_id) {
                            $responce['status'] = 1;
                            $responce['message'] = "Article saved successfully.";
                        } else {
                            $responce['status'] = 0;
                            $responce['message'] = "Unable to upload article.";
                        }
                    } else {
                        $responce['status'] = 0;
                        $responce['message'] = "Media Link Required.";
                    }
                } else {
                    if (empty($_FILES['media_file'])) {
                        $responce['status'] = 0;
                        $responce['message'] = "Media File Required.";
                    } else {

                        $path_parts = pathinfo($_FILES["media_file"]["name"]);
                        $media = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                        $media_temp = $_FILES['media_file']['tmp_name'];
                        $media_folder = '../../assets/documents/' . $media;
                        $db_media_path = 'assets/documents/' . $media;

                        // $file_extensions    = ['jpeg', 'jpg', 'png', 'gif', 'mp4', 'mov', 'ogg'];
                        $file_extensions    = ['jpeg', 'jpg', 'png', 'gif'];
                        $mimetype = mime_content_type($media_temp);
                        /**
                         * check mimetype of the file given
                         */
                        // if (in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png', 'video/mp4', 'video/mov', 'video/ogg'))) {
                        if (in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {

                            move_uploaded_file($media_temp, $media_folder);

                            if (file_exists($media_folder)) {
                                $query = "INSERT INTO articles(title,slug,description,media_type,media,meta_title,meta_description,meta_keyword) VALUES('$title','$slug','$description','$media_type','$db_media_path','$meta_title','$meta_description','$meta_keyword')";
                                $result = $con->query($query) or die("Insight ERROR-2: " . mysqli_error($con));

                                $insert_id = mysqli_insert_id($con);
                                if ($insert_id) {
                                    $responce['status'] = 1;
                                    $responce['message'] = "Article saved successfully.";
                                } else {
                                    $responce['status'] = 0;
                                    $responce['message'] = "Unable to upload article.";
                                }
                            } else {
                                $responce['status'] = 0;
                                $responce['message'] = "Unable to upload media file.";
                            }
                        } else {
                            $responce['status'] = 0;
                            $responce['message'] = "Invalid file format. allowed extensions " . implode(', ', $file_extensions);
                        }
                    }
                }
            }
        }
    } elseif ($request_type == 'get_blog_by_id') {
        if ($_POST['blogId']) {
            $query = "SELECT * FROM articles WHERE id='" . $_POST['blogId'] . "'";
            $result = $con->query($query) or die("Insight ERROR-3: " . mysqli_error($con));
            $row = mysqli_num_rows($result);

            if ($row > 0) {
                $articles = [];
                while ($record = $result->fetch_assoc()) {
                    $record['media'] = isset($record['media']) ? $base_url . $record['media'] : '';
                    $record['created_at'] = date("d F Y", strtotime($record['created_at']));
                    $articles[] = $record;
                }
                $responce['status'] = 1;
                $responce['data'] = $articles[0];
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect Blog';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Blog id Required';
        }
    } elseif ($request_type == 'edit_blog') {

        /**
         * validate title and description field
         */
        $data = reqValidator('article', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            if ($_POST['blogId']) {
                $query = "SELECT * FROM articles WHERE id='" . $_POST['blogId'] . "'";
                $result = $con->query($query) or die("Blog Edit ERROR-1: " . mysqli_error($con));
                $row = mysqli_num_rows($result);

                if ($row > 0) {
                    $record = $result->fetch_assoc();
                    $title = addslashes($_POST['title']);
                    $media_type = $_POST['media_type'];
                    $description = addslashes($_POST['description']);
                    $meta_title = addslashes($_POST['meta_title']);
                    $meta_description = addslashes($_POST['meta_description']);
                    $meta_keyword = addslashes($_POST['meta_keyword']);
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $title)));
                    $hasError = 0;
                    /**
                     * if media_link key is given, then don't check for any files.
                     */
                    $query = "SELECT * FROM articles WHERE slug='" . $slug . "' AND id !=" . $record['id'];
                    $result = $con->query($query) or die("Insight Edit ERROR: " . mysqli_error($con));
                    $row = mysqli_num_rows($result);

                    if ($row > 0) {
                        $responce['status'] = 0;
                        $responce['message'] = "Blog already exist.";
                    } else {
                        if (!empty($_FILES['media_file'])) {
                            $path_parts = pathinfo($_FILES["media_file"]["name"]);
                            $media = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                            $media_temp = $_FILES['media_file']['tmp_name'];
                            $media_folder = '../../assets/documents/' . $media;
                            $db_media_path = 'assets/documents/' . $media;

                            // $file_extensions    = ['jpeg', 'jpg', 'png', 'gif', 'mp4', 'mov', 'ogg'];
                            $file_extensions    = ['jpeg', 'jpg', 'png', 'gif'];
                            $mimetype = mime_content_type($media_temp);

                            /**
                             * check mimetype of the file given
                             */
                            // if (in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png', 'video/mp4', 'video/mov', 'video/ogg'))) {
                            if (in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
                                move_uploaded_file($media_temp, $media_folder);
                                if (file_exists($media_folder)) {
                                    $hasError = 0;
                                } else {
                                    $hasError = 1;
                                    $responce['status'] = 0;
                                    $responce['message'] = "Unable to upload media file.";
                                }
                            } else {
                                $responce['status'] = 0;
                                $responce['message'] = "Invalid file format. allowed extensions " . implode(', ', $file_extensions);
                            }
                        } else {
                            $db_media_path = $record['media'];
                            $media_type = $record['media_type'];
                        }
                        if (!$hasError) {
                            $update_query = "UPDATE articles SET title='$title',slug='$slug',description='$description',media_type='$media_type',media='$db_media_path',meta_title='$meta_title',meta_description='$meta_description',meta_keyword='$meta_keyword',updated_at='" . date('Y-m-d H:i:s') . "' WHERE id=" . $record['id'];
                            $result = $con->query($update_query) or die("Blog Edit ERROR-2: " . mysqli_error($con));
                            if ($result) {
                                $responce['status'] = 1;
                                $responce['message'] = 'Blog updated successfully.';
                            } else {
                                $responce['status'] = 0;
                                $responce['message'] = 'Unable to update blog';
                            }
                        }
                    }
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Incorect Blog';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Blog id Required';
            }
        }
    } elseif ($request_type == 'delete_blog') {
        if ($_POST['blogId']) {
            $query = "SELECT * FROM articles WHERE id='" . $_POST['blogId'] . "'";
            $result = $con->query($query) or die("Blog ERROR: " . mysqli_error($con));
            $row = mysqli_num_rows($result);

            if ($row > 0) {
                $articles = [];
                $record = $result->fetch_assoc();
                $media_path = '../../' . $record['media'];
                $del_res = $con->query("DELETE FROM articles WHERE id=" . $record['id'] . ";") or die("Blog ERROR: " . mysqli_error($con));
                if ($del_res) {
                    if (file_exists($media_path)) {
                        unlink($media_path);
                    }
                    $responce['status'] = 1;
                    $responce['message'] = "Blog Deleted Successfully.";
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = 'Unable to delete blog';
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect Blog';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Blog id Required';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
