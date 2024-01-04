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

$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;


$request_type = $_POST['request_type'];
if ($request_type == 'testimonial') {

    // $testimonial = array(
    //     [
    //         'key_point' => "Quality Team",
    //         'description' => "They did some work for us re automatic emails for our eBay and Amazon stores. Job well done. They showed us how to use it and did training for us on the application. Will definitely use them again. ",
    //         'company' => 'AUTO EMAILS',
    //         'customer_name' => 'DoronDanon',
    //         'profile' => $base_url . 'assets/images/testimonial/drondaron.jpg'
    //     ],
    //     [
    //         'key_point' => "Quality Team",
    //         'description' => " I would just like to say how please we are with our new eBay shop, you and your team have done a great job and will certainly give you a call when we next need something doing. ",
    //         'company' => 'M4 KARTING',
    //         'customer_name' => 'Ian Harris',
    //         'profile' => $base_url . 'assets/images/testimonial/m4karting.jpg'
    //     ],
    //     [
    //         'key_point' => "Clean Code",
    //         'description' => "Mucheco, where impossible is possible. This platform combines all marketplace to one place and makes thing easy to manage, easy to control, sync all data to one place.",
    //         'company' => '1CLICK4ALL',
    //         'customer_name' => 'Kevin Schreiner',
    //         'profile' => $base_url . 'assets/images/testimonial/x1click4all-logo.jpg.pagespeed.ic.IEsdR223m9.webp'
    //     ],
    //     [
    //         'key_point' => "Quality Team",
    //         'description' => "I would just like to say how please we are with our new eBay shop, you and your team have done a great job and will certainly give you a call when we next need something doing. ",
    //         'company' => 'DEEPEEKA',
    //         'customer_name' => 'Gagan Agrawal',
    //         'profile' => $base_url . 'assets/images/testimonial/xclint-gagan.jpg.pagespeed.ic.HZMZaj0gLs.webp'
    //     ],
    // );
    $query = "SELECT * FROM testimonials";
    $result = $con->query($query) or die("About US ERROR: " . mysqli_error($con));

    if (mysqli_num_rows($result) > 0) {
        $testimonial = [];
        while ($record = $result->fetch_assoc()) {
            $record['profile'] = isset($record['profile']) ? $base_url . $record['profile'] : '';
            $record['created_at'] = date("d F Y", strtotime($record['created_at']));
            $testimonial[] = $record;
        }
        $responce['status'] = 1;
        $responce['data'] = $testimonial;
    } else {
        $responce['status'] = 0;
        $responce['data'] = [];
    }
} else if ($request_type == 'our_customers') {
    $customers = array(
        $base_url . 'assets/images/customers/mercato_place.png',
        $base_url . 'assets/images/customers/system_active.png',
        $base_url . 'assets/images/customers/desenfunda.png',
        $base_url . 'assets/images/customers/gather.png',
        $base_url . 'assets/images/customers/electropolis.png',
        $base_url . 'assets/images/customers/siistii_plus.png',
        $base_url . 'assets/images/customers/jarvis_tech.png',
        $base_url . 'assets/images/customers/knoll_textile.png',
        $base_url . 'assets/images/customers/get_offroad.png',
    );

    if (!empty($customers)) {
        $responce['status'] = 1;
        $responce['data'] = $customers;
    } else {
        $responce['status'] = 0;
        $responce['data'] = array();
    }
}


echo json_encode($responce);
