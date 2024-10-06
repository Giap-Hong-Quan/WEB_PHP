
<div id="toast">
        <?php echo isset($smg)?$smg:''?>
    </div>
    

<h1>register</h1>
<form action="" enctype="multipart/form-data" method="post">
        <div class="form_group">
            <label class="label" for="name">Họ Và Tên</label>
            <input class="input" type="text" name="name" id="name">
            <?php
              echo (!empty($errors['name'])) ? '<span class="red">' . reset($errors['name']) . '</span>' : '<span class="green"></span>';
            ?>
            
        </div>
        <div class="form_group">
            <label class="label" for="">Email</label>
            <input class="input" type="email" name="email" id="email">
           
            <?php
              echo (!empty($errors['email'])) ? '<span class="red">' . reset($errors['email']) . '</span>' : '';
            ?>

           
          
        </div>
        <div class="form_group">
            <label class="label" for="">Mật Khẩu</label>
            <input class="input" type="password" name="password" id="password">
            <?php
              echo (!empty($errors['password'])) ? '<span class="red">' . reset($errors['password']) . '</span>' : '';
            ?>
           
        </div>
        <div class="form_group">
            <label class="label" for="file">Hình ảnh</label>
            <input class="input" type="file" name="file" id="file">
            <span class="red"></span>
            
        </div>
        <button type="submit">Đăng ký</button>

    </form>
    <div class="">
                    <p class="">Chưa có tài khoản? <a href="?mod=user&act=login"
                            class="text-primary fw-bold">Đăng Nhập</a></p>
                </div>

