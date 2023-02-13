<?php

use PhpParser\Node\Stmt\Echo_;

$action="thanhtoan";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action){
    case 'order':
        include 'views/thanhtoan.php';
        break;
    case 'thanhtoan':
        $makh=$_SESSION['id'];
        $fullname=$_POST['fullname'];
        $mail=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $payment=$_POST['payment'];
        $total=0;
        $note=$_POST['note'];
        $trangthai='Đang xử lý';
        $date = date('Y-m-d h:i:s');
        
        $hd=new hoadon();
        $mahd=$hd->insertOrder($makh,$fullname,$mail,$phone,$address,$payment,$total,$note,$trangthai,$date);
        foreach($_SESSION['cart'] as $key=>$item){
            $hd->insertOrderDetail($mahd,$item['masp'],$item['matt'],$item['quantity'],$item['mausac'],$item['size'],$item['total']);
            $total+=$item['total'];
        }
        $hd->updateOrderDetail($mahd,$total);
        unset($_SESSION['cart']);

        $res['status'] = 200;
        $res['message'] = 'Đặt hàng thành công';
        $res['data'] = $mahd;
        echo '#-#', json_encode($res), '#-#';
        break;
    case 'bill':
        include 'views/bill.php';
        break;
}