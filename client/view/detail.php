<main>
        <div class="container">
            <div class="detail">
            <div class="detail_img">
    <div class="detail_img_main">
        <!-- Hiển thị ảnh đầu tiên của mảng khi mới vào -->
        <img id="mainImage" 
             src="../template/img/<?php echo $sqlImageDetail[0]['image']; ?>" 
             alt="Ảnh sản phẩm">
    </div>
    <div class="detail_img_extra">
        <?php if ($sqlImageDetail): ?>
            <?php foreach ($sqlImageDetail as $item): ?>
                <!-- Mỗi ảnh nhỏ có sự kiện onclick để thay đổi ảnh lớn -->
                <img src="../template/img/<?php echo $item['image'] ?>" alt="" onclick="changeMainImage(this)">
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
                <?php
                if($sqlSelectDetail):
                  
                ?>
                <div class="detail_content">
                    <div class="detail_content_product">
                        <h1 class="detail_content_product_brand">Thương Hiệu :<?php
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
                        <span class="detail_content_product_ma">Mã Sản Phẩm :<?php echo $sqlSelectDetail['id']?></span>
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
    <script>
    function changeMainImage(smallImg) {
        // Thay đổi src của ảnh lớn thành src của ảnh nhỏ được nhấp vào
        const mainImage = document.getElementById("mainImage");
        mainImage.src = smallImg.src;
    }
    </script>