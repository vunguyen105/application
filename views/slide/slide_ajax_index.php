<?php if (!empty($slides)) { ?>
<table id="table_product"
	class="table-bordered table-striped table-condensed flip-content">
	<thead class="flip-content">
			<tr>
							<th class="numeric">SlideID</th>
							<th class="numeric">SlideTitle</th>
							<th class="numeric">SlideDate</th>
							<th class="numeric">SlideContent</th>
							<th class="numeric">SlidePicName</th>
						</tr>
	</thead>
		<?php foreach ( $slides as $key => $value ) :?>
	<tbody>
		<tr>
			<td><?php echo $value["SlideID"];?></td>
			<td><?php echo $value["SlideTitle"]; ?></td>
			<td class="numeric"><?php echo $value['SlideDate']; ?></td>
			<td class=""><?php echo $value["SlideContent"]; ?></td>
			<td class="numeric"><?php echo $value["SlidePicName"]; ?></td>
			<td data-id="<?php echo $value['SlideID']?>"><span class="icon-edit"></span></td>
			<td data-no="<?php echo $start + 1;?>" data-id="<?php echo $value['SlideID']?>"><span class="icon-trash"></span></td>
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

