<main>
        <div class="container">
            <div class="detail">
                <div class="detail_img">
                    <div class="detail_img_main">
                        <img src="../template/img/nuochoa.webp" alt="">
                    </div>
                    <div class="detail_img_extra">
                    <?php
                    if($sqlImageDetail):
                    foreach($sqlImageDetail as $item):
                    ?>
                        <img src="../template/img/<?php echo $item['image']?>" alt="">
                    <?php
                        endforeach;
                    endif;
                    ?>
                    </div>
                </div>
                <?php
                if($sqlSelectDetail):
                  
                ?>
                <div class="detail_content">
                    <div class="detail_content_product">
                        <h1 class="detail_content_product_brand"><?php
                        switch($sqlSelectDetail['id_brand']){
                            case 1:
                                echo 'DIOR';
                                break;
                            case 2:
                                echo 'GUCCI';
                                break;
                            case 3:
                                echo 'CHANEL';
                                break;
                        }
                        ?></h1>
                        <h2 class="detail_content_product_name"><?php echo $sqlSelectDetail['name']?></h2>
                        <span class="detail_content_product_ma"><?php echo $sqlSelectDetail['id']?></span>
                        <span class="detail_content_product_price"><?php echo $sqlSelectDetail['price']?>đ</span>
                        <span class="detail_content_product_desc"><?php echo $sqlSelectDetail['description']?></span>
                        <span class="detail_content_product_sale">Promotion:Mã giảm giá</span>
                        <span class="detail_content_product_time">Gọi đặt mua:0335906088(7:30 - 22:00)</span>
                        <span class="detail_content_product_ship">Vận chuyển:Freeship Hà Nội & HCM</span>
                        <a href="?mod=cart&act=add&id_product=<?php echo $sqlSelectDetail['id']?>&id_user=<?php echo $id_user;?>" class="btn_cart">THÊM VÀO GIỎ</a>
                    </div>
                    <div class="detail_content_ship">
                        <span class="detail_content_ship_item"><img class="ship_icon" src="../template/icon/shop.svg" alt="">  NOVA</span>
                        <span class="detail_content_ship_item"><img class="ship_icon" src="../template/icon/verify.svg" alt="">  Gian hàng đảm bảo</span>
                        <span class="detail_content_ship_item"><img class="ship_icon" src="../template/icon/checkbox.svg" alt="">  Miễn phí đổi trả trong 7 ngày </span>
                        <span class="detail_content_ship_item"><img class="ship_icon" src="../template/icon/checkbox.svg" alt="">  Kiểm tra hàng trước khi nhận</span>
                        <span class="detail_content_ship_item"><img class="ship_icon" src="../template/icon/checkbox.svg" alt="">  Hoàn tiền nếu phát hiện hàng giả </span>
                        <button class="btn_home">XEM SHOP</button>
                        <span class="detail_content_ship_item">Mua hàng đến với NOVA</span>
                    </div>
                </div>
                <?php
                endif;
                ?>
            </div>
    
        </div>
    </main>