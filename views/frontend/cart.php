<section id="cart_items">
    <div class="container">
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

                                    <input data-row="<?php echo $items['rowid'] ?>" class="cart_quantity_input" type="text" name="quantity" value="<?php echo $items['qty']?>" autocomplete="off" size="2">

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

                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Bạn muốn đặt hàng trực tuyến?</h3>
            <p>Lựa chọn và điền thông tin liên lạc của bạn để chúng tôi tiện giao dịch.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng giá trị giỏ hàng<span><?php echo $this->cart->total(); ?></span></li>
                        <li>Số lượng hàng<span><?php echo $this->cart->total_items(); ?></span></li>
                    </ul>
                    <button class="btn btn-default update">Update</button>
                    <a class="btn btn-default check_out" href="#">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
<script>
    jQuery(document).on('click', 'td.cart_delete', function () {
        var value = $(this).attr('data-id');
        var that = $(this);

        BootstrapDialog.confirm('Thông báo', 'Bạn muốn xóa sản phẩm này khỏi giỏ hàng', function (result) {
            if (result) {
                $('tr#' + value).empty();
                $.ajax({
                    type: "POST",
                    data: {
                        id: value
                    },
                    dataType: 'json',
                    url: '<?php echo base_url() ?>home/update_shop',
                    beforeSend: function () {
                    },
                    success: function (data) {
                        $('tr#' + value).empty();
                    }
                });
            }
        });

        return false;
    });

    jQuery(document).on('click', 'a.check_out', function () {
        window.location.href = '<?php echo base_url() . 'home/checkout' ?>';
    })

    jQuery(document).on('click', 'button.update', function () {
        var array_anh = [];
        var array_row = []; 
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
                    array_anh.push(val);
                    array_row.push(row);
                });
            });
        });
        
        $.ajax({
                    type: "POST",
                    data: {
                    	row: array_row,
                        val: array_anh
                    },
                    dataType: 'json',
                    url: 'update_cart',
                    success: function(data) { 
                         location.reload(); 
                    }
                });
               
    })

</script>