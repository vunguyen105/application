<div id="content">
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        <?php if (!empty($products)) foreach ($products as $k => $v) { ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?php echo base_url()?>media/123/<?php echo $v["ProPicName"]; ?>" alt="" />
                                <h2><?php echo $v['ProPrice'] ?></h2>
                                <p><?php echo $v['ProName'] ?></p>
                                 <a href="#" data-name="<?php echo $v['ProName']?>" data-pic="<?php echo $v['ProPicName']?>"data-id="<?php echo $v['ProID']?>" data-price="<?php echo $v['ProPrice']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>  
                    </div>
                </div>  

                <?php
            } else {
            echo 'Không có sản phẩm nào';
        }
        ?>
    </div><!--features_items-->
    <div class="" id="ajax_paging">
        <?php echo $pagination?>
    </div>
</div>
</div>
<script>
    jQuery(document).ready(function() {
        applyPagination();
    });

    function applyPagination() {
        $("#ajax_paging a").click(function() {
            if ($(this).attr('doclick') == '0') {
                return false;
            } else {
                var url = $(this).attr("href");
                $.ajax({
                    type: "POST",
                    data: {
                        ajax: 1
                    }, 
                    url: url,
                    beforeSend: function() {
                        //$('#global_ajax_processing').fadeIn('slow');
                    },
                    success: function(msg) {
                        // $('#global_ajax_processing').fadeOut('slow');
                        $("#content").html(msg);
                        applyPagination();
                    }
                });
            }
            return false;
        });
    }
</script>
</script>
 