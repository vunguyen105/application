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
					<i class="icon-reorder"></i>SIZE
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
			</div>
                        <?php if(!empty($sizes)) { ?>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" class="form-horizontal">
					<h3 class="form-section"></h3>
					<div class="row-fluid">
						<!--/span-->
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Tên kích thước</label>
								<div class="controls">
                                    <input name="SizeID" type="hidden" value="<?php echo $sizes['SizeID'];?>"/>
                                    <input name="SizeName" type="text" value="<?php echo $sizes['SizeName'];?>"class="m-wrap span12"
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
                        <?php } ?>
		</div>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>

<script>
jQuery(document).on('click', "#save", function() {
        BootstrapDialog.confirm('Thông báo', 'Bạn có muốn thay đổi tên kích thước này không?', function(result) {
            if (result) {
            	var SizeName = $("input[name='SizeName']").val(); 
                //alert(SizeName);
                $.ajax({
                    type: "POST",
                    data: {
                        SizeID:SizeID,
                    	SizeName: SizeName,
                    },
                    dataType: 'json',
                    url: 'edit',
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


