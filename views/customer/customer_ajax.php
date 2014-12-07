<?php if (!empty($customers)) { ?>
    <table id="table_product"
           class="table table-condensed table-hover">
        <thead class="flip-content">
            <tr>
                <th>STT</th>
                <th>Tài khoản</th>
                <th class="">Họ Tên</th>
                <th class="">Số điện thoại</th>
                <th class="hidden-480">Địa chỉ</th>
                <th class="hidden-480">Chỉnh sửa</th>
                <th class="">Xóa</th>
            </tr>
        </thead>
        <?php foreach ($customers as $key => $value) : ?>
            <tbody>
                <tr>
                    <td><?php echo $start + 1; ?></td>
                    <td><?php echo $value["CusUser"]; ?></td>
                    <td class=""><?php echo $value['CusName']; ?></td>
                    <td class="hidden-480"><?php echo $value["CusPhone"]; ?></td>
                    <td class="hidden-480"><?php echo $value["CusAdd"]; ?></td>
                    <td data-id="<?php echo $value['CusID'] ?>"><span
                            class="icon-edit"></span></td>
                    <td class=""data-no="<?php echo $start + 1; ?>"
                        data-id="<?php echo $value['CusID'] ?>"><span class="icon-trash"></span></td>
                </tr>
            </tbody>
            <?php $start++;
        endforeach; ?>
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

