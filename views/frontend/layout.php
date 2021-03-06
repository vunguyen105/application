<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ</title>
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>public/css/responsive.css" rel="stylesheet">
           
    <link rel="shortcut icon" href="i<?php echo base_url(); ?>public/mages/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>public/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>public/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>public/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>public/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
    <style type="text/css">
        .alert-error{
            color: red;
            margin: 4px;
        }
        .success{
            color: blue;
            margin: 4px;
        }
    </style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +84 1674650860</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> vunguyen105@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href=""><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php if(is_login_front()) {?>
                                                                <li><a href=""><i class="fa fa-user"></i><?php echo $this->session->userdata('CusName');?></a></li>
                                                                <?php }?>
								<li><a href="<?php echo base_url(); ?>home/checkout"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
								<li><a href="<?php echo base_url(); ?>home/cart"><i class="fa fa-shopping-cart"></i>[<?php echo $this->cart->total_items();?>] Giỏ hàng</a></li>
								<?php if(!is_login_front()) {?>
                                                                <li><a href="<?php echo base_url(); ?>home/login" class=""><i class="fa fa-lock"></i> Đăng Nhập</a></li>
                                                                <?php }
                                                                else {?>
                                                                 <li><a href="<?php echo base_url(); ?>home/logout" class=""><i class="fa fa-lock"></i> Đăng Xuất</a></li>    
                                                                <?php }?>
                                                        </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url(); ?>home/">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?php echo base_url(); ?>home/product">Sản phẩm</a></li> 
                                        <li><a href="<?php echo base_url(); ?>home/checkout">Checkout</a></li> 
                                        <li><a href="<?php echo base_url(); ?>home/cart">Cart</a></li> 
                                    </ul>
                                </li>
                                                <li><a href="<?php echo base_url(); ?>home/blog">Tin Tức</a></li>
								<li><a href="<?php echo base_url(); ?>home/contact">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
        <?php if(!empty($slider)) echo $slider;?>
        <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php if(!empty($left)) echo $left;?>
				</div>
				
			<?php if(!empty($content)) echo $content;?>	
			</div>
		</div>
	</section>

	
	
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo base_url(); ?>public/images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo base_url(); ?>public/images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo base_url(); ?>public/images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo base_url(); ?>public/images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="<?php echo base_url(); ?>public/images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
       
	<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/price-range.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url(); ?>public/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
    <link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
    <script>
        jQuery(document).on('click', '.add-to-cart', function() {
            var that = $(this);
            BootstrapDialog.confirm('Thông báo', 'Bạn muốn thêm sản phẩm này vào giỏ hàng', function(result) {
            if (result) {
            	var proname = that.attr("data-name");
                var proid = that.attr("data-id");
                var proprice = that.attr("data-price");
                var propic = that.attr("data-pic");
                $.ajax({
                    type: "POST",
                    data: {
                        proid:proid,
                    	proname: proname,
                        proprice: proprice,
                        propic: propic,
                        quantity: 1,
                    },
                    dataType: 'json',
                    url: '<?php echo base_url()?>home/shopping',
                    beforeSend: function() {
                    },
                    success: function(data) { 
                        
                        BootstrapDialog.show({
                            title: 'Thông báo',
                            message: data.msg,
                            buttons: [{
                                    label: 'OK',
                                    cssClass: 'btn green',
                                    hotkey: 13, // Enter.
                                    action: function() {
                                        BootstrapDialog.closeAll();
                                    }
                                }]
                        });
                    }
                });
            }
        });
        return false;
    	});
    </script>  
</body>
</html>