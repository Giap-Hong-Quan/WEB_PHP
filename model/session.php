<?php
// hàm gán session
function setSession($key,$value){
    // Lưu giá trị vào session với key tương ứng
    return $_SESSION[$key]=$value;
}

// hàm đọc session
function getSession($key=''){
    //kiểm tra nếu key đó rỗng trả về session luôn
    if(empty($key)){
        return $_SESSION;
    }
    else{
        // còn ngược lại trả về session chứa key đó
        if(isset($_SESSION[$key])){
            return  $_SESSION[$key];
        }
    }
}
//hàm xóa session 
function deleteSession($key=''){
    //kiểm tra nếu key đó rỗng trả về session luôn
    if(empty($key)){
        return $_SESSION;
    }
    else{
        if(isset($_SESSION[$key])){
        unset($_SESSION[$key]);
            return true;
        }
    }
}      
//hàm gán flash data(get thg key session theem flash vao )
function setFlashData($key,$value){
    $key='flash_'.$key;
    return setSession($key,$value);
}
//hàm đọc flash data
// lấy dữ liệu xong xóa session đi
function getFlashData($key){
    $key='flash_'.$key;
    $data=getSession($key);
    deleteSession($key);
    return $data;
}
?>