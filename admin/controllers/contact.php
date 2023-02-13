<!-- văn văn -->
<?php
$action = 'contact';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
        // nếu act truyền vào bằng contact thì load trang view/contact.php 
    case 'contact':
        include 'views/contact.php';
        break;
        // xóa 
    case 'delete_contact':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $delete = new Contact();
            $delete->delete_contact($id);
        }
        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=contact&act=contact"/>';
        break;
    case 'search_contact':
        include 'views/contact.php';
        break;
    case 'edit_contact':
        include 'views/edit_contact.php';
        break;
        //cập nhật 
    case 'update_contact':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $hoten = $_POST['hoten'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $noidung = $_POST['noidung'];
            // $date = new DateTime("now");
            // $ngaysua = $date->format("y-m-d");
            // $ngaysua = $_POST['ngaysua'];
            $update = new Contact();
            $update->update_contact($id, $hoten, $sdt, $email, $noidung);
            // $update->update_contact($id,$hoten,$sdt,$email,$noidung,$ngaysua);
            // echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=contact&act=contact"/>';

        }
        break;
    case 'view_add_contact':
        include 'views/add_contact.php';
        break;
    case 'submit_add_contact':
        $hoten = $_POST['hoten'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $noidung = $_POST['noidung'];
        //tạo mảng để chứ tb lỗi
        $hotenErr = $emailErr = $sdtErr = $emailErr = $noidungErr = '';
        $hotens = $emails = $sdts = $emails = $noidungs = '';
        function input_Submit($data)
        {
            $data = trim($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($hoten)) {
                $hotenErr = "<h6>* vui lòng nhập đầy đủ họ tên  </h6> ";
            } else {
                $hotens = input_Submit($hoten);
            }
            if (empty($sdt)) {
                $sdtErr = "<h6>* vui lòng nhập số điện thoại </h6> ";
            } else {
                $sdts = input_Submit($sdt);
                if (!preg_match('/^[0]{1}[0-9]{9,10}$/', $sdts)) {
                    $sdtErr = "<h6>* số điện thoại phải phù hợp 10-11 số !</h6>";
                }
            }
            if (empty($email)) {
                $emailErr = "<h6>* vui lòng nhập email </h6> ";
            } else {
                $emails = input_Submit($email);
                $get = new Contact();
                $results = $get->getList_contact();
                while ($row = $results->fetch()) :
                    $email_old = $row['email'];
                    // echo $row['email'];
                    // if(isset($row['email'])){
                    $email_old = $row['email'];
                    // }else echo 'đéo  so sánh đc';
                    if ($_POST['email'] == $email_old) {
                        $emailErr = "<h6>* email đã tồn tại !</h6>";
                    }
                endwhile;
            }
            if (empty($noidung)) {
                $noidungErr = "<h6>* vui lòng nhập nội dung </h6> ";
            } else {
                $noidungs = input_Submit($noidung);
            }

            if (!$hotenErr && !$emailErr && !$sdtErr && !$noidungErr) {
                $date = new DateTime("now");
                $thoigian = $date->format("y-m-d");
                $add = new Contact();
                $add->add_contact($hotens, $sdts, $emails, $noidungs, $thoigian);
                echo '<script> alert ("thêm thông tin tài liên thành công !");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=contact&act=contact"/>';
            } else {
                echo '<script> alert ("vui lòng điền chính xác, đầy đủ thông tin liên hệ của khách hàng !");</script>';
            }
        }
        include 'views/add_contact.php';
        break;

    case 'contact_import':
        include 'views/import_contact.php';
        break;
}
?>