<?php
$doanhthu=0;
$a=trankhanhtoan("hoa_don");
if(count($a)>0): ?>
<div class="title">Đơn Hàng</div>
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
					<?php $doanhthu+=$b['trigia']; echo number_format($b['trigia'],0,',','.'); ?> VNĐ
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
			</tr>
		<?php } ?>
		</table>
	</div>

<?php
echo "<br/><br/><b>Tổng Doanh Thu = ".number_format($doanhthu,0,',','.')."</b><br/>";
endif; 
?>