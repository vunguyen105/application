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
            <div class="portlet-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã hóa đơn</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Ngày gửi hàng</th>
                            <th class="hidden-480">Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng</th>
                            <th class="hidden-480">Xem</th>
                            <th class="">Xóa</th>
                        </tr>
                    </thead>
                    <?php $i = 1; foreach ( $orders as $key => $value ) :?>
                    <tbody>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['OrdDate'] ?></td>
                            <td><?php echo $value['OrdShipDate'] ?></td>
                            <td><?php echo $value['OrdCus'] ?></td>
                            <td class="hidden-480"><?php echo $value['OrdAdd'] ?></td>
                            <td><span class="label label-success">Hoàn thành</span></td>
                            <td><span class="icon-search"></span></td>
                            <td ><span class=""></span></td>
                        </tr>
                    </tbody>
                    <?php $i++; endforeach; ?>
                </table>
            </div>
        </div>
        <?php }?>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>