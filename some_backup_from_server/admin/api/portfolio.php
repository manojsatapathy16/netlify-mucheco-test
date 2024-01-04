<?php
session_cache_limiter('private, must-revalidate');

require_once("../config/header.php");
header('Content-type: application/json');

require_once("../config/dbconnect.php");
require_once("../config/env.php");
$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];
    if ($request_type == 'portfolio') {

        $query = "SELECT * FROM portfolio";
        $result = $con->query($query) or die("Portfolio ERROR: " . mysqli_error($con));

        if (mysqli_num_rows($result) > 0) {
            $data = [];
            while ($record = $result->fetch_assoc()) {
                
                $cQuery = "SELECT * FROM category WHERE id='" . $record['category'] . "'";
                $cQueryResult = $con->query($cQuery) or die("PortfolioList ERROR: " . mysqli_error($con));
                if (mysqli_num_rows($cQueryResult) > 0) {
                    $category_record = $cQueryResult->fetch_assoc();
                    $category_name = $category_record['name'];
                } else {
                    $category_name = '';
                }

                $record['image'] = isset($record['image']) ? $base_url . $record['image'] : '';
                $record['search_key'] = $category_name;
                $record['created_at'] = date("d F Y", strtotime($record['created_at']));
                $data[] = $record;
            }
            $responce['status'] = 1;
            $responce['data'] = $data;
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
