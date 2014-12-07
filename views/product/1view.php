<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<div class="row-fluid">
	<div class="span12">
	<?php if (!empty($products)) { ?>
		<!-- BEGIN SAMPLE TABLE PORTLET-->
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-cogs"></i>Flip Scroll
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a
						href="#portlet-config" data-toggle="modal" class="config"></a> <a
						href="javascript:;" class="reload"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
			</div>
			<div class="portlet-body flip-scroll">
				<table
					id="product_table" class="table-bordered table-striped table-condensed flip-content">
					<thead class="flip-content">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th class="numeric">Category</th>
							<th class="numeric">Description</th>
							<th class="numeric">Price</th>
							<th class="numeric">Change</th>
							<th class="numeric">Delete</th>
						</tr>
					</thead>
					 <?php	$cats; $i = 1; foreach ( $products as $key => $value ) :?>
					<tbody>
						<tr>
							<td>AAC</td>
							<td><?php echo $value["ProName"]; ?></td>
							<td value="<?php echo $value['CateID']?>" class="numeric"><?php echo $cats[$value['CateID']]["name"]; ?></td>
							<td class=""><?php echo $value["ProDesc"]; ?></td>
							<td class="numeric"><?php echo $value["ProPrice"]; ?></td>
							<td data-id="<?php echo $value['CateID']?>"><span
								class="icon-edit"></span></td>
							<td data-id="<?php echo $value['CateID']?>"><span
								class="icon-trash"></span></td>
						</tr>
					</tbody>
                       <?php endforeach; ?>
				</table>
				<div class="row-fluid">
						<div class="" id="ajax_paging">
							<span style="float: right;" class="dataTables_info"
								id="sample_1_info">Có tất cả <?php echo $count; ?> dòng dữ liệu</span>
                                <?php echo $pagination; ?>
                        </div>

					</div>
			</div>
		</div>
		<?php } ?>
		<!-- END SAMPLE TABLE PORTLET-->
	</div>
</div>

<script>

jQuery(document).ready(function() {  
    applyPagination();
    function applyPagination() {
        $("#ajax_paging a").click(function() {
            if ($(this).attr('doclick') == '0') {
                //alert('Đang ở trang đó mà');
                return false;
                jQuery.alerts.dialogClass = 'alert-success';
                jAlert('Đang ở trang đó mà !', 'Thông Báo', function() {
                    jQuery.alerts.dialogClass = null;
                });
            } else {
                var url = $(this).attr("href");
                $.ajax({
                    type: "POST",
                    data: {
                        ajax: 1
                    }, //
                    url: url,
                    beforeSend: function() {
                        //$("#content").html("");
                        //  $('#loading_image').fadeIn('slow');
                        $('#global_ajax_processing').fadeIn('slow');
                    },
                    success: function(msg) {
                        //$('#loading_image').fadeOut('slow');
                        // $('#global_ajax_processing').fadeOut('slow');
                        $("#content").html(msg);
                        //$("#content").remove();
                        applyPagination();
                    }
                });
            }
            return false;
        });
    }
});
    jQuery(document).on('click', '.icon-edit', function() { 
        var id = $(this).parent().attr('data-id');
        var url = '<?php echo base_url()?>';
        location.href = url+'dashboard/product_edit/'+id;
    });
    jQuery(document).on('click', 'table#product_table span.icon-trash', function() {
        var id = $(this).parent().attr('data-id');
        var that = $(this).parent().parent();
        var page = $('div.pagination li.active').children('a').text();
        BootstrapDialog.confirm('Thông báo', 'Bạn muốn xóa sản phẩm này', function(result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    data: {
                        id: id,
                        page: page
                    },
                    url: 'product_del',
                    beforeSend: function() {
                    },
                    success: function(data) {
                        BootstrapDialog.closeAll();
                        alert('bạn xóa thành công');
                        $.ajax({
                            type:"POST",
                            url:'product',
                        });
                    }
                });
            } else {

            }
        });
    });

</script>



