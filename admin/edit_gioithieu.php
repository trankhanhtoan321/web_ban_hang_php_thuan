<?php
if(isset($_POST['submit']))
{
	$a=$_POST['gioithieu'];
	if(trankhanhtoan("update_gioithieu",$a)) echo "Đã Cập Nhật Thành Công!";
	else echo "có lỗi xảy ra!";
}
?>
<div class="title">Giới Thiệu</div>
<form action="" method="post">
	<?php $a=trankhanhtoan("gioithieu"); ?>
	<textarea class="ckeditor" name="gioithieu"><?php echo $a; ?></textarea><br/>
	<input type="submit" name="submit" value="Cập Nhật"/>
</form>