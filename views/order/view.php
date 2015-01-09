<div class="row-fluid">
    <div class="span12">
        <?php if (!empty($orders)) { ?>
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-comments"></i>Danh sách hóa đơn</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div id="content" class="portlet-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Mã HĐ</th>
                                <th>Ngày lập hóa đơn</th>
                                <th>Ngày gửi hàng</th>
                                <th class="hidden-480">Khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Tình trạng</th>
                                <th class="hidden-480">Xem</th>
                                <th class="">Xóa</th>
                            </tr>
                        </thead>
                        <?php $i = 1;
                        foreach ($orders as $key => $value) : ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $value['OrdID'] ?></td>
                                    <td><?php echo $value['OrdDate'] ?></td>
                                    <td><?php echo $value['OrdShipDate'] ?></td>
                                    <td><?php echo $value['OrdCus'] ?></td>
                                    <td class="hidden-480"><?php echo $value['OrdAdd'] ?></td>
                                    <td><?php echo $value['OrdTotal'] ?></td>
                                    <td><?php echo check_stt_ord($value['OrdStt']) ?></td>
                                    <td data-id="<?php echo $value['OrdID']?>"><span class="icon-search"></span></td>
                                    <td ><?php if($value['OrdStt'] == 1) echo '<span class="icon-trash"></span>';?></td>
                                </tr>
                            </tbody>
                        <?php $i++;endforeach; ?>
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
    });
    jQuery(document).on('click', 'span.icon-search', function() {
    	var id = $(this).parent().attr('data-id');
    	window.open(
    	  '<?php echo base_url('order/orderdetail');?>'+'/'+id,
    	  '_blank' 
    	);

    	
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