<?php 
require("../config.php");
if(!session_id()) session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link rel="icon" href="../uploads/css/logo1.jpg" type="image/jpg" sizes="16x16">	
		<script language="javascript" src="../lib/ckeditor/ckeditor.js"></script>
		<title>Nội Thất Bốn Phương</title>
	</head>
	<body>
		<table width="100%">
			<tr>
				<td style="width:15%;vertical-align:top">
					<?php include "menu.php"; ?>
				</td>
				<td style="width:85%;vertical-align:top"> 
					<?php
						if(isset($_SESSION['uid']))
						{
							if($_SESSION['uid']==1)
							{
								include "processframe.php";
							}
							else header("location:login.php");
						}
						else header("location:login.php");
					?>
				</td>
			</tr>
		</table>
	</body>
</html>
<?php mysqli_close($conn);?>