<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css"
	rel="stylesheet" type="text/css" />
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
			<div id="content" class="portlet-body flip-scroll">
				<table id="product_table"
					class="table-bordered table-striped table-condensed flip-content">
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
    jQuery(document).on('click', '.icon-edit', function() { //alert('xxxxxxxx');
        var id = $(this).parent().attr('data-id');
        var that = $(this).parent().parent();
        var username = $(this).parents().prev().prev().prev().prev().text();
        var email = $(this).parents().prev().prev().prev().text();
        var text = '<form action="<?php echo base_url() ?>dashboard/user_edit" method="post" id="form_user_edit" class="">';
        text += '<div class="controls">'
        text += '<label class="control-label">Tài khoản</label>';
        text += '<input type="text" name="username" value="'+username+'" class="m-wrap large" placeholder="Tài khoản">'
        text += '<label class="control-label">Mật khẩu</label>';
        text += '<input type="password" name="password" class="m-wrap large" placeholder="Mật khẩu">'
        text += '<label class="control-label">Họ</label>';
        text += '<input type="text" name="firstname" class="m-wrap large" placeholder="Họ">'
        text += '<label class="control-label">Tên</label>';
        text += '<input type="text" name="lastname" class="m-wrap large" placeholder="Tên">'
        text += '<label class="control-label">Email</label>';
        text += '<input type="text" name="email" value="'+email+'" class="m-wrap large" placeholder="email">'
        text += '<label class="control-label">Địa chỉ</label>';
        text += '<input type="text" name="address" class="m-wrap large" placeholder="Địa chỉ">'
        text += '<input type="hidden" name="id" value="'+id+'">'
        text += '</div>'
        text += '</form>'
        BootstrapDialog.show({
            title: 'Tạo tài khoản mới',
            message: $(text),
            buttons: [{
                    label: 'Edit',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function() {
                        var form2 = $('form#form_user_edit');
                        $.ajax({
                            type: "POST",
                            data: form2.serialize(),
                            url: form2.attr('action'),
                            dataType: 'json',
                            beforeSend: function() {
                            },
                            success: function(data) { 
                                if (data != false)
                                {
                                    that.children('td:first').next().html(data.username);
                                    that.children('td:first').next().next().html(data.email);
                                    that.children('td:first').next().next().next().next().html(data.lastname);
                                    alert('bạn đã update tài khoản thành công');
                                    BootstrapDialog.closeAll();

                                }
                                else {
                                    alert('bạn đã update tài khoản ko thành công');
                                }
                            },
                        });
                    }
                }]
        });
    });

    jQuery(document).on('click', '#create_user', function() { 
        var text = '<form action="<?php echo base_url() ?>dashboard/create_user" method="post" id="form_create_user" class="">';
        var that = $(this).parent().parent();
        text += '<div class="controls">'
        text += '<label class="control-label">Tài khoản</label>';
        text += '<input type="text" name="username" class="m-wrap large" placeholder="Tài khoản">'
        text += '<label class="control-label">Mật khẩu</label>';
        text += '<input type="password" name="password" class="m-wrap large" placeholder="Mật khẩu">'
        text += '<label class="control-label">Họ</label>';
        text += '<input type="text" name="firstname" class="m-wrap large" placeholder="Họ">'
        text += '<label class="control-label">Tên</label>';
        text += '<input type="text" name="lastname" class="m-wrap large" placeholder="Tên">'
        text += '<label class="control-label">Email</label>';
        text += '<input type="text" name="email" class="m-wrap large" placeholder="email">'
        text += '<label class="control-label">Địa chỉ</label>';
        text += '<input type="text" name="address" class="m-wrap large" placeholder="Địa chỉ">'
        text += '</div>'
        text += '</form>'
        BootstrapDialog.show({
            title: 'Tạo tài khoản mới',
            message: $(text),
            buttons: [{
                    label: 'Create',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function() {
                        //                        var user = $('input#user.m-wrap ').val();
                        //                        var lastname = $('input#lastname.m-wrap ').val();
                        //                        var firstname = $('input#user.m-wrap ').val();
                        //                        var name = $('input#user.m-wrap ').val();
                        //                        alert(name);
                        var form2 = $('form#form_create_user');
                        $.ajax({
                            type: "POST",
                            data: form2.serialize(),
                            url: form2.attr('action'),
                            dataType: 'json',
                            beforeSend: function() {
                            },
                            success: function(data) { 
                                if (data.stt == true)
                                {

                                    BootstrapDialog.closeAll();
                                    alert('bạn đã tạo tài khoản thành công');
                                }
                                else {
                                    alert('bạn đã tạo tài khoản ko thành công');
                                }
                            },
                        });
                    }
                }]
        });
    });
    jQuery(document).on('click', 'table#table_user span.icon-trash', function() {
        var id = $(this).parent().attr('data-id');
        var that = $(this).parent().parent();
        var page = $('div.pagination li.active').children('a').text();
        BootstrapDialog.confirm('Thông báo', '', function(result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    data: {
                        id: id,
                        page: page
                    },
                    url: 'user_del',
                    beforeSend: function() {
                    },
                    success: function(data) {
                        alert('bạn xóa thành công');
                        $("#content").html(data);
                    }
                });
            } else {

            }
        });
    });

</script>

<style type="text/css">
.css {
	overflow: hidden;
}
</style>


