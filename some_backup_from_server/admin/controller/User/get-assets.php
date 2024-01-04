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
    
    if ($request_type == 'get_pages') {
        $query = "SELECT * FROM page_table WHERE parent_id=0";
        if (isset($_POST['pageId'])) {
            $query = "SELECT * FROM page_table WHERE parent_id = " . $_POST['pageId'];
        }
        $result = $con->query($query) or die("GetASSETS ERROR: " . mysqli_error($con));
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $pages = [];
            while ($record = $result->fetch_assoc()) {
                $pages[] = $record;
            }
            $responce['status'] = 1;
            $responce['data'] = $pages;
        } else {
            $responce['status'] = 0;
            $responce['data'] = [];
        }
    } elseif ($request_type == 'get_category') {
        $query = "SELECT * FROM category";
        if (isset($_POST['type'])) {
            $query = "SELECT * FROM category WHERE type = " . $_POST['type'];
        }
        $result = $con->query($query) or die("GetASSETS ERROR: " . mysqli_error($con));
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $category = [];
            while ($record = $result->fetch_assoc()) {
                $category[] = $record;
            }
            $responce['status'] = 1;
            $responce['data'] = $category;
        } else {
            $responce['status'] = 0;
            $responce['data'] = [];
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
