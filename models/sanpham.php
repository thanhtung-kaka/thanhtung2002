<?php 
///model san pham dũng(16062022)
    class SanPham{
        
    public function getlistsp(){
        $db=new connect();
        $select="select * from sanpham a, thuoctinh_sp b where a.masp=b.masp and a.status=1 and b.status=1 group by b.masp";
        $results=$db->getList($select);
        return $results;
    }
    public function getlistPage($start,$limit){
        $db=new connect();
        $select="select * from sanpham a, thuoctinh_sp b,mausac c where a.masp=b.masp and b.mamau=c.mamau and a.status=1 and b.status=1 group by b.masp limit $start,$limit";
        $results=$db->getList($select);
        return $results;
    }
    public function getSPDetail($masp,$matt){
        $db=new connect();
        $select= "select * from sanpham a,thuoctinh_sp b where a.masp=b.masp and a.masp=$masp and b.matt=$matt and b.status=1";
        $result=$db->getIntance($select);
        return $result;
    }
    // //kiểm tra xem sản phẩm còn thuộc tính không
    // public function getlistattr($masp){
    //     $db=new connect();
    //     $select= "select * from thuoctinh_sp where masp=$masp and status=1";
    //     $result=$db->getList($select);
    //     return $result;
    // }
    public function countAttrSp($masp){
        $db=new connect();
        $select="select * from thuoctinh_sp where masp=$masp and status=1";
        $result=$db->getList($select);
        $count=$result->rowCount();
        return $count;
    }
    public function getListHinh($masp){
        $db=new connect();
        $select="select a.hinh,c.tenmau from thuoctinh_sp a,size b,mausac c where a.masize=b.ma_size and a.mamau=c.mamau and masp=$masp  and status=1 group by a.mamau order by hinh asc";
        $result=$db->getList($select);
        return $result;
    }
    public function getListSize($masp){
        $db=new connect();
        $select="select distinct(b.so_size),b.ma_size from thuoctinh_sp a, size b where a.masize=b.ma_size and masp=$masp  and a.status=1 group by b.so_size asc";
        $result=$db->getList($select);
        return $result;
    }
    public function getListMau($masp){
        $db=new connect();
        $select="select distinct(b.tenmau),b.mamau from thuoctinh_sp a, mausac b where a.mamau=b.mamau and masp=$masp and a.status=1";
        $result=$db->getList($select);
        return $result;
    }
    public function selectMau($masp,$mamau){
        $db=new connect();
        $select="select * from thuoctinh_sp a,mausac b where a.mamau=b.mamau and a.masp=$masp and b.mamau=$mamau group by a.mamau";
        $res=$db->getList($select);
        return $res;
    }
    public function selectSizeOfColor($masp,$mamau){
        $db=new connect();
        $select="select distinct(b.so_size),b.ma_size from thuoctinh_sp a, size b where a.masize=b.ma_size and a.masp=$masp and a.mamau=$mamau and a.status=1 group by b.so_size asc";
        $result=$db->getList($select);
        return $result;
    }
    public function selectSize($masp,$masize){
        $db=new connect();
        $select="select * from thuoctinh_sp a,size b where a.masize=b.ma_size and a.masp=$masp and a.masize=$masize group by a.masize";
        $res=$db->getList($select);
        return $res;
    }
    public function selectColorOfSize($masp,$masize){
        $db=new connect();
        $select="select distinct(b.mamau),b.tenmau from thuoctinh_sp a, mausac b where a.mamau=b.mamau and a.masp=$masp and a.masize=$masize and a.status=1 group by b.mamau";
        $res=$db->getList($select);
        return $res;
    }
    //sản phẩm tương tự 
    public function getSimilarProduct($maloai){
        $db=new connect();
        $select="select b.masp,a.tensp,b.dongia,b.hinh,a.mota,b.matt,a.maloai_sp from sanpham a, thuoctinh_sp b where a.masp=b.masp and a.maloai_sp=$maloai and a.status=1 group by b.masp";
        $res=$db->getList($select);
        return $res;
    }
    public function getProductAddToCart($masp,$mamau,$size){
        $db=new connect();
        $select="select * from sanpham a,thuoctinh_sp b,mausac c, size d where a.masp=b.masp and b.mamau=c.mamau and b.masize=d.ma_size and b.masp=$masp and b.mamau=$mamau and b.masize=$size";
        $result=$db->getIntance($select);
        
        return $result;
    }
    public function getListCategory(){
        $db=new connect();
        $select="select * from danhmuc_sp";
        $res=$db->getList($select);
        return $res;
    }
    public function getListProductType($madm){
        $db=new connect();
        $select="select * from loai_sp where madm_sp=$madm";
        $res=$db->getList($select);
        return $res;
    }
    public function getAllSize(){
        $db=new connect();
        $select="select * from size";
        $res=$db->getList($select);
        return $res;
    }
    public function getAllColor(){
        $db=new connect();
        $select="select * from mausac";
        $res=$db->getList($select);
        return $res;
    }
    //lấy số lượt xem
    public function getViews($masp){
        $db=new connect();
        $select="select soluotxem from sanpham where masp=$masp";
        $res=$db->getIntance($select);
        return $res;
    }
    public function updateView($masp,$views){
        $db=new connect();
        $views=$views+1;
        $query="update sanpham set soluotxem=$views where masp=$masp";
        $db->exec($query);
    }
}
