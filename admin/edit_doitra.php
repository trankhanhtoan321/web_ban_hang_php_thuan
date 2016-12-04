<?php
if(isset($_POST['submit']))
{
	$a=$_POST['doitra'];
	if(trankhanhtoan("update_doitra",$a)) echo "Đã Cập Nhật Thành Công!";
	else echo "có lỗi xảy ra!";
}
?>
<div class="title">Đổi Trả</div>
<form action="" method="post">
	<?php $a=trankhanhtoan("doitra"); ?>
	<textarea class="ckeditor" name="doitra"><?php echo $a; ?></textarea><br/>
	<input type="submit" name="submit" value="Cập Nhật"/>
</form>