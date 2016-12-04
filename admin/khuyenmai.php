<div class="title">Khuyến Mãi</div>
<?php
if(isset($_POST['submit']))
{
	$km['code']=$_POST['code'];
	$km['giatri']=$_POST['giatri'];
	$km['loai']=$_POST['loai'];
	$km['ngay_bd']=$_POST['ngay_bd'];
	$km['ngay_kt']=$_POST['ngay_kt'];
	$km['apdung']=$_POST['apdung'];
	if($km['apdung']==1)
	{
		$a=trankhanhtoan("code_tat_ca_san_pham");
		foreach($a as $b) trankhanhtoan("insert_khuyen_mai",$km,$b);
	}
	else if($km['apdung']==2)
	{
		$a=trankhanhtoan("san_pham_danh_muc",1);
		foreach($a as $b) trankhanhtoan("insert_khuyen_mai",$km,$b['code']);
	}
	else if($km['apdung']==3)
	{
		$a=trankhanhtoan("san_pham_danh_muc",2);
		foreach($a as $b) trankhanhtoan("insert_khuyen_mai",$km,$b['code']);
	}
	else if($km['apdung']==4)
	{
		$a=trankhanhtoan("san_pham_danh_muc",3);
		foreach($a as $b) trankhanhtoan("insert_khuyen_mai",$km,$b['code']);
	}
	else if($km['apdung']==5)
	{
		$a=str_to_array($_POST['sp_code'],' ');
		foreach($a as $b) trankhanhtoan("insert_khuyen_mai",$km,$b);
	}
	echo "Đã Thêm Mã Khuyến Mãi";
}
?>
<form action="" method="post">
	<b>Mã Khuyến Mãi:</b> <input type="text" name="code"/><br/><br/>
	<b>Giá Trị Khuyến Mãi :</b> <input type="number" name="giatri"/><br/><br/>
	<b>Loại Khuyến Mãi </b>(1:% , 2:VNĐ): <input type="number" name="loai"/><br/><br/>
	<b>Áp Dụng:</b> <input type="number" name="apdung"/><br/>
	(1:toàn bộ , 2:đồng hồ gỗ, 3:đồng hồ cây, 4:tượng gỗ, 5:từng sản phẩm)<br/><br/>
	<b>Mã Sản Phẩm Được Áp Dụng</b> : <input type="text" name="sp_code" value="0"/><br/>
	(nếu loại áp dụng ở trên = 5, áp dụng trên nhiều sản phẩm thì mã sản phẩm cách nhau 1 space)<br/><br/>
	<b>Ngày Bắt Đầu:</b> <input type="date" name="ngay_bd"/><br/><br/>
	<b>Ngày Kết Thúc:</b> <input type="date" name="ngay_kt"/><br/><br/>
	<input type="submit" name="submit" value="OK"/>
</form>