<?php
if(isset($_POST['submit']))
{
	$a=$_POST['huongdan'];
	if(trankhanhtoan("update_huongdan",$a)) echo "Đã Cập Nhật Thành Công!";
	else echo "có lỗi xảy ra!";
}
?>
<div class="title">Hướng Dẫn</div>
<form action="" method="post">
	<?php $a=trankhanhtoan("huongdan"); ?>
	<textarea class="ckeditor" name="huongdan"><?php echo $a; ?></textarea><br/>
	<input type="submit" name="submit" value="Cập Nhật"/>
</form>