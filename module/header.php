<div class="header">
	<table width="100%">
		<tr>
			<td width="200px">
				<a href="<?php echo $homeurl; ?>">
					<img style="width:200px;height:200px;" src="/uploads/css/logo2.png"/>
				</a>
			</td>
			<td width="500px">
				<tieude>Nội Thất Bốn Phương</tieude><br/>
				<font style="font-size:20px;color:red;">Giao Hàng Tận Nơi - Cam Kết Chất Lượng</font><br/>
				chuyên đồng hồ treo tường gỗ, đồng hồ cây, tượng gỗ<br/>
				Showroom: 529 Nguyễn Oanh, P.17, Q. Gò Vấp, TP.HCM <br/>(Gần Cầu An Lộc)<br/>
				Xưởng SX: KP3, Biên Hòa, Đồng Nai<br/>

			</td>
			<td  style="text-align:center">
				<img style="width:350px" src="/uploads/css/hotline.png"/><br/>
				<a target="_blank" href=""><img style="width:30px;height:30px" src="/uploads/css/facebook.png"/></a>
				<a target="_blank" href=""><img style="width:30px;height:30px" src="/uploads/css/google.png"/></a>
				<a target="_blank" href=""><img style="width:30px;height:30px" src="/uploads/css/youtube.png"/></a>
				<br/><br/>
				<form action="timkiem.php" method="get">
					<input type="text" value="tìm kiếm sản phẩm" onFocus="this.value='';" name="q"/>
					<input type="submit" value="Tìm Kiếm"/>
				</form>
			</td>
		</tr>
	</table>
</div>
<?php include "./module/menu_ngang.php"; ?>
<?php if(file_exists("./uploads/images/banner/khuyenmai.jpg")): ?>
	<div style="text-align:center"><img id="banner_khuyenmai" src="/uploads/images/banner/khuyenmai.jpg"/></div>
	<script>
	var x=document.getElementById("banner_khuyenmai");
	x.style.width=(screen.width-17)+"p"+"x";
	x.style.height=((screen.width-17)/9)+"p"+"x";
	</script>
<?php endif; ?>