<?php $sanpham=trankhanhtoan("san_pham_danh_muc",$_GET['dm_id'],0); ?>
<?php if(count($sanpham)>0): ?>
	<?php if($device->isMobile()){ ?>
<div class="list_sanpham">
	<?php } else { ?>
<div class="list_sanpham bw">
	<?php } ?>
	<h1><?php echo $sanpham[0]['dm_title']; ?></h1><br/>
	<?php $ctdm=trankhanhtoan("danh_muc",0,0); foreach($ctdm as $b) if($b['id']==$_GET['dm_id']) echo $b['des'];?>
	<table>
		<tr>
			<?php
			$dem=0;
			foreach($sanpham as $sp)
			{
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
				if($dem==($device->isMobile()?1:3))
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