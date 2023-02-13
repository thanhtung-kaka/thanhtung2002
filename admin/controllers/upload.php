<?php
  if(!empty($_FILES['file'])){
    $duoi=explode('.',$_FILES['file']['name']);
    $duoi=$duoi[(count($duoi)-1)];

    if($duoi==='jpg' || $duoi==='png' || $duoi==='gif' || $duoi==='jpeg'){
      if (move_uploaded_file($_FILES['file']['tmp_name'], '../../assets/images/update_img/'. time().'_' . $_FILES['file']['name'])) {

        echo '../assets/images/update_img/'. time().'_'  .$_FILES['file']['name'];
        
      }else { 
      die('Có lỗi!');
      }
    }else {
      die('Chỉ được upload ảnh');
    }
  }else {
    die('Lock');
  }