<main >
        <div class="container">
            <div class="page_cart">
                <h1 class="cart_heading">GIỎ HÀNG CỦA TÔI (<?php echo $sqlCountCart;?> SẢN PHẨM)</h1>
                <div class="page_cart_row_head">
                    <span class="page_cart_item_head page_cart_img">HÌNH ẢNH</span>
                    <span class="page_cart_item_head page_cart_name">TÊN SẢN PHẨM</span>
                    <span class="page_cart_item_head page_cart_price">GIÁ</span>
                    <span class="page_cart_item_head page_cart_quantity">SỐ LƯỢNG</span>
                    <span class="page_cart_item_head page_cart_sum">THÀNH TIỀN</span>
                </div>
                <?php
                if($sqlSelectCart):
                    foreach($sqlSelectCart as $item):
                
                ?>
                <div class="page_cart_row_body">
                    <span class="page_cart_item_img page_cart_img"><img src="../../../thuedo/template/img/<?php echo $item['image']?>" alt=""></span>
                    <span class="page_cart_item_name page_cart_name"><?php echo $item['name']?></span>
                    <span class="page_cart_item_price page_cart_price"><?php echo $item['price']?></span>
                    <span class="page_cart_item_quantity page_cart_quantity">
                        <a href="?mod=cart&act=reduce&id_product=<?php echo $item['id']?>&id_user=<?php echo $id_user?>">-</a>
                        <span><?php echo $item['quantity']?></span>
                        <a href="?mod=cart&act=increase&id_product=<?php echo $item['id']?>&id_user=<?php echo $id_user?>">+</a>
                    </span>
                     <a href="?mod=cart&act=delete&id_product=<?php echo $item['id']?>&id_user=<?php echo $id_user?>"><span class="page_cart_item_sum page_cart_sum"><?php echo $item['quantity']*$item['price']?> <img src="../../../thuedo/template/icon/delete.svg" alt=""></span></a>
                </div>
                <?php
                    endforeach;
                endif;
                ?>
                
                
                <div class="page_cart_btn">
                    <a  href="?mod=page&act=dashboard&id=<?php echo $id_user?>">TIẾP TỤC MUA SẮM</a>
                    <a href="?mod=page&act=dashboard&id=<?php echo $id_user?>">THANH TOÁN</a>
                </div>
            </div>
                
        </div>
        
    </main>