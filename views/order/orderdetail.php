<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption"><i class="icon-globe"></i>Chi tiết hóa đơn</div>
								<div class="tools">
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
									
                                                                            <tbody><?php if(!empty($order)) {?>
										<tr>
                                                                                    <td colspan="4"><b>Chi tiết hóa đơn</b></td>
										</tr>
										<tr >
                                                                                    <td>Mã hóa đơn</td>
                                                                                    <td colspan="3"><?php echo $order['OrdID'] ?></td>
										</tr>
                                                                                <tr >
                                                                                    <td>Tên người mua</td>
                                                                                    <td colspan="3"><?php echo $order['CusName'] ?></td>
										</tr>
                                                                                <tr >
                                                                                    <td>Tên người nhận hàng</td>
                                                                                    <td colspan="3"><?php echo $order['OrdCus'] ?></td>
										</tr>
                                                                                <tr >
                                                                                    <td>Địa chỉ nhận</td>
                                                                                    <td colspan="3"><?php echo $order['OrdAdd'] ?></td>
										</tr>
                                                                                <tr >
                                                                                    <td>Ngày giao hàng</td>
                                                                                    <td colspan="3"><?php echo $order['OrdShipDate'] ?></td>
										</tr>
                                                                                <tr >
                                                                                    <td>Tổng tiền</td>
                                                                                    <td colspan="3"><?php echo $order['OrdTotal'] ?></td>
										</tr>
                                                                                <tr >
                                                                                    <td>Trạng thái hóa đơn</td>
                                                                                    <td colspan="3"><?php echo check_stt_ord($order['OrdStt']) ?></td>
										</tr>
                                                                                <?php }?>
                                                                                <?php if(!empty($orderdetail)) {?>
										<tr >
                                                                                    <td colspan="4"><b>Danh sách sản phẩm chọn mua</b></td>
										</tr>
                                                                                
										<tr >
                                                                                        <td><b>Tên sản phẩm</b></td>
											<td><b>Kích thước</b></td>
											<td class="hidden-480"><b>Số lượng</b></td>
											<td class="hidden-480"><b>Tổng tiền</b></td>
										</tr>
                                                                                <?php foreach ($orderdetail as $k => $v) :?>
										<tr >
											<td><?php echo  $v['ProName']?></td>
											<td><?php echo  $v['SizeName']?></td>
											<td><?php echo  $v['OrdQuantity']?></td>
                                                                                        <td><?php echo  $v['OrdQuantity']*$v['OrdPrice']?></td>
										</tr>
                                                                                <?php endforeach;?>
                                                                                <?php }?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>