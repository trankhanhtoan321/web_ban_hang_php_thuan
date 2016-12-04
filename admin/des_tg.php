<div class="title">des tượng gỗ</div>
<?php
if(isset($_POST['submit']))
{
	if(trankhanhtoan("update_des_tg",$_POST['des'])) echo "Đã Cập Nhật";
	else echo "có lỗi xảy ra";
}
?>
<form action="" method="post">
	<textarea name="des" class="ckeditor"><?php echo trankhanhtoan("get_des_tg"); ?></textarea>
	<input type="submit" name="submit" value="OK"/>
</form>