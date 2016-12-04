<?php
if(isset($_POST['submit_dansanphammoi']))
{
	$uploadOk = 0;
	if($_FILES['image']['name']!=NULL)
	{
		$target_dir="images/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//check fake image
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check == false) $uploadOk = 0;
		// Check if file already exists
		$i=0;
		while(file_exists($target_dir . $i . '_' . basename($_FILES["image"]["name"]))) $i++;
		$target_file=$target_dir . $i . '_' . basename($_FILES["image"]["name"]);
		// Check file size
		if ($_FILES["image"]["size"] > 5000000) $uploadOk = 0;
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
			$uploadOk = 0;
		// Check if $uploadOk
		if ($uploadOk == 1) 
		{
		    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
		        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.<br/>";
		    else $uploadOk = 0;
		}
		$sanpham=array();
		$sanpham['image']="/admin/".$target_file;
		$sanpham['title']=$_POST['title'];
		$sanpham['code']=$_POST['code'];
		$sanpham['gia']=$_POST['gia'];
		$sanpham['giagoc']=$_POST['giagoc'];
		$sanpham['dm_sp']=$_POST['dm_sp'];
		$sanpham['kichthuoc']=$_POST['kichthuoc'];
		$sanpham['chatlieu']=$_POST['chatlieu'];
		$sanpham['mausac']=$_POST['mausac'];
		$sanpham['baohanh']=$_POST['baohanh'];
		$sanpham['khohang']=$_POST['khohang'];
		$sanpham['des']=$_POST['des'];
		$sanpham['content']=$_POST['content'];
		if(trankhanhtoan("insert_sanpham",$sanpham)) echo "đã đăng sản phẩm thành công";
		else echo "có lỗi xảy ra";
	}
	else
	{
		echo "có Lỗi xảy ra";
	}
}
?>
<div class="title">Đăng Sản Phẩm Mới</div>
<form action="" method="post" enctype="multipart/form-data">
	<b>Tên Sản Phẩm:</b> <input type="text" name="title"/><br/><br/>
	<b>Mã Sản Phẩm:</b> <input type="text" name="code"/><br/><br/>
	<b>Giá:</b> <input type="number" name="gia"/> VNĐ<br/><br/>
	<b>Giá Gốc</b> (nếu có): <input type="number" name="giagoc" value="0"/> VNĐ<br/><br/>
	<b>Hình Ảnh Sản Phẩm:</b> <input type="file" name="image"/><br/><br/>
	<b>Danh Mục Sản Phẩm:</b>
		<?php  $danhmuc=trankhanhtoan("danh_muc"); ?>
		<select name="dm_sp">
			<?php foreach($danhmuc as $a)
			{
			?>
				<option value="<?php echo $a['id']; ?>"><?php echo $a['title']; ?></option>
			<?php
			} ?>
		</select><br/><br/>
	<b>Kích Thước:</b> <input type="text" name="kichthuoc"/><br/><br/>
	<b>Chất Liệu:</b> <input type="text" name="chatlieu"/><br/><br/>
	<b>Màu Sắc:</b> <input type="text" name="mausac"/><br/><br/>
	<b>Thời Gian Bảo Hành:</b> <input type="text" name="baohanh"/><br/><br/>
	<b>Kho Hàng</b> (1:còn hàng,0:hết hàng): <input type="number" min="0" max="1" name="khohang" value="1"/><br/><br/>
	<b>Mô Tả Ngắn Về Sản Phẩm:</b><textarea name="des"></textarea><br/><br/>
	<b>Thông Tin Chi Tiết Sản Phẩm:</b><textarea class="ckeditor" name="content"></textarea><br/><br/>
	<input type="submit" name="submit_dansanphammoi" value="Đăng Sản Phẩm"/>
</form>