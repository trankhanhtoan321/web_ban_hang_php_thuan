<?php 
require("./config.php");
require_once("./lib/MobileDetect/Mobile_Detect.php");
$device=new Mobile_Detect();
if(!session_id()) session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<meta name="author" content="Trần Khánh Toàn">
		<link rel="icon" href="/uploads/css/logo1.jpg" type="image/jpg" sizes="16x16">
		<!--sile show-->
		<link rel="stylesheet" href="lib/slide/orbit-1.2.3.css" />
		<script type="text/javascript" src="lib/slide/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="lib/slide/jquery.orbit-1.2.3.min.js"></script>
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit();
			});
		</script>
		<!--end slide show-->	
		<script language="javascript" src="lib/ckeditor/ckeditor.js"></script>
		<!--title and description-->
		<title>Nội Thất Bốn Phương</title>
	</head>
	<body>
		<?php 
			if($device->isMobile()) include "./module/header-mobile.php";
			else include "./module/header.php";
		?>