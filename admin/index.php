<?php
 require_once '../index.php';

 if(isset($mod)){
    switch($mod){
        case 'home':
            require_once 'controller/home.php';
    }
 }
?>