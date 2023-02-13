<?php 
  class home{
    public function get_selecthome($table,$limit){
      if($table=='sanpham'){
        $select="select * from sanpham a, thuoctinh_sp b where a.masp=b.masp and a.status=1 and b.status=1 group by b.masp";
      }else
        $select="select * from `$table` where status=1 limit $limit";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }
    public function search($table,$column,$search){
      $db=new connect();
      if($table=='sanpham'){
        $select="select * from sanpham a, thuoctinh_sp b where a.status=1 and a.masp=b.masp and $column like :name  and b.status=1 group by b.masp";
      }else
      $select="select * from `$table` where $column like :name";
      $res=$db->execP($select);
      $name="%".$search."%";
      $res->bindParam(':name',$name);
      $res->execute();
      return $res;
  }
  }