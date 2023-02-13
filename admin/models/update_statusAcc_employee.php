<?php
    include 'connect.php';
    include 'admin.php';
    $id=$_POST['id'];
    // echo "$id";
    $statusAcc=$_POST['statusAcc'];
    
    $admin=new Admin();
    if($statusAcc==0){
        $statusAcc=1;
        $admin->update_statusAcc_employee($id,$statusAcc);
        echo ' <span class="status_account me-2" data-sos="'.$statusAcc.'" data-id="' . $id . '"> <i class="fas fa-lock-open" title="được phép truy cập"></i></span>';
    }else{
        $statusAcc=0;
        $admin->update_statusAcc_employee($id,$statusAcc);
        echo ' <span class="status_account me-2" data-sos="'.$statusAcc.'" data-id="' . $id . '"> <i class="fas fa-lock" title="ngừng truy cập"></i></span>';
    }
