<?php
session_cache_limiter('private, must-revalidate');

//Make sure that this is a POST request.
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    //If it isn't, send back a 405 Method Not Allowed header.
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    exit;
}

require_once("../config/header.php");
header('Content-type: application/json');

require_once("../config/dbconnect.php");
require_once("../config/env.php");
require_once("../config/validator.php");

$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];

    if ($request_type == 'get_case_study_list') {
        $query = "SELECT id,site_name,site_work,card_image,created_at FROM casestudy_table";

        $result = $con->query($query) or die("CaseStudy ERROR: " . mysqli_error($con));
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $data = [];
            while ($record = $result->fetch_assoc()) {
                $record['card_image'] = isset($record['card_image']) ? $base_url . $record['card_image'] : '';
                $record['created_at'] = date("d F Y", strtotime($record['created_at']));
                $data[] = $record;
            }
            $responce['status'] = 1;
            $responce['data'] = $data;
        } else {
            $responce['status'] = 0;
            $responce['data'] = [];
        }
    } elseif ($request_type == 'get_case_study_by_id') {
        if ($_POST['casestudy_id']) {
            $query = "SELECT * FROM casestudy_table WHERE id='" . $_POST['casestudy_id'] . "'";
            $result = $con->query($query) or die("Insight ERROR-3: " . mysqli_error($con));
            $row = mysqli_num_rows($result);

            if ($row > 0) {
                $data = [];
                while ($record = $result->fetch_assoc()) {
                    $record['card_image'] = isset($record['card_image']) ? $base_url . $record['card_image'] : '';
                    $record['banner_image'] = isset($record['banner_image']) ? $base_url . $record['banner_image'] : '';
                    $record['result_image']=json_decode($record['result_image'],1);
                    if(!empty($record['result_image'])){
                        $arr=[];
                        foreach ($record['result_image'] as $key => $value) {
                            $arr[]=  $base_url . $value;
                        }
                        $record['result_image']=$arr;
                    }
                    $record['created_at'] = date("d F Y", strtotime($record['created_at']));
                    $data[] = $record;
                }
                $responce['status'] = 1;
                $responce['data'] = $data[0];
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorect casestudy';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Blog id Required';
        }
    }
}

echo json_encode($responce);
