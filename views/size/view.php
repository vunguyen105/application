<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>Kích thước sản phẩm</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
                <?php if (!empty($sizes)) { ?>    
                    <div id="content">
                        <table id="table_product"
                               class="table table-condensed table-hover">
                            <thead class="flip-content">
                                <tr>
                                    <th>SizeID</th>
                                    <th class="hidden-480">Size name</th>
                                    <th class="hidden-480">Chỉnh sửa</th>
                                    <th class="">Xóa</th>
                                </tr>
                            </thead>
                            <?php foreach ($sizes as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $value["SizeID"]; ?></td>
                                        <td class="hidden-480"><?php echo $value["SizeName"]; ?></td>
                                        <td class="hidden-480" data-id="<?php echo $value['SizeID'] ?>"><span class="icon-edit"></span></td>
                                        <td data-id="<?php echo $value['SizeID'] ?>"><span class="icon-trash"></span></td>
                                    </tr>
                                </tbody>
                                <?php endforeach;
                            ?>
                        </table>
                        <div class="row-fluid">
                            <div class="" id="ajax_paging">
                                <span style="float: right;" class="dataTables_info" id="sample_1_info">Có tất cả <?php echo $count; ?> dòng dữ liệu</span>
    <?php echo $pagination; ?>
                            </div>

                        </div>
                    </div>      
<?php } ?>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<script>


    jQuery(document).ready(function () {
        applyPagination();
    });
    jQuery(document).on('click', '.icon-edit', function () {
        var id = $(this).parent().attr('data-id');
        var no = $(this).parent().attr('data-no');
        var that = $(this).parent().parent();
        var username = $(this).parents().prev().prev().prev().prev().text();
        var email = $(this).parents().prev().prev().prev().text();
        var text = '<form action="<?php echo base_url() ?>dashboard/user_edit" method="post" id="form_user_edit" class="">';
        text += '<div class="controls">'
        text += '<label class="control-label">Tài khoản</label>';
        text += '<input type="text" name="user" value="' + username + '" class="m-wrap large" placeholder="Tài khoản">'
        text += '<label class="control-label">Tên</label>';
        text += '<input type="text" name="lastname" class="m-wrap large" placeholder="Tên">'
        text += '<input type="hidden" name="id" value="' + id + '">'
        text += '<label class="control-label">Họ</label>';
        text += '<input type="text" name="firstname" class="m-wrap large" placeholder="Họ">'
        text += '<label class="control-label">Email</label>';
        text += '<input type="text" name="email" value="' + email + '" class="m-wrap large" placeholder="email">'
        text += '</div>'
        text += '</form>'
        BootstrapDialog.show({
            title: 'Tạo tài khoản mới',
            message: $(text),
            buttons: [{
                    label: 'Create',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function () {
                        var form2 = $('form#form_user_edit');
                        $.ajax({
                            type: "POST",
                            data: form2.serialize(),
                            url: form2.attr('action'),
                            dataType: 'json',
                            beforeSend: function () {
                            },
                            success: function (data) {
                                if (data != false)
                                {
                                    that.children('td:first').next().html(data.username);
                                    BootstrapDialog.closeAll();
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

    jQuery(document).on('click', '#create_user', function () {
        var text = '<form action="<?php echo base_url() ?>dashboard/create_user" method="post" id="form_create_user" class="">';
        var that = $(this).parent().parent();
        text += '<div class="controls">'
        text += '<label class="control-label">Tài khoản</label>';
        text += '<input type="text" name="user" class="m-wrap large" placeholder="Tài khoản">'
        text += '<label class="control-label">Tên</label>';
        text += '<input type="text" name="lastname" class="m-wrap large" placeholder="Tên">'
        text += '<label class="control-label">Họ</label>';
        text += '<input type="text" name="firstname" class="m-wrap large" placeholder="Họ">'
        text += '<label class="control-label">Email</label>';
        text += '<input type="text" name="email" class="m-wrap large" placeholder="email">'
        text += '</div>'
        text += '</form>'
        BootstrapDialog.show({
            title: 'Tạo tài khoản mới',
            message: $(text),
            buttons: [{
                    label: 'Create',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function () {
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
                            beforeSend: function () {
                            },
                            success: function (data) {
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
    jQuery(document).on('click', 'table#table_user span.icon-trash', function () {
        var id = $(this).parent().attr('data-id');
        var that = $(this).parent().parent();
        var page = $('div.pagination li.active').children('a').text();
        BootstrapDialog.confirm('Thông báo', '', function (result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    data: {
                        id: id,
                        page: page
                    },
                    url: 'del',
                    beforeSend: function () {
                    },
                    success: function (data) {
                        $("#content").html(data);
                        applyPagination();
                    }
                });
            } else {

            }
        });
    });
    function applyPagination() {
        $("#ajax_paging a").click(function () {
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
                    beforeSend: function () {
                        //$('#global_ajax_processing').fadeIn('slow');
                    },
                    success: function (msg) {
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



