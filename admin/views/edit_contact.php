<!-- chỉnh sửa liên hệ Van(15-06-2022) -->
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
            chỉnh sửa liên hệ
        </h3>
    </div>
    <div class="mt-4">
        <div class="m-3">
            <?php
            if (isset($_GET['id'])) {// kiểm tra nếu tồn tại cái id
                $cont = new Contact();
                $result = $cont->Get_edit_contact($_GET['id']);
                $id = $_GET['id'];//trả ra cái id  ,dựa vào cái id  trả về 1 kết quả từng hàng dữ liệu trong mảng 
                $hoten = $result['hoten'];
                $sdt = $result['sdt'];
                $email = $result['email'];
                $noidung = $result['noidung'];
            }
            ?>
            <form class="form" method="POST">
                <div class="row">
                    <table class="col-md-12">
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-user-graduate"></i>  Họ tên :</h6><input type="text" class="form-control w-75 mb-3" id="hoten" name="hoten" value="<?php echo $hoten  ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-address-book"></i> Số điện thoại :</h6><input type="number" class="form-control w-75 mb-3" id="sdt" name="sdt" value="<?php echo $sdt  ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-envelope"></i> Email :</h6><input type="Email" class="form-control w-75 mb-3" id="email" name="email" value="<?php echo $email  ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6><i class="fas fa-envelope-open-text"></i> Nội dung liên hệ :</h6><input type="text" class="form-control w-75 mb-3" id="noidung" name="noidung" value="<?php echo $noidung  ?>">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a> <i onclick="Save_Constact('<?php echo $id; ?>')" class="btn btn-primary">Cập Nhật</i></a>
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

  