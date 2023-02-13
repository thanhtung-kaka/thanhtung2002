<?php
  $action="cart";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action){
    case 'cart':
      include 'views/cart.php';
      break;
    case 'add_cart':
      $masp=$_POST['masp'];
      $mausac=$_POST['mausac'];
      $size=$_POST['size'];
      $qty=$_POST['qty'];
      add_cart($masp,$qty,$mausac,$size);
      echo '####','Thêm vào giỏ hàng thành công','####';
      break;
    case 'update_cart':
      $newqty=$_POST['qty'];
      $matt=$_POST['matt'];
      update_cart($matt,$newqty);
      break;
    case 'remove_cart':
      if(isset($_GET['matt']) && $_GET['matt']!= ''){
        $matt=$_GET['matt'];
        unset($_SESSION['cart'][$matt]);
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart&act=cart" />';
      }
      break;
    
  }