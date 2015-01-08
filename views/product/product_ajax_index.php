<?php if (!empty($products)) { ?>
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
        <?php foreach ($products as $key => $value) : ?>
            <tbody>
                <tr>
                    <td><?php echo $start + 1; ?></td>
                    <td><a href="<?php echo base_url() . 'product/detail/' . $value['ProID'] ?>"><?php echo $value["ProName"]; ?></a></td>
                    <td value="<?php echo $value['CateID'] ?>" class="numeric"><?php echo $value['CateName']; ?></td>
                    <td class=""><?php echo $value["ProDesc"]; ?></td>
                    <td class="numeric"><?php echo $value["ProPrice"]; ?></td><td><img src="<?php echo base_url() ?>media/123/_thumbs/<?php echo $value["ProPicName"]; ?>" alt=""></td>
                    <td id="block<?php echo $value['ProID'] ?>"><?php echo check_stt($value["ProStt"])?></td>
                    <td data-id="<?php echo $value['ProID'] ?>"><span class="icon-edit"></span></td>
                    <td data-no="<?php echo $start + 1; ?>" data-id="<?php echo $value['ProID'] ?>"><span class="icon-trash"></span></td>
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

