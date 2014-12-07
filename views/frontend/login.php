<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="alert-error msg">
                                            
                                        </div>
                                        <div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="#">
							<input name="username" type="text" placeholder="Tài khoản" />
							<input name="password" type="password" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ mật khẩu
							</span>
							<button id='login' type="button" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
                                        <div class="alert-error">
                                        </div>
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
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
        
<script>
    
    
jQuery(document).on('click', '.login-form button#login', function() { 
    var username = $("input[name='username']").val();
    var password = $("input[name='password']").val();
            $.ajax({
                type: "POST",
                data: {
                    username: username,
                    password: password
                },
                dataType: 'json',
                url: 'home/login',
                beforeSend: function() {
                },
                success: function(data) { 
                    if(data.stt == 1) {
                        location.href = 'home/product';
                    }
                    appen_error(data);
                }
            });
});

function appen_error(data)
{
    $('div.alert-error').html('');
    if(typeof data.error != 'undefined')
        $('div.alert-error').html(data.error);
    if(typeof data.msg != 'undefined')
        $('div.msg').html(data.msg);
}
</script>