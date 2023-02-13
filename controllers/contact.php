<!-- văn -->
<?php
include('./models/connect.php');
$action = 'contact';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'home':
        include 'views/home.php';
        break;
    case 'contact':
        include 'views/contact.php';
        break;
    case 'addcontact':
        $hoten = $_POST['hoten'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $noidung = $_POST['noidung'];
        // khai báo mảng $error để chứa lỗi  
        $hotenErr = $sdtErr = $emailErr = $noidungErr = '';
        $hotens = $sdts = $emails = $noidungs = '';
        function addcont_input($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($hoten)) {
                $hotenErr = "<h6>* vui lòng nhập họ tên</h6>";
            } else {
                $hotens = addcont_input($hoten);
                if (!preg_split('/^[a-zA-Z-]$/', $hotens)) {
                    $hotenErr = "<h6>* họ tên phải phù hợp !</h6>";
                }
            }
            // kiểm tra số điện thoại bắt đầu số 0 và10-11 số 
            if (empty($sdt)) {
                $sdtErr = "<h6>* vui lòng nhập số điện thoại</h6>";
            } else {
                $sdts = addcont_input($sdt);
                if (!preg_match('/^[0]{1}[0-9]{9,10}$/', $sdts)) {
                    $sdtErr = "<h6>* số điện thoại phải phù hợp !</h6>";        
                }
            }
            // kiểm tra bắt buộc nhập email
            if (empty($email)) {
                $emailErr = " <br><h6>*vui lòng nhập email</h6>";
            } else {
                $emails = addcont_input($email);
            }
            if (empty($noidung)) {
                $noidungErr = "<h6>* vui lòng nhập nội dung</h6>";
            } else {
                $noidungs = addcont_input($noidung);
            }
            ///
            if (!$hotenErr && !$sdtErr && !$emailErr && !$noidungErr) {
                $date = new DateTime("now");
                $thoigian = $date->format("y-m-d");
                $contact = new lienhe();
                $contact->insertLienHe($hotens, $sdts, $emails, $noidungs, $thoigian);
                echo '<script> alert("Liên Hệ Của Bạn Đã Được Gửi Đi !") ;</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';
            } else {
                echo '<script> alert("vui lòng nhập đúng thông tin liên hệ !") ;</script>';
                // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=contact&act=addcontact"/>';
            }
        }
        include 'views/contact.php';
        break;
}
?>