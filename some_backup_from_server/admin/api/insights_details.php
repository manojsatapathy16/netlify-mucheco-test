<?php
session_cache_limiter('private, must-revalidate');

require_once("../config/header.php");
header('Content-type: application/json');

require_once("../config/dbconnect.php");
require_once("../config/env.php");
require_once("../config/validator.php");

$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];

    if ($request_type == 'get_blog_list') {
        $query = "SELECT * FROM articles";
        if ($_POST['search_value']) {
            $query = "SELECT * FROM articles WHERE title LIKE '%" . $_POST['search_value'] . "%'";
        }
        $result = $con->query($query) or die("Insight ERROR-3: " . mysqli_error($con));
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $articles = [];
            while ($record = $result->fetch_assoc()) {
                $record['short_description'] = (strlen($record['description']) > 500) ? substr(utf8_encode($record['description']), 0, 500) . '...' : utf8_encode($record['description']);
                $record['media'] = isset($record['media']) ? $base_url . $record['media'] : '';
                $record['created_at'] = date("d F Y", strtotime($record['created_at']));
                $articles[] = $record;
            }
            $responce['status'] = 1;
            $responce['data'] = $articles;
        } else {
            $responce['status'] = 0;
            $responce['data'] = [];
        }
    } elseif ($request_type == 'get_blog_by_slug') {
        if ($_POST['slug']) {
            $query = "SELECT * FROM articles WHERE slug='" . $_POST['slug'] . "'";
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
            $responce['message'] = 'Blog Required';
        }
    } elseif ($request_type == 'recent_news') {
        $query = "SELECT * FROM articles ORDER BY id DESC LIMIT 4";
        $result = $con->query($query) or die("Insight ERROR-4: " . mysqli_error($con));
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $articles = [];
            while ($record = $result->fetch_assoc()) {
                $record['media'] = isset($record['media']) ? $base_url . $record['media'] : '';
                $record['created_at'] = date("d F Y", strtotime($record['created_at']));
                $articles[] = $record;
            }
            $responce['status'] = 1;
            $responce['data'] = $articles;
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
