<?php

//Thông sô kết nối database
const _HOST='localhost';
const _DB_NAME='thuedo';
const _USER='root';
const _PASSWORD='';









// Thiết lập địa chỉ host và path
define('_WEB_HOST','http://'. $_SERVER['HTTP_HOST'].'/thuedo');
define('_WEB_HOST_TEMPLATE',_WEB_HOST.'/template');

// thiết lập path
define('_WEB_PATH',__DIR__);
define('_WEB_PATH_TEMPLATE',_WEB_PATH.'/template');

?>