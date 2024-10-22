<?php
if(isset($act)){
    switch($act){
        case 'list':
            $sqlProduct=getRaw("SELECT * FROM product ORDER BY id ASC");
            $sqlImage_path=getRaw("SELECT * FROM image_path ORDER BY id ASC");
            $data=['title'=>'Quản lý sản phẩm'];
            layouts('header_admin',$data,'product_admin_list');
            require_once 'view/header_admin.php';
            require_once 'view/product_list.php';   
            require_once 'view/footer_admin.php';
            layouts('footer_admin','','product_admin');
            break;
        case 'add':
            if(isPost()){
                $filterAll=filter();
                $data=[
                    'name'=>$filterAll['name'],
                    'id_brand'=>$filterAll['brand'],
                    'id_category'=>$filterAll['category'],
                    'price'=>$filterAll['price'],
                    'description'=>$filterAll['description'],
                    'quantity'=>$filterAll['quantity'],
                    'hot'=>$filterAll['hot'],
                    'status'=>$filterAll['status'],
                ];
                $sqlInsertProduct=insert('product',$data);
                $id_product = $connect->lastInsertId();

                if (isset($_FILES['images'])) {
                    $image_paths = [];
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name){
                        $image_name = $_FILES['images']['name'][$key];
                        $target_file = '../template/img/' . basename($image_name); // Đường dẫn lưu ảnh
                        if (move_uploaded_file($tmp_name, $target_file)) {
                            $image_paths[] = basename($image_name); // Lưu đường dẫn ảnh
                        } else {
                            // Xử lý lỗi nếu việc upload thất bại
                            echo "Không thể upload file: " . $image_name;
                        }
                    }
                    foreach($image_paths as $image_path){
                        $data_img=[
                            'image'=>$image_path,
                            'id_product'=>$id_product
                        ];
                        insert('image_path',$data_img);
                    }
                   
                }
            }
        
            if(isset($sqlInsertProduct)){

                redirect('?mod=product&act=list');
            }
            $data=['title'=>'Thêm sản phẩm'];
            layouts('header_admin',$data,'product_admin_add');
            require_once 'view/header_admin.php';
            require_once 'view/product_add.php';
            require_once 'view/footer_admin.php';
            layouts('footer_admin','','product_admin');
            break;
        case 'delete':
            if(isGet()){
                $filterAll=filter();
                $id_product=$filterAll['id_product'];
                $sqlDeleteImage=delete('image_path',"id_product='$id_product'");
                $sqlDeleteProduct=delete('product',"id='$id_product'");
                if(isset($sqlDeleteImage)&&isset($sqlDeleteImage)){
                    redirect('?mod=product&act=list');
                }
            }
            break;
        case 'update':
            $filterAll=filter();
            $id_product=$filterAll['id_product'];
            delete('image_path',"id_product='$id_product'");
            echo $id_product;
            if(isPost()){
                $data=[
                    'name'=>$filterAll['name'],
                    'id_brand'=>$filterAll['brand'],
                    'id_category'=>$filterAll['category'],
                    'price'=>$filterAll['price'],
                    'description'=>$filterAll['description'],
                    'quantity'=>$filterAll['quantity'],
                    'hot'=>$filterAll['hot'],
                    'status'=>$filterAll['status'],
                ];
                $sqlUpdateProduct=update('product',$data,"id='$id_product'");
                if (isset($_FILES['images'])) {
                    $image_paths = [];
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name){
                        $image_name = $_FILES['images']['name'][$key];
                        $target_file = '../template/img/' . basename($image_name); // Đường dẫn lưu ảnh
                        if (move_uploaded_file($tmp_name, $target_file)) {
                            $image_paths[] = basename($image_name); // Lưu đường dẫn ảnh
                        } else {
                            // Xử lý lỗi nếu việc upload thất bại
                            echo "Không thể upload file: " . $image_name;
                        }
                    }
                    foreach($image_paths as $image_path){
                        $data_img=[
                            'image'=>$image_path,
                            'id_product'=>$id_product
                        ];
                        insert('image_path',$data_img);
                    }
                   
                }
                if(isset($sqlInsertProduct)){
                    redirect('?mod=product&act=list');
                }
            }
            $data=['title'=>'Sửa sản phẩm'];
            layouts('header_admin',$data,'product_admin_add');
            require_once 'view/header_admin.php';
            require_once 'view/product_update.php';
            require_once 'view/footer_admin.php';
            layouts('footer_admin','','product_admin');
            break;
    }
}
?>