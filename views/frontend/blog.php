<section>
		<div class="container">
			<div class="row">
                                <?php if(!empty($news)) {?>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Bài viết</h2>
                                                <?php foreach ($news as $k => $v) {?>
						<div class="single-blog-post">
							<h3><?php echo $v['NewTitle']?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i><?php echo $v['NewDate']?></li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="<?php echo base_url(); ?>public/images/blog/blog-one.jpg" alt="">
							</a>
							<p><?php echo $v['NewContent']?></p>
							<a  class="btn btn-primary" href="">Read More</a>
						</div>
                                                <?php }?>
						<div class="pagination-area">
							<ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
                                <?php }?>
			</div>
		</div>
	</section>