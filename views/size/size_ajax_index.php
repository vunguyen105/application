<?php if (!empty($size)) { ?>
    <table class="table table-striped table-bordered table-hover" id="table_user">
        <thead>
            <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                <th>SizeID</th>
                <th class="hidden-480">Size name</th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($size as $key => $value):
                ?> 
                <tr class="odd gradeX">
                    <td style="width:8px;"><input type="checkbox" class="checkboxes" value="1" /></td>
                    <td style="width:8px;"><?php echo $value["SizeID"]; ?></td>
                    <td class="hidden-480"><?php echo $value["SizeName"]; ?></td>
                    <td data-id="<?php echo $value['SizeID']?>">
                        <span class="icon-edit"></span>
                        <span class="icon-trash"></span>
                    </td>
                </tr>
            <?php endforeach; ?>
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

