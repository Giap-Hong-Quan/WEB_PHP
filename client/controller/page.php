<?php
if(isset($act)){
    switch($act){
        case 'dashboard':
            $sqlListBrand=getRaw("SELECT * FROM brand ORDER BY id");
            $sqlListCategory=getRaw("SELECT * FROM category ORDER BY id");
            $sqlListHot=getRaw("SELECT product.*,image_path.image FROM product INNER JOIN image_path ON product.id=image_path.id_product WHERE product.hot=1 ORDER BY product.id ASC ");
            if(isGet()){
                $filterAll=filter();
                $id_user=$filterAll['id'];
               $sqlSelectCart=getRaw("SELECT * FROM cart WHERE id_user='$id_user' ORDER BY id ASC");
               $sqlCountCart=getRows("SELECT * FROM cart WHERE id_user='$id_user'");
               $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
            }
            $productHot=[];
            foreach($sqlListHot as $item){
                $productID=$item['id'];
                if(!isset($productHot[$productID])){
                    $productHot[$productID]=[
                        'id'=>$item['id'],
                        'name'=>$item['name'],
                        'price'=>$item['price'],
                        'description'=>$item['description'],
                        'quantity'=>$item['quantity'],
                        'hot'=>$item['hot'],
                        'status'=>$item['status'],
                        'id_brand'=>$item['id_brand'],
                        'id_category'=>$item['id_category'], 
                        'image'=>[]
                        
                    ];
                }
                $productHot[$productID]['image'][]=$item['image'];
            }
            if(isGet()){
                $filterAll=filter();
                $id_user=$filterAll['id'];
            }
            
            $smg=getFlashData('smg');
            $data=['title'=>'Trang chủ'];
            layouts('header_page',$data,'dashboard');
            require_once 'view/header.php';
            require_once 'view/dashboard.php';
            require_once 'view/footer.php';
            layouts('footer_page','','dashboard');
            break;
        case 'product':
            if(isGet()){
                $filterAll=filter();
                $id_user=$filterAll['id_user'];
                $id_brand=$filterAll['id_brand'];
                $id_category=$filterAll['id_category'];
                $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
               
               $sqlSelectCart=getRaw("SELECT * FROM cart WHERE id_user='$id_user' ORDER BY id ASC");
               $sqlCountCart=getRows("SELECT * FROM cart WHERE id_user='$id_user'");


               // show san pham
               $sqlProductBrand=getRaw("SELECT product.*,image_path.image FROM product INNER JOIN image_path ON product.id=image_path.id_product WHERE id_brand='$id_brand' ORDER BY product.id ASC ");
               $sqlProductBrandCategory=getRaw("SELECT product.*,image_path.image FROM product INNER JOIN image_path ON product.id=image_path.id_product WHERE id_brand='$id_brand'AND id_category='$id_category' ORDER BY product.id ASC ");
               $sqlProductCategory=getRaw("SELECT product.*,image_path.image FROM product INNER JOIN image_path ON product.id=image_path.id_product WHERE id_category='$id_category' ORDER BY product.id ASC ");
               $productBrand=[];
               if (isset($id_user) && isset($id_brand) && isset($id_category)){
                   foreach($sqlProductBrandCategory as $item){
                       $productID=$item['id'];
                       if(!isset($productBrand[$productID])){
                           $productBrand[$productID]=[
                               'id'=>$item['id'],
                               'name'=>$item['name'],
                               'price'=>$item['price'],
                               'description'=>$item['description'],
                               'quantity'=>$item['quantity'],
                               'hot'=>$item['hot'],
                               'status'=>$item['status'],
                               'id_brand'=>$item['id_brand'],
                               'id_category'=>$item['id_category'], 
                               'image'=>[]
                               
                           ];
                       }
                       $productBrand[$productID]['image'][]=$item['image'];
                   }
               }
               elseif (isset($id_user) && isset($id_brand)){
                foreach($sqlProductBrand as $item){
                    $productID=$item['id'];
                    if(!isset($productBrand[$productID])){
                        $productBrand[$productID]=[
                            'id'=>$item['id'],
                            'name'=>$item['name'],
                            'price'=>$item['price'],
                            'description'=>$item['description'],
                            'quantity'=>$item['quantity'],
                            'hot'=>$item['hot'],
                            'status'=>$item['status'],
                            'id_brand'=>$item['id_brand'],
                            'id_category'=>$item['id_category'], 
                            'image'=>[]
                            
                        ];
                    }
                    $productBrand[$productID]['image'][]=$item['image'];
                }
               }
               elseif(isset($id_user) && isset($id_category)){
                foreach($sqlProductCategory as $item){
                    $productID=$item['id'];
                    if(!isset($productBrand[$productID])){
                        $productBrand[$productID]=[
                            'id'=>$item['id'],
                            'name'=>$item['name'],
                            'price'=>$item['price'],
                            'description'=>$item['description'],
                            'quantity'=>$item['quantity'],
                            'hot'=>$item['hot'],
                            'status'=>$item['status'],
                            'id_brand'=>$item['id_brand'],
                            'id_category'=>$item['id_category'], 
                            'image'=>[]
                            
                        ];
                    }
                    $productBrand[$productID]['image'][]=$item['image'];
                }
               }
            }

            $data=['title'=>'Brand'];
            layouts('header_page',$data,'brand');
            require_once 'view/header.php';
            require_once 'view/product.php';
            require_once 'view/footer.php';
            layouts('footer_page','','brand');
            break;
        case 'search':
            if(isPost()){
                $filterAll=filter();
                $id_user=$filterAll['id_user'];
                $search=$filterAll['search'];
                $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
               
                
                $sqlSelectCart=getRaw("SELECT * FROM cart WHERE id_user='$id_user' ORDER BY id ASC");
                $sqlCountCart=getRows("SELECT * FROM cart WHERE id_user='$id_user'");
                $sqlProductSearch=getRaw("SELECT product.*,image_path.image FROM product INNER JOIN image_path ON product.id=image_path.id_product WHERE name LIKE '%$search%' ORDER BY product.id ASC ");
                $productBrand=[];
                if (isset($id_user)){
                    foreach($sqlProductSearch as $item){
                        $productID=$item['id'];
                        if(!isset($productBrand[$productID])){
                            $productBrand[$productID]=[
                                'id'=>$item['id'],
                                'name'=>$item['name'],
                                'price'=>$item['price'],
                                'description'=>$item['description'],
                                'quantity'=>$item['quantity'],
                                'hot'=>$item['hot'],
                                'status'=>$item['status'],
                                'id_brand'=>$item['id_brand'],
                                'id_category'=>$item['id_category'], 
                                'image'=>[]
                                
                            ];
                        }
                        $productBrand[$productID]['image'][]=$item['image'];
                    }
            
                }
            }
            $data=['title'=>'search'];
            layouts('header_page',$data,'brand');
            require_once 'view/header.php';
            require_once 'view/search.php';
            require_once 'view/footer.php';
            layouts('footer_page','','brand');
            break;
        case "detail":
            if(isGet()){
                $filterAll=filter();
                $id_user=$filterAll['id_user'];
                $id_product=$filterAll['id_product'];
                $sqlUser=oneRaw("SELECT * FROM user WHERE id=$id_user");
                $sqlSelectCart=getRaw("SELECT * FROM cart WHERE id_user='$id_user' ORDER BY id ASC");
                $sqlCountCart=getRows("SELECT * FROM cart WHERE id_user='$id_user'");
                $sqlSelectDetail=oneRaw("SELECT * FROM product WHERE id='$id_product'");
                $sqlImageDetail=getRaw("SELECT * FROM image_path WHERE id_product='$id_product'");
            }


            $data=['title'=>'Chi tiết sản phẩm'];
            layouts('header_page',$data,'detail');
            require_once 'view/header.php';
            require_once 'view/detail.php';
            require_once 'view/footer.php';
            layouts('footer_page','','detail');
    }
}

?>