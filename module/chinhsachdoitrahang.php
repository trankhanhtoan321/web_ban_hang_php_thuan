<div class="title">Chính Sách Đổi - Trả Hàng</div>
<?php
$sql="SELECT doitra FROM options";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<div class="content-body-text">
	<?php echo $row['doitra']; ?>
</div>