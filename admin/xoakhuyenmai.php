<?php
require("../config.php");
if(isset($_GET['sp_code']))
{
	if(trankhanhtoan("xoa_khuyen_mai_2",$_GET['code'],$_GET['sp_code'])) header("location:./?frame=dskhuyenmai");
	else echo "có lỗi xảy ra";
}
else
{
	if(trankhanhtoan("xoa_khuyen_mai_1",$_GET['code'])) header("location:./?frame=dskhuyenmai");
	else echo "có lỗi xảy ra";
}
?>