<?php
require("../config.php");
if(trankhanhtoan("xoa_san_pham",$_GET['id'])) header("location:./?frame=danhsachsanpham");
else echo "có lỗi xảy ra";
?>