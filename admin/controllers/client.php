<!-- văn văn -->
<?php

$action = "client";
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "get_client":
        include 'views/client.php';
        break;
    case 'delete_client':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $delete = new Client();
            $delete->delete_client($id);
        }
        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=client&act=get_client"/>';
        break;
    case 'search_client':
        include 'views/client.php';
        break;
    case 'view_client':
        include 'views/client.php';
        break;
    case 'edit_client':
        include 'views/edit_client.php';
        break;
    case 'update_client':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $ten_kh = $_POST['ten_kh'];
            $email_kh = $_POST['email_kh'];
            $sdt_kh = $_POST['sdt_kh'];
            $dia_chi_kh = $_POST['dia_chi_kh'];
            $gioi_tinh_kh = $_POST['gioi_tinh_kh'];
            $link_avatar = $_POST['link_url'];
            $update_cli = new Client();
            $date = new DateTime("now");
            $ngay_sua = $date->format("y-m-d");
            $update_cli->update_client($id, $ten_kh, $email_kh, $sdt_kh, $dia_chi_kh, $gioi_tinh_kh, $link_avatar, $ngay_sua);
        }
        break;
    case 'view_pass_client':
        include 'views/edit_pass_client.php';
        break;
    case 'Update_Pass':
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $ten_dn = $_POST['ten_dn'];
            $pass_dn = $_POST['pass_dn'];
            $txt_ten_dn = $txt_pass_dn = '';
            $Err_ten_dn = $Err_pass_dn = '';
            function test_data($data)
            {
                $data = trim($data);
                $data = htmlspecialchars(($data));
                $data = strtolower($data);
                return $data;
            }
            $update_cli = new Client();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($ten_dn)) {
                    $Err_ten_dn = '* Vui lòng nhập tên đăng nhập !';
                } else {
                    $txt_ten_dn = test_data($ten_dn);
                    $get = new Client();
                    $results = $get->getList_client();
                    while ($row = $results->fetch()) :
                        $ten_dn_old = $row['ten_dn'];
                        // echo $row['ten_dn'];
                        // if(isset($row['ten_dn'])){
                        $ten_dn_old = $row['ten_dn'];
                        // }else echo 'đéo  so sánh đc';
                        if ($_POST['ten_dn'] == $ten_dn_old) {
                            $Err_ten_dn = "<h6>* tên đăng nhập đã tồn tại !</h6>";
                            echo "<script>alert('tên đăng nhập đã tồn tại')</script>";
                        }
                    endwhile;
                }
                if (empty($pass_dn)) {
                    $Err_pass_dn = '* Vui lòng nhập mật khẩu !';
                } else {
                    $txt_pass_dn = test_data($pass_dn);
                }
                if (!$Err_ten_dn && !$Err_pass_dn) {
                    try {
                        $update_cli->update_PassWord($id, $ten_dn, $pass_dn);
                        echo '<script>alert("cập nhật thông tin thành công")</script>';
                    } catch (PDOException $e) {
                        echo $e;
                        die($e->getMessage());
                    }
                } else {
                    echo '<script>alert("cập nhật thất bại !")</script>';
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=client&act=get_client"/>';
        break;
        // print_r($update_cli);
        // exit();
        //$update_cli->update_PassWord($id, $ten_dn, $pass_dn);

    case 'view_add_client':
        include 'views/add_client.php';
        break;
        ////
    case 'submit_add_client':
        $ten_kh = $_POST['ten_kh'];
        $email_kh = $_POST['email_kh'];
        $sdt_kh = $_POST['sdt_kh'];
        $dia_chi_kh = $_POST['dia_chi_kh'];
        $gioi_tinh_kh = $_POST['gioi_tinh_kh'];
        $ten_dn = $_POST['ten_dn'];
        $pass_dn = $_POST['pass_dn'];
        $avatar = $_POST['link_url'];
        $status = $_POST['status'];
        //tạo mảng để chứ tb lỗi
        $ten_khErr = $email_khErr = $sdt_khErr = $dia_chi_khErr = $ten_dnErr = $pass_dnErr = $avatarErr = '';
        $ten_khs = $email_khs = $sdt_khs = $dia_chi_khs = $ten_dns = $pass_dns =  '';
        function input_Submit($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($ten_kh)) {
                $ten_khErr = "<h6>* vui lòng nhập đầy đủ họ tên </h6> ";
            } else {
                $ten_khs = input_Submit($ten_kh);
            }
            if (empty($email_kh)) {
                $email_khErr = "<h6>* vui lòng nhập email </h6> ";
            } else {
                $email_khs = input_Submit($email_kh);

                $get = new Client();
                $results = $get->getList_client();
                while ($row = $results->fetch()) :
                    $email_kh_old = $row['email_kh'];
                    echo $row['email_kh'];
                    // if(isset($row['email_kh'])){
                    $email_kh_old = $row['email_kh'];
                    // }else echo 'đéo  so sánh đc';
                    if ($_POST['email_kh'] == $email_kh_old) {
                        $email_khErr = "<h6>* email khách hàng đã tồn tại !</h6>";
                    }
                endwhile;
            }
            if (empty($sdt_kh)) {
                $sdt_khErr = "<h6>* vui lòng nhập số điện thoại </h6> ";
            } else {
                $sdt_khs = input_Submit($sdt_kh);
                if (!preg_match('/^[0]{1}[0-9]{9,10}$/', $sdt_khs)) {
                    $sdt_khErr = "<h6>* số điện thoại phải phù hợp 0 ở đầu và 10-11 số !</h6>";
                }
            }
            if (empty($dia_chi_kh)) {
                $dia_chi_khErr = "<h6>* vui lòng nhập địa chỉ </h6> ";
            } else {
                $dia_chi_khs = input_Submit($dia_chi_kh);
            }
            //kiểm tra tên đn
            if (empty($ten_dn)) {
                $ten_dnErr = "<h6>* vui lòng nhập tên đăng nhập</h6> ";
            } else {
                $ten_dns = input_Submit($ten_dn);
                // if (!preg_split('/^{6,20}$/',$ten_dns)) {
                //     $ten_dnErr = "<h6>*phải từ 6->20 ký tự !</h6>";
                // }
                $get = new Client();
                $results = $get->getList_client();
                while ($row = $results->fetch()) :
                    $ten_dn_old = $row['ten_dn'];
                    // echo $row['ten_dn'];
                    // if(isset($row['ten_dn'])){
                    $ten_dn_old = $row['ten_dn'];
                    // }else echo 'đéo  so sánh đc';
                    if ($_POST['ten_dn'] == $ten_dn_old) {
                        $ten_dnErr = "<h6>* tên đăng nhập đã tồn tại !</h6>";
                    }
                endwhile;
            }
            //kiểm tra mật khẩu đăng nhập 
            if (empty($pass_dn)) {
                $pass_dnErr = "<h6> * vui lòng nhập mật khẩu </h6>";
            } else {
                $pass_dns = input_Submit($pass_dn);
            }

            if (!$ten_khErr && !$email_khErr && !$sdt_khErr && !$dia_chi_khErr && !$ten_dnErr && !$pass_dnErr) {
                $date = new DateTime("now");
                $ngay_dk = $date->format("y-m-d");
                $register = new Client();
                $register->insert_Client($ten_khs, $email_khs, $sdt_khs, $dia_chi_khs, $gioi_tinh_kh, $ten_dns, $pass_dns, $ngay_dk, $avatar, $status);
                echo '<script> alert ("thêm thông tin tài khoản thành công !");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=client&act=get_client"/>';
            } else {
                echo '<script> alert ("vui lòng điền chính xác, đầy đủ thông tin của khách hàng !");</script>';
            }
        }
        include 'views/add_client.php';
        break;
}
?>
<script>
    function error_up_pass() {
        Swal.fire({
            title: 'cập nhật thất bại có thể do tên đăng nhập đã tồn tại !',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }
</script>