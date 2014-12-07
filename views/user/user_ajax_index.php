<?php if (!empty($products)) { ?>
<table id="product_table"
	class="table-bordered table-striped table-condensed flip-content">
	<thead class="flip-content">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th class="numeric">Category</th>
			<th class="numeric">Description</th>
			<th class="numeric">Price</th>
			<th class="numeric">Change</th>
			<th class="numeric">Delete</th>
		</tr>
	</thead>
					 <?php	$cats; $i = 1; foreach ( $products as $key => $value ) :?>
					<tbody>
		<tr>
			<td>AAC</td>
			<td><?php echo $value["ProName"]; ?></td>
			<td value="<?php echo $value['CateID']?>" class="numeric"><?php echo $cats[$value['CateID']]["name"]; ?></td>
			<td class=""><?php echo $value["ProDesc"]; ?></td>
			<td class="numeric"><?php echo $value["ProPrice"]; ?></td>
			<td data-id="<?php echo $value['CateID']?>"><span class="icon-edit"></span></td>
			<td data-id="<?php echo $value['CateID']?>"><span class="icon-trash"></span></td>
		</tr>
	</tbody>
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

