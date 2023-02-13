<!-- văn -->
<?php
$action = "login";
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch($action)
{
    case "login":
        include 'views/login.php';
        break;
    case "submit_login":
        $ten_dn=$_POST['txtten_dn'];
        $pass_dn=$_POST['txtpass_dn'];
        // $status=$_GET['status'];
        // echo '<script> alert("'.$status.'");</script>';
        $cypt=md5($pass_dn);
        $db = new User();
        $login=$db->login($ten_dn,$cypt);
        // print_r($login);
        // exit();
        if($login!=false){
            $_SESSION['id']=$login[0];
            $_SESSION['ten_kh']=$login[1];
            $_SESSION['avatar']=$login[9];
            $_SESSION['status']=$login[11];
            // print_r($_SESSION);
            // exit();
            echo '<script> alert("Đăng nhập tài khoản thành công.");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';
        }
        // elseif($_SESSION['status']==0){
        //     echo '<script> alert("Tài khoản đã bị vô hiệu hóa !.");</script>';
        //     echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=login"/>';
        // } 
        else {
            echo '<script> alert("Vui lòng xem thông tin hoặc tài khoản đã bị vô hiệu hóa !");</script>';
            include 'views/login.php';
          }
        break;
     case "log_out":
  
        if(isset($_SESSION['id']))
        {
            session_destroy();
        }

        echo '<script> alert("Đăng nhập để có thể mua hàng.");</script>';
        echo '<meta  http-equiv="refresh" content="0;url=./index.php?action=login"/>';;
        break;
     case "profile":
        include 'views/profile.php';
        break;

    case "update_profile":
             $id=$_GET['id'];
             $ten_kh=$_POST['ten_kh'];
             $email_kh=$_POST['email_kh'];
             $sdt_kh=$_POST['sdt_kh'];
             $dia_chi_kh=$_POST['dia_chi_kh'];
             $gioi_tinh_kh=$_POST['gioi_tinh_kh'];
             $avatar=$_POST['link_url'];
             $cli =new User();
             $ten_khErr=$email_khErr=$sdt_khErr=$dia_chi_khErr=$gioi_tinh_khErr=$avatarErr="";
             $txt_ten_kh=$txt_email_kh=$txt_sdt_khErr=$txt_dia_chi_kh=$txt_gioi_tinh_kh= "";
             function test_data($data)
            {
                $data = trim($data);
                $data = htmlspecialchars(($data));
                return $data;
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (empty($ten_kh)) {
                    $ten_khErr = "* Vui lòng nhập họ tên của bạn !";
                } else {
                    $txt_ten_kh = test_data($ten_kh);
                }
                if (empty($email_kh)) {
                    $email_khErr = "* Vui lòng nhập email của bạn !";

                    $get=new User();
                    $results = $get->getList_User();
                    while ($row = $results->fetch()) :
                    $email_kh_old = $row['email_kh'];
                    // echo $row['email_nv'];
                    // if(isset($row['email_nv'])){
                    $email_kh_old=$row['email_kh'];
                    // }else echo 'đéo  so sánh đc';
                    if ($_POST['email_kh']==$email_kh_old) {
                        $email_khErr = "<h6>* email đã tồn tại !</h6>";        
                    }
                    endwhile;



                } else {
                    $txt_email_kh = test_data($email_kh);
                }
                if (empty($sdt_kh)) {
                    $sdt_khErr = "* Vui lòng nhập số điện thoại của bạn";
                } else {
                    $txt_sdt_kh = test_data($sdt_kh);
                    if (!preg_match('/^[0]{1}[0-9]{9,10}$/', $txt_sdt_kh)) {
                        $sdt_khErr = "<h6>* số điện thoại phải phù hợp 10-11 số !</h6>";        
                    }
                }
                if (empty($dia_chi_kh)) {
                    $dia_chi_khErr = "* Vui lòng nhập địa chỉ nhà ở của ban !";
                } else {
                    $txt_dia_chi_kh = test_data($dia_chi_kh);
                }
                if (empty($gioi_tinh_kh)) {
                    $gioi_tinh_khErr = "* Vui lòng nhập số lượng tồn của sản phẩm";
                } else {
                    $txt_gioi_tinh_kh = test_data($gioi_tinh_kh);
                }
                // 
                if (!$ten_khErr && !$email_khErr && !$sdt_khErr && !$dia_chi_khErr && !$gioi_tinh_khErr && !$avatarErr) {
                    try {
                        $cli->update_profile($id, $txt_ten_kh, $txt_email_kh, $txt_sdt_kh, $txt_dia_chi_kh,$txt_gioi_tinh_kh,$avatar);

                        echo "<script>alert('Cập nhật hồ sơ thành công')</script>";
                        echo '<meta http-equiv="refresh"  content="0;url=./index.php?action=login&act=profile&id='.$id.'"/>';
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                } else {
                    echo "<script>alert('Đã có lỗi xảy ra')</script>";
                }
            }
        
        include 'views/profile.php';
        break;
    }
?>