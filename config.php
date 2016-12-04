<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noithatbonphuong";
$homeurl = "http://noithatbonphuong.dev:8080";
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');
date_default_timezone_set("Asia/Ho_Chi_Minh");
ob_start();
//error_reporting(0);
include "function.php";
?>