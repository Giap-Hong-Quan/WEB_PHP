<?php

if(isset($act)){
    switch($act){
        case 'list':
            if(isGet()){
                $filterAll=filter();
                $id_user=$filterAll['id_user'];
                $sqlSelectCart=getRaw("SELECT * FROM cart WHERE id_user='$id_user' ORDER BY id ASC");
                $sqlCountCart=getRows("SELECT * FROM cart WHERE id_user='$id_user'");
                $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
                
            }
            $data=['title'=>'Giỏ hàng'];
            layouts('header_page',$data,'cart');
            require_once 'view/header.php';
            require_once 'view/cart_page.php';
            require_once 'view/footer.php';
            layouts('footer_page','','cart');
            break;
        case 'add':
            if(isGet()){
                $filterAll=filter();
                $id_product=$filterAll['id_product'];
                $id_user=$filterAll['id_user'];
                $sqlSelectProduct=oneRaw("SELECT * FROM product WHERE id='$id_product'");
                $sqlSelectImage_path=oneRaw("SELECT image FROM image_path WHERE id_product='$id_product' LIMIT 1");
                $sqlSelectIdCart = getRows("SELECT * FROM cart WHERE id_product='$id_product' AND id_user='$id_user'");
                $sqlSelectQuantityCart=oneRaw("SELECT quantity FROM cart WHERE id_product='$id_product' AND id_user='$id_user'");
                $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
                if($sqlSelectIdCart>0){
                    $data=[
                        'quantity'=>$sqlSelectQuantityCart['quantity']+=1
                    ];
                    update('cart',$data,"id_product='$id_product' AND id_user='$id_user'");
                }
                else{
                    $data=[
                        'name'=>$sqlSelectProduct['name'],
                        'image'=>$sqlSelectImage_path['image'],
                        'price'=>$sqlSelectProduct['price'],
                        'quantity'=>1,
                        'id_user'=>$id_user,
                        'id_product'=>$id_product
                    ];
                    insert('cart',$data);
                }
                redirect('?mod=cart&act=list&id_user='. $id_user);
            }
            break;
        case 'reduce':
            if(isGet()){
                $filterAll=filter();
                $id_product=$filterAll['id_product'];
                $id_user=$filterAll['id_user'];
                $sqlSelectIdCart = oneRaw("SELECT * FROM cart WHERE id='$id_product' AND id_user='$id_user'");
                $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
                $data=[
                    'quantity'=>$sqlSelectIdCart['quantity']-=1
                ];
                update('cart',$data,"id='$id_product' AND id_user='$id_user'");
                redirect('?mod=cart&act=list&id_user='. $id_user);
            }
            break;
        case 'increase':
            if(isGet()){
                $filterAll=filter();
                $id_product=$filterAll['id_product'];
                $id_user=$filterAll['id_user'];
                $sqlSelectIdCart = oneRaw("SELECT * FROM cart WHERE id='$id_product' AND id_user='$id_user'");
                $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
                $data=[
                    'quantity'=>$sqlSelectIdCart['quantity']+=1
                ];
                update('cart',$data,"id='$id_product' AND id_user='$id_user'");
                redirect('?mod=cart&act=list&id_user='. $id_user);
            }
            break;
        case 'delete':
            if(isGet()){
                $filterAll=filter();
                $id_product=$filterAll['id_product'];
                $id_user=$filterAll['id_user'];
                $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
                $sqlSelectIdCart = oneRaw("SELECT * FROM cart WHERE id='$id_product' AND id_user='$id_user'");
                delete('cart',"id='$id_product' AND id_user='$id_user'");
            }
            redirect('?mod=cart&act=list&id_user='. $id_user);
            break;
    }
}
?>