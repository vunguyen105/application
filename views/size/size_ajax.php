<?php if (!empty($sizes)) { ?>
    <table id="table_product"
           class="table table-condensed table-hover">
        <thead class="flip-content">
            <tr>
				<th>SizeID</th>
				<th class="hidden-480">Size name</th>
				<th class="hidden-480">Chỉnh sửa</th>
				<th class="">Xóa</th>
			</tr>
        </thead>
        <?php foreach ($sizes as $key => $value) : ?>
            <tbody>
                <tr>
						<td><?php echo $value["SizeID"]; ?></td>
						<td class="hidden-480"><?php echo $value["SizeName"]; ?></td>
                        <td class="hidden-480" data-id="<?php echo $value['SizeID']?>"><span class="icon-edit"></span></td>
						<td data-no="<?php echo $start + 1; ?>"
							data-id="<?php echo $value['SizeID']?>"><span class="icon-trash"></span></td>
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

