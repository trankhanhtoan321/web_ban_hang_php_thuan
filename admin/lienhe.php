<div class="title">Liên Hệ</div>
<?php $a=trankhanhtoan("ds_lien_he"); ?>
<div class="table-info">
	<table>
		<tr>
			<th>tên</th>
			<th>số điện thoại</th>
			<th>email</th>
			<th>địa chỉ</th>
			<th>thời gian</th>
			<th>nội dung</th>
		</tr>
		<?php
		foreach($a as $b)
		{
			?>
			<tr>
				<td>
					<?php echo $b['ten']; ?>
				</td>
				<td>
					<?php echo $b['sdt']; ?>
				</td>
				<td>
					<?php echo $b['email']; ?>
				</td>
				<td>
					<?php echo $b['diachi']; ?>
				</td>
				<td>
					<?php echo $b['thoigian']; ?>
				</td>
				<td>
					<?php echo $b['noidung']; ?>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</div>