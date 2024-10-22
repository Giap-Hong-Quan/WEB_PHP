
<div class="admin_body">
                <h3>Quản lý sản phẩm</h3>
                <a href="?mod=product&act=add">Thêm sản phẩm</a>
                <table>
                    <thead>
                        <tr>
                            <th>Thứ Tự sản phẩm </th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng </th>
                            <th>Trạng thái</th>
                            <th>Sản phẩm bán chạy</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    <?php
                    if($sqlProduct):
                        $count=0;
                        foreach($sqlProduct as $item):
                    ?>
                        <tr>
                            <td><?php echo $count+=1?></td>
                            <td>
                           
                            <?php
                            if($sqlImage_path):
                                foreach($sqlImage_path as $item_img):
                                    if($item['id'] == $item_img['id_product']):
                            ?>
                                  <img src="../template/img/<?php echo $item_img['image']; ?>" alt="">
                            <?php
                                endif;
                                endforeach;
                            endif;
                            ?> 
                            </td>
                            <td><?php echo $item['name']?></td>
                            <td><?php echo $item['price']?></td>
                            <td><?php echo $item['quantity']?></td>
                            <td><?php echo ($item['status']==1)?'Đang hoạt động':'Ngừng hoạt động'?></td>
                            <td><?php echo ($item['hot']==1)?'Bán chạy':'Bình thường '?></td>
                            <td>
                                <a href="?mod=product&act=update&id_product=<?php echo $item['id']?>"><img src="../template/icon/update.svg" alt=""></a>
                                <a href="?mod=product&act=delete&id_product=<?php echo $item['id']?>"><img src="../template/icon/delete.svg" alt=""></a>
                            </td>

                        </tr>
                    <?php
                        endforeach;
                    endif;
                    ?>
                    </tbody>
                </table>
            </div>