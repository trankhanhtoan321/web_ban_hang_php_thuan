<!--danh muc san pham-->
<div class="danhmuc">
<h1>Danh Mục Sản Phẩm</h1><br/>
<?php $danhmuc=trankhanhtoan("danh_muc"); ?>
<table>
	
		<?php
		foreach($danhmuc as $a)
		{
		?>
			<tr>
				<td>
					<a style="color:#000;" href="<?php echo $homeurl; ?>/category-<?php echo $a['id']; ?>-<?php echo rewrite($a['title']); ?>.html">
						<img src="<?php echo $a['image']; ?>"/><br/>
						<h3><?php echo $a['title']; ?></h3>
					</a>
				</td>
			</tr>
		<?php
		}
		?>

</table>
</div>
<?php $danhmuc=NULL; ?>
<hr/><br/>
<!--san pham moi-->
<?php $sanphammoi=trankhanhtoan("san_pham_moi",0,10);?>
<?php if(count($sanphammoi)>0): ?>
<div class="list_sanpham">
	<h1>Sản Phẩm Mới</h1><br/>
	<table>
		<tr>
			<?php
			$dem=0;
			foreach($sanphammoi as $sp)
			{
			?>
				<td>
					<a href="<?php echo $homeurl; ?>/<?php echo $sp['id']; ?>-<?php echo rewrite($sp['title']); ?>.html">
						<img style="width:300px" src="<?php echo $sp['image']; ?>"/><br/>
						<?php if($sp['giagoc']!=0): ?>
							<gachngang style="color:#000;"><?php echo number_format($sp['giagoc'],0,',','.'); ?>đ</gachngang>
						<?php endif; ?><br/>
						<font style="color:red">giá:<?php echo number_format($sp['gia'],0,',','.'); ?> đ</font><br/>
						<b><?php echo $sp['title']." - ".$sp['code']; ?><br/></b>
					</a>
					<a href="<?php echo $homeurl; ?>/gio-hang.php?id=<?php echo $sp['id']; ?>" class="nutbam">Mua Ngay!</a>
					<br/><br/><br/>
				</td>
			<?php
				$dem++;
				if($dem==1)
				{
					$dem=0;
					echo "</tr><tr>";
				}
			}
			?>
		</tr>
	</table>
</div>
<?php endif; ?>
<?php $sanphammoi=NULL; ?>
<hr/><br/>
<!--san pham duoc quan tam nhieu nhat-->
<?php $sanpham=trankhanhtoan("san_pham_xem_nhieu",0,10);?>
<?php if(count($sanpham)>0): ?>
<div class="list_sanpham">
	<h1>Sản Phẩm Được Quan Tâm</h1><br/>
	<table>
		<tr>
			<?php
			$dem=0;
			foreach($sanpham as $sp)
			{
			?>
				<td>
					<a href="<?php echo $homeurl; ?>/<?php echo $sp['id']; ?>-<?php echo rewrite($sp['title']); ?>.html">
						<img style="width:300px" src="<?php echo $sp['image']; ?>"/><br/>
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
				if($dem==1)
				{
					$dem=0;
					echo "</tr><tr>";
				}
			}
			?>
		</tr>
	</table>
</div>
<?php endif; ?>
<?php $sanpham=NULL; ?>