<?php

if(isset($act)){
    switch($act){
        case 'list':
            $sqlSelectUser=getRaw("SELECT * FROM user ORDER BY id ASC");
            $data=['title'=>'Quản lý taì khoản'];
            layouts('header_admin',$data,'user_admin_list');
            require_once 'view/header_admin.php';
            require_once 'view/user_list.php';
            require_once 'view/footer_admin.php';
            layouts('footer_admin','','user_admin');
            break;
        case 'add':
            if(isPost()){
                $filterAll=filter();
                move_uploaded_file($_FILES["avatar"]["tmp_name"],'../template/img/'.$_FILES['avatar']['name']);
                $data=[
                    'name'=>$filterAll['name'],
                    'email'=>$filterAll['email'],
                    'password'=>password_hash($filterAll['password'],PASSWORD_DEFAULT),
                    'avatar'=>$_FILES['avatar']['name'],
                    'admin'=>$filterAll['role'],
                    'active'=>$filterAll['active'],
                ];
                $sqlInsertUser=insert('user',$data);
                if($sqlInsertUser){
                    redirect('?mod=user&act=list');
                }
            }



            $data=['title'=>'Thêm sản phẩm'];
            layouts('header_admin',$data,'user_admin_add');
            require_once 'view/header_admin.php';
            require_once 'view/user_add.php';
            require_once 'view/footer_admin.php';
            layouts('footer_admin','','user_admin');
            break;
        case 'delete':
            if(isGet()){
                $filterAll=filter();
                $id_user=$filterAll['id_user'];
                delete('user',"id='$id_user'");
                redirect('?mod=user&act=list');
            }
            break;
        case 'update':
            $filterAll=filter();
            $id_user=$filterAll['id_user'];
            
            if(isPost()){
                move_uploaded_file($_FILES["avatar"]["tmp_name"],'../template/img/'.$_FILES['avatar']['name']);
                $data=[
                    'name'=>$filterAll['name'],
                    'email'=>$filterAll['email'],
                    'password'=>password_hash($filterAll['password'],PASSWORD_DEFAULT),
                    'avatar'=>$_FILES['avatar']['name'],
                    'admin'=>$filterAll['role'],
                    'active'=>$filterAll['active'],
                ];
                $sqlUpdateUser=update('user',$data,"id='$id_user'");
                if($sqlUpdateUser){
                    redirect('?mod=user&act=list');
                }
            }

            $data=['title'=>'Chỉnh sửa người dùng'];
            layouts('header_admin',$data,'user_admin_update');
            require_once 'view/header_admin.php';
            require_once 'view/user_update.php';
            require_once 'view/footer_admin.php';
            layouts('footer_admin','','user_admin');
            break;
    }
}    


?>