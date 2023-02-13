<!-- văn  -->
<?php
$action = "register";
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "register":
        include 'views/register.php';
        break;
    case 'submit_register':
        $ten_kh = $_POST['ten_kh'];
        $ten_dn = $_POST['ten_dn'];
        $pass_dn = $_POST['pass_dn'];
        $status=1;
        // $pass_confirm = ['pass_confirm'];
        //tạo mảng để chứ tb lỗi
       $ten_khErr= $ten_dnErr = $pass_dnErr = $pass_confirmErr= '';
       $ten_khs= $ten_dns = $pass_dns =  $pass_confirms='';
        function input_Submit($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($ten_kh)) {
                $ten_khErr = "<h6>* vui lòng nhập đầy đủ họ tên của bạn </h6> ";
            }else {
                $ten_khs = input_Submit($ten_kh);
            }
            //kiểm tra tên đn
            if (empty($ten_dn)) {
                $ten_dnErr = "<h6>* vui lòng nhập tên đăng nhập</h6> ";
            }else {
                $ten_dns = input_Submit($ten_dn);

                $get=new User();
                $results = $get->getList_User();
                while ($row = $results->fetch()) :
                $ten_dn_old = $row['ten_dn'];
                // echo $row['email_nv'];
                // if(isset($row['email_nv'])){
                $ten_dn_old=$row['ten_dn'];
                // }else echo 'đéo  so sánh đc';
                if ($_POST['ten_dn']==$ten_dn_old) {
                    $ten_dnErr = "<h6>* tên đăng nhập đã tồn tại !</h6>";        
                }
                endwhile;
                // if (!preg_split('/^{6,20}$/',$ten_dns)) {
                //     $ten_dnErr = "<h6>*phải từ 6->20 ký tự !</h6>";
                // }
            }
            //kiểm tra mật khẩu đăng nhập 
            if (empty($pass_dn)) {
                $pass_dnErr = "<h6> * vui lòng nhập mật khẩu </h6>";
            } else {
                $pass_dns = input_Submit($pass_dn);
                // if (!preg_split('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,10}$/',$pass_dns)) {
                //     $pass_dnErr = "<h6>* Tối thiểu 8 ký tự, ít nhất 1 chữ cái viết hoa, 1 chữ cái viết thường và 1 số !</h6>";
                // }
            }
            /// xác nhận mật khẩu x2
            // if(empty($pass_confirm = $pass_dn)){
            //     $pass_confirmErr= "<h6>* xác nhận mật khẩu không khớp </h6>";
            // } else {
            //     $pass_dns = input_Submit($pass_dn);
            // }
            if (!$ten_khErr && !$ten_dnErr && !$pass_dnErr && !$pass_confirmErr) {
                $date = new DateTime("now");    
                $ngay_dk = $date->format("y-m-d");
                $register=new User();
                $register->insertRegister($ten_khs,$ten_dns,$pass_dns,$ngay_dk,$status);
                echo '<script> alert ("Đăng ký thành công ,vui lòng đăng nhập !");</script>';
                 echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
            }else{
                echo '<script> alert ("vui lòng điền chính xác, đầy đủ thông tin đăng ký !");</script>';
                // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=register"/>';
            }
        }
        include 'views/register.php';
        break;
}
?>
