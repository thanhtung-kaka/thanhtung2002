<?php
  $action="manage_danhmuc";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action){
      case "manage_danhmuc":
        include 'views/manage_danhmuc.php';
        break;
        case "insert_loainews":
          $loai_tintuc=$_POST['loai_tintuc'];
          $new = new manageNews();
          $new->insert_loainews($loai_tintuc);
          echo "<script>alert('Thêm danh mục tin tức thành công !');</script>";
          echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?action=manage_danhmuc'/>";
          break;
        case "remove_loainews":
          if(isset($_GET['id'])){
            $loai_tintuc_id= $_GET['id'];
            $news=new manageNews();
            $news->remove_loainews($loai_tintuc_id);
            echo "<script>alert('Xoá danh mục thành công !');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?action=manage_danhmuc'/>";
          }
          break;
  }