<!-- chỉnh sửa khách hàng Van(15-06-2022) -->
<?php
if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if($results['statusAcc']!=0):
?>
<div class="container">
    <div class="mt-3 text-center">
        <!-- onclick="history.back()" Phương thức này sẽ tải liên kết trước đó mà bạn truy cập -->
        <div class="ms-3 text-start text-primary" onclick="history.back()"><i class="fas fa-angle-left" style="font-size:30px"></i></div>
        <h3 class="text-warning">
            Chỉnh sửa khách hàng
        </h3>
    </div>
    <div class="mt-4">
        <div class="m-3">
            <?php
            if (isset($_GET['id'])) { // kiểm tra nếu tồn tại cái id
                $cont = new Client();
                $result = $cont->Get_edit_client($_GET['id']);
                $id = $_GET['id']; //trả ra cái id  ,dựa vào cái id  trả về 1 kết quả từng  dữ liệu trong mảng 
                $ten_kh = $result['ten_kh'];
                $email_kh = $result['email_kh'];
                $sdt_kh = $result['sdt_kh'];
                $dia_chi_kh = $result['dia_chi_kh'];
                $gioi_tinh_kh = $result['gioi_tinh_kh'];
                $avatar = $result['avatar'];
            }
            ?>
            <form class="form" method="POST">
                <div class="row">
                    <table class="col-md-12">
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-user-graduate"></i> Họ tên khách hàng:</h6><input type="text" class="form-control w-75 mb-3" id="ten_kh" name="ten_kh" value="<?php if (isset($ten_kh)) { echo $ten_kh; } else { echo ""; }  ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-envelope"></i> Email khách hàng:</h6><input type="email" class="form-control w-75 mb-3" id="email_kh" name="email_kh" value="<?php if(isset($email_kh)){echo $email_kh;}else{echo "";} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-address-book"></i> Số điện thoại :</h6><input type="number" class="form-control w-75 mb-3" id="sdt_kh" name="sdt_kh" value="<?php if(isset($sdt_kh)){echo $sdt_kh;}else{echo "";} ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-map-marker-alt"></i> Địa chỉ khách hàng :</h6><input type="text" class="form-control w-75 mb-3" id="dia_chi_kh" name="dia_chi_kh" value="<?php if(isset($dia_chi_kh)){echo $dia_chi_kh;}else{echo "";} ?>">
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
                                <h6><i class="fas fa-camera"></i>  Ảnh đại điện :</h6>
                                <label for="file"><img  src="<?php if (isset($avatar)) { echo $avatar; } else {echo "assets/images/avatar_img/5581332.png";} ?>" alt="" id="image_url" class="txt_img"></label>
                                <input type="text" id="link_url" value="<?php echo $avatar ?>" hidden name="link_url">
                                <input type="file" id="file" hidden accept=".png,.jpeg,.jpg,.gif" name="avatar">
                                <br>
                                <div id="upload_img" class="btn btn-success">Lưu avatar</div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a> <i onclick="Save_Client('<?php echo $id; ?>')" class="btn btn-primary">Cập Nhật</i></a>
                    <!-- sự kiện onclick  -->
                </div>
            </form>
        </div>
    </div>
    <?php
    else : 
        echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
    endif;
    ?>