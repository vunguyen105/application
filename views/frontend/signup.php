<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
                                        <?php if(is_error_flashdata($this->session->flashdata('error'))) {;?>
                                        <div class="alert-error msg">
                                                <span><?php echo $this->session->flashdata('error');?></span>
                                        </div>
                                        <?php }?>
                                        <?php echo validation_errors('<div class="alert-error msg"><span>','</span></div>'); ?>
                                        
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới</h2>
						<form action="#">
							<input type="text" placeholder="Tài khoản"/>
							<input type="email" placeholder="Email"/>
							<input type="password" placeholder="Mật khẩu"/>
                                                        <button id="logout" type="button" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->