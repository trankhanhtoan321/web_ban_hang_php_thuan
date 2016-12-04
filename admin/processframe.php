<?php
if(!isset($_GET['frame'])) include "home.php";
else
{
	switch($_GET['frame'])
	{
		case "dangsanphammoi": include "dang_san_pham_moi.php";break;
		case "edit_gioithieu": include "edit_gioithieu.php";break;
		case "edit_huongdan": include "edit_huongdan.php";break;
		case "edit_baohanh": include "edit_baohanh.php";break;
		case "edit_doitra": include "edit_doitra.php";break;
		case "khuyenmai": include "khuyenmai.php";break;
		case "dskhuyenmai": include "dskhuyenmai.php";break;
		case "donhang": include "donhang.php";break;
		case "donhangmoi": include "donhangmoi.php";break;
		case "chitietdonhang": include "chitietdonhang.php";break;
		case "hoanthanh": include "hoanthanh.php";break;
		case "danhsachsanpham": include "danhsachsanpham.php";break;
		case "des_dhg": include "des_dhg.php";break;
		case "des_dhc": include "des_dhc.php";break;
		case "des_tg": include "des_tg.php";break;
		case "lienhe": include "lienhe.php";break;
	}
}
?>