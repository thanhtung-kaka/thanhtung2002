<?php
  $action="manage_news";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action){
      case "manage_news":
        include 'views/manage_news.php';
        break;
      case "manage_newsdetail":
        include 'views/manage_newsdetail.php';
        break;
      case "remove_news":
        if(isset($_GET['id'])){
          $tintuc_id= $_GET['id'];
          $news=new manageNews();
          $news->remove_news($tintuc_id);
          echo "<script>alert('Xoá tin tức thành công !');</script>";
          echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?action=manage_news&act=manage_news'/>";
        }
        break;
      case "insert_news":
        $loai_tintuc=$_POST['loai'];
        $tieu_de=$_POST['tieude'];
        $mota_ngan=$_POST['mota_ngan'];
        $noi_dung=$_POST['noidung'];
        $image=$_POST['link_url'];
        $date=date('Y-m-d h:i:s');
        $db=new manageNews();
        $db->insert_news($loai_tintuc,$tieu_de,$mota_ngan,$noi_dung,$image,$date);
       
        $res['status'] = 200;
        $res['message'] = 'Thêm tin tức thành công';
        $res['data'] = Null;

        echo '#-#', json_encode($res), '#-#';
        
        break;
      case "edit_news":
        include 'views/edit_news.php';
        break;
      case "update_news":
        if(isset($_GET['id'])){
          $tintuc_id= $_GET['id'];
          $loai_tintuc=$_POST['loai'];
          $tieu_de=$_POST['tieude'];
          $mota_ngan=$_POST['mota_ngan'];
          $noi_dung=$_POST['noidung'];
          $image=$_POST['link_url'];
          $date=date('Y-m-d h:i:s');
          $news=new manageNews();
          $news->update_news($tintuc_id,$loai_tintuc,$tieu_de,$mota_ngan,$noi_dung,$image,$status,$date);
          
          $res['status'] = 200;
          $res['message'] = 'Chỉnh sửa tin tức thành công !';
          $res['data'] = Null;
          echo '##-##', json_encode($res), '##-##';
        }else{
          $res['status'] = 403;
          $res['message'] = 'Chỉnh sửa tin tức không thành công !';
          $res['data'] = Null;
          echo '##-##', json_encode($res), '##-##';
        }
        break;
      case "search":
        include 'views/manage_news.php';
        break;
      case "status":
        $tintuc_id=$_POST['tintuc_id'];
        $status=$_POST['status'];
        $news=new manageNews();
        if($status==0){
            $status=1;
            $news->update_status($tintuc_id, $status);
            $res['status'] = 200;
            $res['message'] = 'Thành công';
            $res['data'] ='<span class="btn btn-success status-news" data-status="'.$status.'" data-newsid="'.$tintuc_id.'"><i class="fas fa-eye"></i></span>';
        }else{
            $status=0;
            $news->update_status($tintuc_id, $status);
            $res['status'] = 200;
            $res['message'] = 'Thành công';
            $res['data'] = '<span class="btn btn-success status-news" data-status="'.$status.'" data-newsid="'.$tintuc_id.'"><i class="fas fa-eye-slash" ></i></span>';
        }
        echo '##-##', json_encode($res), '##-##';
        break;
}