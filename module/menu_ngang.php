<div id="menu_ngang">
	<ul>
		<li><a href="<?php echo $homeurl; ?>">Trang Chủ</a></li>
		<li><a href="<?php echo $homeurl; ?>/gioi-thieu.html">Giới Thiệu</a></li>
		<li><a href="#">Sản Phẩm</a>
			<ul class="sub_menu_ngang">
				<li><a href="<?php echo $homeurl; ?>/category-1-dong-ho-go.html">Đồng Hồ Gỗ</a></li>
				<li><a href="<?php echo $homeurl; ?>/category-2-dong-ho-cay.html">Đồng Hồ Cây</a></li>
				<li><a href="<?php echo $homeurl; ?>/category-3-tuong-go.html">Tượng Gỗ</a></li>
			</ul>
		</li>
		<li><a href="<?php echo $homeurl; ?>/huong-dan.html">Hướng Dẫn</a></li>
		<li><a href="#">Chính Sách</a>
			<ul class="sub_menu_ngang">
				<li><a href="<?php echo $homeurl; ?>/chinh-sach-bao-hanh.html">Chính Sách Bảo Hành</a></li>
				<li><a href="<?php echo $homeurl; ?>/chinh-sach-doi-tra-hang.html">Chính Sách Đổi - Trả Hàng</a></li>
			</ul>
		</li>
		<li><a href="<?php echo $homeurl; ?>/lien-he.html">Liên Hệ</a></li>
		<?php if(isset($_SESSION['cart'])): ?>
			<li><a href="<?php echo $homeurl; ?>/gio-hang.php">Giỏ Hàng(<?php echo count($_SESSION['cart']); ?>)</a></li>
		<?php endif; ?>
	</ul>
</div>