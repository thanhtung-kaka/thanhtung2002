<!-- login admin Văn  -->
<?php
$action = "login";
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "login":
        include 'Views/login.php';
        break;
    case "login_action":
        // truyền qua đây là tên email_nv, pass
        $email_nv = $_POST['txtemail_nv']; //email_nv   admin@gmail.com
        $pass_dn = $_POST['txtpass_dn']; //123
        $giai_ma = md5($pass_dn);
        $dn = new Login();
        $result = $dn->logAdmin($email_nv, $giai_ma); // $result[admin@gmail.com,123]
        if ($result != false) {
            $_SESSION['id_admin'] = $result[0];
            $_SESSION['hoten_nv'] = $result[1];
            $_SESSION['email_nv'] = $result[5]; //admin
            // $_SESSION['avatar']=$result['avatar'];//admin
            $_SESSION['avatar_admin'] = $result[7];
            $_SESSION['role'] = $result[9];

            echo '<script>alert("Đăng nhập admin thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanpham"/>';
        } else {
            echo '<script> alert("Thông tin đăng nhập sai hoặc đã bị vô hiệu hóa tài khoản !");</script>';
            include "views/login.php";
        }
        break;
        // đăng xuất
    case "logout":
        if (isset($_SESSION['email_nv'])) {
            session_destroy();
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php"/>';
        break;
        //  role admin van  04/07
    case "manage_employee":
        include "views/admin.php";
        break;
    case "search_employee":
        include "views/admin.php";
        break;
    case 'add_employee':
        include 'views/add_employee.php';
        break;
    case 'submit_add_employee':
        $hoten_nv = $_POST['hoten_nv'];
        $ngay_sinh = $_POST['ngay_sinh'];
        $gioi_tinh_nv = $_POST['gioi_tinh_nv'];
        $sdt_nv = $_POST['sdt_nv'];
        $email_nv = $_POST['email_nv'];
        $dia_chi_nv = $_POST['dia_chi_nv'];
        $avatar_nv = $_POST['link_url'];
        $pass_dn = $_POST['pass_dn'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        // echo $email_old;
        //tạo mảng để chứ tb lỗi
        $hoten_nvErr = $sdt_nvErr = $email_nvErr = $dia_chi_nvErr = $avatarErr = $pass_dnErr = '';
        $hoten_nvs = $sdt_nvs = $email_nvs = $dia_chi_nvs = $pass_dns = '';
        function input_Submit($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($hoten_nv)) {
                $hoten_nvErr = "<h6>* vui lòng nhập đầy đủ họ tên nhân viên </h6> ";
            } else {
                $hoten_nvs = input_Submit($hoten_nv);
            }

            if (empty($sdt_nv)) {
                $sdt_nvErr = "<h6>* vui lòng nhập số điện thoại nhân viên</h6> ";
            } else {
                $sdt_nvs = input_Submit($sdt_nv);
                // $get = new Admin();
                // $results = $get->getList_admin();
                // while ($row = $results->fetch()) :
                //     $sdt_nv_old = $row['sdt_nv'];
                //     echo $sdt_nv_old;
                if (!preg_match('/^[0]{1}[0-9]{9,10}$/', $sdt_nvs) ) {
                    $sdt_nvErr = "<h6>* số điện thoại phải phù hợp 0 ở đầu và 10-11 số  !</h6>";
                }
            // endwhile;
            //     $get = new Admin();
            //     $results = $get->getList_admin();
            //     while ($row = $results->fetch()) :
            //         $sdt_nv_old = $row['sdt_nv'];
            //     elseif($_POST['sdt_nv'] == $sdt_nv_old){
            //         $sdt_nvErr = "<h6>* số điện thoại đã tồn tại  !</h6>";
            //     }
            //    endwhile;
            }



            if (empty($email_nv)) {
                $email_nvErr = "<h6>* vui lòng nhập email nhân viên</h6> ";
                // echo $email_old;
            } else {
                $email_nvs = input_Submit($email_nv);
                // echo $email_old;
                // echo $_POST['email_nv'];
                $get = new Admin();
                $results = $get->getList_admin();
                while ($row = $results->fetch()) :
                    $email_old = $row['email_nv'];
                    // echo $row['email_nv'];
                    // if(isset($row['email_nv'])){
                    // $email_old = $row['email_nv'];
                    // }else echo 'đéo  so sánh đc';
                    if ($_POST['email_nv'] == $email_old) {
                        $email_nvErr = "<h6>* email nhân viên đã tồn tại !</h6>";
                    }
                endwhile;
            }
            if (empty($dia_chi_nv)) {
                $dia_chi_nvErr = "<h6>* vui lòng nhập địa chỉ </h6> ";
            } else {
                $dia_chi_nvs = input_Submit($dia_chi_nv);
            }
            //kiểm tra tên đn
            if (empty($pass_dn)) {
                $pass_dnErr = "<h6>* vui lòng nhập mật khẩu đăng nhập</h6> ";
            } else {
                $pass_dns = input_Submit($pass_dn);
                // if (!preg_split('/^{6,20}$/',$pass_dns)) {
                //     $pass_dnErr = "<h6>*phải từ 6->20 ký tự !</h6>";
                // }
            }
            if (!$hoten_nvErr && !$email_nvErr && !$sdt_nvErr && !$dia_chi_nvErr && !$pass_dnErr) {
                $date = new DateTime("now");
                $ngay_tao = $date->format("y-m-d");
                $add = new Admin();
                $add->add_employee($hoten_nvs, $ngay_sinh, $gioi_tinh_nv, $sdt_nvs, $email_nvs, $dia_chi_nvs, $avatar_nv, $pass_dns, $role, $status, $ngay_tao);
                echo '<script> alert ("thêm thông nhân viên thành công !");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=manage_employee"/>';
            } else {
                echo '<script> alert ("vui lòng điền chính xác, đầy đủ thông tin của nhân viên !");</script>';
            }
        }

        include 'views/add_employee.php';
        break;
    case 'setting_employee':
        include 'views/setting_employee.php';
        break;
    case 'update_employee':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $hoten_nv = $_POST['hoten_nv'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh_nv = $_POST['gioi_tinh_nv'];
            $sdt_nv = $_POST['sdt_nv'];
            $email_nv = $_POST['email_nv'];
            $dia_chi_nv = $_POST['dia_chi_nv'];
            $link_avatar = $_POST['link_url'];
            $role = $_POST['role'];
            $status = $_POST['status'];
            $update_eply = new Admin();
            $date = new DateTime("now");
            $ngay_sua = $date->format("y-m-d");
            $update_eply->update_employee($id, $hoten_nv, $ngay_sinh, $gioi_tinh_nv, $sdt_nv, $email_nv, $dia_chi_nv, $link_avatar, $role, $status, $ngay_sua);
        }
        break;
    case 'update_pass':
        if (isset($_POST['submit'])) {
            $pass_dn = $_POST['pass_dn'];
            $id = $_POST['id'];
            $txt_pass_dn = '';
            $Err_pass_dn = '';
            function test_data($data)
            {
                $data = trim($data);
                $data = htmlspecialchars(($data));
                $data = strtolower($data);
                return $data;
            }
            $sp = new Admin();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($pass_dn)) {
                    $Err_pass_dn = '* Vui lòng nhập mật khẩu !';
                } else {
                    $txt_pass_dn = test_data($pass_dn);
                }
                if (!$Err_pass_dn) {
                    try {
                        $sp->update_pass_employee($id, $pass_dn);
                        echo '<script>alert("cập nhật mật khẩu thành công")</script>';
                    } catch (PDOException $e) {
                        echo $e;
                        die($e->getMessage());
                    }
                } else {
                    echo '<script>alert("cập nhật mật khẩu thất bại !")</script>';
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=manage_employee"/>';
        break;
    case 'employee_export':
        include 'export_file/employee.php';
        break;
    case 'delete_employee':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $delete = new Admin();
            $delete->delete_employee($id);
        }
        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=login&act=manage_employee"/>';
        break;
    case 'setting_profile':
        include 'views/setting_profile.php';
        break;
    case 'update_role':
        if (isset($_POST['submit'])) {
            $role = $_POST['role'];
            $id = $_POST['id'];
            $txt_role = '';
            $Err_role = '';
            function test_data($data)
            {
                $data = trim($data);
                $data = htmlspecialchars(($data));
                $data = strtolower($data);
                return $data;
            }
            $sp = new Admin();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($role)) {
                    $Err_role = '* Vui lòng chọn chức vụ cho nhân viên!';
                } else {
                    $txt_role = test_data($role);
                }
                if (!$Err_role) {
                    try {
                        $sp->update_role_employee($id, $role);
                        echo '<script>alert("cập nhật chức vụ thành công")</script>';
                    } catch (PDOException $e) {
                        echo $e;
                        die($e->getMessage());
                    }
                } else {
                    echo '<script>alert("bạn chưa chọn chức vụ ")</script>';
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=manage_employee"/>';
        break;
    case 'update_status':
        if (isset($_POST['submit'])) {
            $status = $_POST['status'];
            $id = $_POST['id'];
            $txt_status = '';
            $Err_status = '';
            function test_data($data)
            {
                $data = trim($data);
                $data = htmlspecialchars(($data));
                $data = strtolower($data);
                return $data;
            }
            $sp = new Admin();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($status)) {
                    $Err_status = '* Vui lòng chọn trạng thái hoạt động cho nhân viên!';
                } else {
                    $txt_status = test_data($status);
                }
                if (!$Err_status) {
                    try {
                        $sp->update_status_employee($id, $status);
                        echo '<script>alert("cập nhật trạng thái thành công")</script>';
                    } catch (PDOException $e) {
                        echo $e;
                        die($e->getMessage());
                    }
                } else {
                    echo '<script>alert("bạn chưa chọn trạng thái nhân viên ")</script>';
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=manage_employee"/>';
        break;

    case 'update_profile':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $hoten_nv = $_POST['hoten_nv'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh_nv = $_POST['gioi_tinh_nv'];
            $sdt_nv = $_POST['sdt_nv'];
            $email_nv = $_POST['email_nv'];
            $dia_chi_nv = $_POST['dia_chi_nv'];
            $link_avatar = $_POST['link_url'];
            $update_pro = new Admin();
            $update_pro->update_profile($id, $hoten_nv, $ngay_sinh, $gioi_tinh_nv, $sdt_nv, $email_nv, $dia_chi_nv, $link_avatar);
            //
            // $hoten_nvErr=$ngay_sinhErr=$gioi_tinh_nvErr=$sdt_nvErr=$email_nvErr=$dia_chi_nvErr='';
            // $hoten_nvs=$ngay_sinhs=$gioi_tinh_nvs=$sdt_nvs=$email_nvs=$dia_chi_nvs='';
            // function input_Submit($data)
            // {
            //     $data = trim($data);
            //     $data = htmlspecialchars($data);
            //     return $data;
            // }
            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     if (empty($hoten_nv)) {
            //         $hoten_nvErr = "<h6>* vui lòng nhập đầy đủ họ tên </h6> ";
            //     }else {
            //         $hoten_nvs = input_Submit($hoten_nv);
            //     }
            //     if (empty($ngay_sinh)) {
            //         $ngay_sinhErr = "<h6>* vui lòng chọn ngày sinh </h6> ";
            //     }else {
            //         $ngay_sinhs = input_Submit($ngay_sinh);
            //     }
            //     if (empty($sdt_nv)) {
            //         $sdt_nvErr = "<h6>* vui lòng nhập số điện thoại </h6> ";
            //     }else {
            //         $sdt_nvs = input_Submit($sdt_nv);
            //         if (!preg_match('/^[0]{1}[0-9]{9,10}$/', $sdt_nvs)) {
            //             $sdt_nvErr = "<h6>* số điện thoại phải phù hợp 0 ở đầu và 10-11 số !</h6>";        
            //         }
            //     }

            //     if (empty($email_nv)) {
            //         $email_nvErr = "<h6>* vui lòng nhập email </h6> ";
            //     }else {
            //         $email_nvs = input_Submit($email_nv);

            //         $get=new Admin();
            //         $results = $get->getList_admin();
            //         while ($row = $results->fetch()) :
            //         $email_nv_old = $row['email_nv'];
            //         echo $row['email_nv'];
            //         // if(isset($row['email_nv'])){
            //         $email_nv_old=$row['email_nv'];
            //         // }else echo 'đéo  so sánh đc';
            //         if ($_POST['email_nv']==$email_nv_old) {
            //             $email_nvErr = "<h6>* email nhân viên đã tồn tại !</h6>";        
            //         }
            //         endwhile;
            //     }
            //     if (empty($dia_chi_nv)) {
            //         $dia_chi_nvErr = "<h6>* vui lòng nhập địa chỉ </h6> ";
            //     }else {
            //         $dia_chi_nvs = input_Submit($dia_chi_nv);
            //     }
            // }


            // if (!$ten_khErr && !$email_khErr && !$sdt_khErr && !$dia_chi_khErr && !$ten_dnErr && !$pass_dnErr) {
            //     $update_pro =new Admin();
            //     $update_pro->update_profile($id,$hoten_nvs,$ngay_sinhs,$gioi_tinh_nvs,$sdt_nvs,$email_nvs,$dia_chi_nvs,$link_avatar);
            //     // echo '<script> alert (" !");</script>';
            //     //  echo '<meta http-equiv="refresh" content="0;url=./index.php?action=client&act=get_client"/>';
            // }else{ 
            //     echo '<script> alert ("vui lòng điền chính xác, đầy đủ thông tin  !");</script>';
            // }
        }
        break;
}
?>