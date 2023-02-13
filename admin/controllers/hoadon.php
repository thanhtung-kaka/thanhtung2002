<?php
  $action = 'hoadon';
  if (isset($_GET['act'])) {
      $action = $_GET['act'];
  }
  switch ($action) {
    case 'hoadon':
        include 'views/hoadon.php';
        break;
    case "search":
        include 'views/comment.php';
        break;
    case "remove_hoadon":
        if(isset($_GET['id'])){
            $mahd= $_GET['id'];
            $order=new hoadon();
            $order->remove_order($mahd);
            echo "<script>alert('Xoá tin tức thành công !');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?action=hoadon&act=hoadon'/>";
          }
        break;
    case 'edit_hoadon':
        include 'views/edit_hoadon.php';
        break;
    case 'update_hoadon':
        $mahd=$_POST['mahd'];
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];
        $trangthai=$_POST['trangthai'];
        $date=date('Y-m-d h:i:s');
        $hd=new hoadon();
        $hd-> update_hoadon($mahd,$sdt,$diachi,$trangthai,$date);

        $res['status'] = 200;
        $res['message'] = 'Update hóa đơn thành công !';
        $res['data'] = Null;
        echo '##-##', json_encode($res), '##-##';
        break;
  }