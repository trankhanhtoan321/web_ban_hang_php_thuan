<?php if(isset($_SESSION['cart']) && get_url()!=$homeurl."/gio-hang.php" && get_url()!= $homeurl."/thanh-toan.php" && get_url()!= $homeurl."/hoan-thanh.php"): ?>
	<div class="sidebar_giohang">
		<table style="margin:auto;">
			<tr><td>
			<img style="float:left;display:inline-block;" src="/uploads/css/cart.png"/>
		</td><td>
			(<?php echo count($_SESSION['cart']); ?> Sản Phẩm)
		</td>
		</table><br/>
		<?php
			$cart=$_SESSION['cart']; 
			foreach($cart as $a)
			{
				$sanpham=trankhanhtoan("san_pham",$a['sp_id']);
				?>
				<table>
					<tr>
						<td>
							<img src="<?php echo $sanpham['image']; ?>"/>
						</td>
						<td>
							<a style="color:black;" href="<?php echo $homeurl; ?>/<?php echo $sanpham['id']; ?>-<?php echo rewrite($sanpham['title']); ?>.html">
								<b><?php echo $sanpham['code']; ?> x <?php echo $a['sp_sl']; ?></b>
							</a>
						</td>
					</tr>
				</table>
				<?php
			}
		?>
		<a class="nutbam" href="<?php echo $homeurl; ?>/gio-hang.php">Giỏ Hàng</a>
		<br/><br/>
	</div>
<?php endif; ?>
<!--//////////////////////////////////////////////////////////////////////////////-->
<div class="title">Danh Mục Sản Phẩm</div>
<?php
$danhmuc=trankhanhtoan("danh_muc",0,0);
?>
<div class="list-sidebar">
<table>
<?php
	foreach($danhmuc as $a)
	{
	?>
		<tr>
			<td width="50px">
				<a style="color:#000;" href="<?php echo $homeurl; ?>/category-<?php echo $a['id']; ?>-<?php echo rewrite($a['title']); ?>.html">
					<img src="<?php echo $a['image']; ?>"/>
				</a>
			</td>
			<td>
				<a style="color:#000;" href="<?php echo $homeurl; ?>/category-<?php echo $a['id']; ?>-<?php echo rewrite($a['title']); ?>.html">
					<?php echo $a['title']; ?><br/>
				</a>
			</td>
		</tr>
	<?php
	}
	$sanphammoi=NULL;
?>
</table>
</div>
<!-- /////////////////////////////////////////////////////////////////////////- -->
<div class="title">Sản Phẩm Mới</div>
<?php
$sanphammoi=trankhanhtoan("san_pham_moi",0,5);
?>
<div class="list-sidebar">
<table>
<?php
	foreach($sanphammoi as $a)
	{
	?>
		<tr>
			<td width="50px">
				<a style="color:#000;" href="<?php echo $homeurl; ?>/<?php echo $a['id']; ?>-<?php echo rewrite($a['title']); ?>.html">
					<img src="<?php echo $a['image']; ?>"/>
				</a>
			</td>
			<td>
				<a style="color:#000;" href="<?php echo $homeurl; ?>/<?php echo $a['id']; ?>-<?php echo rewrite($a['title']); ?>.html">
					<?php echo $a['title']." - ".$a['code']; ?><br/>
					<font style="color:red">giá:<?php echo number_format($a['gia'],0,',','.'); ?>đ</font>
				</a>
			</td>
		</tr>
	<?php
	}
	$sanphammoi=NULL;
?>
</table>
</div>
<!--///////////////////////////////////////////////////////////////////////////////////////-->
<div class="title">Sản Phẩm Được Quan Tâm</div>
<?php
$sanpham=trankhanhtoan("san_pham_xem_nhieu",0,5);
?>
<div class="list-sidebar">
<table>
<?php
	foreach($sanpham as $a)
	{
	?>
		<tr>
			<td width="50px">
				<a style="color:#000;" href="<?php echo $homeurl; ?>/<?php echo $a['id']; ?>-<?php echo rewrite($a['title']); ?>.html">
					<img src="<?php echo $a['image']; ?>"/>
				</a>
			</td>
			<td>
				<a style="color:#000;" href="<?php echo $homeurl; ?>/<?php echo $a['id']; ?>-<?php echo rewrite($a['title']); ?>.html">
					<?php echo $a['title']." - ".$a['code']; ?><br/>
					<font style="color:red">giá:<?php echo number_format($a['gia'],0,',','.'); ?>đ</font>
				</a>
			</td>
		</tr>
	<?php
	}
	$sanpham=NULL;
?>
</table>
</div>