<div class="admin_body">
    <h3>Quản lý người dùng</h3>
    <a href="?mod=user&act=add">Thêm người dùng</a>
    <table>
        <thead>
            <tr>
                <th>Thứ Tự</th>
                <th>Avatar</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Trạng thái kích hoạt</th>
                <th>Trạng thái đăng nhập</th>
                <th>Quyền Admin</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if( $sqlSelectUser):
                $count=0;
                foreach( $sqlSelectUser as $item):
            ?>
            <tr>
                <td><?php echo $count+=1;?></td>
                <td>
                    <img src="../template/img/<?php echo (!empty($item['avatar']))?$item['avatar']:'avatar.png'?>" alt="Avatar" width="50" height="50">
                </td>
                <td><?php echo $item['name']?></td>
                <td><?php echo $item['email']?></td>
                <td><?php echo ($item['active']==1)?'Đã kích hoạt':'Chưa kích hoạt'?></td>
                <td><?php echo ($item['tokenlogin']==1)?'Đang online':'Đang offline'?></td>
                <td><?php echo ($item['admin']==1)?'Có':'Không'?></td>
                <td>
                <a href="?mod=user&act=update&id_user=<?php echo $item['id']?>"><img src="../template/icon/update.svg" alt=""></a>
                <a href="?mod=user&act=delete&id_user=<?php echo $item['id']?>"><img src="../template/icon/delete.svg" alt=""></a>
                </td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
</div>
