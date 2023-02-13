<!-- modal chỉnh sửa chức vụ văn (06/07/2022) -->
<?php
if(isset($_SESSION['role']) && $_SESSION['role']==1) :
?>
<div class="modal fade" id="edit_role<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="edit_roleLabel <?php echo $row['id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_roleLabel<?php echo $row['id'] ?>">Thay đổi chức vụ nhân viên <mark><?php echo $row['hoten_nv']; ?></mark></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body ">
                <form action="index.php?action=login&act=update_role&id=<?php echo $row['id'] ?>" method="post" class="form text-center row pe-4">
                    <table>
                        <tr class="mb-3">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">

                            <!-- <h6>chọn chức vụ mới cho nhân viên : </h6> -->
                            <td>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role">
                                    <option value="" selected>Hãy chọn chức vụ mới </option>
                                    <option value="1">Quản trị viên</option>
                                    <option value="2">nhân viên cửa hàng</option>
                                    <option value="3" disabled>nhân viên tư vấn</option>
                                    <option value="4" disabled>nhân viên sale</option>
                            </select>
                                <div>
                                    <span class="error mt-3"><?php if (isset($Err_role)) echo $Err_role; ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="2 ">
                                <button type="submit" name="submit" class="btn btn-primary mt-3">cập nhật</button>
                                <!-- <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Thoát</button> -->
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
else: 
echo  "<script>alert ('bạn không có quyền vào đây ');</script>";
echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=manage_employee"/>';
?>
<?php
//đóng if
endif;
?>