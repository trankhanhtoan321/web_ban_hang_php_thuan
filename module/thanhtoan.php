<?php
if(isset($_POST['submit_thanhtoan']))
{
	$a=array();
	$a['ten']=$_POST['ten'];
	$a['sdt']=$_POST['sdt'];
	$a['diachi']=$_POST['diachi'];
	$a['email']=$_POST['email'];
	$_SESSION['khachhang']=$a;
	$a=NULL;
	$danhap=1;
}
if(isset($danhap) && $danhap==1)
{
	$danhap=0;
	?>
	<div class="title">Xác Nhận Và Hoàn Thành Đơn Hàng</div>
	<?php $cart=$_SESSION['cart']; ?>
	<div class="table-giohang">
		<table>
			<tr>
				<th width="5px">STT</th>
				<th width="150px">Hình Ảnh</th>
				<th>Sản Phẩm</th>
				<th width="100px">Số Lượng</th>
				<th>Đơn Giá(Đ)</th>
				<th>Thành Tiền(Đ)</th>
			</tr>
			<?php
			$dem=0;
			$tong_cong=0;
			foreach($cart as $a)
			{
				$sanpham=trankhanhtoan("san_pham",$a['sp_id']);
				$dem++;
				?>
				<tr>
					<td><?php echo $dem; ?></td>
					<td>
						<img src="<?php echo $sanpham['image']; ?>"/>
					</td>
					<td>
						<?php echo $sanpham['title']; ?>
					</td>
					<td style="text-align:center;">
						<?php echo $a['sp_sl']; ?>
					</td>
					<td style="text-align:center;">
						<?php echo number_format($sanpham['gia'],0,',','.'); ?>
					</td>
					<td style="text-align:center;">
						<?php $tong_cong+=$sanpham['gia']*$a['sp_sl']; echo number_format($sanpham['gia']*$a['sp_sl'],0,',','.'); ?>
					</td>
				</tr>
				<?php
			}
			if(isset($_SESSION['khuyenmai'])):
			$tong_cong-=$_SESSION['khuyenmai'];
			?>
			<tr>
				<td style="text-align:center;" colspan="3"><b>Khuyến Mãi:</b></td>
				<td style="text-align:center;" colspan="3"><b style="color:red;">- <?php echo number_format($_SESSION['khuyenmai'],0,',','.')." VNĐ"; ?></b></td>
			</tr>
			<?php endif; ?>
			<tr>
				<td style="text-align:center;" colspan="3"><b>Tổng Cộng:</b></td>
				<td style="text-align:center;" colspan="3"><b style="color:red;"><?php echo number_format($tong_cong,0,',','.')." VNĐ"; ?></b></td>
			</tr>
	</table>
	</div><br/>
	<h2>Thông Tin Khách Hàng</h2><br/>
	<?php $kh=$_SESSION['khachhang']; ?>
	<table width="100%">
		<tr>
			<td width="50%">
				<div style="border:1px solid black;padding:10px;">
					<img style="width:300px" src="/uploads/css/thongtinkhachhang.jpg"/>
					<br/><b><table>
					<tr>
						<td>Họ Và Tên: </td><td><?php echo $_SESSION['khachhang']['ten']; ?></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td>Số Điện Thoại: </td><td><?php echo $_SESSION['khachhang']['sdt']; ?></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td>Email: </td><td><?php echo $_SESSION['khachhang']['email']; ?></td>
					</tr>
					<tr><td><br/></td></tr>
					<tr>
						<td>Địa Chỉ: </td><td><?php echo $_SESSION['khachhang']['diachi']; ?></td>
					</tr>
				</table></b><br/></div>
			</td>
			<?php if($device->isMobile()) echo "</tr><tr>"; ?>
			<td width="50%" style="padding-left:10px;">
				<table>
					<tr>
						<td>
							<img style="width:100px" src="/uploads/css/giaohang.png"/>
						</td>
						<td>
							<h3>Phương Thức Vận Chuyển</h3>
							<font style="color:red"><b>Miễn Phí</b> Giao Hàng Trong Toàn TP. Hồ Chí Minh.</font><br/>
							<i>Đối Với Những Tỉnh Thành Xa TP. Hồ Chí Minh, Nhân Viên Sẽ Liên Hệ Và Thỏa Thuận Phí Vận Chuyển Sau Khi Nhận Được Đơn Hàng.</i>
						</td>
					</tr>
					<tr>
						<td>
							<img style="width:100px" src="/uploads/css/thanhtoan.png"/>
						</td>
						<td>
							<h3>Phương Thức Thanh Toán</h3>
							<font style="color:red">Trả Tiền Mặt Khi Nhận Hàng.</font><br/>
							<i>Đảm Bảo Uy Tín Chất Lượng Và Giảm Thiểu Rủi Ro Của Khách Hàng.</i>
						</td>
					</tr>
					<tr>
						<td>
							<img style="width:100px" src="/uploads/css/doihang.png"/>
						</td>
						<td>
							<h3>Đổi Trả Hàng</h3>
							<font style="color:red">Đổi Trả Hàng Trong Vòng 3 Ngày</font><br/>
							<i>Nhằm Đảm Bảo Quyền Lợi Khách Hàng, Khách Hàng Có Thể Đổi Hoặc Trả Hàng Trong Vòng 3 Ngày Kể Từ Ngày Mua Hàng.</i>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div style="text-align:center">
		<a class="nutbam" href="<?php echo $homeurl; ?>/gio-hang.php"><< Quay Lại</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
		<a class="nutbam" href="<?php echo $homeurl; ?>/hoan-thanh.php">Hoàn Thành</a>
	</div>
	<?php
}
else
{
	?>
	<div class="title">Nhập Thông Tin Khách Hàng</div>
	<table width="100%">
		<tr>
			<td width="50%">
				<?php if(!isset($_SESSION['khachhang'])): ?>
				<form action="" method="post">
					<table>
						<tr>
							<td>Họ Và Tên (*): </td><td><input type="text" name="ten"/><br/></td>
						</tr>
						<tr>
							<td>Số Điện Thoại (*): </td><td><input type="text" name="sdt"/></td>
						</tr>
						<tr>
							<td>Email: </td><td><input type="email" name="email"/></td>
						</tr>
						<tr>
							<td>Địa Chỉ (*): </td><td><input type="text" name="diachi"/></td>
						</tr>
						<tr>
							<td></td><td><input type="submit" name="submit_thanhtoan" value="Tiếp Theo"/></td>
						</tr>
					</table>
				</form>
				<?php else: ?>
				<form action="" method="post">
					<table>
						<tr>
							<td>Họ Và Tên (*): </td><td><input type="text" value="<?php echo $_SESSION['khachhang']['ten']; ?>" name="ten"/></td>
						</tr>
						<tr>
							<td>Số Điện Thoại (*): </td><td><input type="text" name="sdt" value="<?php echo $_SESSION['khachhang']['sdt']; ?>"/></td>
						</tr>
						<tr>
							<td>Email: </td><td><input type="email" name="email" value="<?php echo $_SESSION['khachhang']['email']; ?>"/></td>
						</tr>
						<tr>
							<td>Địa Chỉ (*): </td><td><input type="text" name="diachi" value="<?php echo $_SESSION['khachhang']['diachi']; ?>"/></td>
						</tr>
						<tr>
							<td></td><td><input type="submit" name="submit_thanhtoan" value="Tiếp Theo >>"/></td>
						</tr>
					</table>
				</form>
				<?php endif; ?>
		</td>
		<?php if($device->isMobile()) echo "</tr><tr>"; ?>
		<td width="50%" style="padding-left:10px;">
			<table>
				<tr>
					<td>
						<img style="width:100px" src="/uploads/css/giaohang.png"/>
					</td>
					<td>
						<h3>Phương Thức Vận Chuyển</h3>
						<font style="color:red"><b>Miễn Phí</b> Giao Hàng Trong Toàn TP. Hồ Chí Minh.</font><br/>
						<i>Đối Với Những Tỉnh Thành Xa TP. Hồ Chí Minh, Nhân Viên Sẽ Liên Hệ Và Thỏa Thuận Phí Vận Chuyển Sau Khi Nhận Được Đơn Hàng.</i>
					</td>
				</tr>
				<tr>
					<td>
						<img style="width:100px" src="/uploads/css/thanhtoan.png"/>
					</td>
					<td>
						<h3>Phương Thức Thanh Toán</h3>
						<font style="color:red">Trả Tiền Mặt Khi Nhận Hàng.</font><br/>
						<i>Đảm Bảo Uy Tín Chất Lượng Và Giảm Thiểu Rủi Ro Của Khách Hàng.</i>
					</td>
				</tr>
				<tr>
					<td>
						<img style="width:100px" src="/uploads/css/doihang.png"/>
					</td>
					<td>
						<h3>Đổi Trả Hàng</h3>
						<font style="color:red">Đổi Trả Hàng Trong Vòng 3 Ngày</font><br/>
						<i>Nhằm Đảm Bảo Quyền Lợi Khách Hàng, Khách Hàng Có Thể Đổi Hoặc Trả Hàng Trong Vòng 3 Ngày Kể Từ Ngày Mua Hàng.</i>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php } ?>