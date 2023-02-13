<!-- chỉnh sửa liên hệ Van(15-06-2022) -->
<?php
// phân quyền nếu role =1 thì cho phép không thì đá ra
if(isset($_SESSION['role']) && $_SESSION['role']==1) :
?>
<div class="container">
    <div class="mt-3 text-center">
        <!-- onclick="history.back()" Phương thức này sẽ tải liên kết trước đó mà bạn truy cập -->
        <div class="ms-3 text-start text-primary" onclick="history.back()"><i class="fas fa-angle-left" style="font-size:30px"></i></div>
        <h3 class="text-warning">
            Thêm khách hàng mới 
        </h3>
    </div>
    <div class="mt-4">
        <div class="m-3">
            <form class="form" action="index.php?action=client&act=submit_add_client"  method="POST">
                <div class="row">
                    <table class="col-md-12">
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-user-graduate"></i> Họ tên khách hàng:</h6><input type="text" class="form-control w-75 mb-3" id="ten_kh" name="ten_kh"  value="<?php if (isset($ten_kh)) echo $ten_kh; ?>">
                                <label class="error"><?php if (isset($ten_khErr)) echo $ten_khErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-envelope"></i> Email khách hàng:</h6><input type="email" class="form-control w-75 mb-3" id="email_kh" name="email_kh" value="<?php if (isset($email_kh)) echo $email_kh; ?>">
                               <label class="error"><?php if (isset($email_khErr)) echo $email_khErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-address-book"></i> Số điện thoại :</h6><input type="number" class="form-control w-75 mb-3" id="sdt_kh" name="sdt_kh" value="<?php if (isset($sdt_kh)) echo $sdt_kh; ?>">
                                <label class="error"><?php if (isset($sdt_khErr)) echo $sdt_khErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-map-marker-alt"></i> Địa chỉ khách hàng :</h6><input type="text" class="form-control w-75 mb-3" id="dia_chi_kh" name="dia_chi_kh" value="<?php if (isset($dia_chi_kh)) echo $dia_chi_kh;?>">
                                <label class="error"><?php if (isset($dia_chi_khErr)) echo $dia_chi_khErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-child"></i> Giới tính khách hàng :</h6>
                                <select name="gioi_tinh_kh" id="gioi_tinh_kh">
                                    <option value="nam" selected>nam</option>
                                    <option value="nữ" >nữ</option>
                                    <option value="khác" >khác</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-user-graduate"></i> Tên đăng nhập :</h6><input type="text" class="form-control w-75 mb-3" id="ten_dn" name="ten_dn" value="<?php if (isset($ten_dn)) echo $ten_dn;?>">
                                <label class="error"><?php if (isset($ten_dnErr)) echo $ten_dnErr ?></label>
                            </td>
                        </tr>

                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-lock"></i> Mật khẩu đăng nhập :</h6><input type="text" class="form-control w-75 mb-3" id="pass_dn" name="pass_dn" value="<?php if (isset($pass_dn)) echo $pass_dn; ?>">
                                <label class="error"><?php if (isset($pass_dnErr)) echo $pass_dnErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-camera"></i>  Ảnh đại điện :</h6>
                                <label for="file"><img  src="<?php if(isset($avatar)){echo $avatar;}else{echo "assets/images/avatar_img/5581332.png"; } ?>" alt="" id="image_url" class="txt_img"></label>
                                <input type="text" id="link_url" value="<?php echo $avatar ?>" hidden name="link_url">
                                <input type="file" id="file" hidden accept=".png,.jpeg,.jpg,.gif" name="avatar">
                                <br>
                                <div id="upload_img" class="btn btn-success">Lưu avatar</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-briefcase"></i> Trạng thái</h6>
                                <select class="form-select w-75 mb-3" style="text-transform: capitalize;" name="status">
                                    <option value="1">hoạt động</option>
                                    <option value="0">tắt hoạt động</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <input type="submit" class="btn btn-primary" value="thêm" style="font-size: 16px">
                </div>
            </form>
        </div>
    </div>
    <?php
    else: 
        echo  "<script>alert ('Bạn không có quyền vào đây !');</script>";
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=client&act=get_client"/>';
      ?>
      <?php
      //đóng if
      endif;
      ?>