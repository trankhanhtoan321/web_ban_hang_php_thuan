<?php
$tong_cong=0;
function sp_exist($b)
{
	foreach($_SESSION['cart'] as $a)
		if($a['sp_id']==$b) return 1;
	return 0;
}
if(isset($_POST['submit_makhuyenmai']))
{
	$_SESSION['makhuyenmai']=$_POST['makhuyenmai'];
	$code=$_SESSION['makhuyenmai'];
	$km_ok=0;
	foreach($_SESSION['cart'] as $sp)
	{
		$sanpham=trankhanhtoan("san_pham",$sp['sp_id']);
		$km=trankhanhtoan("check_makhuyenmai",$code,$sanpham['code']);
		if($km['ok']==1) $km_ok=1;
	}
	if($km_ok==0) echo "mã khuyến mãi không hợp lệ!";
	else echo "mã khuyến mãi đã được áp dụng!";
}
if(isset($_GET['id']))
{
	if(!isset($_SESSION['cart']))
	{
		$a=array();
		$a[]=array('sp_id'=>$_GET['id'],'sp_sl'=>1);
		$_SESSION['cart']=$a;
	}
	else if(!sp_exist($_GET['id']))
	{
		$cart=$_SESSION['cart'];
		$cart[]=array('sp_id'=>$_GET['id'],'sp_sl'=>1);
		$_SESSION['cart']=$cart;
	}
	header("location:gio-hang.php");
}
if(isset($_POST['soluong']))
{
	$soluong=$_POST['soluong'];
	$cart=$_SESSION['cart'];
	$n=count($soluong);
	for($i=0;$i<$n;$i++)
		$cart[$i]['sp_sl']=$soluong[$i];
	$_SESSION['cart']=$cart;
}
if(isset($_POST['xoa']))
{
	$s=$_POST['xoa'];
	$s=(int)substr($s,7)-1;
	$cart=$_SESSION['cart'];
	unset($cart[$s]);
	unset($_SESSION['cart']);
	$a=array();
	foreach($cart as $b)
		$a[]=array('sp_id'=>$b['sp_id'],'sp_sl'=>$b['sp_sl']);
	$_SESSION['cart']=$a;
}
if(isset($_SESSION['makhuyenmai']))
{
	$khuyen_mai=0;
	foreach($_SESSION['cart'] as $sp)
	{
		$sanpham=trankhanhtoan("san_pham",$sp['sp_id']);
		$km=trankhanhtoan("check_makhuyenmai",$_SESSION['makhuyenmai'],$sanpham['code']);
		if($km['ok']==1)
		{
			$km_ok=1;
			$b=$sanpham['gia']*$sp['sp_sl'];
			if($km['loai']==1) $b=$km['giatri']/100*$b;
			$khuyen_mai+=$b;
		}
	}
	$_SESSION['khuyenmai']=$khuyen_mai;
}
if(isset($_POST['muatiep'])) header("location:./");
if(isset($_POST['capnhat'])) header("location:./gio-hang.php");
if(isset($_POST['thanhtoan'])) header("location:./thanh-toan.php");
if(isset($_POST['xoagiohang']))
{
	unset($_SESSION['cart']);
	header("location:./gio-hang.php");
}
if(isset($_SESSION['cart']))
{
	$cart=$_SESSION['cart'];
?>
	<div class="title">Giỏ Hàng</div>
	<form action="" method="post">
		<b>Mã Khuyến Mãi:</b> <input type="text" name="makhuyenmai"/>
		<input type="submit" name="submit_makhuyenmai" value="Áp Dụng"/>
	</form>
	<br/>
	<div class="table-giohang">
		<form action="" method="post">
			<table>
				<tr>
					<th width="5px">STT</th>
					<th width="150px">Hình Ảnh</th>
					<th>Sản Phẩm</th>
					<th width="100px">Số Lượng</th>
					<th>Đơn Giá(Đ)</th>
					<th>Thành Tiền(Đ)</th>
					<th width="100px">Xóa</th>
				</tr>
				<?php
				$dem=0;
				foreach($cart as $a)
				{
					$dem++;
					$sanpham=trankhanhtoan("san_pham",$a['sp_id'],0);
					?>
					<tr>
						<td style="text-align:center;"><?php echo $dem; ?></td>
						<td>
							<img src="<?php echo $sanpham['image']; ?>"/>
						</td>
						<td>
							<?php echo $sanpham['title']; ?>
						</td>
						<td>
							<input style="width:100px;text-align:center;" type="number" min="1" max="1000" name="soluong[]" value="<?php echo $a['sp_sl']; ?>"/>
						</td>
						<td style="text-align:center;">
							<?php echo number_format($sanpham['gia'],0,',','.'); ?>
						</td>
						<td style="text-align:center;">
							<?php $tong_cong+=$sanpham['gia']*$a['sp_sl']; echo number_format($sanpham['gia']*$a['sp_sl'],0,',','.'); ?>
						</td>
						<td style="text-align:center;">
							<input type="submit" name="xoa" value="Xóa sp <?php echo $dem; ?>"/>
						</td>
					</tr>
					<?php
				}
				if(isset($_SESSION['khuyenmai'])):
					$tong_cong-=$_SESSION['khuyenmai'];;
					?>
					<tr>
						<td style="text-align:center;" colspan="3"><b>Khuyến Mãi:</b></td>
						<td style="text-align:center;" colspan="4"><b style="color:red;">- <?php echo number_format($_SESSION['khuyenmai'],0,',','.')." VNĐ"; ?></b></td>
					</tr>
				<?php endif; ?>
				<tr>
					<td style="text-align:center;" colspan="3"><b>Tổng Cộng:</b></td>
					<td style="text-align:center;" colspan="4"><b style="color:red;"><?php echo number_format($tong_cong,0,',','.')." VNĐ"; ?></b></td>
				</tr>
			</table>
			<br/>
			<div style="text-align:center">
				<input type="submit" name="muatiep" value="&lArr; Mua Tiếp"/>
				<input type="submit" name="capnhat" value="Cập Nhật"/>
				<input type="submit" name="xoagiohang" value="Xóa Hết Giỏ Hàng"/>
				<input type="submit" name="thanhtoan" value="Thanh Toán &rArr;"/>
			</div>
		</form>
	</div>
<?php
}
else
{ ?>
	<h1>Giỏ hàng không có sản phẩm nào cả!" <a href="<?php echo $homeurl; ?>">Quay Lại Trang Chủ</a></h1>
<?php } ?>