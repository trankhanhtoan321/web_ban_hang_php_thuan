<?php
if(isset($_POST['submit_lienhe']))
{
	$lienhe=array();
	$lienhe['ten']=$_POST['ten'];
	$lienhe['sdt']=$_POST['sdt'];
	$lienhe['email']=$_POST['email'];
	$lienhe['diachi']=$_POST['diachi'];
	$lienhe['noidung']=$_POST['noidung'];
	$lienhe['thoigian']=time();
	trankhanhtoan("insert_lienhe",$lienhe);
?>
<h1 style="color:green;">Cảm Ơn Bạn Đã Quan Tâm!<br/>Liên Hệ Của Bạn Đã Được Gởi Thành Công!</h1>
<?php
}
?>
<div class="title">Gửi Liên Hệ</div>
<div class="lienhe" style="padding:20px;">
	<form action="" method="post">
		<table width="100%">
			<tr>
				<td>
					Họ Tên (*):
				</td>
				<td>
					<input type="text" name="ten" value="họ tên" onFocus="this.value='';"/>
				</td>
			</tr>
			<tr>
				<td>
					Số Điện Thoại (*) :
				</td>
				<td>
					<input type="text" name="sdt" value="số điện thoại" onFocus="this.value='';"/>
				</td>
			</tr>
			<tr>
				<td>
					Email (*):
				</td>
				<td>
					<input type="email" name="email" value="email" onFocus="this.value='';"/>
				</td>
			</tr>
			<tr>
				<td>
					Địa Chỉ :
				</td>
				<td>
					<input type="text" name="diachi" value="địa chỉ" onFocus="this.value='';"/>
				</td>
			</tr>
			<tr>
				<td>
					Nội Dung Liên Hệ (*):
				</td>
				<td>
					<textarea name="noidung"></textarea>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<input type="submit" name="submit_lienhe" value="Gửi"/>
				</td>
			</tr>
		</table>
	</form>
</div>