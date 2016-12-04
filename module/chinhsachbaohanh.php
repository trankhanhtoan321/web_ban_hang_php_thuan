<div class="title">Chính Sách Bảo Hành</div>
<?php
$sql="SELECT baohanh FROM options";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<div class="content-body-text">
	<?php echo $row['baohanh']; ?>
</div>