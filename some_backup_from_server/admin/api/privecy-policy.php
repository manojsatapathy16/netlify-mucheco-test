<?php
session_cache_limiter('private, must-revalidate');

require_once("../config/header.php");
header('Content-type: application/json');

require_once("../config/dbconnect.php");
require_once("../config/env.php");

$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];
    if ($request_type == 'policy') {

        $query = "SELECT * FROM policy_table WHERE slug='".$_POST['slug']."'";
        $result = $con->query($query) or die("Policy ERROR: " . mysqli_error($con));
        
        if (mysqli_num_rows($result) > 0) {
            $record = $result->fetch_assoc();
            $record['created_at'] = date("d F Y", strtotime($record['created_at']));
           
            $responce['status'] = 1;
            $responce['data'] = $record;
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