<!-- chỉnh sửa liên hệ Van(15-06-2022) -->
<?php
if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
// bắt trạng thái tài khoản 
if($results['statusAcc']!=0):
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
            <form class="form" action="index.php?action=contact&act=submit_add_contact"  method="POST">
                <div class="row">
                    <table class="col-md-12">
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-user-graduate"></i> Họ tên khách hàng :</h6><input type="text" class="form-control w-75 mb-3" id="hoten" name="hoten"  value="<?php if (isset($hoten)) echo $hoten; ?>">
                                <label class="error"><?php if (isset($hotenErr)) echo $hotenErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-address-book"></i> Số điện thoại :</h6><input type="number" class="form-control w-75 mb-3" id="sdt" name="sdt" value="<?php if (isset($sdt)) echo $sdt; ?>">
                                <label class="error"><?php if (isset($sdtErr)) echo $sdtErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-envelope"></i> Email khách hàng :</h6><input type="email" class="form-control w-75 mb-3" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>">
                               <label class="error"><?php if (isset($emailErr)) echo $emailErr ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-envelope-open-text"></i> nội dung liên hệ :</h6><textarea type="text" class="form-control w-75 mb-3" id="noidung" name="noidung" value="<?php if (isset($noidung)) echo $noidung;?>"></textarea>
                                <label class="error"><?php if (isset($noidungErr)) echo $noidungErr ?></label>
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
    else : 
        echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
    endif;
    ?>