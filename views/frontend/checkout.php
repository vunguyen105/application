<script src="<?php echo base_url(); ?>assets/dialog/run_prettify.js"></script>
<link href="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/dialog/bootstrap-dialog.js"></script>
<script src="<?php echo base_url(); ?>assets/dialog/handler_keypress.js"></script>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-6">
                    <div class="shopper-info">
                        <p>Thông tin đặt hàng</p>
                        <form>
                            <input name="OrdCus" type="text" placeholder="Tên người nhận">
                            <input name="OrdAdd" type="text" placeholder="Địa chỉ giao hàng">
                            <input name="OrdPhone"type="text" placeholder="Số điện thoại">
                            <select name="PayID" id="PayID">
                                <option>-Phương thức thanh toán -</option>
                                <option value="2">United States</option>
                                <option value="3">Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            <br>
                        </form>
                        <a class="btn btn-primary" href="">Quay lại giỏ hàng</a>
                        <a id="check_out"class="btn btn-primary">Gửi đơn hàng</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="order-message">
                        <p>Ghi chú đơn hàng</p>
                        <textarea name="message"  placeholder="Ghi chú đơn hàng" rows="10"></textarea>

                    </div>	
                </div>					
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="cart_list">
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>

                        <tr id="<?php echo $items['rowid'] ?>">
                            <td class="cart_product">
                                <a href=""><img src="<?php echo base_url() . 'media/123/' . $items['pic'] ?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $items['name'] ?></a></h4>
                                <p>Web ID: <?php echo $items['id'] ?></p>
                            </td>
                            <td class="cart_price">
                                <p><?php echo $items['price'] ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <input data-price="<?php echo $items['price'] ?>" data-row="<?php echo $items['rowid'] ?>" class="cart_quantity_input" type="text" name="quantity" value="<?php echo $items['qty'] ?>" autocomplete="off" size="2">

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php echo $items['price'] * $items['qty']; ?></p>
                            </td>
                            <td class="cart_delete" data-id="<?php echo $items['rowid'] ?>">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>

                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>qty</td>
                                    <td><?php echo $this->cart->total_items(); ?></td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td></td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span><?php echo $this->cart->total(); ?></span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<script>
    jQuery(document).on('click', 'a#check_out', function () {
        var PayID = $("#PayID").val();
        var OrdCus = $("input[name='OrdCus']").val();
        var OrdAdd = $("input[name='OrdAdd']").val();
        var OrdPhone = $("input[name='OrdPhone']").val();
        var message = $("textarea[name='message']").val();


        var array_val = [];
        var array_row = [];
        var array_price = [];
        $('#cart_list').each(function () {
            //var id = $(this).find('tr').attr('id');
            //array_anh.push(id);
            var link = '';
            $(this).find('tr').each(function () {
                $(this).find('td.cart_quantity').each(function () {
                    var current = $(this);
                    var cu = current.children('div.cart_quantity_button');
                    var val = cu.children('input').val();
                    var row = cu.children('input').attr('data-row');
                    var price = cu.children('input').attr('data-price');
                    array_val.push(val);
                    array_row.push(row);
                    array_price.push(price);
                });
            });
        });
        var flag = true;
        var msg;
        if (PayID, OrdCus, OrdPhone, OrdAdd) {
            if (checkNumber(OrdPhone)) {
                $.ajax({
                    type: "POST",
                    data: {
                        row: array_row,
                        val: array_val,
                        price: array_price,
                        PayID: PayID,
                        CusId: <?php echo $this->session->userdata['CusID']; ?>,
                        OrdCus: OrdCus,
                        OrdAdd: OrdAdd,
                        OrdPhone: OrdPhone,
                        message: message,
                    },
                    dataType: 'json',
                      url: 'check_out',
                    success: function (data) {
                        BootstrapDialog.show({
                            title: 'Thông báo',
                            message: data.msg,
                            buttons: [{
                                    label: 'OK',
                                    cssClass: 'btn green',
                                    hotkey: 13, // Enter.
                                    action: function () {
                                        BootstrapDialog.closeAll();

                                    }
                                }]
                        });
                    }
                });
            } else {
                flag = false;
                msg = 'Số điện thoại bạn nhập vào phải là số';
            }
        } else {
            flag = false;
            msg = 'Bạn chưa nhập dữ liệu';
        }

        if (flag != true) {
            BootstrapDialog.show({
                title: 'Thông báo',
                message: msg,
                buttons: [{
                        label: 'OK',
                        cssClass: 'btn green',
                        hotkey: 13, // Enter.
                        action: function () {
                            BootstrapDialog.closeAll();
                           // location.href = '<?php //echo  base_url().'home/checkout'?>';
                        }
                    }]
            });
        }
    })
</script>