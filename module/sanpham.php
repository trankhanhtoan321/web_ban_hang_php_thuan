<?php
/////update luot xem
$sql="UPDATE sanpham SET luotxem=luotxem+1 WHERE id=".$_GET['id'];
mysqli_query($conn,$sql);
////////////////////////////////////
$sanpham=trankhanhtoan("san_pham",$_GET['id'],0);
?>
<div style="text-align:center"><h1><?php echo $sanpham['title']." - ".$sanpham['code']; ?></h1></div>
<br/>
<div class="chitiet_sanpham">
<table>
	<tr>
		<td width="400px">
			<img src="<?php echo $sanpham['image']; ?>"/>
		</td>
		<?php if($device->isMobile()) echo "</tr><tr>"; ?>
		<td style="padding-left:10px">
			<hr/>
			<table width="100%" style="padding-left:10px">
				<tr>
					<td width="33%">
						<br/>
						Chất Liệu: <?php echo $sanpham['chatlieu']; ?><br/><br/>
						Tình Trạng: <?php  if($sanpham['khohang']==1) echo "còn hàng"; else echo "hết hàng"; ?><br/><br/>
					</td>
					<td width="34%">
						<br/>
						Màu Sắc: <?php echo $sanpham['mausac']; ?><br/><br/>
						Kích Thước: <?php echo $sanpham['kichthuoc']; ?><br/><br/>
					</td>
					<td width="33%">
						<br/>
						Bảo Hành: <?php echo $sanpham['baohanh']; ?><br/><br/>
						Lượt Xem: <?php echo $sanpham['luotxem']; ?><br/><br/>
					</td>
				</tr>
			</table>
			<hr/><br/>
			<?php echo $sanpham['des']; ?><br/><br/><hr/><br/>
			<font style="font-size:30px;color:red;">Giá: <?php echo number_format($sanpham['gia'],0,',','.'); ?> đ</font><br/><br/>
			<?php if($sanpham['giagoc']!=0): ?>
				<i>Giá Gốc Trước Đây: <gachngang><?php echo number_format($sanpham['giagoc'],0,',','.'); ?> đ</gachngang><br/>
				Tiết Kiệm: <?php echo (int)(100-$sanpham['gia']/$sanpham['giagoc']*100); ?>%<br/></i>
			<?php endif; ?><br/>
			<a class="nutbam" href="<?php echo $homeurl; ?>/gio-hang.php?id=<?php echo $sanpham['id']; ?>">Mua Ngay!</a><br/><br/><hr/><br/>
			<font style="color:green">Miễn phí vận chuyển trong toàn Thành Phố Hồ Chí Minh.<br/>
			Tất cả các Hình ảnh sản phẩm Quý khách hàng đang xem tại Website "WWW.NoiThatBonPhuong.Com" đều là những hình ảnh thực, được chụp trực tiếp cho TỪNG SẢN PHẨM CỤ THỂ tại Nội Thất Bốn Phương.<br/>
			NỘI THẤT BỐN PHƯƠNG cam kết chất lượng & giá sản phẩm cạnh tranh nhất.<br/>
			Đặt hàng online trên website hoặc liên hệ : 0931.499.026 (A.Sự)<br/></font>
		</td>
	</tr>
</table>
</div>
<div class="title">Chi Tiết Sản Phẩm</div>
<?php
	echo $sanpham['content']; 
?>
<div class="title">Sản Phẩm Cùng Loại</div>
<?php $sanpham=trankhanhtoan("san_pham_danh_muc",$sanpham['dm_sp'],6);?>
<div class="list_sanpham bw">
	<table>
		<tr>
			<?php
			$dem=0;
			foreach($sanpham as $sp)
			{
				if($sp['id']==$_GET['id']) continue;
			?>
				<td>
					<a href="<?php echo $homeurl; ?>/<?php echo $sp['id']; ?>-<?php echo rewrite($sp['title']); ?>.html">
						<img src="<?php echo $sp['image']; ?>"/><br/>
						<?php if($sp['giagoc']!=0): ?>
							<gachngang style="color:#000;"><?php echo number_format($sp['giagoc'],0,',','.'); ?>đ</gachngang>
						<?php endif; ?><br/>
						<font style="color:red">giá:<?php echo number_format($sp['gia'],0,',','.'); ?> đ</font><br/>
						<b><?php echo $sp['title']." - ".$sp['code']; ?><br/></b>
					</a>
					<a href="<?php echo $homeurl; ?>/gio-hang.php?id=<?php echo $sp['id']; ?>" class="nutbam">Mua Ngay!</a><br/><br/><br/>
				</td>
				<?php
				$dem++;
				if($dem==($device->isMobile()?1:4))
				{
					$dem=0;
					echo "</tr><tr>";
				}
			}
			?>
		</tr>
	</table>
</div>
<?php $sanpham=NULL; ?>
<hr/>