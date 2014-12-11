<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css"
	rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<div class="row-fluid">
	<div class="span12">
	<?php if (!empty($news)) { ?>
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
				<table id="table_product"
					class="table-bordered table-striped table-condensed flip-content">
					<thead class="flip-content">
						<tr>
							<th class="numeric">NewID</th>
							<th class="numeric">NewTitle</th>
							<th class="numeric">NewDate</th>
							<th class="numeric">NewContent</th>
							<th class="numeric">NewPicName</th>
                            <th class="numeric">NewSource</th>
							<th class="numeric">NewDesc</th>
						</tr>
					</thead>
					 <?php $i = 1; foreach ( $news as $key => $value ) :?>
					<tbody>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value["NewTitle"]; ?></td>
							<td class="numeric"><?php echo $value['NewDate']; ?></td>
							<td class=""><?php echo $value["NewContent"]; ?></td>
							<td class="numeric"><?php echo $value["NewPicName"]; ?></td>
							<td class="numeric"><?php echo $value["NewSource"]; ?></td>
                            <td class="numeric"><?php echo $value["NewDesc"]; ?></td>
                            <td data-id="<?php echo $value['NewID']?>"><span
								class="icon-edit"></span></td>
							<td data-no="<?php echo $i;?>"
								data-id="<?php echo $value['NewID']?>"><span class="icon-trash"></span></td>
						</tr>
					</tbody>
                       <?php $i++; endforeach; ?>
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
jQuery(document).on('click', 'table#table_product span.icon-trash', function() {
    var id = $(this).parent().attr('data-id');
    var no = $(this).parent().attr('data-no');
    var that = $(this).parent().parent();
    var page = $('div.pagination li.active').children('a').text();
    BootstrapDialog.confirm('Thông báo', '', function(result) {
        if (result) {
            $.ajax({
                type: "POST",
                data: {
                    id: id,
                    no: no,
                    page: page
                },
                url: 'news_del',
                beforeSend: function() {
                },
                success: function(data) {
                	$("#content").html(data);
                	applyPagination();
                }
            });
        } else {

        }
    });
});
    jQuery(document).ready(function() {  
        applyPagination();
    });
    jQuery(document).on('click', 'span.icon-edit', function() {
    	var id = $(this).parent().attr('data-id');
    	window.open(
    	  '<?php echo base_url('news/edit');?>'+'/'+id,
    	  '_blank' 
    	);

    	
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
            title: 'Tạo tài Tin tức',
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
    function applyPagination() {
        $("#ajax_paging a").click(function() {
            if ($(this).attr('doclick') == '0') {
                return false;
            } else {
                var url = $(this).attr("href");
                $.ajax({
                    type: "POST",
                    data: {
                        ajax: 1
                    }, 
                    url: url,
                    beforeSend: function() {
                        //$('#global_ajax_processing').fadeIn('slow');
                    },
                    success: function(msg) {
                        // $('#global_ajax_processing').fadeOut('slow');
                        $("#content").html(msg);
                        applyPagination();
                    }
                });
            }
            return false;
        });
    }
</script>

<style type="text/css">
.css {
	overflow: hidden;
}
</style>


