<?php
session_cache_limiter('private, must-revalidate');

require_once("../config/header.php");
header('Content-type: application/json');

require_once("../config/dbconnect.php");
require_once("../config/env.php");
$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];
    if ($request_type == 'get_meta_tags') {
        /**
         * Check if request hage 'page' key first
         */
        if (!array_key_exists('page', $_POST)) {
            $responce['status'] = 0;
            $responce['message'] = "Page required.";
        } else {
            // capitalize each word
            // $page = ucwords(strtolower($_POST['page']));
            $page = $_POST['page'];

            // get page id from page table
            $query = "SELECT * FROM page_table WHERE slug='" . $page . "'";
            $result = $con->query($query) or die("MetaTagList ERROR-1:" . mysqli_error($con));

            if (mysqli_num_rows($result) > 0) {
                $record = $result->fetch_assoc();
                // if exist page, then get page meta details from meta tag list table
                $query = "SELECT * FROM meta_tag_lists WHERE page_id='" . $record['id'] . "'";
                $result = $con->query($query) or die("MetaTagList ERROR-2:" . mysqli_error($con));
                if (mysqli_num_rows($result) > 0) {
                    $meta_data = $result->fetch_assoc();
                    $responce['status'] = 1;
                    $responce['data'] = $meta_data;
                } else {
                    $responce['status'] = 0;
                    $responce['message'] = "No meta tags found.";
                }
            } else {
                $responce['status'] = 0;
                $responce['message'] = "Invelid page.";
            }
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
