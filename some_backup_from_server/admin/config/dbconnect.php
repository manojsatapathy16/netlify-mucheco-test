<?php
$dbhost='localhost';
$dbname='mucheco2023';
$dbuser='root';
$dbpass='master1234';
// $dbpass='';

$con = mysqli_init();
mysqli_options($con, MYSQLI_OPT_LOCAL_INFILE, true);
mysqli_real_connect($con, $dbhost, $dbuser, $dbpass, $dbname);
$con->set_charset("utf8");

if ($con->connect_errno) {    
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}
//$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die(mysqli_connect_error($con) . "Could not connect to database");
if ($con) {
	$GLOBALS['con'] = $con;
}