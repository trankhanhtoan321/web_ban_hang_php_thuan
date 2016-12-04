<?php 
$a=trankhanhtoan("khuyen_mai_ad1");
if(count($a)>0)
{
?>
	<div class="title">Khuyến Mãi Áp Dụng Tất Cả</div>
	<div class="table-info">
		<table>
			<tr>
				<th>code</th>
				<th>gia tri</th>
				<th>ngay bat dau</th>
				<th>ngay ket thuc</th>
				<th>xóa</th>
			</tr>
			<?php
			foreach($a as $b)
			{
			?>
			<tr>
				<td>
					<?php echo $b['code']; ?>
				</td>
				<td>
					<?php echo $b['giatri']; ?>
				</td>
				<td>
					<?php echo $b['ngay_bd']; ?>
				</td>
				<td>
					<?php echo $b['ngay_kt']; ?>
				</td>
				<td style="text-align:center;padding:3px">
					<a class="nutbam" href="./xoakhuyenmai.php?code=<?php echo $b['code']; ?>">Xóa</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php } ?>
<br/>
<?php 
$a=trankhanhtoan("khuyen_mai_ad2");
if(count($a)>0)
{
?>
	<div class="title">Khuyến Mãi Áp Dụng đồng hồ gỗ</div>
	<div class="table-info">
		<table>
			<tr>
				<th>code</th>
				<th>gia tri</th>
				<th>ngay bat dau</th>
				<th>ngay ket thuc</th>
				<th>xóa</th>
			</tr>
			<?php
			foreach($a as $b)
			{
			?>
			<tr>
				<td>
					<?php echo $b['code']; ?>
				</td>
				<td>
					<?php echo $b['giatri']; ?>
				</td>
				<td>
					<?php echo $b['ngay_bd']; ?>
				</td>
				<td>
					<?php echo $b['ngay_kt']; ?>
				</td>
				<td style="text-align:center;padding:3px">
					<a class="nutbam" href="./xoakhuyenmai.php?code=<?php echo $b['code']; ?>">Xóa</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php } ?>
<br/>
<?php 
$a=trankhanhtoan("khuyen_mai_ad3");
if(count($a)>0)
{
?>
	<div class="title">Khuyến Mãi Áp Dụng đồng hồ cây</div>
	<div class="table-info">
		<table>
			<tr>
				<th>code</th>
				<th>gia tri</th>
				<th>ngay bat dau</th>
				<th>ngay ket thuc</th>
				<th>xóa</th>
			</tr>
			<?php
			foreach($a as $b)
			{
			?>
			<tr>
				<td>
					<?php echo $b['code']; ?>
				</td>
				<td>
					<?php echo $b['giatri']; ?>
				</td>
				<td>
					<?php echo $b['ngay_bd']; ?>
				</td>
				<td>
					<?php echo $b['ngay_kt']; ?>
				</td>
				<td style="text-align:center;padding:3px">
					<a class="nutbam" href="./xoakhuyenmai.php?code=<?php echo $b['code']; ?>">Xóa</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php } ?>
<br/>
<?php 
$a=trankhanhtoan("khuyen_mai_ad4");
if(count($a)>0)
{
?>
	<div class="title">Khuyến Mãi Áp Dụng tượng gỗ</div>
	<div class="table-info">
		<table>
			<tr>
				<th>code</th>
				<th>gia tri</th>
				<th>ngay bat dau</th>
				<th>ngay ket thuc</th>
				<th>xóa</th>
			</tr>
			<?php
			foreach($a as $b)
			{
			?>
			<tr>
				<td>
					<?php echo $b['code']; ?>
				</td>
				<td>
					<?php echo $b['giatri']; ?>
				</td>
				<td>
					<?php echo $b['ngay_bd']; ?>
				</td>
				<td>
					<?php echo $b['ngay_kt']; ?>
				</td>
				<td style="text-align:center;padding:3px">
					<a class="nutbam" href="./xoakhuyenmai.php?code=<?php echo $b['code']; ?>">Xóa</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php } ?>
<br/>
<?php 
$a=trankhanhtoan("khuyen_mai_ad5");
if(count($a)>0)
{
?>
	<div class="title">Khuyến Mãi Áp Dụng Từng sản phẩm</div>
	<div class="table-info">
		<table>
			<tr>
				<th>code</th>
				<th>gia tri</th>
				<th>mã sản phẩm</th>
				<th>ngay bat dau</th>
				<th>ngay ket thuc</th>
				<th>xóa</th>
			</tr>
			<?php
			foreach($a as $b)
			{
			?>
			<tr>
				<td>
					<?php echo $b['code']; ?>
				</td>
				<td>
					<?php echo $b['giatri']; ?>
				</td>
				<td>
					<?php echo $b['sp_code']; ?>
				</td>
				<td>
					<?php echo $b['ngay_bd']; ?>
				</td>
				<td>
					<?php echo $b['ngay_kt']; ?>
				</td>
				<td style="text-align:center;padding:3px">
					<a class="nutbam" href="./xoakhuyenmai.php?sp_code=<?php echo $b['sp_code']; ?>&code=<?php echo $b['code']; ?>">Xóa</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
<?php } ?>