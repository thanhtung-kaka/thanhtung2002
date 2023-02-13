<?php
class hoadon{
    public function __construct(){}

    public function getOrder(){
      $select="select * from `hoadon` group by mahd desc";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }
    public function getOrder_detail($mahd){
      $select="select * from `hoadon` where mahd=$mahd";
      $db=new connect();
      $result = $db->getIntance($select);
      return $result;
    }
    public function getListPage($start,$limit){
      $db= new connect();
      $select="select * from `hoadon` group by mahd desc limit ".$start.",".$limit;
      $result=$db->getList($select);
      return $result;
    }
    public function gethoadon_trangthai($trangthai){
      $select = "select * from `hoadon` where trangthai='$trangthai'";
      $db = new connect();
      $result = $db->getList($select);
      return $result;
    }
    public function getListPage_trangthai($start, $limit, $trangthai){
      $db = new connect();
        $select = "select * from `hoadon` where trangthai='$trangthai' limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    public function searchOrder($search){
      $db=new connect();
      $select="select * from `hoadon` where mahd like :search ";
      $res=$db->execP($select);
      $name="%".$search."%";
      $res->bindParam(':search',$name);
      $res->execute();
      return $res;
    }
    public function remove_order($mahd){
      $query="delete from `hoadon` where mahd=$mahd";
      $db=new connect();
      $db->exec($query);
    }
    public function update_hoadon($mahd,$sdt,$diachi,$trangthai,$date){
      $query="UPDATE `hoadon` SET `sdt`='$sdt',`diachi`='$diachi',`trangthai`='$trangthai',`ngaycaphat`='$date' where mahd=$mahd";
      $db=new connect();
      $db->exec($query);
    }
}