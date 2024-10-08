<?php
 require_once '../index.php';

 if(isset($mod)){
    switch($mod){
        case 'product':
            require_once 'controller/product.php';
    }
 }
?>