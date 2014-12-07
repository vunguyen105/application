<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css"
	rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<style type="text">
    .icon-trashs{
        float: right;
    }
    i.icon-pencil{
        cursor: pointer !important;
    }
</style>
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.css" />
<div class="row-fluid">
	<div class="span6">
		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-reorder"></i>Danh sách Menu
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
				<div class="actions">
					<a class="btn green" id="add-menu"> Thêm menu mới</a>
				</div>
			</div>
			<div class="portlet-body">
                <?php if (!empty($menu)) { ?>
                    <div class="dd" id="nestable_list_3">
					<ol class="dd-list">
                            <?php foreach ($menu as $key => $value) { ?>
                                <li class="dd-item dd3-item" data-id="">
							<span style="float: right"><i class="icon-plus"></i><i
								class="icon-pencil"></i><i class="icon-trash"></i></span>
							<div class="dd-handle dd3-handle"></div>
							<div data-menu-id="<?php echo $value['MenuID'] ?>"
								class="dd3-content"><?php echo $value['MenuName'] ?></div>
						</li>
                            <?php } ?>
                        </ol>
				</div>
                <?php } ?>
            </div>
		</div>
	</div>
	<div class="span6">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-comments"></i>Chi tiết Menu
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a
						href="#portlet-config" data-toggle="modal" class="config"></a> <a
						href="javascript:;" class="reload"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="dd" id="nestable_list_2">
				</div>
			</div>
		</div>
	</div>

</div>
<div class="row-fluid">
	<div class="span6">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-comments"></i>Thư mục chưa add vào menu
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a
						href="#portlet-config" data-toggle="modal" class="config"></a> <a
						href="javascript:;" class="reload"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
			</div>
			<div class="portlet-body ">
				<div class="dd" id="nestable_list_1"></div>
			</div>
		</div>
	</div>
	
</div>

<script
	src="<?php echo base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/ui-nestable.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>

<script>
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

jQuery(document).on('click', 'div#nestable_list_3 div.dd3-content', function() {
    var id = $(this).attr('data-menu-id'); 
     loadMenu(id); 
     loadmenuview(id)
});


jQuery(document).on('click', 'div#nestable_list_1 span p.btn', function() {
	var CateID = $(this).parent().parent().attr('data-id'); 
	var MenuID = $('div#nestable_list_1 ol.dd-list').attr('menu-id'); 
		$.ajax({
	     type: "POST",
	     data: {
	    	 CateID: CateID,
	    	 MenuID: MenuID
	     },
	     url: 'menu_add_category',
	     beforeSend: function() {
	     },
	     success: function(data) {
	    	 $('div#nestable_list_1').html(data); 
	    	 loadmenuview(MenuID);
	     }
	 });
});
function loadMenu(id)
{
    $.post("category_load_menu_notID", { id: id}, function(data) {
    	$('div#nestable_list_1').html(data);
    });
}
function loadmenuview(id)
{
	   $.post("show_menu", { id: id}, function(data) {
	    	$('div#nestable_list_2').html(data);
	    });
}

jQuery(document).on('click', 'div#nestable_list_3 .icon-pencil', function() {
    var id = $(this).parent().next().next().attr('data-menu-id'); 
    var name = $(this).parent().next().next().text();
    var that = $(this).parent().next().next();
    var text = '<label class="control-label">Tên thư mục</label><div class="controls"><input type="text" value="' + name + '" class="m-wrap large" placeholder="Name nemu"></div>'
    BootstrapDialog.show({
        title: 'Sửa menu ' + name,
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
                            name: name
                        },
                        url: 'menu_update',
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
});
 </script>