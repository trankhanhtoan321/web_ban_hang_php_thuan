<?php include "head.php"; ?>
<?php 
	if(empty($_REQUEST['frame']))
	{
		if($device->isMobile())  include "./module/home-mobile.php";
		else include "./module/home.php";
	}
	else
	{
?>
<div class="content-body">
<table style="width:100%">
	<tr>
		<td style="vertical-align:top;width:75%">
			<?php include "./module/processframe.php"; ?>
		</td>
		<?php if($device->isMobile()) echo "</tr><tr>" ?>
		<td style="vertical-align:top;width:25%">
			<?php include "./module/sidebar.php"; ?>
		</td>
	</tr>
</table>
</div>
<?php } ?>
<?php include "foot.php"; ?>