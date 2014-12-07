<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css"
	rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-reorder"></i>Tài khoản người dùng
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" class="form-horizontal">
					<h3 class="form-section"></h3>
					<div class="row-fluid">
						<!--/span-->
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Tài khoản</label>
								<div class="controls">
									<input name="CusUser" type="text" class="m-wrap span12"
										placeholder="">
                                                                        <span class="help-block"></span>

								</div>
							</div>
						</div>
					</div>
                                        <div class="row-fluid">
						<!--/span-->
                                                <div class="span6 ">
							<div class="control-group">
								<label class="control-label">Mật khẩu</label>
								<div class="controls">
                                                                        <input name="CusPass" type="password" class="m-wrap span12"
										placeholder="">
                                                                        <span class="help-block"></span>

								</div>
							</div>
						</div>
                                                <!--/span-->
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Nhập lại mật khẩu</label>
								<div class="controls">
                                                                        <input name="CusPassC" type="password" class="m-wrap span12"
										placeholder="">
                                                                        <span class="help-block"></span>

								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					<div class="row-fluid">
						<div class="span12 ">
							<div class="control-group">
								<label class="control-label">Địa chỉ</label>
								<div class="controls">
									<input name="CusAdd" type="text" class="m-wrap span12">
                                                                        <span class="help-block"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Họ Tên</label>
								<div class="controls">
									<input name="CusName" type="text" class="m-wrap span12"
										placeholder="">
                                                                        <span class="help-block"></span>

								</div>
							</div>
                                                </div>
						<!--/span-->
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Email</label>
								<div class="controls">
									<input name="CusEmail" type="text" class="m-wrap span12">
                                                                        <span class="help-block"></span>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
                                        
                                        <div class="row-fluid">
                                                <div class="span6 ">
							<div class="control-group">
								<label class="control-label">Điện thoại</label>
								<div class="controls">
									<input name="CusPhone" type="text" class="m-wrap span12">
                                                                        <span class="help-block"></span>
								</div>
							</div>
						</div>
                                        </div>    
					<div class="form-actions">
                                                <button id="save" type="button" class="btn blue">
							<i class="icon-ok"></i> Save
						</button>
						<button type="button" class="btn">Cancel</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>

<script>
jQuery(document).on('click', "#save", function() {
        BootstrapDialog.confirm('Thông báo', 'Bạn muốn thêm tài khoản này', function(result) {
            if (result) {
            	var CusUser = $("input[name='CusUser']").val(); 
                var CusEmail = $("input[name='CusEmail']").val();
                var CusAdd = $("input[name='CusAdd']").val();
                var CusPhone = $("input[name='CusPhone']").val();
                var CusName = $("input[name='CusName']").val();
                var CusPass = $("input[name='CusPass']").val();
                var CusPassC = $("input[name='CusPassC']").val();
                $.ajax({
                    type: "POST",
                    data: {
                    	CusUser: CusUser,
                        CusEmail: CusEmail,
                        CusAdd: CusAdd,
                        CusName: CusName,
                        CusPhone: CusPhone,
                        CusPass: CusPass,
                        CusPassC: CusPassC,
                    },
                    dataType: 'json',
                    url: 'create',
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
                                        //local.href = <?php //echo  base_url().'dashboard/product_create'; ?>;
                                    }
                                }]
                        });
                        appen_error(data.error);
                    }
                });
            }
        });

    });
</script>

<style type="text/css">
.css {
	overflow: hidden;
}
</style>


