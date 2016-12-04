<?php 
switch ($_REQUEST['frame']){
case "danhmuc": include "./module/danhmuc.php";break;
case "sanpham": include "./module/sanpham.php";break;
case "gioithieu": include "./module/gioithieu.php";break;
case "chinhsachdoitrahang": include "./module/chinhsachdoitrahang.php";break;
case "chinhsachbaohanh": include "./module/chinhsachbaohanh.php";break;
case "lienhe": include "./module/lienhe.php";break;
case "giohang": include "./module/giohang.php";break;
case "huongdan": include "./module/huongdan.php";break;
}
?>