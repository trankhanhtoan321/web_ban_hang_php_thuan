<div class="title">Hướng Dẫn</div>
<?php
$sql="SELECT huongdan FROM options";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<div class="content-body-text">
	<?php echo $row['huongdan']; ?>
</div>