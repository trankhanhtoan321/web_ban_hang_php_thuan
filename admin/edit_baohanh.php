<?php
if(isset($_POST['submit']))
{
	$a=$_POST['baohanh'];
	if(trankhanhtoan("update_baohanh",$a)) echo "Đã Cập Nhật Thành Công!";
	else echo "có lỗi xảy ra!";
}
?>
<div class="title">Bảo Hành</div>
<form action="" method="post">
	<?php $a=trankhanhtoan("baohanh"); ?>
	<textarea class="ckeditor" name="baohanh"><?php echo $a; ?></textarea><br/>
	<input type="submit" name="submit" value="Cập Nhật"/>
</form>