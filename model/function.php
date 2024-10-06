<?php
// hàm nhung header and footer dung chung
function layouts($layoutName='',$data=[],$link=''){
    if(file_exists(_WEB_PATH_TEMPLATE. '/layouts/'.$layoutName.'.php')){
        require_once _WEB_PATH_TEMPLATE.'/layouts/'.$layoutName.'.php';
    }
}

//hàm kiểm tra get hay post
function isGet(){
    if($_SERVER['REQUEST_METHOD']=='GET'){
        return true;
    }else{
        return false;
    }
}
function isPost(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        return true;
    }else{
        return false;
    }
}
// hàm doc dữ liệu của get và post
function filter(){
    $filterArr=[];
    if(isGet()){
      // xử lý dữ liệu trước khi hiện ra 
      if(!empty($_GET)){
        foreach($_GET as $key=>$value){
          // hàm filter_input(lọc dữ liệu đầu vào)
          // không thể thêm dữ liệu láo từ thanh công cụ
          // sử lý khi chen thêm là mảng
          $key=strip_tags($key);
          if(is_array($value)){
            $filterArr[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
          }
          else{
            $filterArr[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
          }
        }
      }
    }
    
    if(isPost()){
      // xử lý dữ liệu trước khi hiện ra 
      if(!empty($_POST)){
        foreach($_POST as $key=>$value){
          // hàm filter_input(lọc dữ liệu đầu vào)
          // không thể thêm dữ liệu láo từ thanh công cụ
          // Xóa thẻ HTML/PHP khỏi tên trường
          $key=strip_tags($key);
           // Lọc dữ liệu dựa trên kiểu của nó (mảng hoặc chuỗi)
          if(is_array($value)){
            $filterArr[$key]=filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
          }
          else{
            $filterArr[$key]=filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
          }
        }
      }
    }
    return $filterArr;
}

//hàm chuyen 
function redirect($path="index.php"){
    header("location:$path");
    exit;
}



  // vi require_one o index roi
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
function mailer($to,$subject,$content){
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'giaphongquan2407@gmail.com';                     //SMTP username
  $mail->Password   = 'uprb zthi qvfa emnn';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('giaphongquan2407@gmail.com', 'Giáp Hồng Quân');
$mail->addAddress($to);     //Add a recipient
  


//Content
$mail -> CharSet = "UTF-8"; 
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject =$subject;
$mail->Body    = $content;
  
// PHPMailer SSL certificate verify failed
$mail->SMTPOptions =array(
  'ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>true
  )
);

//hành động gửi email
$senMail= $mail->send();
  if($senMail){
  return $senMail;
  }
// echo 'Gủi thành CÔng';
} catch (Exception $e) {
  echo "Gửi email thất bại. Mailer Error: {$mail->ErrorInfo}";
}
}