<?php
function rewrite($s)
{
	$a=array("á","à","ả","ã","ạ","Á","À","Ả","Ã","Ạ",
			 "ắ","ằ","ẳ","ẵ","ặ","Ắ","Ằ","Ẳ","Ẵ","Ặ","ă","Ă",
			 "ấ","ầ","ẩ","ẫ","ậ","Ấ","Ầ","Ẩ","Ẫ","Ậ","â","Â",
			 "đ","Đ","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
			 "é","è","ẻ","ẽ","ẹ","É","È","Ẻ","Ẽ","Ẹ",
			 "ế","ề","ể","ễ","ệ","Ế","Ề","Ể","Ễ","Ệ","ê","Ê",
			 "í","ì","ỉ","ĩ","ị","Í","Ì","Ỉ","Ĩ","Ị",
			 "ó","ò","ỏ","õ","ọ","Ó","Ò","Ỏ","Õ","Ọ",
			 "ố","ồ","ổ","ỗ","ộ","Ố","Ồ","Ổ","Ỗ","Ộ","ô","Ô",
			 "ớ","ờ","ở","ỡ","ợ","Ớ","Ờ","Ở","Ỡ","Ợ","ơ","Ơ",
			 "ú","ù","ủ","ũ","ụ","Ú","Ù","Ủ","Ũ","Ụ",
			 "ứ","ừ","ử","ữ","ự","Ứ","Ừ","Ử","Ữ","Ự","ư","Ư",
			 "ý","ỳ","ỷ","ỹ","ỵ","Ý","Ỳ","Ỷ","Ỹ","Ỵ",",","+","[","]","-",":","/",
			 "*","(",")","?","\"");

	$b=array("a","a","a","a","a","a","a","a","a","a",
		     "a","a","a","a","a","a","a","a","a","a","a","a",
		     "a","a","a","a","a","a","a","a","a","a","a","a",
		     "d","d","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
		     "e","e","e","e","e","e","e","e","e","e",
		     "e","e","e","e","e","e","e","e","e","e","e","e",
		     "i","i","i","i","i","i","i","i","i","i",
		     "o","o","o","o","o","o","o","o","o","o",
		     "o","o","o","o","o","o","o","o","o","o","o","o",
		     "o","o","o","o","o","o","o","o","o","o","o","o",
		     "u","u","u","u","u","u","u","u","u","u",
		     "u","u","u","u","u","u","u","u","u","u","u","u",
		     "y","y","y","y","y","y","y","y","y","y","","","","","","","",
		     "","","","","");

	$s=str_replace($a,$b,$s);
	$s=str_replace(" ","-",$s);
	return $s;
}
function get_url() 
{
	$pageURL = "http://";
	if($_SERVER['SERVER_PORT']==80) $pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	else $pageURL .= $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	return $pageURL;
}
function trankhanhtoan($key, $key2 = 0, $limit = 0)
{
	global $conn;
	switch($key)
	{
		case "danh_muc":
			$a=array();
			$sql="SELECT * FROM danhmuc";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['id']=$row['dm_id'];
					$b['title']=$row['dm_title'];
					$b['image']=$row['dm_image'];
					$b['des']=$row['dm_des'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		/////////////////////////////////////////////
		case "san_pham_moi":
			$a=array();
			if($limit==0) $sql="SELECT * FROM sanpham ORDER BY id DESC";
			else $sql="SELECT * FROM sanpham ORDER BY id DESC LIMIT $limit";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['id']=$row['id'];
					$b['title']=$row['title'];
					$b['gia']=$row['gia'];
					$b['giagoc']=$row['giagoc'];
					$b['image']=$row['image'];
					$b['code']=$row['code'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		////////////////////////////////////////////
		case "san_pham_xem_nhieu":
			$a=array();
			if($limit==0) $sql="SELECT * FROM sanpham ORDER BY luotxem DESC";
			else $sql="SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT $limit";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['id']=$row['id'];
					$b['title']=$row['title'];
					$b['gia']=$row['gia'];
					$b['image']=$row['image'];
					$b['giagoc']=$row['giagoc'];
					$b['code']=$row['code'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		////////////////////////////////////////////
		case "san_pham_danh_muc":
			$a=array();
			$sql="SELECT * FROM sanpham LEFT JOIN danhmuc ON sanpham.dm_sp=danhmuc.dm_id WHERE dm_sp=$key2 ORDER BY id DESC";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['id']=$row['id'];
					$b['code']=$row['code'];
					$b['title']=$row['title'];
					$b['gia']=$row['gia'];
					$b['giagoc']=$row['giagoc'];
					$b['image']=$row['image'];
					$b['dm_title']=$row['dm_title'];
					$b['code']=$row['code'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		////////////////////////////////////////////
		case "san_pham":
			$b=array();
			$sql="SELECT * FROM sanpham WHERE id=$key2";
			if($result=mysqli_query($conn,$sql))
			{
				$row=mysqli_fetch_assoc($result);
				$b['id']=$row['id'];
				$b['title']=$row['title'];
				$b['des']=$row['des'];
				$b['content']=$row['content'];
				$b['gia']=$row['gia'];
				$b['image']=$row['image'];
				$b['code']=$row['code'];
				$b['dm_sp']=$row['dm_sp'];
				$b['luotxem']=$row['luotxem'];
				$b['kichthuoc']=$row['kichthuoc'];
				$b['chatlieu']=$row['chatlieu'];
				$b['mausac']=$row['mausac'];
				$b['baohanh']=$row['baohanh'];
				$b['giagoc']=$row['giagoc'];
				$b['khohang']=$row['khohang'];
			}
			return $b;
			break;
		////////////////////////////////////////////
		case "id_hoa_don_moi_nhat":
			$sql="SELECT hd_id FROM hoadon ORDER BY hd_id DESC LIMIT 1";
			if($result=mysqli_query($conn,$sql))
			{
				$row=mysqli_fetch_assoc($result);
				return $row['hd_id'];
			}
			return 0;
			break;
		////////////////////////////////////////////
		case "insert_hoa_don":
			$ten=$key2['ten'];
			$sdt=$key2['sdt'];
			$email=$key2['email'];
			$diachi=$key2['diachi'];
			$hd_date=$key2['hd_date'];
			$trigia=$key2['trigia'];
			$khuyenmai=$key2['khuyenmai'];
			$makhuyenmai=$key2['makhuyenmai'];
			$sql="INSERT INTO hoadon(ten,sdt,email,diachi,hd_date,trigia,khuyenmai,makhuyenmai) VALUES('$ten','$sdt','$email','$diachi',$hd_date,$trigia,$khuyenmai,'$makhuyenmai')";
			if(mysqli_query($conn,$sql))
				return 1;
			return 0;
			break;
		/////////////////////////////////////////////
		case "insert_cthd":
			$hd_id=$key2['hd_id'];
			$sp_id=$key2['sp_id'];
			$soluong=$key2['soluong'];
			$sql="INSERT INTO cthd(hd_id,sp_id,soluong) VALUES($hd_id,$sp_id,$soluong)";
			if(mysqli_query($conn,$sql))
				return 1;
			return 0;
			break;
		//////////////////////////////////////////////
		case "insert_lienhe":
			$ten=$key2['ten'];
			$sdt=$key2['sdt'];
			$email=$key2['email'];
			$diachi=$key2['diachi'];
			$noidung=$key2['noidung'];
			$thoigian=$key2['thoigian'];
			$sql="INSERT INTO lienhe(ten,sdt,email,diachi,noidung,thoigian) VALUES('$ten','$sdt','$email','$diachi','$noidung',$thoigian)";
			if(mysqli_query($conn,$sql))
				return 1;
			return 0;
			break;
		//////////////////////////////////////////////
		case "insert_sanpham":
			$image=$key2['image'];
			$title=$key2['title'];
			$code=$key2['code'];
			$gia=$key2['gia'];
			$giagoc=$key2['giagoc'];
			$dm_sp=$key2['dm_sp'];
			$kichthuoc=$key2['kichthuoc'];
			$chatlieu=$key2['chatlieu'];
			$mausac=$key2['mausac'];
			$baohanh=$key2['baohanh'];
			$khohang=$key2['khohang'];
			$des=$key2['des'];
			$content=$key2['content'];
			$sql="INSERT INTO sanpham(image,title,code,gia,giagoc,dm_sp,kichthuoc,chatlieu,mausac,baohanh,khohang,des,content) VALUES('$image','$title','$code',$gia,$giagoc,$dm_sp,'$kichthuoc','$chatlieu','$mausac','$baohanh','$khohang','$des','$content')";
			if(mysqli_query($conn,$sql))
				return 1;
			return 0;
			break;
		////////////////////////////////////////////////
		case "gioithieu":
			$sql="SELECT gioithieu FROM options";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
			return $row['gioithieu'];
			break;
		/////////////////////////////////////////////////
		case "update_gioithieu":
			$sql="UPDATE options SET gioithieu='$key2'";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		/////////////////////////////////////////////////
		case "baohanh":
			$sql="SELECT baohanh FROM options";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
			return $row['baohanh'];
			break;
		/////////////////////////////////////////////////
		case "update_baohanh":
			$sql="UPDATE options SET baohanh='$key2'";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		/////////////////////////////////////////////////
		case "huongdan":
			$sql="SELECT huongdan FROM options";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
			return $row['huongdan'];
			break;
		/////////////////////////////////////////////////
		case "update_huongdan":
			$sql="UPDATE options SET huongdan='$key2'";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		/////////////////////////////////////////////////
		case "doitra":
			$sql="SELECT doitra FROM options";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
			return $row['doitra'];
			break;
		/////////////////////////////////////////////////
		case "update_doitra":
			$sql="UPDATE options SET doitra='$key2'";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		/////////////////////////////////////////////////
		case "san_pham_tim_kiem":
			$a=array();
			if($limit==0)
			{
				//1 tim theo code
				$sql="SELECT * FROM sanpham WHERE code='$key2'";
				if($result=mysqli_query($conn,$sql))
				{
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
							$b=array();
							$b['id']=$row['id'];
							$b['title']=$row['title'];
							$b['gia']=$row['gia'];
							$b['giagoc']=$row['giagoc'];
							$b['image']=$row['image'];
							$a[]=$b;
						}

					}
					//khong co theo code => tim theo title
					else
					{
						$sql="SELECT * FROM sanpham WHERE title LIKE '%$key2%";
						if($result=mysqli_query($conn,$sql))
						{
							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									$b=array();
									$b['id']=$row['id'];
									$b['title']=$row['title'];
									$b['gia']=$row['gia'];
									$b['giagoc']=$row['giagoc'];
									$b['image']=$row['image'];
									$a[]=$b;
								}

							}
						}
					}
				}
			}
			//co thiet lap limit
			else
			{
				//1 tim theo code
				$sql="SELECT * FROM sanpham WHERE code='$key2' LIMIT $limit";
				if($result=mysqli_query($conn,$sql))
				{
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
							$b=array();
							$b['id']=$row['id'];
							$b['title']=$row['title'];
							$b['gia']=$row['gia'];
							$b['giagoc']=$row['giagoc'];
							$b['image']=$row['image'];
							$a[]=$b;
						}

					}
					//khong co theo code => tim theo title
					else
					{
						$sql="SELECT * FROM sanpham WHERE title LIKE '%$key2%'  LIMIT $limit";
						if($result=mysqli_query($conn,$sql))
						{
							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									$b=array();
									$b['id']=$row['id'];
									$b['title']=$row['title'];
									$b['gia']=$row['gia'];
									$b['giagoc']=$row['giagoc'];
									$b['image']=$row['image'];
									$a[]=$b;
								}

							}
						}
					}
				}
			}
			return $a;
			break;
		/////////////////////////////////////////////////
		case "code_tat_ca_san_pham":
			$a=array();
			$sql="SELECT * FROM sanpham";
			if($result=mysqli_query($conn,$sql))
				while($row=mysqli_fetch_assoc($result))
					$a[]=$row['code'];
			return $a;
			break;
		//////////////////////////////////////////////////////
		case "insert_khuyen_mai":
			$code=$key2['code'];
			$giatri=$key2['giatri'];
			$loai=$key2['loai'];
			$ngay_bd=$key2['ngay_bd'];
			$ngay_kt=$key2['ngay_kt'];
			$apdung=$key2['apdung'];
			$sp_code=$limit;
			$sql="INSERT INTO khuyenmai(code,giatri,loai,ngay_bd,ngay_kt,apdung,sp_code) VALUES('$code','$giatri','$loai','$ngay_bd','$ngay_kt','$apdung','$sp_code')";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		/////////////////////////////////////////////////////////
		case "code_san_pham":
			$sql="SELECT code FROM sanpham WHERE id='$key2'";
			if($result=mysqli_query($conn,$sql))
			{
				$row=mysqli_fetch_assoc($result);
				return $row['code'];
			}
			return NULL;
		///////////////////////////////////////////////////////////
		case "check_makhuyenmai":
			$ngay=date("Y-m-d",time());
			$km=array();
			$km['ok']=0;
			$sql="SELECT * FROM khuyenmai WHERE code='$key2' AND sp_code='$limit' AND (ngay_bd<'$ngay' OR ngay_bd='$ngay') AND (ngay_kt>'$ngay' OR ngay_kt='$ngay')";
			if($result=mysqli_query($conn,$sql))
			{
				if(mysqli_num_rows($result)>0)
				{
					$row=mysqli_fetch_assoc($result);
					$km['giatri']=$row['giatri'];
					$km['loai']=$row['loai'];
					$km['ok']=1;
					return $km;
				}
				return $km;
			}
			return NULL;
		///////////////////////////////////////////////////////////
		case "hoa_don":
			$sql="SELECT * FROM hoadon WHERE hoanthanh=1 ORDER BY hd_id DESC";
			$a=array();
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['hd_id']=$row['hd_id'];
					$b['hd_date']=$row['hd_date'];
					$b['ten']=$row['ten'];
					$b['diachi']=$row['diachi'];
					$b['sdt']=$row['sdt'];
					$b['trigia']=$row['trigia'];
					$b['email']=$row['email'];
					$b['khuyenmai']=$row['khuyenmai'];
					$b['makhuyenmai']=$row['makhuyenmai'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		///////////////////////////////////////////////////////////////
		case "chi_tiet_hoa_don":
			$sql="SELECT * FROM cthd WHERE hd_id=$key2";
			$a=array();
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['hd_id']=$row['hd_id'];
					$b['sp_id']=$row['sp_id'];
					$b['soluong']=$row['soluong'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		////////////////////////////////////////////////////////////////
		case "thong_tin_hoa_don":
			$b=array();
			$sql="SELECT * FROM hoadon WHERE hd_id=$key2";
			if($result=mysqli_query($conn,$sql))
			{
				$row=mysqli_fetch_assoc($result);
				$b['hd_id']=$row['hd_id'];
				$b['hd_date']=$row['hd_date'];
				$b['ten']=$row['ten'];
				$b['diachi']=$row['diachi'];
				$b['sdt']=$row['sdt'];
				$b['trigia']=$row['trigia'];
				$b['email']=$row['email'];
				$b['khuyenmai']=$row['khuyenmai'];
				$b['makhuyenmai']=$row['makhuyenmai'];
			}
			return $b;
			break;
		/////////////////////////////////////////////////////////
		case "hoa_don_moi":
			$sql="SELECT * FROM hoadon WHERE hoanthanh=0 ORDER BY hd_id DESC";
			$a=array();
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['hd_id']=$row['hd_id'];
					$b['hd_date']=$row['hd_date'];
					$b['ten']=$row['ten'];
					$b['diachi']=$row['diachi'];
					$b['sdt']=$row['sdt'];
					$b['trigia']=$row['trigia'];
					$b['email']=$row['email'];
					$b['khuyenmai']=$row['khuyenmai'];
					$b['makhuyenmai']=$row['makhuyenmai'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		///////////////////////////////////////////////////////////////
		case "hoan_thanh_hoa_don":
			$sql="UPDATE hoadon SET hoanthanh=1 WHERE hd_id=$key2";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		//////////////////////////////////////////////////////////////////
		case "tat_ca_san_pham":
			$a=array();
			$sql="SELECT * FROM sanpham ORDER BY id DESC";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['id']=$row['id'];
					$b['title']=$row['title'];
					$b['des']=$row['des'];
					$b['content']=$row['content'];
					$b['gia']=$row['gia'];
					$b['image']=$row['image'];
					$b['code']=$row['code'];
					$b['dm_sp']=$row['dm_sp'];
					$b['luotxem']=$row['luotxem'];
					$b['kichthuoc']=$row['kichthuoc'];
					$b['chatlieu']=$row['chatlieu'];
					$b['mausac']=$row['mausac'];
					$b['baohanh']=$row['baohanh'];
					$b['giagoc']=$row['giagoc'];
					$b['khohang']=$row['khohang'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		////////////////////////////////////////////
		case "xoa_san_pham":
			$sql="DELETE FROM sanpham WHERE id=$key2";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		////////////////////////////////////////////////
		case "khuyen_mai_ad1":
			$a=array();
			$sql="SELECT DISTINCT code,ngay_bd,ngay_kt,giatri,loai FROM khuyenmai WHERE apdung=1 ORDER BY id DESC";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['code']=$row['code'];
					$b['ngay_bd']=$row['ngay_bd'];
					$b['ngay_kt']=$row['ngay_kt'];
					$b['giatri']=$row['giatri'].($row['loai']==1?"%":"VNĐ");
					$a[]=$b;
				}
			}
			return $a;
			break;
		////////////////////////////////////////////////
		case "khuyen_mai_ad2":
			$a=array();
			$sql="SELECT DISTINCT code,ngay_bd,ngay_kt,giatri,loai FROM khuyenmai WHERE apdung=2 ORDER BY id DESC";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['code']=$row['code'];
					$b['ngay_bd']=$row['ngay_bd'];
					$b['ngay_kt']=$row['ngay_kt'];
					$b['giatri']=$row['giatri'].($row['loai']==1?"%":"VNĐ");
					$a[]=$b;
				}
			}
			return $a;
			break;
		///////////////////////////////////////////////////
		case "khuyen_mai_ad3":
			$a=array();
			$sql="SELECT DISTINCT code,ngay_bd,ngay_kt,giatri,loai FROM khuyenmai WHERE apdung=3 ORDER BY id DESC";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['code']=$row['code'];
					$b['ngay_bd']=$row['ngay_bd'];
					$b['ngay_kt']=$row['ngay_kt'];
					$b['giatri']=$row['giatri'].($row['loai']==1?"%":"VNĐ");
					$a[]=$b;
				}
			}
			return $a;
			break;
		///////////////////////////////////////////////////
		case "khuyen_mai_ad4":
			$a=array();
			$sql="SELECT DISTINCT code,ngay_bd,ngay_kt,giatri,loai FROM khuyenmai WHERE apdung=4 ORDER BY id DESC";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['code']=$row['code'];
					$b['ngay_bd']=$row['ngay_bd'];
					$b['ngay_kt']=$row['ngay_kt'];
					$b['giatri']=$row['giatri'].($row['loai']==1?"%":"VNĐ");
					$a[]=$b;
				}
			}
			return $a;
			break;
		///////////////////////////////////////////////////
		case "khuyen_mai_ad5":
			$a=array();
			$sql="SELECT DISTINCT code,ngay_bd,ngay_kt,giatri,loai,sp_code FROM khuyenmai WHERE apdung=5 ORDER BY id DESC";
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['code']=$row['code'];
					$b['ngay_bd']=$row['ngay_bd'];
					$b['ngay_kt']=$row['ngay_kt'];
					$b['giatri']=$row['giatri'].($row['loai']==1?"%":"VNĐ");
					$b['sp_code']=$row['sp_code'];
					$a[]=$b;
				}
			}
			return $a;
			break;
		///////////////////////////////////////////////////
		case "xoa_khuyen_mai_1":
			$sql="DELETE FROM khuyenmai WHERE code='$key2'";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		////////////////////////////////////////////////
		case "xoa_khuyen_mai_2":
			$sql="DELETE FROM khuyenmai WHERE code='$key2' AND sp_code='$limit'";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		////////////////////////////////////////////////
		case "update_des_dhg":
			$sql="UPDATE danhmuc SET dm_des='$key2' WHERE dm_id=1";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		////////////////////////////////////////////////
		case "update_des_dhc":
			$sql="UPDATE danhmuc SET dm_des='$key2' WHERE dm_id=2";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		////////////////////////////////////////////////
		case "update_des_tg":
			$sql="UPDATE danhmuc SET dm_des='$key2' WHERE dm_id=3";
			if(mysqli_query($conn,$sql)) return 1;
			return 0;
			break;
		////////////////////////////////////////////////
		case "get_des_dhg":
			$sql="SELECT dm_des FROM danhmuc WHERE dm_id=1";
			if($result=mysqli_query($conn,$sql))
			{
				$row=mysqli_fetch_assoc($result);
				return $row['dm_des'];
			}
			return 0;
			break;
		////////////////////////////////////////////////
		case "get_des_dhc":
			$sql="SELECT dm_des FROM danhmuc WHERE dm_id=2";
			if($result=mysqli_query($conn,$sql))
			{
				$row=mysqli_fetch_assoc($result);
				return $row['dm_des'];
			}
			return 0;
			break;
		////////////////////////////////////////////////
		case "get_des_tg":
			$sql="SELECT dm_des FROM danhmuc WHERE dm_id=3";
			if($result=mysqli_query($conn,$sql))
			{
				$row=mysqli_fetch_assoc($result);
				return $row['dm_des'];
			}
			return 0;
			break;
		////////////////////////////////////////////////
		case "ds_lien_he":
			$sql="SELECT * FROM lienhe ORDER BY id DESC";
			$a=array();
			if($result=mysqli_query($conn,$sql))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$b=array();
					$b['ten']=$row['ten'];
					$b['sdt']=$row['sdt'];
					$b['email']=$row['email'];
					$b['diachi']=$row['diachi'];
					$b['thoigian']=date("H:i d-m-Y",$row['thoigian']);
					$b['noidung']=$row['noidung'];
					$a[]=$b;
				}
				return $a;
			}
			return 0;
			break;
		////////////////////////////////////////////////
	}
	return NULL;
}
function str_to_array($s,$x)
{
	$i=0;
	$n=strlen($s);
	$z=array();
	while($i<$n)
	{
		$a='';
		while($i<$n)
		{
			if($s[$i]==$x) break;
			$a.=$s[$i];
			$i++;
		}
		$z[]=$a;
		$i++;
	}
	return $z;
}
?>