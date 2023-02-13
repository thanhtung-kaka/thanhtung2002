<?php 
  class comment{

    function insert_comment($masp,$id_kh,$ten_kh,$desc,$date_cmt){
      $query="INSERT INTO `comment`(`id_cmt`, `masp`, `id_kh`, `ten_kh`, `desc`, `date_cmt`) 
                            VALUES (null,$masp,$id_kh,'$ten_kh','$desc','$date_cmt')";
      $db=new connect();
      $db->exec($query);
    }
    public function getcomment_sp($masp){
      $select="select * from `comment` where masp=$masp";
      $db=new connect();
      $result = $db->getList($select);
      return $result;
    }


  }