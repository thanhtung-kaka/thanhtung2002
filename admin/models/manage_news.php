<?php
  class manageNews{
    public function __construct(){}
    // truy vấn loại tin tức theo id 
    public function getloai_news($loai_tintuc_id){
      $select="select * from `loai_tintuc` where loai_tintuc_id=$loai_tintuc_id";
      $db=new connect();
      $result = $db->getIntance($select);
      return $result;
    }
    // select loại tin tức
    public function getloainews(){
      $select="select * from `loai_tintuc`";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }
    // selct theo loại tin tức
    function getnews_loai($loai)
    {
        $db = new connect();
        $select = "select * from `tintuc` where loai_tintuc_id=$loai";
        $result = $db->getList($select);
        return $result;
    }
    // xóa loại tin tức
    public function remove_loainews($loai_tintuc_id){
      $change="update `tintuc` set loai_tintuc_id = replace(loai_tintuc_id,$loai_tintuc_id, 0) WHERE loai_tintuc_id = $loai_tintuc_id";
      $query="delete from `loai_tintuc` where loai_tintuc_id=$loai_tintuc_id";
      $db=new connect();
      $db->exec($query);
      $db->exec($change);
    }
    // thêm loại tin tức
    public function insert_loainews($loai_tintuc){
      $query="insert into `loai_tintuc`(loai_tintuc_id,ten_loai_tintuc) 
      values ('null', '$loai_tintuc')";
      $db=new connect();
      $db->exec($query);
    }
    // select tin tức 
    public function getnews(){
      $select="select * from `tintuc`";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }
    // select tin tức theo id
    public function getnews_detail($tintuc_id){
      $select="select * from `tintuc` where tintuc_id=$tintuc_id";
      $db=new connect();
      $result = $db->getIntance($select);
      return $result;
    }
    // thêm tin tức
    public function insert_news($loai_tintuc,$tieu_de,$mota_ngan,$noi_dung,$image,$date){
      $query="insert into `tintuc`(tintuc_id,loai_tintuc_id,tieu_de,luot_xem,mota_ngan,noi_dung,image_tintuc,status,date_update) 
      values ('null', '$loai_tintuc', '$tieu_de','null', '$mota_ngan','$noi_dung','$image','null', '$date')";
      $db=new connect();
      $db->exec($query);
    }
    // update tin tức
    public function update_news($tintuc_id,$loai_tintuc,$tieu_de,$mota_ngan,$noi_dung,$image,$status,$date){
      $query="update `tintuc` set tintuc_id='$tintuc_id',loai_tintuc_id='$loai_tintuc',tieu_de='$tieu_de',mota_ngan='$mota_ngan',noi_dung='$noi_dung',image_tintuc='$image',date_update='$date' WHERE tintuc_id=$tintuc_id";
      $db=new connect();
      $db->exec($query);
    }
    // xóa tin tức
    public function remove_news($tintuc_id){
      $query="delete from `tintuc` where tintuc_id=$tintuc_id";
      $db=new connect();
      $db->exec($query);
    }
    // phân trang mặc định
    function getListPage($start,$limit){
      $db= new connect();
      $select="select * from `tintuc` limit ".$start.",".$limit;
      $result=$db->getList($select);
      return $result;
    }
    // phân trang theo loại
    function getListPage_loai($start, $limit, $loai)
    {
      $select = "select * from `tintuc` where loai_tintuc_id='$loai' limit " . $start . "," . $limit;
      $db = new connect();
      $result = $db->getList($select);
      return $result;
    }
    // tìm kiếm 
    function searchNews($search){
      $db=new connect();
      $select="select * from `tintuc` where tieu_de like :search";
      $res=$db->execP($select);
      $name="%".$search."%";
      $res->bindParam(':search',$name);
      $res->execute();
      return $res;
    }
    // cập nhật trạng thái
    function update_status($tintuc_id, $status){
        $db = new connect();
        $query = "update `tintuc` set status=$status where tintuc_id=$tintuc_id";
        $db->exec($query);
    }
  }
?>
