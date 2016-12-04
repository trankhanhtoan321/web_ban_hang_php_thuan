<div class="title">chi tiết hóa đơn</div>
<?php
$a=trankhanhtoan("thong_tin_hoa_don",$_GET['hd_id']);
?>
<table>
<tr><td><b>Họ tên:</b></td><td><?php echo $a['ten']; ?></td></tr>
<tr><td><b>địa chỉ:</b></td><td><?php echo $a['diachi']; ?></td></tr>
<tr><td><b>số diện thoại:</b></td><td><?php echo $a['sdt']; ?></td></tr>
<tr><td><b>email:</b></td><td><?php echo $a['email']; ?></td></tr>
<tr><td><b>mã khuyến mãi:</b></td><td><?php echo $a['makhuyenmai']; ?></td></tr>
<tr><td><b>khuyến mãi:</b></td><td><?php echo number_format($a['khuyenmai'],0,',','.'); ?> VNĐ</td></tr>
<tr><td><b>Tổng trị giá hóa đơn phải thanh toán:</b></td><td style="color:red"><?php echo number_format($a['trigia'],0,',','.'); ?> VNĐ</td></tr>
</table>
<br/>
<?php
$a=trankhanhtoan("chi_tiet_hoa_don",$_GET['hd_id']);
$tong_cong=0;
?>
<div class="table-info">
	<table>
		<tr>
			<th>mã sản phẩm</th>
			<th>tên sản phẩm</th>
			<th>số lượng</th>
			<th>đơn giá</th>
			<th>thành tiền</th>
			<th>kích thước</th>
			<th>chất liệu</th>
			<th>màu sắc</th>
			<th>bảo hành</th>
		</tr>
	<?php
	foreach($a as $b)
	{
		$c=trankhanhtoan("san_pham",$b['sp_id']);
		?>
		<tr>
			<td><?php echo $c['code']; ?></td>
			<td><?php echo $c['title']; ?></td>
			<td><?php echo $b['soluong']; ?></td>
			<td><?php echo number_format($c['gia'],0,',','.'); ?> Đ</td>
			<td><?php $tong_cong+=$c['gia']*$b['soluong']; echo number_format($c['gia']*$b['soluong'],0,',','.'); ?> Đ</td>
			<td><?php echo $c['kichthuoc']; ?></td>
			<td><?php echo $c['chatlieu']; ?></td>
			<td><?php echo $c['mausac']; ?></td>
			<td><?php echo $c['baohanh']; ?></td>
		</tr>
	<?php } ?>
	<tr><td colspan="4"><b>Tổng Cộng (chưa trừ khuyến mãi)</b></td><td colspan="5"><?php echo number_format($tong_cong,0,',','.'); ?></td></tr>
	</table>
</div>