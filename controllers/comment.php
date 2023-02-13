<?php
  $action="comment";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action){
    case 'add_comment':
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $matt=$_POST['matt'];
        $masp=$_POST['masp'];
        $id_kh=$_POST['id_kh'];
        $ten_kh=$_POST['ten_kh'];
        $desc=$_POST['desc'];
        $date_cmt=date('Y-m-d h:m:i');
        $cmt=new comment();
        $cmt->insert_comment($masp,$id_kh,$ten_kh,$desc,$date_cmt);
      }
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sp_detail&masp='.$masp.'&matt='.$matt.'"/>';
      break;
    
  }