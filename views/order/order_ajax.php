<?php if (!empty($orders)) { ?>
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
    <?php foreach ( $orders as $key => $value ) :?>
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
    <?php $start++; endforeach; ?>
</table>
<div class="row-fluid">
	<div class="" id="ajax_paging">
		<span style="float: right;" class="dataTables_info" id="sample_1_info">Có tất cả <?php echo $count; ?> dòng dữ liệu</span>
                                <?php echo $pagination; ?>
                        </div>

</div>
<?php }else { ?>
<div id="data">
	<p>Không tìm thấy kết quả nào!</p>
</div>
<?php } ?>