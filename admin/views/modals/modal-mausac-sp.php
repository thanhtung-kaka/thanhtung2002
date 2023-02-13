<!-- modals danh mục sản phẩm dung 09/07/2022 -->
<div class="modal fade" id="themmau<?php if(isset($set['mamau'])){ echo $set['mamau']; } ?>" tabindex="-1" aria-labelledby="themmauLabel<?php if(isset($set['mamau'])){ echo $set['mamau'];}?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <?php if(isset($set['mamau'])){ ?>
                <h5 class="modal-title" id="themmauLabel<?php echo $set['mamau']; ?>">Sửa màu</h5>
            <?php }else{?>
                <h5 class="modal-title" id="themmauLabel">Thêm màu</h5>
            <?php }?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body ">
                <div class="form text-start row pe-4">
                    <table>
                        <tr class="mb-3">
                            <td class="text-center">Màu sắc</td>
                            <td>
                            <?php if(isset($set['mamau'])){ ?>
                                <input type="text" style="text-transform: capitalize;" value="<?php echo $set['tenmau'] ?>" class="form-control" placeholder="Màu sắc của sản phẩm" id="tenmau<?php echo $set['mamau'] ?>">
                            <?php }else{?>
                                <input type="text" style="text-transform: capitalize;" value="" class="form-control" placeholder="Màu sắc của sản phẩm" id="tenmau">
                            <?php }?>
                            </td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="2 ">
                                <button type="button" name="submit" id="save_color" <?php if(isset($set['mamau'])){ echo 'data-action="update_color" data-mamau="'.$set['mamau'].'"'; }else{ echo 'data-action="add_color"'; } ?> class="btn btn-primary mt-3">Lưu</button>
                                <button type="button" class="btn btn-dark mt-3" data-bs-dismiss="modal">Thoát</button>
                            </td>
                        </tr>

                    </table>



                </div>
            </div>

        </div>
    </div>
</div>