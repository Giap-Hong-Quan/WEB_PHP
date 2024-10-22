<main >
        <div class="container">
            <section class="home__container">
                <h2 class="home__heading">Sản phẩm best-seller</h2>
                <div class="home_product">
                    <?php 
                    if($productBrand):
                        foreach($productBrand as $item):
                    ?>
                    <article class="product__item">
                        <div class="product__item-img-wrap">
                            <a href="?mod=page&act=detail&id_product=<?php echo $item['id']?>&id_user=<?php echo $id_user?>">
                                <img src="../template/img/<?php echo $item['image']?reset($item['image']):''?>" alt="" class="product__item-img">
                            </a>
                        </div>
                        <h3 class="product__item-heading">
                            <a href="?mod=page&act=detail&id_product=<?php echo $item['id']?>&id_user=<?php echo $id_user?>"><?php echo $item['name']?></a>
                        </h3>
                        <span class="product__item-brand"><?php
                                if($item['id_brand']==1){
                                    echo 'DIOR';
                                }elseif($item['id_brand']==2){
                                    echo 'GUCCI';
                                }elseif($item['id_brand']==3){
                                    echo 'CHANEL';
                                }
                        ?></span>
                        <span class="product__item-category"><?php
                                switch($item['id_category']){
                                    case 1:
                                        echo 'Thời trang';
                                        break;
                                    case 2:
                                        echo 'Nước hoa';
                                        break;
                                    case 3:
                                        echo 'Trang điễm';
                                        break;
                                    case 4:
                                        echo 'Chăm sóc da';
                                        break;
                                    case 5:
                                        echo 'Trang sức và Đồng hồ';
                                        break;
                            }

                        ?></span>
                        <div class="product__item-row">
                            <div class="product__item-price"><?php echo $item['price']?></div>
                            <div class="product__item-evaluate">
                                <a href="?mod=cart&act=add&id_product=<?php echo $item['id']?>&id_user=<?php echo $id_user;?>" class="product__item_cart"><img src="../../../thuedo/template/icon/cart.svg" alt=""></a>
                            </div>
                        </div>
                    </article>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </section>
                
        </div>
        
    </main>

