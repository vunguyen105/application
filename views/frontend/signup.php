<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
                                        <?php if(is_error_flashdata($this->session->flashdata('error'))) {;?>
                                        <div class="alert-error msg">
                                                <span><?php echo $this->session->flashdata('error');?></span>
                                        </div>
                                        <?php }?>
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới</h2>
						<form action="<?php echo base_url()?>home/signup" method="post">
                                                        <input name="CusName" type="text" placeholder="Họ Tên" value="<?php echo set_value('CusName'); ?>"/>
                                                        <input name="CusUser" type="text" placeholder="Tài khoản" value="<?php echo set_value('CusUser'); ?>"/>
                                                        <input name="CusEmail"type="email" placeholder="Email" value="<?php echo set_value('CusEmail'); ?>"/>
                                                        <input name="CusAdd" type="text" placeholder="Địa chỉ" value="<?php echo set_value('CusAdd'); ?>"/>
                                                        <input name="CusPhone" type="text" placeholder="Điện thoại"value="<?php echo set_value('CusPhone'); ?>" />
                                                        <input name="CusPass" type="password" placeholder="Mật khẩu"value="<?php echo set_value('CusPass'); ?>" />
                                                        <input name="CusPassC" type="password" placeholder="Nhập lại mật khẩu"/>
                                                        <button id="logout" type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
                                        <?php echo validation_errors('<div class="alert-error msg"><span>','</span></div>'); ?>
				</div>
			</div>
		</div>
	</section><!--/form-->