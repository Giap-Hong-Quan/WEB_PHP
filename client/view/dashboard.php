


<div id="toast">
        <?php echo isset($smg)?$smg:''?>
    </div>

    <main>
        <div class="container">
       
            <div class="banner">
                <img class="banner1" src="../../../thuedo/template/img/banner1.png" alt="">
                <img class="banner1" src="../../../thuedo/template/img/banner2.png" alt="">
                <img class="banner1" src="../../../thuedo/template/img/banner3.png" alt="">
            </div>


            <section class="home__container">   
                <h2 class="home__heading">Thương hiệu</h2>
               
                <div class="home__brand">
                    <!-- categories item1 -->
                    <?php
                    if(!empty( $sqlListBrand)):
                        foreach($sqlListBrand as $item):
                    ?>
                        <a href="product-page.html">
                            <article class="brand__item">
                             <img src="../template/img/<?php echo $item['image']?>" alt="sp1" class="cate__item-img">
                             <section class="brand__item-info">
                                 <h3 class=" brand__item-heading"><?php echo $item['name']?></h3>
                                 <span class="brand__item-desc"><?php echo $item['depcription']?></span>
                             </section>
                            </article>
                        </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </section>

            <section class="home__container">
                <h2 class="home__heading">Sản phẩm bán chạy</h2>
                <div class="hom_product_hot">
                    <button class="prev"><img src="../template/icon/prev.svg" alt=""></button>
                    <button class="next"><img src="../template/icon/next.svg" alt=""></button>
                    <?php
                    if(!empty($productHot)):
                        foreach($productHot as $item):
                    ?>
                    <article class="product__item">
                        <div class="product__item-img-wrap">
                            <a href="?mod=page&act=detail&id_product=<?php echo $item['id']?>&id_user=<?php echo $id_user?>">
                                <img src="../template/img/<?php echo $item['image']?reset($item['image']):''?>" alt="" class="product__item-img">
                            </a>
                        </div>
                        <h3 class="product__item-heading">
                            <a href="?mod=page&act=detail&id_user=<?php echo $id_user?>"><?php echo $item['name'];?></a>
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
                            <div class="product__item-price"><?php echo $item['price']?$item['price']:''?></div>
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


            <section class="home__container">
                <div class="home__heading">Danh mục sản phẩm</div>
                <div class="home__caterogy">
                <?php
                if(!empty($sqlListCategory)):
                    foreach($sqlListCategory as $item):
                ?>
                    <a href="product-page.html">
                        <article class="category__item">
                            <img class="category__img" src="../template/img/<?php echo $item['image']?>" alt="">
                            <h3 class="category_heading"><?php echo $item['name']?></h3>
                        </article>
                    </a>            
                <?php
                    endforeach;
                endif;
                ?>   
                </div>
            </section>

            <section class="home__container ">
              <div class="home_introduce">
                <div class="introduce_info">
                    <div class="home__heading introduce_heading">Vẻ đẹp bạn mong muốn.Ưu đãi bạn yêu thích.</div>
                    <div class="introduce_desc">Chúng tôi luôn mang lại mức giá tốt nhất cho những người yêu thích phong cách thời thượng, hãy khám phá trang web của chúng tôi để tìm thấy các lựa chọn  phù hợp với mọi nhu cầu và ngân sách của ai đó</div>
                    <a class="introduce_btn" href="">SHOP NOW</a>
                </div>
                <div class="introduce_video">
                    <video controls class="video" src="../template/video/videogucci.mp4"></video>
                </div>
              </div>
            </section>
        </div>
    </main>
