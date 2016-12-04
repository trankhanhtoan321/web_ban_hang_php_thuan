<div class="title">Giới Thiệu Nội Thất Bốn Phương</div>
<?php
$sql="SELECT gioithieu FROM options";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<div class="content-body-text">
	<?php echo $row['gioithieu']; ?>
</div>