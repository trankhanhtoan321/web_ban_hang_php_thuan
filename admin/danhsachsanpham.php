<div class="title">danh sách sản phẩm</div>
<?php
$sanpham=trankhanhtoan("tat_ca_san_pham");
?>
<div class="table-info">
	<table>
		<tr>
			<th>id</th>
			<th>code</th>
			<th>hình ảnh</th>
			<th>title</th>
			<th>giá</th>
			<th>giá cũ</th>
			<th>danh mục</th>
			<th>kích thước</th>
			<th>chất liệu</th>
			<th>màu sắc</th>
			<th>bảo hành</th>
			<th>kho hàng</th>
			<th>xóa</th>
		</tr>
		<?php
	foreach($sanpham as $a)
	{?>
		<tr>
			<td>
				<?php echo $a['id']; ?>
			</td>
			<td>
				<?php echo $a['code']; ?>
			</td>
			<td width="150px">
				<img src="<?php echo $a['image']; ?>"/>
			</td>
			<td>
				<a target="_blank" href="<?php echo $homeurl; ?>/<?php echo $a['id']; ?>-<?php echo rewrite($a['title']); ?>.html">
					<?php echo $a['title']; ?>
				</a>
			</td>
			<td>
				<?php echo $a['gia']; ?>
			</td>
			<td>
				<?php echo $a['giagoc']; ?>
			</td>
			<td>
				<?php echo ($a['dm_sp']==1?"đồng hồ gỗ":($a['dm_sp']==2?"đồng hồ cây":($a['dm_sp']==3?"tượng gỗ":"không xác định"))); ?>
			</td>
			<td>
				<?php echo $a['kichthuoc']; ?>
			</td>
			<td>
				<?php echo $a['chatlieu']; ?>
			</td>
			<td>
				<?php echo $a['mausac']; ?>
			</td>
			<td>
				<?php echo $a['baohanh']; ?>
			</td>
			<td>
				<?php echo ($a['khohang']==1?"còn hàng":"hết hàng"); ?>
			</td>
			<td>
				<a class="nutbam" href="./xoasanpham.php?id=<?php echo $a['id']; ?>">Xóa</a>
			</td>
		</tr>
	<?php }
	?>
	</table>
</div>