<!-- modals danh mục sản phẩm dung 09/07/2022 -->
<div class="modal fade" id="themmuc<?php if (isset($set['madm_sp'])) { echo $set['madm_sp']; } else echo ''; ?>" tabindex="-1" aria-labelledby="themmucLabel<?php if (isset($set['madm_sp'])) { echo $set['madm_sp'];} ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <?php if (isset($set['madm_sp'])) { ?>
                    <h5 class="modal-title" id="themmucLabel<?php echo $set['madm_sp'];  ?>">Sửa danh mục</h5>
                <?php } else { ?>
                    <h5 class="modal-title" id="themmucLabel">Thêm danh mục</h5>
                <?php } ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body ">
                <div class="form text-start row pe-4">
                    <table>
                        <tr class="mb-3">
                            <td class="text-center">Tên danh mục</td>
                            <td>
                                <?php if (isset($set['tendm'])) { ?>
                                    <input type="text" style="text-transform: capitalize;" value="<?php echo $set['tendm'] ?>" class="form-control" placeholder="Tên danh mục" id="tendm<?php echo $set['madm_sp'] ?>">
                                <?php } else { ?>
                                    <input type="text" style="text-transform: capitalize;" value="" class="form-control" placeholder="Tên danh mục" id="tendm">
                                <?php } ?>

                            </td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="2 ">
                                <button type="button" name="submit" id="save_danhmuc_sp" <?php if (isset($set['madm_sp'])) {
                                                                                                echo 'data-action="update_dm" data-madm="' . $set['madm_sp'] . '"';
                                                                                            } else {
                                                                                                echo 'data-action="add_danhmuc"';
                                                                                            } ?> class="btn btn-primary mt-3">Lưu</button>
                                <button type="button" class="btn btn-dark mt-3" data-bs-dismiss="modal">Thoát</button>
                            </td>
                        </tr>

                    </table>



                </div>
            </div>

        </div>
    </div>
</div>