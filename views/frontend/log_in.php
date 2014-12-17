<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
                                        <?php if(is_error_flashdata($this->session->flashdata('error'))) { ;?>
                                        <div class="alert-error msg">
                                                <span><?php echo $this->session->flashdata('error');?></span>
                                        </div>
                                        <?php }?>
                                        <?php if(is_success_flashdata($this->session->flashdata('success'))) { ;?>
                                        <div class="success msg">
                                                <span><?php echo $this->session->flashdata('success');?></span>
                                        </div>
                                        <?php }?>
                                        <div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="<?php echo base_url()?>home/login" method="post">
                                                    <input value="<?php echo set_value('username'); ?>" name="username" type="text" placeholder="Tài khoản" />
                                                    <?php echo form_error('username','<div class="alert-error msg"><span>','</span></div>'); ?>
                                                    <input name="password" type="password" placeholder="Mật khẩu" />
                                                    <?php echo form_error('password','<div class="alert-error msg"><span>','</span></div>'); ?>
                                                    	<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ mật khẩu
							</span>
							<button id='login' type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
                                        <div class="alert-error">
                                        </div>
				</div>
			</div>
		</div>
	</section><!--/form-->