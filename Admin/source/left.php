<p>&nbsp;</p>
<div id="left-column">
	<? if($perid==0){?>
    <h3>Creat components</h3>
    <ul class="nav">		
        <li><a href="<?php echo loadPage('view_com'); ?>">Creat</a></li>
        <li><a href="<?php echo loadPage('edit_com'); ?>">Edit</a></li>
    </ul>
    <? }?>
    <h3>General</h3>
    <ul class="nav">
        <li><a href="<?php echo loadPage('report'); ?>">Report (Thống kê)</a></li>
        <li><a href="<?php echo loadPage('seo'); ?>">SEO</a></li>
        <li><a href="<?php echo loadPage('key_main'); ?>">Key main</a></li>
        <li><a href="<?php echo loadPage('setting'); ?>">Setting website</a></li>
        <li><a href="<?php echo loadPage('pages'); ?>">Pages (Nội dung trang đơn)</a></li>
        <li><a href="<?php echo loadPage('support'); ?>">Hổ trợ trực tuyến</a></li>
        <li><a href="<?php echo loadPage('contact'); ?>">Contact (Khách liên hệ)</a></li>
        <li><a href="<?php echo loadPage('account'); ?>">Account Gmail</a></li>
        <!--<li><a href="excel.php">Xuat file excel</a></li>-->
    </ul>
    <h3>Sản phẩm</h3>
    <ul class="nav">		
        <li><a href="<?php echo loadPage('nsx'); ?>">Thương hiệu</a></li>
        <!--<li><a href="<?php echo loadPage('chuyenmuc'); ?>">Chuyên mục riêng</a></li>-->
        <li><a href="<?php echo loadPage('category1'); ?>">Danh mục 1</a></li>
        <li><a href="<?php echo loadPage('category2'); ?>">Danh mục 2</a></li>
        <li><a href="<?php echo loadPage('category3'); ?>">Danh mục 3</a></li>
        <li><a href="<?php echo loadPage('products'); ?>">Danh sách</a></li>
        <li><a href="<?php echo loadPage('tabprice'); ?>">Bảng giá</a></li>
        <li><a href="<?php echo loadPage('img'); ?>">Màu sắc</a></li>
        <li><a href="<?php echo loadPage('promotion'); ?>">Khuyến mãi</a></li>
    </ul>
    <h3>Khách đặt hàng</h3>
    <ul class="nav">			
        <li><a href="<?php echo loadPage('orders'); ?>">Danh sách </a></li>
    </ul>
    <h3>Bài viết</h3>
    <ul class="nav">		
        <li><a href="<?php echo loadPage('category_bv'); ?>">Danh mục</a></li>
        <li><a href="<?php echo loadPage('baiviet'); ?>">Danh sách</a></li>
    </ul>
    <h3>Tin tức</h3>
    <ul class="nav">	
        <li><a href="<?php echo loadPage('news'); ?>">Danh sách</a></li>
    </ul>
    <!--<h3>Chia sẻ - Thảo Luận</h3>
    <ul class="nav">		
        <li><a href="<?php echo loadPage('shopping'); ?>">Danh sách</a></li>
        <li><a href="<?php echo loadPage('binhluan'); ?>">Thảo luận</a></li>
    </ul>-->
    <h3>Mua hàng trên web Nhật</h3>
    <ul class="nav">		
        <li><a href="<?php echo loadPage('combi'); ?>">Danh sách</a></li>
    </ul>
    <!--<h3>Bình chọn</h3>
    <ul class="nav">		
        <li><a href="<?php echo loadPage('poll'); ?>">Danh sách</a></li>
    </ul>-->
    <h3>Banner</h3>
    <ul class="nav">			
        <li><a href="<?php echo loadPage('category_adv'); ?>">Danh mục </a></li>
        <li><a href="<?php echo loadPage('advertise'); ?>">Danh sách </a></li>
    </ul>
    <h3>Thành viên</h3>
    <ul class="nav">			
        <li><a href="<?php echo loadPage('member'); ?>">Thành viên</a></li>
    </ul>
    <h3>Administrator</h3>
    <ul class="nav">
       
        <li><a href="<?php echo loadPage('admin'); ?>">Người dùng</a></li>
        <li><a href="<?php echo loadPage('password'); ?>">Đổi mật khẩu</a></li>
        <li><a href="source/logout.php" class="last">Thoát (Logout)</a></li>
    </ul>
</div>