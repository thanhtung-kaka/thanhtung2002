<!-- modal chỉnh sửa mật khẩu employee văn (06/07/2022) -->
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) :
?>
<div class="modal fade" id="edit_pass<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="edit_passLabel <?php echo $row['id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_passLabel<?php echo $row['id'] ?>">Thay đổi mật khẩu của <mark><?php echo $row['hoten_nv'] ?></mark></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body ">
                <form action="index.php?action=login&act=update_pass&id=<?php echo $row['id'] ?>" method="post" class="form text-center row pe-4">
                    <table>
                        <tr class="mb-3">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                            <td>Nhập mật khẩu mới : </td>
                            <td>
                                <input type="text" style="text-transform: capitalize;" value="" placeholder="nhập mật khẩu mới ..." class="form-control" name="pass_dn">
                                <div>
                                    <span class="error mt-3"><?php if (isset($Err_pass_dn)) echo $Err_pass_dn; ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="2 ">
                                <button type="submit" name="submit" class="btn btn-primary mt-3">cập nhật</button>
                                <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Thoát</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
else :
    echo  "<script>alert ('Bạn không có quyền vào đây !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=client&act=get_client"/>';
//đóng if
endif;
?>