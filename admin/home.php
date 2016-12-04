<?php
$a=trankhanhtoan("hoa_don_moi");
if(count($a)>0): ?>
<div class="title">Đơn Hàng Mới</div>
	<div class="table-info">
		<table>
			<tr>
				<th>ID</th>
				<th>ngày</th>
				<th>tên</th>
				<th>địa chỉ</th>
				<th>số điện thoại</th>
				<th>trị giá</th>
				<th>email</th>
				<th>khuyến mãi</th>
				<th>mã khuyến mãi</th>
				<th>action</th>
				<th>Hoàn Thành</th>
			</tr>
			<?php
		foreach($a as $b)
		{ ?>
			<tr>
				<td>
					<?php echo $b['hd_id']; ?>
				</td>
				<td>
					<?php echo date("H:i d-m-Y",$b['hd_date']); ?>
				</td>
				<td>
					<?php echo $b['ten']; ?>
				</td>
				<td>
					<?php echo $b['diachi']; ?>
				</td>
				<td>
					<?php echo $b['sdt']; ?>
				</td>
				<td>
					<?php echo number_format($b['trigia'],0,',','.'); ?> VNĐ
				</td>
				<td>
					<?php echo $b['email']; ?>
				</td>
				<td>
					<?php echo number_format($b['khuyenmai'],0,',','.'); ?> VNĐ
				</td>
				<td>
					<?php echo $b['makhuyenmai']; ?>
				</td>
				<td>
					<a class="nutbam" href="./?frame=chitietdonhang&hd_id=<?php echo $b['hd_id']; ?>">Chi Tiết</a>
				</td>
				<td>
					<a class="nutbam" href="./?frame=hoanthanh&hd_id=<?php echo $b['hd_id']; ?>">hoàn thành</a>
				</td>
			</tr>
		<?php } ?>
		</table>
	</div>
<?php endif; ?>