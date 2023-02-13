<?php 
//trạng thái ẩn hiện sản phẩm dũng 24/06/2022
    include 'connect.php';
    include 'sanpham.php';
    $masp=$_POST['masp'];
    $status=$_POST['status'];
    
    $sp=new sanpham();
    if($status==0){
        $status=1;
        $sp->update_status($masp,$status);
        echo '<span class="status me-2" data-status="'.$status.'" data-masp="'.$masp.'"><i class="fas fa-eye"></i></span>';
    }else{
        $status=0;
        $sp->update_status($masp,$status);
        echo '<span class="status me-2" data-status="'.$status.'" data-masp="'.$masp.'"><i class="fas fa-eye-slash" ></i></span>';

    }
