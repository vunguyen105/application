<?php if (!empty($products)) { ?>
<table id="table_product"
	class="table-bordered table-striped table-condensed flip-content">
	<thead class="flip-content">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th class="numeric">Category</th>
			<th class="numeric">Description</th>
			<th class="numeric">Price</th>
                        <th>Image</th>
			<th class="numeric">Change</th>
			<th class="numeric">Delete</th>
		</tr>
	</thead>
		<?php foreach ( $products as $key => $value ) :?>
	<tbody>
		<tr>
			<td><?php echo $start + 1;?></td>
			<td><?php echo $value["ProName"]; ?></td>
			<td value="<?php echo $value['CateID']?>" class="numeric"><?php echo $value['CateName']; ?></td>
			<td class=""><?php echo $value["ProDesc"]; ?></td>
			<td class="numeric"><?php echo $value["ProPrice"]; ?></td><td><img src="<?php echo base_url()?>media/123/_thumbs/<?php echo $value["ProPicName"]; ?>" alt=""></td>
			<td data-id="<?php echo $value['ProID']?>"><span class="icon-edit"></span></td>
			<td data-no="<?php echo $start + 1;?>" data-id="<?php echo $value['ProID']?>"><span class="icon-trash"></span></td>
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

