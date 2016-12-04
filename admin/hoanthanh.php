<?php
if(trankhanhtoan("hoan_thanh_hoa_don",$_GET['hd_id']))
	header("location:./");
else echo "có lỗi xảy ra";
?>