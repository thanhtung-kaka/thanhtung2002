<!-- chỉnh sửa liên hệ Van(15-06-2022) -->
<?php
if(isset($_SESSION['role']) && $_SESSION['role']==1) :
?>
<div class="container">
    <div class="mt-3 text-center">
        <!-- onclick="history.back()" Phương thức này sẽ tải liên kết trước đó mà bạn truy cập -->
        <div class="ms-3 text-start text-primary" onclick="history.back()"><i class="fas fa-angle-left" style="font-size:30px"></i></div>
        <h3 class="text-warning">
            Thêm Nhân Viên mới 
        </h3>
    </div>
    <div class="mt-4">
        <div class="m-3">
            <form class="form" action="index.php?action=login&act=submit_add_employee"  method="POST">
                <div class="row">
                    <table class="col-md-12">
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-user-graduate"></i> Họ tên nhân viên :</h6><input type="text" class="form-control w-75 mb-3" id="hoten_nv" name="hoten_nv"  value="<?php if (isset($hoten_nv)) echo $hoten_nv; ?>">
                                <label class="error"><?php if (isset($hoten_nvErr)) echo $hoten_nvErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-calendar-alt"></i> Ngày tháng năm sinh :</h6><input type="date" class="form-control w-75 mb-3" id="ngay_sinh" name="ngay_sinh"  value="<?php if (isset($ngay_sinh)) echo $ngay_sinh; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-child"></i> Giới tính nhân viên :</h6>
                                <select name="gioi_tinh_nv" id="gioi_tinh_nv">
                                    <option value="nam" selected>nam</option>
                                    <option value="nữ" >nữ</option>
                                    <option value="khác" >khác</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-address-book"></i> Số điện thoại :</h6>
                                <div class="input-group mb-3 w-75" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">+ 84</span>
                                </div>
                                <input type="number" class="form-control " id="sdt_nv" name="sdt_nv" value="<?php if (isset($sdt_nv)) echo $sdt_nv; ?>"  aria-describedby="inputGroup-sizing-default">
                                
                                </div>
                                <label class="error"><?php if (isset($sdt_nvErr)) echo $sdt_nvErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-envelope"></i> Email nhân viên :</h6><input type="email" class="form-control w-75 mb-3" id="email_nv" name="email_nv" value="<?php if (isset($email_nv)) echo $email_nv; ?>">
                               <label class="error"><?php if (isset($email_nvErr)) echo $email_nvErr ?></label>
                            </td>
                        </tr>

                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-map-marker-alt"></i> Địa chỉ nhân viên :</h6><input type="text" class="form-control w-75 mb-3" id="dia_chi_nv" name="dia_chi_nv" value="<?php if (isset($dia_chi_nv)) echo $dia_chi_nv;?>">
                                <label class="error"><?php if (isset($dia_chi_nvErr)) echo $dia_chi_nvErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-camera"></i> Ảnh thẻ :</h6>
                                <label for="file"><img  src="<?php if(isset($avatar)){echo $avatar;}else{echo "assets/images/avatar_img/5581332.png"; } ?>" alt="" id="image_url" class="txt_img"></label>
                                <input type="text" id="link_url" value="<?php echo $avatar ?>" hidden name="link_url">
                                <input type="file" id="file" hidden accept=".png,.jpeg,.jpg,.gif" name="avatar">
                                <br>
                                <div id="upload_img" class="btn btn-success">Lưu ảnh</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6>Mật khẩu đăng nhập :</h6><input type="text" class="form-control w-75 mb-3" id="pass_dn" name="pass_dn" value="<?php if (isset($pass_dn)) echo $pass_dn; ?>">
                                <label class="error"><?php if (isset($pass_dnErr)) echo $pass_dnErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-shield-alt"></i> chức vụ :</h6>
                                <select class="form-select w-75 mb-3" style="text-transform: capitalize;" name="role">
                                    <option value="1">Quản trị viên</option>
                                    <option value="2">nhân viên cửa hàng</option>
                                    <option value="3" disabled>nhân viên tư vấn</option>
                                    <option value="4" disabled>nhân viên sale</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-briefcase"></i> Trạng thái nhân viên :</h6>
                                <select class="form-select w-75 mb-3" style="text-transform: capitalize;" name="status">
                                    <option value="1">hoạt động</option>
                                    <option value="2">tắt hoạt động</option>
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
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=manage_employee"/>';
      ?>
      <?php
      //đóng if
      endif;
      ?>