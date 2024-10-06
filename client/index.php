<?php
    require_once '../index.php';


    if(isset($mod)){
        switch($mod){
            case 'user':
                require_once 'controller/user.php';
                break;
            case 'page':
                require_once 'controller/page.php';
                break;
            case 'cart':
                require_once 'controller/cart.php';
                break;
        }
    }
?>