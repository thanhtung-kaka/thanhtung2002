<!-- modal chỉnh sửa mật khẩu client (07/07/2022) -->
<?php
// if(isset($id))
// {
//     $staAcc= new Admin();
//     $results=$staAcc->get_one_statusAcc($id);
//     // echo $results['statusAcc'];
// }
// if($results['statusAcc']!=0):
?>
    <div class="modal fade" id="edit_pass<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="edit_passLabel <?php echo $row['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_passLabel<?php echo $row['id'] ?>">Thay đổi thông tin bảo mật của <mark> <?php echo $row['ten_kh'] ?></mark></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body ">
                    <form action="index.php?action=client&act=Update_Pass&id=<?php echo $row['id'] ?>" method="post" class="form text-center row pe-4">
                        <table>
                            <tr class="mb-3">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <td><i class="fas fa-user"></i> Tên đăng nhập : </td>
                                <td>
                                <div class="input-group mb-3 w-100" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $row['ten_dn'] ?></span>
                                </div>
                                <input type="text" class="form-control " id="ten_dn" name="ten_dn" value="" placeholder="nhập tên đăng nhập new"  aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div>
                                    <span class="error mt-3"><?php if (isset($Err_ten_dn)) echo $Err_ten_dn; ?></span>
                                </div>
                                </td>
                                <br>

                            </tr>
                            <tr class="mb-3">
                                <td><i class="fas fa-lock"></i> Mật khẩu : </td>
                                <td>
                                    <input type="text" value="" placeholder="nhập mật khẩu mới" class="form-control" id="pass_dn" name="pass_dn">
                                    <div>
                                        <span class="error mt-3"><?php if (isset($Err_pass_dn)) echo $Err_pass_dn; ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
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
// else : 
//     echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
//     echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
// endif;
?>