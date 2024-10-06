<?php
if(isset($act)){
    switch($act){
        case 'dashboard':
            $data=['title'=>'Trang chủ admin'];
            layouts('header_admin',$data,'header_admin');
            require_once 'view/header_admin.php';
            require_once 'view/dashboard.php';
            require_once 'view/footer_admin.php';
            layouts('footer_admin','footer_admin');
    }
}
?>