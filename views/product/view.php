<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css"
      rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<div class="row-fluid">
    <div class="span12">
        <?php if (!empty($products)) { ?>
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="row-fluid">
                <div class="span6">
                    <div id="sample_1_length" class="dataTables_length">
                        <label> Nhóm sản phẩm
                            <select name="cat" size="1" id="cat"aria-controls="sample_1" class="small span6">
                                <option value=''>Chọn nhóm</option>
                                <?php
                                if (!empty($cats)) {
                                    foreach ($cats as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="span4 right">
                    <div class="dataTables_filter" id="sample_1_filter">
                        <label>Tên sản phẩm: <input name="name" type="text" aria-controls="sample_1" class="m-wrap medium">
                        </label>
                    </div>
                </div>
                <div class="span2 right">
                    <button class="btn green" id="tim">
                        Tìm Kiếm 
                    </button>
                </div>
            </div>
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-cogs"></i>Danh sách sản phẩm
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a> 
                        <a href="javascript:;"
                           class="remove"></a>
                    </div>
                </div>

                <div id="content" class="portlet-body flip-scroll">
                    <table id="table_product"
                           class="table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th class="numeric">Nhóm sản phẩm</th>
                                <th class="numeric">Miêu tả</th>
                                <th class="numeric">Giá</th>
                                <th>Ảnh đại diện</th>
                                <th class="numeric">TT</th>
                                <th class="numeric">Sửa</th>
                                <th class="numeric">Xóa</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($products as $key => $value) :
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><a href="<?php echo base_url() . 'product/detail/' . $value['ProID'] ?>"><?php echo $value["ProName"]; ?></a></td>
                                    <td value="<?php echo $value['CateID'] ?>" class="numeric"><?php echo $value['CateName']; ?></td>
                                    <td class=""><?php echo $value["ProDesc"]; ?></td>
                                    <td class="numeric"><?php echo $value["ProPrice"]; ?></td>
                                    <td><img src="<?php echo base_url() ?>media/123/_thumbs/<?php echo $value["ProPicName"]; ?>" alt=""></td>

                                    <td id="block<?php echo $value['ProID'] ?>"><?php echo check_stt($value["ProStt"]) ?></td>
                                    <td data-id="<?php echo $value['ProID'] ?>"><span class="icon-edit"></span></td>
                                    <td data-no="<?php echo $i; ?>"
                                        data-id="<?php echo $value['ProID'] ?>"><span class="icon-trash"></span></td>
                                </tr>
                            </tbody>
                            <?php
                            $i++;
                        endforeach;
                        ?>
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
    jQuery(document).on('click', 'span.label', function () {
        var t = $(this).hasClass('label-success');
        var id = $(this).parent().next().attr('data-id');
        if (t)
        {
            var stt = 'Ẩn';
            var st = 0;
            var html = '<span class="label label-inverse">Ẩn</span>'
        }
        else
        {
            var stt = 'Hiện';
            var st = 1;
            var html = '<span class="label label-success">Hiện</span></span>';
        }
        BootstrapDialog.confirm('Thông báo', 'Bạn muốn ' + stt + ' sản sản phẩm này', function (result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    data: {
                        st: st,
                        id: id
                    },
                    url: 'block',
                    beforeSend: function () {
                    },
                    success: function (data) {
                        BootstrapDialog.show({
                            title: 'Thông báo',
                            message: stt+' sản phẩm thành công',
                            buttons: [{
                                    label: 'OK',
                                    cssClass: 'btn-primary',
                                    hotkey: 13, // Enter.
                                    action: function () {
                                        BootstrapDialog.closeAll();
                                    }
                                }]
                        });
                        $("#block"+id).html(html);
                    }
                });
            }
        })
    });

    jQuery(document).on('click', 'table#table_product span.icon-trash', function () {
        var id = $(this).parent().attr('data-id');
        var no = $(this).parent().attr('data-no');
        var that = $(this).parent().parent();
        var page = $('div.pagination li.active').children('a').text();
        BootstrapDialog.confirm('Thông báo', '', function (result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    data: {
                        id: id,
                        no: no,
                        page: page
                    },
                    url: 'product_del',
                    beforeSend: function () {
                    },
                    success: function (data) {
                        BootstrapDialog.show({
                            title: 'Thông báo',
                            message: 'Xóa thành công',
                            buttons: [{
                                    label: 'OK',
                                    cssClass: 'btn-primary',
                                    hotkey: 13, // Enter.
                                    action: function () {
                                        BootstrapDialog.closeAll();
                                    }
                                }]
                        });
                        $("#content").html(data);
                    }
                });
            } else {

            }
        });
    });
    jQuery(document).ready(function () {
        applyPagination();
    });
    jQuery(document).on('click', 'button#tim', function () {
        var cat = $("#cat").val();
        var name = $("input[name='name']").val();
        $.ajax({
            type: "POST",
            data: {
                cat: cat,
                name: name
            },
            url: 'search',
            success: function (msg) {
                // $('#global_ajax_processing').fadeOut('slow');
                $("#content").html(msg);
                applyPagination();
            }
        });
    });
    jQuery(document).on('click', 'span.icon-edit', function () {
        var id = $(this).parent().attr('data-id');
        window.open(
                '<?php echo base_url('product/edit'); ?>' + '/' + id,
                '_blank'
                );


    });

    function applyPagination() {
        $("#ajax_paging a").click(function () {
            if ($(this).attr('doclick') == '0') {
                return false;
            } else {
                var url = $(this).attr("href");
                var cat = $("#cat").val();
                var name = $("input[name='name']").val();
                $.ajax({
                    type: "POST",
                    data: {
                        cat: cat,
                        name: name,
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

<style type="text/css">
    .css {
        overflow: hidden;
    }

    span.label-success{
        cursor: pointer;
    }
</style>


