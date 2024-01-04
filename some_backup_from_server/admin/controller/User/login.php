<?php
session_start();
require_once("../../config/header.php");
header('Content-type: application/json');

require_once("../../config/dbconnect.php");
require_once("../../config/validator.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = reqValidator('user', $_POST);
    if ($data['fail']) {
        $responce['status'] = 0;
        $responce['message'] = $data['message'];
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE username='" . $username . "'";
        $result = $con->query($query) or die("Login ERROR-1: " . mysqli_error($con));
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            $User = mysqli_fetch_assoc($result) or die("Login ERROR-2:" . mysqli_error($con));
            $verify = password_verify($password, $User['password']);
            if ($verify) {
                $_SESSION["logedIn"] = true;
                $responce['status'] = 1;
                $responce['message'] = 'Login Successfull.';
                $responce['user_id'] = $User['id'];
            } else {
                $responce['status'] = 0;
                $responce['message'] = 'Incorrect Username or Password';
            }
        } else {
            $responce['status'] = 0;
            $responce['message'] = 'Invalid Credential';
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
