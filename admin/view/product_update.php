<div class="admin_body">
                <form  method="post" action="" enctype="multipart/form-data">
         
                    <div class="admin_body_row">
                        <div class="admin_body_col">
                            <div>
                                <label class="form-label" for="">Tên sản phẩm</label class="form-label">
                                <input class="form-control" type="text" name="name" id="">
                            </div>
                            <div>
                            <label class="form-label" for="">Thương hiệu</label>
                            <select class="form-select" name="brand" >
                                <option value="1">DIOR</option>
                                <option value="2">GUCCI</option>
                                <option value="3">CHANEL</option>
                                
                            </select>
                            <label class="form-label" for="">Danh mục</label>
                            <select class="form-select" name="category" >
                                    <option value="1">Thời Trang</option>
                                    <option value="2">Nước hoa</option>
                                    <option value="3">Trang điểm </option>
                                    <option value="4">Chăm sóc da </option>
                                    <option value="5">Phụ kiện và Đồng hồ</option>
                                    
                            </select>
                            
                        </div>
                            <div>
                                <label class="form-label" for="">Giá</label class="form-label">
                                <input class="form-control" type="number" name="price" id="">
                            </div>
                            <div>
                                <label class="form-label" for="">Mô tả</label class="form-label">
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                    
                        </div>
                        <div class="admin_body_col">
                            <div>
                                <label class="form-label" for="">Hình ảnh</label class="form-label">
                                <input class="form-control" type="file" name="images[]" id="" multiple >
                            </div>
                            <div>
                                <label class="form-label" for="">Số Lượng</label class="form-label">
                                <input class="form-control" type="number" name="quantity" id="">
                            </div>
                            <div>
                                <label class="form-label" for="">Sản phẩm bán chạy</label class="form-label">
                                <div class="form-control">
                                    <input type="radio" name="hot" value="1"> Có
                                    <input type="radio" name="hot" value="0"> Không
                                </div>
                            <div>
                                <label class="form-label" for="">Trạng thái</label class="form-label">
                                <select class="form-select" name="status" id="">
                                <option value="1">Đang hoạt động</option>
                                <option value="0">Ngừng hoạt động</option>
                                </select>
                        </div>
                        <input type="hidden" name="id_product" value="<?php echo $id_product?>">
                    </div>
                        <br>
                        <div class="text-center">
                            <input  type="submit" name="addProduct_submit" value="Sửa">
                        </div>
                </form>
                
                
                
            </div>