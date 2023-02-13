<!-- Modal -->
<div class="modal fade" id="modalsProduct<?php if (isset($set['masp'])) {
                                                echo $set['masp'];
                                            } ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php if (isset($set['masp'])) {
                                                                                                                                                    echo $set['masp'];
                                                                                                                                                } ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 70% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <?php if (isset($set['masp'])) { ?>
                    <h5 class="modal-title" id="exampleModalLabel<?php echo $set['masp'] ?>">
                        Sửa sản phẩm
                    </h5>
                <?php } else { ?>
                    <h5 class="modal-title" id="exampleModalLabel">
                        Thêm sản phẩm
                    </h5>
                <?php } ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="m-3 ">

                    <div id="form_product">
                        <div class="row">
                            <table class="col-md-12">
                                <!-- tên sản phẩm -->
                                <tr>
                                    <td class="w-25">Tên sản phẩm</td>
                                    <td class="">
                                        <?php if (isset($set['masp'])) { ?>
                                            <input type="text" class="form-control w-75" name="tensp" id="tensp<?php echo $set['masp']?>" value="<?php echo $set['tensp']?>" placeholder="Nhập tên sản phẩm">
                                        <?php } else { ?>
                                            <input type="text" class="form-control w-75" name="tensp" id="tensp"  placeholder="Nhập tên sản phẩm">
                                        <?php } ?>
                                    </td>

                                </tr>

                                <!-- loại -->
                                <tr>
                                    <td class="w-25">Loại sản phẩm</td>
                                    <td>
                                    
                                        <select class="form-select w-75  mt-3" style="text-transform: capitalize;" id="loaisp<?php  if (isset($set['masp'])) { echo $set['masp'];}?>" name="loaisp">
                                        <option selected value="">Chọn loại sản phẩm</option>
                                            <?php

                                            $sp = new sanpham();
                                            $res = $sp->getListLoaiSp();
                                            while ($row = $res->fetch()) :
                                            ?>
                                                
                                                <option value="<?php echo $row['maloai_sp'] ?>" <?php if(isset($set['masp'])){if ($set['maloai_sp'] == $row['maloai_sp']) { ?>selected<?php }} ?> ><?php echo $row['tenloai'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </td>
                                </tr>
                                <!-- trạng thái -->
                                <tr>
                                    <td class="w-25">Trạng thái</td>
                                    <td>
                                        <select class="form-select w-75 mb-3 mt-3" style="text-transform: capitalize;" id="status_sp<?php  if (isset($set['masp'])) { echo $set['masp'];}?>" name="status">
                                            <option selected value="">Trạng thái</option>
                                            <?php if (isset($set['masp'])) { ?>
                                                    <option value="1" <?php if($set['status']==1){echo 'selected';}?> >Hiển thị sản phẩm</option>
                                                    <option value="0" <?php if($set['status']==0){echo 'selected';}?> >Ẩn sản phẩm</option>
                                            <?php }else{ ?>
                                                <option value="1">Hiển thị sản phẩm</option>
                                                <option value="0">Ẩn sản phẩm</option>
                                            <?php } ?>
                                            
                                        </select>
                                    </td>
                                </tr>
                                <!-- mô tả -->
                                <tr>
                                    <td class="w-25">Mô tả</td>
                                    <td>
                                    <?php if (isset($set['masp'])) { ?>
                                        <textarea type="text" class="form-control w-75" placeholder="Nhập thông tin chi tiết sản phẩm ở đây" style="resize:none" rows="10" name="mota" id="mota<?php echo $set['masp']?>"><?php echo $set['mota'];  ?></textarea>
                                    <?php }else{ ?>
                                        <textarea type="text" class="form-control w-75" placeholder="Nhập thông tin chi tiết sản phẩm ở đây" style="resize:none" rows="10" name="mota" id="mota"></textarea>
                                    <?php }?>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary" class="button" name="submit" id="save-product" <?php if (isset($set['masp'])) { echo 'data-action="update_product" data-masp="'.$set['masp'].'"';}else{ echo 'data-action=add_product'; } ?>>Lưu sản phẩm</button>
                            <div class="btn btn-primary" data-bs-dismiss="modal">Thoát</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>