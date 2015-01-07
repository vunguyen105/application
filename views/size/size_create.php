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
					<i class="icon-reorder"></i>Tạo kích thước sản phẩm
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
								<label class="control-label">Kích thước</label>
								<div class="controls">
									<input name="SizeName" type="text" class="m-wrap span12"
										placeholder="">
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
        BootstrapDialog.confirm('Thông báo', 'Bạn muốn tạo kích thước này', function(result) {
            if (result) {
            	var SizeName = $("input[name='SizeName']").val(); 
                $.ajax({
                    type: "POST",
                    data: {
                    	SizeName: SizeName
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
                                        location.href = '<?php echo  base_url().'size/create'?>';
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


