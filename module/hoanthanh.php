<?php
if(isset($_SESSION['cart']) && isset($_SESSION['khachhang']))
{
	$hoadon=array();
	$hoadon['ten']=$_SESSION['khachhang']['ten'];
	$hoadon['sdt']=$_SESSION['khachhang']['sdt'];
	$hoadon['email']=$_SESSION['khachhang']['email'];
	$hoadon['diachi']=$_SESSION['khachhang']['diachi'];
	$hoadon['hd_date']=time();
	$cart=$_SESSION['cart'];
	$hoadon['trigia']=0;
	if(isset($_SESSION['makhuyenmai']))
	{
		$hoadon['khuyenmai']=$_SESSION['khuyenmai'];
		$hoadon['makhuyenmai']=$_SESSION['makhuyenmai'];
	}
	else
	{
		$hoadon['khuyenmai']=0;
		$hoadon['makhuyenmai']=0;
	}
	foreach($cart as $a)
	{
		$sanpham=trankhanhtoan("san_pham",$a['sp_id']);
		$hoadon['trigia']+=$sanpham['gia']*$a['sp_sl'];
		$sanpham=NULL;
	}
	if(isset($_SESSION['khuyenmai'])) $hoadon['trigia']-=$_SESSION['khuyenmai'];
	trankhanhtoan("insert_hoa_don",$hoadon);
	$hd_id=trankhanhtoan("id_hoa_don_moi_nhat");
	foreach($cart as $a)
	{
		$cthd=array();
		$cthd['hd_id']=$hd_id;
		$cthd['sp_id']=$a['sp_id'];
		$cthd['soluong']=$a['sp_sl'];
		trankhanhtoan("insert_cthd",$cthd);
		$cthd=NULL;
	}
	unset($_SESSION['cart']);
	unset($_SESSION['khuyenmai']);
	unset($_SESSION['makhuyenmai']);
	?>
	<div style="text-align:center;color:green;">
		<img src="/uploads/css/success.png"/><br/>
		<h1>Bạn Đã Đặt Hàng Thành Công! <br/>
			Chúng Tôi Sẽ Liên Lạc Giao Hàng Cho Bạn Trong Thời Gian Sớm Nhất!<br/>
			Cảm Ơn Bạn Đã Mua Hàng Của <i>Nội Thất Bốn Phương</i>!
		</h1>
	</div>
<?php
}
else header("location:./gio-hang.php");
?>