    
    <div id="toast">
        <?php echo isset($smg)?$smg:''?>
    </div>
    
    <h1>login</h1>
<form action="" enctype="multipart/form-data" method="post">
        
        <div class="form_group">
            <label class="label" for="">Email</label>
            <input class="input" type="email" name="email" id="email">
            <?php echo (!empty($errors['email']))?'<span class="red">'.reset($errors['email']).'</span>':'';?>
        </div>
        <div class="form_group">
            <label class="label" for="">Mật Khẩu</label>
            <input class="input" type="password" name="password" id="password">
            <?php echo (!empty($errors['password']))?'<span class="red">'.reset($errors['password']).'</span>':'';?>
        </div>
       
        <button type="submit">Đăng Nhập</button>
    </form>
    <div>
        <span><a href="?mod=user&act=register">Đăng ký</a></span>
    </div>

