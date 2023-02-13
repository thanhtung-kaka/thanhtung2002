<?php
class hoadon{
    function insertOrder($makh,$fullname,$mail,$sdt,$diachi,$payment,$total,$ghichu,$trangthai,$date){
        $query="INSERT INTO `hoadon`(`mahd`, `makh`, `hoten`, `mail`, `sdt`, `diachi`, `payment`, `tongtien`, `ghichu`,`trangthai`, `ngaydat`)  VALUES (null,$makh,'$fullname','$mail','$sdt','$diachi','$payment',$total,'$ghichu','$trangthai','$date')";
        $db=new connect();
        $db->exec($query);
        $select="select mahd from hoadon order by mahd desc limit 1";
        $res=$db->getIntance($select);
        return $res['mahd'];
    }
    function insertOrderDetail($mahd,$masp,$matt,$soluong,$mausac,$size,$thanhtien){
        $query="insert into cthoadon(mahd,masp,matt,soluongmua,mausac,size,thanhtien) values($mahd,$masp,$matt,$soluong,'$mausac','$size',$thanhtien)";
        $db=new connect();
        $db->exec($query);
        //get số lượng sản phẩm đã được mua
        $selectslmua="select soluongmua from cthoadon where masp=$masp and matt=$matt";
        $resslmua=$db->getIntance($selectslmua);
        //get số lượng tồn của sản phẩm đó
        $selectslton="select soluongton from thuoctinh_sp where masp=$masp and matt=$matt";
        $resslton=$db->getIntance($selectslton);
        //lấy số lượng tồn mới và update vào database
        $newslton=$resslton['soluongton'] - $resslmua['soluongmua'];
        $queryUpSLTon="update thuoctinh_sp set soluongton=$newslton where masp=$masp and matt=$matt";
        $db->exec($queryUpSLTon);
    }
    function updateOrderDetail($mahd,$total){
        $query="update hoadon set tongtien=$total where mahd=$mahd";
        $db=new connect();
        $db->exec($query);
    }
    function getbill($id){
        $select="SELECT * FROM `hoadon` WHERE `mahd`=$id";
        $db=new connect();
        $result = $db->getIntance($select);
        return $result;
    }
    function getbill_detail($bill_id){
        $select="select * from sanpham a, thuoctinh_sp b,cthoadon c where a.masp=c.masp and b.matt=c.matt and c.mahd=$bill_id";
        $db=new connect();
        $result = $db->getList($select);
        return $result;
    }
    public function getbill_user($id)
    {
        $select="select * from `hoadon` where `makh`=$id ORDER BY `mahd` DESC";
        $db=new connect();
        $result = $db->getList($select);
        return $result;
    }
}