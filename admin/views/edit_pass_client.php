<!--xem thông tin khách hàng văn -->
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
        <h3 class="">
        Thay đổi thông tin đăng nhập của khách hàng 
        </h3>
    </div>
    <div class="mt-4">
        <div class="m-3">
        <?php
            if (isset($_GET['id'])) { // kiểm tra nếu tồn tại cái id
                $cont = new Client();
                $result = $cont->Get_edit_client($_GET['id']);
                $id = $_GET['id']; //trả ra cái id  ,dựa vào cái id  trả về 1 kết quả từng  dữ liệu trong mảng 
                // $ten_kh = $result['ten_kh'];
                $ten_dn = $result['ten_dn'];
                $pass_dn = $result['pass_dn'];
            }
            ?>
            <form class="form"  method="POST">
                <div class="row">
                    <table class="col-md-12">
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6>Tên đăng nhập khách hàng:</h6><input type="text" class="form-control w-75 mb-3" id="ten_dn" name="ten_dn" value="<?php if (isset($ten_dn)) { echo $ten_dn; } else { echo ""; }  ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25"></td>
                            <td>
                                <h6>Mật khẩu đăng nhập:</h6><input type="text" class="form-control w-75 mb-3" id="pass_dn" name="pass_dn" placeholder="nhập mật khẩu mới...">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a> <i onclick="update_pass('<?php echo $id; ?>')" class="btn btn-primary">Cập Nhật</i></a>
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
   