<?php if (!empty($news)) { ?>
<table id="table_product"
	class="table-bordered table-striped table-condensed flip-content">
	<thead class="flip-content">
			<tr>
				<th class="numeric">NewID</th>
				<th class="numeric">NewTitle</th>
				<th class="numeric">NewDate</th>
				<th class="numeric">NewContent</th>
				<th class="numeric">NewPicName</th>
                <th class="numeric">NewSource</th>
				<th class="numeric">NewDesc</th>
			</tr>
	</thead>
		<?php foreach ( $news as $key => $value ) :?>
	<tbody>
		<tr>
			<td><?php echo $value["NewID"];?></td>
			<td><?php echo $value["NewTitle"]; ?></td>
			<td class="numeric"><?php echo $value['NewDate']; ?></td>
			<td class=""><?php echo $value["NewContent"]; ?></td>
			<td class="numeric"><?php echo $value["NewPicName"]; ?></td>
            <td class="numeric"><img src="<?php echo $value["NewSource"]; ?>" width="100px" height="100px"  /></td>
            <td class="numeric"><?php echo $value["NewDesc"]; ?></td>
			<td data-id="<?php echo $value['NewID']?>"><span class="icon-edit"></span></td>
			<td data-no="<?php echo $start + 1;?>" data-id="<?php echo $value['NewID']?>"><span class="icon-trash"></span></td>
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

