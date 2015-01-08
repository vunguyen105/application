<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
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
					<i class="icon-reorder"></i>Product edit
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a> <a href="javascript:;"
						class="remove"></a>
				</div>
			</div>
			<?php if(!empty($products)) { ?>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="" class="horizontal-form">
					<div class="row-fluid">
						<div class="span12 ">
							<div class="control-group">
								<label class="control-label">Product Name</label>
								<div class="controls">
									<input value="<?php echo $products['ProName'];?>" name="proname" type="text" class="m-wrap span12"
										placeholder="Product Name">
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label" for="firstName">Quantity</label>
								<div class="controls">
									<input value="<?php echo $products['ProQuantity']?>" name="quantity" type="text" id="quantity" class="m-wrap span12"
										placeholder="Quantity">
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="span6 ">
							<div class="control-group ">
								<label class="control-label" for="lastName">Price</label>
								<div class="controls">
									<input value="<?php echo $products['ProPrice']?>" name="price" type="text" id="price" class="m-wrap span12"
										placeholder="Price">
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row-fluid">
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">Category</label>
								<div class="controls">
									<select name="cat" id="cat" class="m-wrap span12">
										<option value=''>Select your category</option>
										<?php  if (!empty($cats)) {  foreach ($cats as $key => $value) { ?>
										<option value="<?php echo $value['id']; ?>"<?php if($value['id'] == $products['CateID']) echo 'selected="selected';?> "><?php echo $value['name']; ?></option>
										<?php }} ?>
									</select>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="span6 ">
							<div class="control-group">
								<label class="control-label">status</label>
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
							<textarea id="demo" name="demo"><?php echo $products['ProDesc']?></textarea>
						</div>
                                                <?php echo $ckediter; ?>
 						<hr class="clearfix"> 
                                                <div id="ufile" class="btn-group">
                                                    <button type="button"id="ufile" name="ufile" onclick="BrowseServer()" class="btn blue"><i class="icon-plus"></i> Quản lý ảnh</button>
                                                </div>
                                                <hr class="clearfix">
                                                <div class="row-fluid">
                                                    <ul id="imges" class="listfile isotope" id="medialist" style="position: relative; overflow: hidden;">
                                                    <?php if(!empty($imgs)) foreach ($imgs as $key => $val){?>
                                                        <li class="image isotope-item">
                                                            <a href = "" data-link = "<?php echo $val['FileName']?>"  class = "cboxElement">
                                                            <img alt = ""src = "http://localhost/DATN/media/123/_thumbs/<?php echo $val['FileName']?>"></a>
                                                            <span class = "filename"><a class="icon-trash"></a></span>
                                                        </li>
                                                    <?php }?>
                                                    </ul>
                                                </div>
					<div class="form-actions">
						<button class="btn blue" data-ids="<?php echo $products['ProID']?>" id="save" type="button">
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
        finder.BasePath = '<?php echo site_url() ?>index.php/ckfinder/';
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
        html += '<span class = "filename"><a class="icon-trash"></a></li>';
        $('#imges').append(html);
        return false;
    }
</script>
<script type="text/javascript"
	src="<?php echo site_url() ?>/index.php/ckfinder/ckfinder_v1.js"></script>
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
                var stt = $("input[name='stt1']:checked").val();
                var id = $('button#save').attr('data-ids');
                var cat = $("#cat").val();
                var objEditor = CKEDITOR.instances["demo"];
                var descr = objEditor.getData();
                
                var array_anh = [];
                 $('#imges').each(function() {
                     var link = '';
                     $(this).find('li').each(function() {
                         var current = $(this);
                         var link = current.children('a').attr('data-link');
                         array_anh.push(link);
                     });
                 });console.log(array_anh);
                $.ajax({
                    type: "POST",
                    data: {
                    	proname: proname,
                        price: price,
                        quantity: quantity,
                        cat: cat,
                        descr: descr,
                        id: id,
                        imgs: array_anh,
                        stt: stt
                    },
                    dataType: 'json',
                    url: '',
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
                                        if(!data.error)
                                        location.reload(); 
                                        // local.href = <?php //echo  base_url().'dashboard/product_create'; ?>;
                                    }
                                }]
                        });
                        appen_error(data.error);
                    }
                });
            }
        });

    });
    jQuery(document).ready(function() {
        //$("#standardc").customselect();
    });

</script>