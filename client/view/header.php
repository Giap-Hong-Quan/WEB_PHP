<header>
        <div class="container">
            <div class="header_info">
                    <img class="logo" src="../template/img/nova.png" alt="">
                    <nav class="navbar">
                        <ul class="navbar_list" >
                            <li><a  href="?mod=page&act=dashboard&id=<?php echo $id_user?>">Trang chủ</a></li>
                            <li class="navbar_brand"><a  href="#">Thương hiệu <img  src="../template/icon/down.svg" alt=""></a>
                                <ul class="navbar_list_brand" >
                                    <li class="navbar_item_brand"><a href="?mod=page&act=product&id_brand=1&id_user=<?php echo $id_user?>">Dior</a>
                                        <ul class="list_product_brand">
                                            <li><a href="?mod=page&act=product&id_brand=1&id_category=1&id_user=<?php echo $id_user?>">Thời trang</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=1&id_category=2&id_user=<?php echo $id_user?>">Nước hoa</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=1&id_category=3&id_user=<?php echo $id_user?>">Trang điểm</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=1&id_category=4&id_user=<?php echo $id_user?>">Chăm sóc da</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=1&id_category=5&id_user=<?php echo $id_user?>">Trang sức và đồng hồ</a></li>
                                        </ul>
                                    </li>
                                    <li class="navbar_item_brand"><a href="?mod=page&act=product&id_brand=2&id_user=<?php echo $id_user?>">Gucci</a>
                                        <ul class="list_product_brand">
                                            <li><a href="?mod=page&act=product&id_brand=2&id_category=1&id_user=<?php echo $id_user?>">Thời trang</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=2&id_category=2&id_user=<?php echo $id_user?>">Nước hoa</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=2&id_category=3&id_user=<?php echo $id_user?>">Trang điểm</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=2&id_category=4&id_user=<?php echo $id_user?>">Chăm sóc da</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=2&id_category=5&id_user=<?php echo $id_user?>">Trang sức và đồng hồ</a></li>
                                        </ul>
                                    </li>
                                    <li class="navbar_item_brand"><a href="?mod=page&act=product&id_brand=3&id_user=<?php echo $id_user?>">Chanel</a>
                                        <ul class="list_product_brand">
                                            <li><a href="?mod=page&act=product&id_brand=3&id_category=1&id_user=<?php echo $id_user?>">Thời trang</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=3&id_category=2&id_user=<?php echo $id_user?>">Nước hoa</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=3&id_category=3&id_user=<?php echo $id_user?>">Trang điểm</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=3&id_category=4&id_user=<?php echo $id_user?>">Chăm sóc da</a></li>
                                            <li><a href="?mod=page&act=product&id_brand=3&id_category=5&id_user=<?php echo $id_user?>">Trang sức và đồng hồ</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar_product" ><a  href="#">Danh mục <img  src="../template/icon/down.svg" alt=""></a>
                                <ul class="navbar_list_product">
                                    <li><a href="?mod=page&act=product&id_category=1&id_user=<?php echo $id_user?>">Thời trang</a></li>
                                    <li><a href="?mod=page&act=product&id_category=2&id_user=<?php echo $id_user?>">Nước hoa</a></li>
                                    <li><a href="?mod=page&act=product&id_category=3&id_user=<?php echo $id_user?>">Trang điểm</a></li>
                                    <li><a href="?mod=page&act=product&id_category=4&id_user=<?php echo $id_user?>">Chăm sóc da</a></li>
                                    <li><a href="?mod=page&act=product&id_category=5&id_user=<?php echo $id_user?>">Trang sức và đồng hồ</a></li>
                                </ul>
                            </li>
                            <li ><a  href="#">Giới thiệu</a></li>
                        </ul>
                    </nav>
                <div class="search">
                    <form class="header_search" action="?mod=page&act=search&id_user=<?php echo $id_user?>" method='post'>
                            <input class="header_search_input" type="text" name="search" id="search" placeholder="Nhập thông tin tìm kiếm" >
                            <input type="hidden" name="id_user" value="<?php echo $id_user?>">
                            <button class="header_search_button" type="submit"> <img src="../template/icon/search.svg" alt=""></button>
                    </form>
                </div>
                <div class="user-cart">
               
                    <a class="cart" href="?mod=cart&act=list&id_user=<?php echo $id_user?>">
                        <img src="../template/icon/cart.svg" alt=""><span class="cart_quantity"><?php echo $sqlCountCart?></span>
                    </a>
                    <div class="list-cart">
                        <?php                    
                         if($sqlSelectCart):
                            foreach($sqlSelectCart as $item):
                        ?>
                        <div class="list-cart-item">    
                            <div class="cart-item-info">
                                <div class="cart-item-name"><?php echo $item['name']?></div>
                                <div class="cart-item-sl">SL:<?php echo $item['quantity']?></div>
                                <div class="cart-item-price">Giá:<?php echo $item['price']?> đ</div>
                            </div>
                            <div class="cart-item-img">
                                <img src="../template/img/<?php echo $item['image']?>" alt="">
                            </div>
                        </div>
                        <hr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    <a href="?mod=cart&act=list&id_user=<?php echo $id_user?>" class="cart-item-btn">Xem giỏ hàng</a>
                    </div>
                    
                </div>
                <div class="avatar">
                    <a class="avatar" href="">
                        <?php
                        if($sqlUser):
                        ?>
                        <img id="myBtn" src="../template/img/<?php echo !empty($sqlUser['avatar'])?$sqlUser['avatar']:'avatar.png'?>" alt="">
                    </a>
                    
                </div>
            </div>
        </div>
        



<div id="myModal" class="modal">

<div class="modal-content">
  <span class="close">&times;</span>
  <div class="modal_item">
    <img class="modal_img" src="../template/img/<?php echo !empty($sqlUser['avatar'])?$sqlUser['avatar']:'avatar.png'?>" alt="">
    <div class="modal_info">
        <h2 class="modal_heading">Thông tin của tôi</h2>
        <div class="modal_name">Tên:<?php echo $sqlUser['name']?></div>
        <div class="modal_email">Email:<?php echo $sqlUser['email']?></div>
        <?php if ($sqlUser['admin'] == 1): ?>
        <a class="btn_admin" href="../admin/?mod=product&act=list">ADMIN</a>
        <?php endif; ?>

        <a class="btn_logout" href="../client/?mod=user&act=login">Đăng xuất</a>
    </div>
  </div>
</div>

</div>
<?php
endif;
?>
</header>
