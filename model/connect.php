<?php
// kết nối database
try{
    if(class_exists('PDO')){ //Kiểm tra tồn tại
        $dsn="mysql:host="._HOST.";dbname="._DB_NAME;
        //Thiết lập thuộc tính PDO
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        //Kết nối database
        $connect=new PDO($dsn,_USER,_PASSWORD,$options);
        // if($connect){
        //     echo '<div style="color:green;">';
        //     echo 'Kết nối database thành công';
        //     echo '</div>';
        // }
    }
}catch(PDOException $e){
    echo '<div style="color:red;">';
    echo 'Kết nối database thất bại'.$e->getMessage();
    echo 'dong:' .$e->getLine();
    echo '</div>';
}

// hàm query sử dụng chung 
function query($sql,$data=[],$check=false){
    global $connect;
    $ketqua=false;
    try{
        $stmt=$connect->prepare($sql);
        if(!empty($data)){
            $ketqua=$stmt->execute($data);
        }else{
            $ketqua=$stmt->execute();
        }
    }catch(PDOException $e){
        echo 'loi'.$e->getMessage().'<br/>';
        echo 'file'.$e->getFile().'<br/>';
        echo 'dong'.$e->getLine().'<br/>';
        die();
    }
    if($check){
        return $stmt;
    }
    return $ketqua;
}
// Xây dựng hàm INSERT 
function insert($table,$data){
    $key=array_keys($data); //lấy ra các key của mảng xong ghép lại thành 1 mảng toàn key
    $truong=implode(',',$key) ;// nối các phần tử của mảng lại thành 1 chuỗi bởi 1 ký tự nào đó
    $newKeys=array_map(function($item){
      return ':'.$item;
    },$key);
    $value=implode(',',$newKeys);
    $sql= 'INSERT INTO ' . $table . ' (' . $truong . ') VALUES (' . $value . ')';
    $kq=query($sql,$data);
    return $kq;
}
// Xây dựng hàm Update data 
function update($table,$data,$condition){
    $key=array_keys($data);
    $update='';
  foreach( $key as $item){
     $update .= $item.'=:'.$item.',';
  }
  $update=trim($update,',');
  if(!empty($condition)){
    $sql = 'UPDATE ' . $table . ' SET ' . $update . ' WHERE ' . $condition;
  
  }
  else{
    $sql = 'UPDATE ' . $table . ' SET ' . $update;
  };
  $kq=query($sql,$data);
  return $kq;
}
// Xây dựng hàm delete
function delete($table,$condition=''){
    if(!empty($condition)){
  
      $sql='DELETE FROM '.$table .' WHERE '.$condition;
    }
    else{
      $sql='DELETE FROM '.$table ;
    }
    $kq=query($sql);
    return $kq;
}
// Xây dựng hàm Select
// Hàm select tất cả với điều kiện gì đó như id mã vv..
function getRaw($sql){
    $dataFetch=[];
   $kq=query($sql,'',true);
   if(is_object($kq)){
    $dataFetch=$kq ->fetchAll(PDO::FETCH_ASSOC);
   }
   return $dataFetch;
}
//lấy 1 dòng (lấy ra 1 tk)
function oneRaw($sql){
    $dataFetconeRawh=[];
   $kq=query($sql,'',true);
   if(is_object($kq)){
    $dataFetch=$kq ->fetch(PDO::FETCH_ASSOC);
   }
   return $dataFetch;
}
// đếm số dòng dữ liệu(( đếm xem có bao nhiu tk được tạo ))
function getRows($sql){
    $kq=query($sql,'',true);
   if(!empty($kq)){
     return $kq->rowCount();
   }
}
?>