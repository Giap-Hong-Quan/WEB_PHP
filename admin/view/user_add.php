<div class="admin_body">
<h3>Thêm người dùng</h3>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="admin_body_row">
            <div class="admin_body_col">
                <div>
                    <label class="form-label" for="">Tên người dùng</label>
                    <input class="form-control" type="text" name="name" id="">
                </div>
                <div>
                    <label class="form-label" for="">Email</label>
                    <input class="form-control" type="email" name="email" id="">
                </div>
                <div>
                    <label class="form-label" for="">Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="">
                </div>
               
            </div>
            <div class="admin_body_col">
                <div>
                    <label class="form-label" for="">Ảnh đại diện</label>
                    <input class="form-control" type="file" name="avatar" id="">
                </div>
                <div>
                    <label class="form-label" for="">Vai trò</label>
                    <select class="form-select" name="role">
                        <option value="1">Quản trị viên</option>
                        <option value="0">Người dùng</option>
                    </select>
                </div>
                <div>
                    <label class="form-label" for="">Trạng thái</label>
                    <select class="form-select" name="active">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Không kích hoạt</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <input type="submit" name="addUser_submit" value="Thêm người dùng">
        </div>
    </form>
</div>
