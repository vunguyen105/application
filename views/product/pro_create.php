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
                    <i class="icon-reorder"></i>Tạo sản phẩm
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a> <a href="javascript:;"
                                                                    class="remove"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <div class="row-fluid">
                    <div class="span12 ">
                        <div class="control-group">
                            <label class="control-label">Tên sản phẩm:</label>
                            <div class="controls">
                                <input name="proname" type="text" class="m-wrap span12"
                                       placeholder="Tên sản phẩm">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <span>Kích thước:</span>
                <div class="row-fluid" id="size_list">
                    <?php if (!empty($sizes)) foreach ($sizes as $key => $value) : ?>
                            <div class="span1">
                                <div class="control-group">
                                    <label class="control-label" for=""><?php echo $value["SizeName"]; ?></label>
                                    <div class="controls">
                                        <input name="" data-size="<?php echo $value["SizeID"]?>" type="text" id="" class="m-wrap span12"
                                               placeholder="Số lượng">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>


                <div class="row-fluid">
                    <div class="span6 ">
                        <div class="control-group">
                            <label class="control-label">Nhóm của sản phẩm</label>
                            <div class="controls">
                                <select name="cat" id="cat" class="m-wrap span12">
                                    <option value=''>Chọn nhóm sản phẩm</option>
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
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span3 ">
                        <div class="control-group ">
                            <label class="control-label" for="">Giá Nhập</label>
                            <div class="controls">
                                <input name="priceIn" type="text" id="price" class="m-wrap span12"
                                       placeholder="Giá nhập">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="span3 ">
                        <div class="control-group ">
                            <label class="control-label" for="">Giá Bán</label>
                            <div class="controls">
                                <input name="price" type="text" id="price" class="m-wrap span12"
                                       placeholder="Giá bán">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row-fluid">

                    <div class="span3 ">
                        <div class="control-group">
                            <label class="control-label">Hiển thị</label>
                            <div class="controls">
                                <label class="radio"> <input type="radio"
                                                             name="stt1" value="1" checked /> Có
                                </label>
                                <label class="radio"> <input type="radio" name="stt1"
                                                             value="0" /> Không
                                </label> 
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="span3 ">
                        <div class="control-group">
                            <label class="control-label">Sản phẩm mới</label>
                            <div class="controls">
                                <label class="radio"> <input type="radio"
                                                             name="stt2" value="1" checked /> Có	
                                </label>
                                <label class="radio"> <input type="radio" name="stt2"
                                                             value="0" /> Không
                                </label> 
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="row-fluid tab-content" id="content">
                        <textarea id="demo" name="demo"></textarea>
                    </div>
                    <?php echo $ckediter; ?>
                    <hr class="clearfix"> 
                    <div id="ufile" class="btn-group">
                        <button type="button"id="ufile" name="ufile" onclick="BrowseServer()" class="btn blue"><i class="icon-plus"></i> Quản lý ảnh</button>
                    </div>
                    <hr class="clearfix">
                    <div class="row-fluid">
                        <ul id="imges" class="listfile isotope" id="medialist" style="position: relative; overflow: hidden;">
                        </ul>
                    </div>
                    <div class="form-actions">
                        <button class="btn blue" id="save" type="button">
                            <i class="icon-ok"></i> Save
                        </button>
                        <button class="btn" type="button">Cancel</button>
                    </div>
                    </form>

                </div>
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
            html += '<a href = ""  class = "cboxElement">';
            html += '<img alt = ""src = "' + link + '"></a>';
            html += '<span class = "filename"><a class="icon-trash"></a></span></li>';
            $('#imges').append(html);
            return false;
        }

        //    function filename_edit(filename) {
        //        if(filename.length > 10) {
        //            var filename = filename.substring(0, 6);
        //            filename += '.jpg';
        //        }    
        //        return filename;
        //    }
    </script>
    <script type="text/javascript"
    src="<?php echo site_url() ?>/index.php/ckfinder/ckfinder_v1.js"></script>
    <script>
        jQuery(document).on('click', 'a.icon-trash', function () {
            $(this).parent().parent().remove();
            return  false;
        });
        jQuery(document).on('click', "#save", function () {
            var array_val = [];
            var array_size = [];
            $('#size_list').each(function () {
                $(this).find('div.control-group div.controls').each(function () {
                        var current = $(this);
                        var val = current.children('input').val();
                        var size = current.children('input').attr('data-size');
                        array_val.push(val);
                        array_size.push(size);
                    });
            });
            alert(array_size);
            BootstrapDialog.confirm('Thông báo', 'Bạn muốn thêm sản sản phẩm này', function (result) {
                if (result) {
                    var proname = $("input[name='proname']").val();
                    var price = $("input[name='price']").val();
                    var priceIn = $("input[name='priceIn']").val();
                    var quantity = $("input[name='quantity']").val();
                    var stt = $("input[name='stt1']:checked").val();
                    var stt2 = $("input[name='stt2']:checked").val();
                    var cat = $("#cat").val();
                    var objEditor = CKEDITOR.instances["demo"];
                    var descr = objEditor.getData();
                    var array_anh = [];
                    $('#imges').each(function () {
                        var link = '';
                        $(this).find('li').each(function () {
                            var current = $(this);
                            var link = current.children('a').attr('data-link');
                            array_anh.push(link);
                        });
                    });
                    $.ajax({
                        type: "POST",
                        data: {
                            proname: proname,
                            price: price,
                            priceIn:priceIn,
                            quantity: quantity,
                            cat: cat,
                            descr: descr,
                            imgs: array_anh,
                            stt: stt,
                            stt2: stt2,
                            array_size: array_size,
                            array_val: array_val
                        },
                        dataType: 'json',
                        url: 'product_create',
                        beforeSend: function () {
                        },
                        success: function (data) {

                            BootstrapDialog.show({
                                title: 'Thông báo',
                                message: data.msg,
                                buttons: [{
                                        label: 'OK',
                                        cssClass: 'btn green',
                                        hotkey: 13, // Enter.
                                        action: function () {
                                            BootstrapDialog.closeAll();
                                            if (data.stt == 0) {
                                                location.href = '<?php echo base_url() . 'product/product_create' ?>';
                                            }
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
