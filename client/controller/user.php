<?php
    if(isset($act)){
        switch($act){
            case 'register':
                if(isPost()){
                    
                    move_uploaded_file($_FILES["file"]["tmp_name"],'../template/img/'.$_FILES['file']['name']);
                    $filterAll=filter();
                    $email=$filterAll['email'];
                    $error =[];
                    //validateName
                    if(empty($filterAll['name'])){
                        $error['name']['required']='Vui lòng nhập đầy đủ Họ và Tên';
                    }
                    //validate email
                    if(empty($filterAll['email'])){
                        $error['email']['required']='Vui lòng nhập đầy đủ Email';
                    }else{
                        $sqlEmail=getRows("SELECT id FROM user WHERE email='$email'");
                        if($sqlEmail>0){
                            $error['email']['exists']="Email đã tồn tại,vui lòng dùng email khác";
                        }
                    }
                    //validate password
                    if(empty($filterAll['password'])){
                        $error['password']['required']='Vui lòng nhập đầy đủ mật khẩu';
                    }else{
                        if(strlen($filterAll['password'])<8){
                            $error['password']['min']='Mật khẩu phải trên 8 ký tự';
                        }
                    }







                    if(empty($error)){
                        $checkActive=sha1(uniqid().time());
                       $data=[
                        'name'=>$filterAll['name'],
                        'email'=>$filterAll['email'],
                        'password'=>password_hash($filterAll['password'],PASSWORD_DEFAULT),
                        'avatar'=>$_FILES['file']['name'],
                        'checkactive'=>$checkActive
                       ];
                        $insertRegister=insert('user',$data);
                       if($insertRegister){
                        $linkActive ='<a class="link__Active" href="' . _WEB_HOST . '/client/?mod=user&act=active&checkActive=' . $checkActive . '">Kick hoat</a>';
                            // Thiết lậ gửi email
                            $subject=$filterAll['name'].'vui lòng kick hoạt tài khoản!';
                            $content= 'Chào '.$filterAll['name'].'<br/>';
                            $content.= 'Vui lòng Click vao link dưới đây để kick hoạt tài khoản:'.'<br/>';
                            $content.= $linkActive.'<br/>';
                            $content.='Trân thành cảm ơn.';
                            $senMailer=mailer($filterAll['email'],$subject,$content);
                            if($senMailer){
                                setFlashData('smg','<div class="toast_success">
                                                <div class="toast_icon">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </div>
                                                <div class="toast_body">
                                                    <h3 class="toast_title">Success</h3>
                                                    <p class="toast_msg">Bạn đã đăng ký thành công vui lòng kiểm tra Email để kích hoạt.</p>
                                                </div>
                                                <div class="toast_close">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </div>
                                            </div>');
                            }
                       }else{
                            setFlashData('smg','<div class="toast_error">
                                            <div class="toast_icon">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="toast_body">
                                                <h3 class="toast_title">Error</h3>
                                                <p class="toast_msg">Bạn đã đăng ký thất bại</p>
                                            </div>
                                            <div class="toast_close">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </div>
                                        </div>');
                       }
                    }else{
                        setFlashData('smg','<div class="toast_error">
                        <div class="toast_icon">
                        <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="toast_body">
                        <h3 class="toast_title"> Error</h3>
                        <p class="toast_msg">Vui lòng kiểm tra dữ liệu</p>
                        </div>
                        <div class="toast_close">
                        <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                        </div>');
                        setFlashData('error',$error);
                    }
                    redirect('?mod=user&act=register');
                    
                   
                }
                $smg=getFlashData('smg');
                $errors=getFlashData('error');


                $data=['title'=>'register'];
                layouts('header_user',$data,'register');
                require_once 'view/register.php';
                layouts('footer_user','','toast');
                break;
            case 'active':
                if(isGet()){
                    $filterAll=filter();
                    $checkActive =$filterAll['checkActive'];
                    $sqlQueryactive=oneRaw("SELECT id FROM user WHERE checkactive='$checkActive'");
                    $id=$sqlQueryactive['id'];
                    $data=[
                        'active'=>1,
                        'checkactive'=>null
                    ];
                    $insertActive=update('user',$data,"id='$id'");
                    if($insertActive){
                        setFlashData('smg','<div class="toast_success">
                                            <div class="toast_icon">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </div>
                                            <div class="toast_body">
                                                <h3 class="toast_title">Success</h3>
                                                <p class="toast_msg">Bạn đã kích hoạt thành công.</p>
                                            </div>
                                            <div class="toast_close">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </div>
                                        </div>');
                    }else{
                        setFlashData('smg','<div class="toast_error">
                                        <div class="toast_icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="toast_body">
                                            <h3 class="toast_title"> Success</h3>
                                            <p class="toast_msg">Bạn đã kích hoạt thất bại vui lòng liên hệ quản trị viên</p>
                                        </div>
                                        <div class="toast_close">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </div>
                                    </div>');
                    }
                    redirect('?mod=user&act=login');
                }
                $smg=getFlashData('smg');
                break;
            case 'login':
                if(isPost()){
                    $filterAll=filter();
                    $email= $filterAll['email'];
                    $password=$filterAll['password'];
                    $sqlEmail=oneRaw("SELECT id,password,email,active FROM user WHERE email='$email'");
                    $password_hash=$sqlEmail['password'];
                                 //validate email
                    $error=[];
                    if(empty($filterAll['email'])){
                        $error['email']['requited']="Vui lòng nhập dầy đủ";
                    }else{
                        if(!$sqlEmail){
                            $error['email']['exits']="Email không tồn tại";
                        }
                    }
                    //validate password
                    if(empty($filterAll['password'])){
                        $error['password']['requited']="Vui lòng nhập dầy đủ";
                    }else{
                        if(!password_verify($password,$password_hash)){
                            $error['password']['requited']="Mật khẩu không đúng";
                        }
                    }
                    if(empty($error)){
                        if($sqlEmail['active']==1){
                            $data=[
                                'tokenlogin'=>1
                            ];
                            $updateLogin=update('user',$data,"email='$email'");
                            if($updateLogin){
                                setFlashData('smg','<div class="toast_success">
                                                <div class="toast_icon">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </div>
                                                <div class="toast_body">
                                                    <h3 class="toast_title">Success</h3>
                                                    <p class="toast_msg">Bạn đã đăng nhập thành công.</p>
                                                </div>
                                                <div class="toast_close">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </div>
                                            </div>');
                                redirect('?mod=page&act=dashboard&id='.$sqlEmail['id']);

                            }
                        }else{
                                setFlashData('smg','<div class="toast_error">
                                <div class="toast_icon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <div class="toast_body">
                                    <h3 class="toast_title"> Success</h3>
                                    <p class="toast_msg">Đăng nhập không thành công ,vui lòng kích hoạt tài khoản</p>
                                </div>
                                <div class="toast_close">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </div>
                            </div>');
                            redirect('?mod=user&act=login');
                        }
                    }else{
                        setFlashData('smg','<div class="toast_error">
                                        <div class="toast_icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <div class="toast_body">
                                            <h3 class="toast_title"> Success</h3>
                                            <p class="toast_msg">Vui lòng kiểm tra dữ liệu</p>
                                        </div>
                                        <div class="toast_close">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </div>
                                    </div>');
                        setFlashData('error',$error);
                        redirect('?mod=user&act=login');
                    }
                }
                $errors=getFlashData('error');
                $smg=getFlashData('smg');
                $data=['title'=>'login'];
                layouts('header_user',$data,'register');
                require_once 'view/login.php';
                layouts('footer_user','','toast');
                break;   
        }
    }

?>