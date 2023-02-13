<!-- modals danh mục sản phẩm dung 09/07/2022 -->
<div class="modal fade" id="them_size<?php if(isset($set['ma_size'])){echo $set['ma_size'];} ?>" tabindex="-1" aria-labelledby="them_sizeLabel<?php if(isset($set['ma_size'])){echo $set['ma_size'];} ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <?php if(isset($set['ma_size'])){ ?>
                    <h5 class="modal-title" id="them_sizeLabel<?php echo $set['ma_size'] ?>">Sửa size</h5>
                <?php }else{ ?>
                    <h5 class="modal-title" id="them_sizeLabel">Thêm size</h5>
                <?php } ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body ">
                <div class="form text-start row pe-4">
                    <table>
                        <tr class="mb-3">
                            <td class="text-center">Số size</td>
                            <td>
                                <?php if(isset($set['ma_size'])){ ?>
                                    <input type="text" style="text-transform: capitalize;" value="<?php echo $set['so_size'] ?>" class="form-control" id="so_size<?php echo $set['ma_size']?>" placeholder="Số size">
                                <?php }else{ ?>
                                    <input type="text" style="text-transform: capitalize;" value="" class="form-control" id="so_size"  placeholder="Số size">
                                <?php } ?>
                                
                            </td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="2 ">
                                <button type="button" id="save_size" <?php if(isset($set['ma_size'])){ echo 'data-action="update_size" data-ma_size="'.$set['ma_size'].'"'; }else{ echo 'data-action="add_size"'; } ?> name="submit" class="btn btn-primary mt-3">Lưu</button>
                                <button type="button" class="btn btn-dark mt-3" data-bs-dismiss="modal">Thoát</button>
                            </td>
                        </tr>

                    </table>



                </div>
            </div>

        </div>
    </div>
</div>