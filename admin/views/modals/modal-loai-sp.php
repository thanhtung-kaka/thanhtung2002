<!-- modals danh mục sản phẩm dung 09/07/2022 -->
<div class="modal fade" id="themloai<?php if(isset($set['maloai_sp'])){echo $set['maloai_sp'];} ?>" tabindex="-1" aria-labelledby="themloaiLabel<?php if(isset($set['maloai_sp'])){echo $set['maloai_sp'];} ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <?php if(isset($set['maloai_sp'])){ ?>
                    <h5 class="modal-title" id="themloaiLabel<?php echo $set['maloai_sp'] ?>">Update loại sản phẩm</h5>
                <?php }else{ ?>
                    <h5 class="modal-title" id="themloaiLabel">Thêm loại sản phẩm</h5>
                <?php } ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body ">
                <div class="form text-start row pe-4">
                    <table>

                        <tr>
                            <td class="text-center">Danh mục sản phẩm</td>
                            <td>
                                
                                <select class="form-select" id="madm_sp<?php if(isset($set['maloai_sp'])){echo $set['maloai_sp'];} ?>" style="text-transform: capitalize;">
                                    <option selected value="">Chọn danh mục sản phẩm</option>
                                    <?php
                                    $sp = new sanpham();
                                    $result = $sp->getListDM();
                                    while ($re = $result->fetch()) :
                                    ?>
                                        <?php if(isset($set['maloai_sp'])){ ?>
                                            <option value="<?php echo $re['madm_sp'] ?>" style="text-transform: capitalize;" <?php if ($set['madm_sp'] == $re['madm_sp']) { ?>selected<?php } ?>><?php echo $re['tendm'] ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $re['madm_sp'] ?>" style="text-transform: capitalize;"><?php echo $re['tendm'] ?></option>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="mb-3">
                            <td class="text-center">Tên danh mục</td>
                            <td>
                            <?php if(isset($set['maloai_sp'])){ ?>
                                <input type="text" style="text-transform: capitalize;" value="<?php echo $set['tenloai'] ?>" class="form-control" id="tenloai<?php echo $set['maloai_sp'] ?>">
                            <?php }else{ ?>
                                <input type="text" style="text-transform: capitalize;" value="" class="form-control" id="tenloai">
                            <?php } ?>
                            </td>


                        </tr>

                        <tr class="text-end">
                            <td colspan="2 ">
                                <button type="button" id="save_loaisp" <?php if(isset($set['maloai_sp'])){ echo 'data-action="update_loaisp" data-maloai="'.$set['maloai_sp'].'"'; }else{ echo 'data-action="add_loaisp"'; } ?> name="submit" class="btn btn-primary mt-3">Lưu</button>
                                <button type="submit" class="btn btn-dark mt-3" data-bs-dismiss="modal">Thoát</button>
                            </td>
                        </tr>

                    </table>



                </div>
            </div>

        </div>
    </div>
</div>