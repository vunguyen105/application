<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<style type="text">
    .icon-trashs{
        float: right;
    }
    i.icon-pencil{
        cursor: pointer !important;
    }
</style> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.css" />
<div class="row-fluid">
    <div class="span6">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>List menu</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
                <div class="actions">
                    <a class="btn green" id="add-menu"> Add new menu</a>
                </div>
            </div>
            <div class="portlet-body">
                <?php if (!empty($subs)) { ?>
                    <div class="dd" id="nestable_list_3">
                        <ol class="dd-list">
                            <?php foreach ($subs as $key => $value) { ?>
                                <li class="dd-item dd3-item" data-id="">
                                    <span style="float: right"><i class="icon-plus"></i><i class="icon-pencil"></i><?php if ($value['id'] != 1) { ?><i class="icon-trash"></i><?php } ?></span>
                                    <div class="dd-handle dd3-handle"></div>
                                    <div data-menu-id="<?php echo $value['id'] ?>" data-menu-left="<?php echo $value['lft'] ?>" data-menu-right="<?php echo $value['rgt'] ?>" class="dd3-content"><?php echo $value['name'] ?></div>
                                </li>
                            <?php } ?>
                        </ol>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>  
    <div class="span6">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Detail menu</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="dd" id="nestable_list_2">
                    <?php if (!empty($sub_menu)) echo $sub_menu; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.js"></script>  
<script src="<?php echo base_url(); ?>assets/scripts/ui-nestable.js"></script>    
<script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
<script>
    function loadSubMenu()
    {
        $.post("category_load", function(data) {
            $('div#nestable_list_3.dd').html(data);
        });
    }
    function loadMenu(id)
    {
        $.post("category_load_menu", {id: id}, function(data) {
            $('div#nestable_list_2.dd').html(data);
        });
    }
    jQuery(document).ready(function() {
        // initiate layout and plugins
        // App.init();        
        UINestable.init();
        $('#nestable_list_2').nestable().on('change', function() {
            var tmp = JSON.stringify($('#nestable_list_2').nestable('serialize'))//,null,1);
            var id_menu = $(this).children('ol').attr('menu-id');
            $.ajax({
                type: "POST",
                data: {
                    tmp: tmp,
                    id_menu: id_menu,
                },
                url: 'category_move',
                beforeSend: function() {
                },
                success: function(data) {
                    $('div#nestable_list_2.dd').html(data);
                    $('#nestable_list_2').nestable();
                    loadSubMenu();
                }
            });
        });
    });
    //jQuery(document).on(
    jQuery(document).on('click', 'div#nestable_list_2 .icon-trash', function() {
        var id = $(this).parent().parent().parent().attr('menu-id');
        var menu_id = $('div#nestable_list_2 ol.dd-list').attr('menu-id');
        //alert(menu_id);
        var id = $(this).parent().parent().attr('data-id');
        var left = $(this).parent().parent().attr('data-lft');
        var right = $(this).parent().parent().attr('data-rgt');
        BootstrapDialog.confirm('Message', '', function(result) {
            if (result) {
                $.ajax({
                    type: "POST",
                    data: {
                        id: id,
                        left: left,
                        right: right,
                        id: id,
                                menu_id: menu_id
                    },
                    url: 'category_del',
                    beforeSend: function() {
                    },
                    success: function(data) {
                        $('div#nestable_list_2.dd').html(data);
                        $('#nestable_list_2').nestable();
                        loadSubMenu();
                        BootstrapDialog.closeAll();
                    }
                });
            } else {

            }
        });
    });
    jQuery(document).on('click', 'div#nestable_list_2 .icon-pencil', function() {
        var id = $(this).parent().parent().attr('data-id');
        var left = $(this).parent().parent().attr('data-lft');
        var right = $(this).parent().parent().attr('data-rgt');
        var that = $(this).parent().next();
        var name = $(this).parent().next().text();
        // var text = '<label class="control-label">Tên thư mục</label><div class="controls"><input type="text" value="'+name+'" class="m-wrap large" placeholder="tên thư mục"></div>'
        // var html += '<br><a class="btn red" data-toggle="modal" href="#stack3">Launch modal</a></div>';
        // var text = '<label class="control-label">Tên thư mục</label><div class="controls"><input type="text" class="m-wrap large" placeholder="tên thư mục"></div>'
        var text = '<label class="control-label">Tên thư mục</label><div class="controls"><input type="text" value="' + name + '" class="m-wrap large" placeholder="Name nemu"></div>'
        BootstrapDialog.show({
            title: 'Edit menu ' + name,
            message: $(text),
            buttons: [{
                    label: 'Edit',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function() {
                        var name = $('input.m-wrap').val();
                        $.ajax({
                            type: "POST",
                            data: {
                                id: id,
                                left: left,
                                right: right,
                                name: name
                            },
                            url: 'category_update',
                            beforeSend: function() {
                            },
                            success: function(data) {
                                that.html(name);
                                BootstrapDialog.closeAll();
                                $('#nestable_list_2').nestable();
                            }
                        });
                    }
                }]
        });
        // that.remove();
    });
    jQuery(document).on('click', 'div#nestable_list_3 .icon-pencil', function() {
        var id = $(this).parent().next().next().attr('data-menu-id');
        var left = $(this).parent().next().next().attr('data-menu-left');
        var right = $(this).parent().next().next().attr('data-menu-right');
        var that = $(this).parent().next().next();
        var name = $(this).parent().next().next().text();
        // var text = '<label class="control-label">Tên thư mục</label><div class="controls"><input type="text" value="'+name+'" class="m-wrap large" placeholder="tên thư mục"></div>'
        // var html += '<br><a class="btn red" data-toggle="modal" href="#stack3">Launch modal</a></div>';
        // var text = '<label class="control-label">Tên thư mục</label><div class="controls"><input type="text" class="m-wrap large" placeholder="tên thư mục"></div>'
        var text = '<label class="control-label">Tên thư mục</label><div class="controls"><input type="text" value="' + name + '" class="m-wrap large" placeholder="Name category"></div>'
        BootstrapDialog.show({
            title: 'Sửa category ' + name,
            message: $(text),
            buttons: [{
                    label: 'Edit',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function() {
                        var name = $('input.m-wrap').val();
                        $.ajax({
                            type: "POST",
                            data: {
                                id: id,
                                left: left,
                                right: right,
                                name: name
                            },
                            url: 'category_update',
                            beforeSend: function() {
                            },
                            success: function(data) {
                                that.html(name);
                                BootstrapDialog.closeAll();
                                $('#nestable_list_2').nestable();
                            }
                        });
                    }
                }]
        });
        // that.remove();
    });
    jQuery(document).on('click', 'div#nestable_list_2.dd i.icon-plus', function() {
        var id = $(this).parent().parent().attr('data-id');
        var menu_id = $('div#nestable_list_2.dd ol.dd-list').attr('menu-id');
        var left = $(this).parent().parent().attr('data-lft');
        var right = $(this).parent().parent().attr('data-rgt');
        var name = $(this).parent().next().text();
        var text = '<label class="control-label">Tên thư mục</label>';
        text += '<div class="controls"><input type="text" class="m-wrap large" placeholder="Name category"></div>'
        BootstrapDialog.show({
            title: 'Add category in ' + name,
            message: $(text),
            buttons: [{
                    label: 'Create',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function() {
                        var name = $('input.m-wrap').val();
                        $.ajax({
                            type: "POST",
                            data: {
                                id: id,
                                left: left,
                                right: right,
                                name: name,
                                menu_id: menu_id
                            },
                            url: 'category_add',
                            beforeSend: function() {
                            },
                            success: function(data) {
                                $('div#nestable_list_2.dd').html(data);
                                $('#nestable_list_2').nestable();
                                loadSubMenu();
                                BootstrapDialog.closeAll();
                            }
                        });
                    }
                }]
        });
        // that.remove();
    });

    jQuery(document).on('click', '#add-menu', function() {
        var text = '<label class="control-label">Name menu</label>';
        text += '<div class="controls"><input type="text" class="m-wrap large" placeholder="Name menu"></div>'
        BootstrapDialog.show({
            title: 'Add new menu',
            message: $(text),
            buttons: [{
                    label: 'Create',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function() {
                        var name = $('input.m-wrap').val();
                        $.ajax({
                            type: "POST",
                            data: {
                                name: name
                            },
                            url: 'menu_new',
                            beforeSend: function() {
                            },
                            success: function(data) {
                                $('div#nestable_list_3.dd').html(data);
                                $('#nestable_list_2').nestable();
                                BootstrapDialog.closeAll();
                            }
                        });
                    }
                }]
        });
    });
    jQuery(document).on('click', 'div#nestable_list_3.dd i.icon-plus', function() {
        var id_menu = $(this).parent().next().next().attr('data-menu-id');
        var name = $(this).parent().next().next().text();
        var left_menu = $(this).parent().next().next().attr('data-menu-id');
        var right_menu = $(this).parent().next().next().attr('data-menu-right');
        var text = '<label class="control-label">Name Category</label>';
        text += '<div class="controls"><input type="text" class="m-wrap large" placeholder="Name Category"></div>'
        BootstrapDialog.show({
            title: 'Add category in ' + name,
            message: $(text),
            buttons: [{
                    label: 'Create',
                    cssClass: 'btn green',
                    hotkey: 13, // Enter.
                    action: function() {
                        var name = $('input.m-wrap').val();
                        $.ajax({
                            type: "POST",
                            data: {
                                name: name,
                                id: id_menu,
                                left: left_menu,
                                right: right_menu,
                            },
                            url: 'children_new',
                            beforeSend: function() {
                            },
                            success: function(data) {
                                $('div#nestable_list_2.dd').html(data);
                                $('#nestable_list_2').nestable();
                                loadSubMenu();
                                BootstrapDialog.closeAll();
                            }
                        });
                    }
                }]
        });
    });

    jQuery(document).on('click', 'div.dd3-content', function() {
        var id_menu = $(this).attr('data-menu-id');
        var left_menu = $(this).attr('data-menu-left');
        var right_menu = $(this).attr('data-menu-right');
        $.ajax({
            type: "POST",
            data: {
                id: id_menu,
                left: left_menu,
                right: right_menu
            },
            url: 'category_load_menu',
            beforeSend: function() {
            },
            success: function(data) {
                $('div#nestable_list_2.dd').fadeOut('slow');
                $('div#nestable_list_2.dd').html(data);
                $('div#nestable_list_2.dd').fadeIn('fast');
                $('#nestable_list_2').nestable();
            }
        });
    });


</script>

