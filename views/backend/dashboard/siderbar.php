<div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->        
    <ul class="page-sidebar-menu">
        <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!-- 					<form class="sidebar-search"> -->
            <!-- 						<div class="input-box"> -->
            <!-- 							<a href="javascript:;" class="remove"></a> -->
            <!-- 							<input type="text" placeholder="Search..." /> -->
            <!-- 							<input type="button" class="submit" value=" " /> -->
            <!-- 						</div> -->
            <!-- 					</form> -->
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="start active">
            <a href="<?php echo base_url() ?>admin">
                <i class="icon-home"></i> 
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class=" ">
            <a href="<?php echo base_url() ?>product/view">
                <i class="icon-briefcase"></i> 
                <span class="title">Sản phẩm</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="<?php echo base_url() ?>product/view">
                        Danh sách sản phẩm</a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>product/product_create">
                        Thêm sản phẩm</a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>size/view">
                        Kích thước</a>
                </li>
                <li > 
                    <a href="<?php echo base_url() ?>size/create"> 
                        Thêm kích thước</a> 
                </li> 
            </ul> 
        </li>
        <li >
            <a href="<?php echo base_url() ?>category/view">
                <i class="icon-folder"></i> 
                <span class="title">Thư mục</span>

            </a>
        </li>
        <li >
            <a href="<?php echo base_url() ?>menu/view">
                <i class="icon-folder-open"></i> 
                <span class="title">Menu</span>

            </a>
        </li>
        <li class=" ">
            <a href="<?php echo base_url() ?>product/view">
                <i class="icon-briefcase"></i> 
                <span class="title">Thành viên</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="<?php echo base_url() ?>news/news_create">
                        Danh sách thành viên</a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>news/view">
                        Thêm thành viên</a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>news/view">
                        Thông tin phản hồi</a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>news/view">
                        Đánh giá sản phẩm</a>
                </li>
            </ul> 
        </li>
        <li class=" ">
            <a href="<?php echo base_url() ?>product/view">
                <i class="icon-user"></i> 
                <span class="title">Bài viết</span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="<?php echo base_url() ?>news/news_create">
                        Tạo mới</a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>news/view">
                        Danh sách</a>
                </li>

            </ul> 
        </li>
<!--        <li >
            <a href="javascript:;">
                <i class="icon-briefcase"></i> 
                <span class="title">Hóa đơn</span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li > 
                    <a href="<?php echo base_url() ?>customer/create"> 
                        Danh sách hóa đơn</a> 
                </li> 
                <li >
                    <a href="<?php echo base_url() ?>customer/view">
                        Hóa đơn chờ xử lý </a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>customer/view">
                        Hóa đơn đang xử lý </a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>customer/view">
                        Hóa đơn đã xử lý </a>
                </li>
                <li >
                    <a href="<?php echo base_url() ?>customer/view">
                        Phương thức thanh toán </a>
                </li>

            </ul>
        </li>-->
        <li >
            <a href="javascript:;">
                <i class="icon-user"></i> 
                <span class="title">Báo cáo thống kê</span>
                <span class="arrow open "></span>
            </a>
            <ul class="sub-menu">
                <li >
                    <a href="<?php echo base_url() ?>size/view">
                        Lượng người truy cập</a>
                </li>
                

            </ul>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
<script>
    $('ul.sub-menu').css("display","block");
</script>    