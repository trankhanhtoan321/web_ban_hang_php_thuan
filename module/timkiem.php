<?php $sanpham=trankhanhtoan("san_pham_tim_kiem",$_GET['q'],20); ?>
<?php //if(count($sanpham)>0): ?>
<div class="list_sanpham bw">
	<h1>Kết Quả Tìm Kiếm: <?php echo $_GET['q']; ?></h1><br/>
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
						<b><?php echo $sp['title']; ?><br/></b>
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
<?php// endif; ?>
<?php $sanpham=NULL; ?>