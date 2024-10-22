<?php
session_start();// Khởi tạo session
require_once 'config.php';
require_once 'model/PHPmailer/Exception.php';
require_once 'model/PHPmailer/PHPMailer.php';
require_once 'model/PHPmailer/SMTP.php';
require_once 'model/connect.php';
require_once 'model/function.php';
require_once 'model/session.php';



$mod='page';
$act='home';
if(!empty($_GET['mod'])){
    if(is_string($_GET['mod'])){
        $mod=trim($_GET['mod']);
        
    }
}  

if(!empty($_GET['act'])){
    if(is_string($_GET['act'])){
        $act=trim($_GET['act']); 
    }
}
?>