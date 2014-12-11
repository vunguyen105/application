<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css"
	rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<script
	src="<?php echo base_url() ?>assets/customselect/jquery-customselect.js"></script>
<link
	href="<?php echo base_url() ?>assets/customselect/jquery-customselect.css"
	rel="stylesheet" />
<style>
.mediamgr_content {
	margin-right: 250px;
	padding: 20px 0;
}

.isotope {
	transition-property: height, width;
}

.isotope, .isotope .isotope-item {
	transition-duration: 0.8s;
}

.listfile {
	list-style: none outside none;
}

.isotope .isotope-item {
	transition-property: transform, opacity;
}

.listfile li {
	background: none repeat scroll 0 0 #FCFCFC;
	border: 1px solid #DDDDDD;
	display: inline-block;
	margin: 5px 10px 5px 0;
	padding: 10px;
}

.isotope-item {
	z-index: 2;
}

.listfile li a {
	display: block;
}

a, a:hover, a:link, a:active, a:focus {
	color: #0866C6;
	outline: medium none;
	text-decoration: none;
}

.listfile li span.filename {
	display: block;
	font-size: 11px;
	margin-top: 5px;
	text-align: center;
}
</style>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-reorder"></i>Chỉnh sửa bài viết
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
			</div>
			<?php if(!empty($news)) { ?>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="" class="horizontal-form">
					<div class="row-fluid">
						<div class="span12 ">
							<div class="control-group">
								<label class="control-label">Tiêu đề bài viết</label>
								<div class="controls">
									<input name="NewTitle" type="text" class="m-wrap span12"
										value="<?php echo $news['NewTitle']?>">
                                                                         <span class="help-block"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label" for="NewSource">Nguồn tin tức</label>
								<div class="controls">
									<input name="NewSource" type="text" id="NewSource" class="m-wrap span12"
										value="<?php echo $news['NewSource']?>">
                                                                         <span class="help-block"></span>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="span6 ">
							<div class="control-group ">
								<label class="control-label" for="NewDesc">Mô tả</label>
								<div class="controls">
									<input name="NewDesc" type="text" id="NewDesc" class="m-wrap span12"
										value="<?php echo $news['NewDesc']?>">
                                                                         <span class="help-block"></span>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row-fluid">
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Status</label>
								<div class="controls">
									<label class="radio"> <input type="radio" name="stt1"
										value="0" /> Off
									</label> <label class="radio"> <input type="radio"
										name="stt1" value="1" checked /> On
									</label>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="row-fluid tab-content" id="content">
							<textarea id="demo" name="demo"><?php echo $news['NewDesc']?></textarea>
						</div>
                                                <?php echo $ckediter; ?>
 						<div id="ufile" class="btn-group">
 							<button type="button" id="ufile" name="ufile" onclick="BrowseServer()"
								class="btn blue">
 								<i class="icon-plus"></i> Images
 							</button> 
 						</div> 
						<div class="row-fluid">
							<ul id="imges" class="listfile isotope" id="medialist"
								style="position: relative; overflow: hidden;">
							</ul>
						</div>
					</div>
					<div class="form-actions">
						<button class="btn blue" id="save" type="button">
							<i class="icon-ok"></i> Save
						</button>
						<button class="btn" type="button">Cancel</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
    function BrowseServer()
    {
        var finder = new CKFinder();
        finder.BasePath = '<?php echo site_url() ?>/ckfinder/';
        finder.SelectFunction = imageBrowse;
        finder.SelectFunctionData = 'images';
        finder.SelectThumbnailFunction = imageBrowse;
        finder.Popup();
    }

    function imageBrowse(fileUrl, data)
    {
        var n = fileUrl.split("/");
        var file = n[n.length - 1];
        var foder = n[n.length - 2];
        var length = foder.length + file.length + 1;
        var link = fileUrl.substring(0, fileUrl.length - length) + '_thumbs/' + fileUrl.substring(fileUrl.length - length, fileUrl.length);
        var html = '<li class="image isotope-item">';
        html += '<a href = "' + link + '" data-link = "' + foder + '/' + file + '"  class = "cboxElement">';
        html += '<img alt = ""src = "' + link + '"></a>';
        html += '<span class = "filename">' + file + '<a class="icon-trash"></a></li>';
        $('#imges').append(html);
        return false;
    }
</script>
<script type="text/javascript"
	src="<?php echo site_url() ?>/ckfinder/ckfinder_v1.js"></script>
<script>
    jQuery(document).on('click', 'a.icon-trash', function() {
        $(this).parent().parent().remove();
        return  false;
    });
    jQuery(document).on('click', "#save", function() {
        BootstrapDialog.confirm('Thông báo', 'Bạn muốn sửa phẩm này', function(result) {
            if (result) {
                var proname = $("input[name='proname']").val(); 
                var price = $("input[name='price']").val();
                var quantity = $("input[name='quantity']").val();
                var cat = $("#cat").val();
                var id = $('button#save').attr('data-ids');
                var objEditor = CKEDITOR.instances["demo"];
                var descr = objEditor.getData();
                
                //alert(descr);
//                 var array_anh = [];
//                 $('#imges').each(function() {
//                     var link = '';
//                     $(this).find('li').each(function() {
//                         var current = $(this);
//                         var link = current.children('a').attr('data-link');
//                         array_anh.push(link);
//                     });
//                 });
                $.ajax({
                    type: "POST",
                    data: {
                    	proname: proname,
                        price: price,
                        quantity: quantity,
                        cat: cat,
                        descr: descr,
                        id: id,
                    },
                    dataType: 'json',
                    url: 'product_edit',
                    beforeSend: function() {
                    },
                    success: function(data) { 
                        BootstrapDialog.show({
                            title: 'Thông báo',
                            message: data.msg,
                            buttons: [{
                                    label: 'OK',
                                    cssClass: 'btn-primary',
                                    hotkey: 13, // Enter.
                                    action: function() {
                                        BootstrapDialog.closeAll();
                                        location.reload(); 
                                        // local.href = <?php //echo  base_url().'dashboard/product_create'; ?>;
                                    }
                                }]
                        });
                    }
                });
            }
        });

    });
    jQuery(document).ready(function() {
        //$("#standardc").customselect();
    });

</script>
