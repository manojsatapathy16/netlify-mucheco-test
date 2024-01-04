<?php

session_cache_limiter('private, must-revalidate');
error_reporting(1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once("../config/header.php");
header('Content-type: application/json');

require_once("../vendor/autoload.php");
require_once("../config/dbconnect.php");
require_once("../config/validator.php");

function send_mail($mailTo, $replaceSubject, $replaceBody)
{

    $mail = new PHPMailer(true);
    //    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.1and1.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'amrutansu@suyogindia.com';
    $mail->Password = 'Suyog2021**';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // 465;

    $mail->setFrom('amrutansu@suyogindia.com', 'Mucheco');

    $mail->addAddress($mailTo);


    $mail->isHTML(true);
    $mail->Subject = $replaceSubject;
    $mail->Body = $replaceBody;

    $mail->send();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];

    $userMailQuery = "SELECT * FROM email_templates WHERE ref_code='ContactUsToUser'";
    $userMailQueryResult = $con->query($userMailQuery) or die("Contact Us ERROR: " . mysqli_error($con));

    if (mysqli_num_rows($userMailQueryResult) > 0) {
        $UserTemplete = $userMailQueryResult->fetch_assoc();
    } else {
        $UserTemplete = [];
    }
    if ($request_type == 'contact_us') {
        $data = reqValidator('contact', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $url = !empty($_POST['url']) ? addslashes($_POST['url']) : null;
            $lead = !empty($_POST['lead']) ? $_POST['lead'] : null;
            $message = !empty($_POST['message']) ? addslashes($_POST['message'])  : null;

            $sql = "INSERT INTO contact_us(type,first_name,last_name,email,phone,url,lead,message) VALUES(1,'$first_name','$last_name','$email','$phone','$url','$lead','$message')";
            $con->query($sql) or die("ERROR-1: " . mysqli_error($con));
            $insert_id = mysqli_insert_id($con);

            if ($insert_id) {
                $query = "SELECT * FROM email_templates WHERE ref_code='ContactUsToAdmin'";
                $result = $con->query($query) or die("Contact Us ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $AdminTemplete = $result->fetch_assoc();

                    // $mailTo = "malay@suyogindia.com";
                    $mailTo = "amrutansu@suyogindia.com";
                    $name = "mucheco";

                    $replaceSubject = $AdminTemplete['subject'];

                    $replaceBody = str_replace(array("~name~", "~email~", "~phone~", "~url~", "~message~"), array($first_name . ' ' . $last_name, $email, $phone, $url, stripslashes($message)), $AdminTemplete['source']);

                    send_mail($mailTo, $replaceSubject, $replaceBody);
                    if (!empty($UserTemplete)) {
                        

                        $subject = $UserTemplete['subject'];

                        $mailBody = str_replace(array("~name~"), array($first_name . ' ' . $last_name), $UserTemplete['source']);

                        send_mail($email, $subject, $mailBody);
                    }
                }
                $responce['status'] = 1;
                $responce['message'] = "Message sent Successfully.";
            } else {
                $responce['status'] = 0;
                $responce['message'] = "Unable to send message.";
            }
        }
    } else if ($request_type == 'service') {
        $data = reqValidator('contact', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $service = !empty($_POST['service']) ? addslashes($_POST['service']) : null;
            $message = !empty($_POST['message']) ? addslashes($_POST['message'])  : null;

            $sql = "INSERT INTO contact_us(type,service,first_name,last_name,email,phone,message) VALUES(2,'$service','$first_name','$last_name','$email','$phone','$message')";
            $con->query($sql) or die("ERROR-1: " . mysqli_error($con));
            $insert_id = mysqli_insert_id($con);
            if ($insert_id) {
                $query = "SELECT * FROM email_templates WHERE ref_code='ServiceContactRequestToAdmin'";
                $result = $con->query($query) or die("Contact Us ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $AdminTemplete = $result->fetch_assoc();

                    // $mailTo = "malay@suyogindia.com";
                    $mailTo = "amrutansu@suyogindia.com";
                    $name = "mucheco";

                    $replaceSubject = $AdminTemplete['subject'];

                    $replaceBody = str_replace(array("~name~", "~email~", "~phone~", "~service~", "~message~"), array($first_name . ' ' . $last_name, $email, $phone, stripslashes($service), stripslashes($message)), $AdminTemplete['source']);

                    send_mail($mailTo, $replaceSubject, $replaceBody);
                    if (!empty($UserTemplete)) {
                        

                        $subject = $UserTemplete['subject'];

                        $mailBody = str_replace(array("~name~"), array($first_name . ' ' . $last_name), $UserTemplete['source']);

                        send_mail($email, $subject, $mailBody);
                    }
                }
                $responce['status'] = 1;
                $responce['message'] = "Message sent Successfully.";
            } else {
                $responce['status'] = 0;
                $responce['message'] = "Unable to send message.";
            }
        }
    } else if ($request_type == 'get_in_touch') {
        $data = reqValidator('get_in_touch', $_POST);
        if ($data['fail']) {
            $responce['status'] = 0;
            $responce['message'] = $data['message'];
        } else {
            $first_name = $_POST['first_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = !empty($_POST['message']) ? addslashes($_POST['message'])  : null;

            $sql = "INSERT INTO contact_us(type,first_name,email,phone,message) VALUES(3,'$first_name','$email','$phone','$message')";
            $con->query($sql) or die("ERROR-1: " . mysqli_error($con));
            $insert_id = mysqli_insert_id($con);
            if ($insert_id) {
                $query = "SELECT * FROM email_templates WHERE ref_code='FirstGetInTouchRequestToAdmin'";
                $result = $con->query($query) or die("Contact Us ERROR: " . mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                    $AdminTemplete = $result->fetch_assoc();

                    // $mailTo = "malay@suyogindia.com";
                    $mailTo = "amrutansu@suyogindia.com";
                    $name = "mucheco";

                    $replaceSubject = $AdminTemplete['subject'];

                    $replaceBody = str_replace(array("~name~", "~email~", "~phone~", "~message~"), array($first_name . ' ' . $last_name, $email, $phone, stripslashes($message)), $AdminTemplete['source']);

                    send_mail($mailTo, $replaceSubject, $replaceBody);
                    if (!empty($UserTemplete)) {
                        

                        $subject = $UserTemplete['subject'];

                        $mailBody = str_replace(array("~name~"), array($first_name . ' ' . $last_name), $UserTemplete['source']);

                        send_mail($email, $subject, $mailBody);
                    }
                }
                $responce['status'] = 1;
                $responce['message'] = "Message sent Successfully.";
            } else {
                $responce['status'] = 0;
                $responce['message'] = "Unable to send message.";
            }
        }
    }
} else {
    $responce['status'] = 0;
    $responce['message'] = "method POST required";
}

echo json_encode($responce);
