<?php
  class news{
    
    public function getnews(){
      $select="select * from `tintuc` where status=1";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }
    public function getnews_detail($tintuc_id){
      $select="select * from `tintuc` where tintuc_id=$tintuc_id";
      $db=new connect();
      $result = $db->getIntance($select);
      return $result;
    }
    // select sản phẩm cùng loại
    function getnews_loai($type)
    {
        $db = new connect();
        $select = "select * from `tintuc` where status=1 and loai_tintuc_id=$type";
        $result = $db->getList($select);
        return $result;
    }
    // select loại tin tức
    public function getloainews(){
      $select="select * from `loai_tintuc`";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }
    // phân trang tin tức theo loại
    function getListPage_loai($start, $limit, $type)
    {
        $db = new connect();
        $select = "select * from `tintuc` where status=1 and loai_tintuc_id='$type' limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    // phân trang tin tức mặc định 
    function getListPage($start,$limit){
      $db= new connect();
      $select="select * from `tintuc` where status=1 limit ".$start.",".$limit;
      $result=$db->getList($select);
      return $result;
    }
    // select tin tức có lượt xem nhiều nhất
    public function get_hotnews(){
      $select="select * from `tintuc` where status=1 order by luot_xem desc limit 10";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }
    // select random 4 tin tức cùng loại
    public function gettype_news($loai_tintuc_id){
      $select="select * from `tintuc` where status=1 and loai_tintuc_id=$loai_tintuc_id order by rand() limit 4";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }
    // tăng lượt xem của tin tức
    public function update_luotxem($tintuc_id,$luot_xem){
      $query="update `tintuc` set luot_xem=$luot_xem WHERE tintuc_id=$tintuc_id";
      $db=new connect();
      $result = $db->exec($query);
      return $result;
    }
    
  }