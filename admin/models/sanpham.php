<?php
class sanpham
{
    private $masp;
    private $tensp;
    private $dongia;
    private $giamgia;
    private $soluongton;
    private $size;
    private $mausac;
    private $nhomsp;
    private $hinh;
    private $mota;
    private $ngaynhap;
    private $ngaysua;
    private $soluotxem;

    public function __construct()
    {
    }
    //lấy danh sách sản phẩm
    function getlistsp()
    {
        $db = new connect();
        $select = "select * from sanpham";

        $result = $db->getList($select);
        // echo $result['tensp'];
        return $result;
    }
    //lấy danh sách sản phẩm theo loại sản phẩm
    function getlistsp_loai($maloai_sp)
    {
        $db = new connect();
        $select = "select * from sanpham where maloai_sp=$maloai_sp";

        $result = $db->getList($select);
        // echo $result['tensp'];
        return $result;
    }
    
    function getListPage_loai($start, $limit, $loaisp)
    {
        $db = new connect();
        $select = "select * from sanpham where maloai_sp='$loaisp' limit " . $start . "," . $limit;
        $result = $db->getList($select);
        // echo $result['tensp'];
        return $result;
    }
    function getListPage($start, $limit)
    {
        $db = new connect();

        $select = "select * from sanpham order by masp desc limit " . $start . "," . $limit;


        $result = $db->getList($select);
        // echo $result['tensp'];
        return $result;
    }
    //insert sản phẩm
    function insertsp($tensp, $mota, $maloai_sp, $status)
    {
        $ngaynhap = date('Y-m-d h:i:s');
        $db = new connect();
        $query = "insert into sanpham(masp,tensp,mota,ngaynhap,ngaysua,soluotxem,maloai_sp,status) values(null,'$tensp','$mota','$ngaynhap',null,0,$maloai_sp,$status)";
        $db->exec($query);
        
    }
    //san pham
    function getOneSP($masp)
    {
        $db = new connect();
        $select = "select * from sanpham where masp=$masp";
        $result = $db->getIntance($select);
        return $result;
    }
    function updateSp($masp, $tensp, $mota, $maloai_sp, $status)
    {
        $ngaysua = date('Y-m-d h:i:s');
        $db = new connect();
        $query = "update sanpham set tensp='$tensp', mota='$mota', ngaysua='$ngaysua', maloai_sp=$maloai_sp, status=$status where masp=$masp";
        $db->exec($query);
    }
    function xoasp($masp)
    {
        $db = new connect();
        $query = "delete from sanpham where masp=$masp";
        $delete_attr="delete from thuoctinh_sp where masp=$masp";
        $db->exec($query);
        $db->exec($delete_attr);
    }
    function update_status($masp, $status)
    {
        $db = new connect();
        $query = "update sanpham set status=$status where masp=$masp";
        $db->exec($query);
    }
    function getProductName(){
        $db=new connect();
        $select="select * from sanpham";
        $res=$db->getList($select);
        return $res;
    }
    //thuộc tính sản phẩm
    function getListAttrSp($masp){
        $db= new connect();
        $select ="select * from thuoctinh_sp where masp=$masp";
        $result=$db->getList($select);
        return $result;
    }
    function insert_attr_sp($masp,$dongia, $giamgia, $soluongton, $size, $mausac, $hinh,$status){
        $db = new connect();       
        $query="insert into thuoctinh_sp(matt,masp,mamau,masize,dongia,giamgia,soluongton,hinh,status) values(null,$masp,$mausac,$size,$dongia,$giamgia,$soluongton,'$hinh',$status)";
        
        $db->exec($query);
    }
    function remove_attr_sp($matt){
        $db=new connect();
        $query="delete from thuoctinh_sp where matt=$matt";
        $db->exec($query);

    }
    //Lấy thuộc tính của sản phẩm để edit
    function getOneAttr($matt)
    {
        $db = new connect();
        $select = "select * from thuoctinh_sp where matt=$matt";
        $result = $db->getIntance($select);
        return $result;
    }
    function update_attr_sp($matt,$dongia, $giamgia, $soluongton, $size, $mausac, $hinh,$status){
        $db=new connect();
        $query="update thuoctinh_sp set dongia=$dongia, giamgia=$giamgia, soluongton=$soluongton, masize=$size, mamau='$mausac', hinh= '$hinh',status=$status where matt=$matt";
    
        $db->exec($query);
    }
    function update_status_attr($matt,$status){
        $db=new connect();
        $query="update thuoctinh_sp set status=$status where matt=$matt";
        $db->exec($query);
    }
    
    //tim kiem
    function searchSp($timkiem)
    {
        $db = new connect();
        $select = "select * from sanpham where tensp like :tensp";
        $res = $db->execP($select);
        $name = "%" . $timkiem . "%";
        $res->bindParam(':tensp', $name);
        $res->execute();
        return $res;
    }
    function themDM($tendm)
    {
        $db = new connect();
        $query = "insert into danhmuc_sp(madm_sp,tendm) values(null,'$tendm')";
        $db->exec($query);
    }
    function getListDM()
    {
        $db = new connect();
        $select = "select * from danhmuc_sp";
        $result = $db->getList($select);
        return $result;
    }
    function xoadm($madm)
    {
        $db = new connect();
        //xóa danh mục
        $query = "delete from danhmuc_sp where madm_sp=$madm";
        $update_loai_sp="update loai_sp set madm_sp=0 where madm_sp=$madm";
        $db->exec($query);
        $db->exec($update_loai_sp);

    }
    function UploadDM($madm, $tendm)
    {
        $db = new connect();
        $query = "update danhmuc_sp set tendm='$tendm' where madm_sp=$madm";
        $db->exec($query);
    }
    function themLoaiSp($tenLoai, $madm_sp)
    {
        $db = new connect();
        $query = "insert into loai_sp(maloai_sp,tenloai,madm_sp) values(null,'$tenLoai',$madm_sp)";
        $db->exec($query);
    }
    function getListLoaiSp()
    {
        $db = new connect();
        $select = "select * from loai_sp";
        $result = $db->getList($select);
        return $result;
    }
    function xoaLoaiSp($maloai_sp)
    {
        $db = new connect();
        $query = "delete from loai_sp where maloai_sp=$maloai_sp";
        $queryUploadSP = "update sanpham set maloai_sp=0 where maloai_sp=$maloai_sp";
        $db->exec($query);
        $db->exec($queryUploadSP);
    }
    function UploadLoaiSp($maloai, $tenloai, $madm_sp)
    {
        $db = new connect();
        $query = "update loai_sp set tenloai='$tenloai',madm_sp=$madm_sp where maloai_sp=$maloai";
        $db->exec($query);
    }
    function getDm($madm_sp)
    {
        $db = new connect();
        $select = "select * from danhmuc_sp where madm_sp=$madm_sp";
        $res = $db->getIntance($select);
        return $res;
    }
    function getLoaisp($maloai_sp)
    {
        $db = new connect();
        $select = "select * from loai_sp where maloai_sp=$maloai_sp";
        $res = $db->getIntance($select);
        return $res;
    }
    //sắp xếp trong bảng danh mục
    function sort_dm($column_name, $sort)
    {
        $db = new connect();
        $select = "select * from danhmuc_sp order by $column_name $sort";
        $res = $db->getList($select);
        return $res;
    }
    //sắp xếp trong bảng sản phẩm 
    function sort_sp($start, $limit, $column_name, $sort)
    {
        $db = new connect();
        $select = "select * from sanpham order by $column_name $sort limit  $start, $limit";
        $result = $db->getList($select);
        return $result;
    }
    //sắp xếp trong bảng thuộc tính
    function sort_attr($masp,$column_name, $sort)
    {
        $db = new connect();
        $select = "select * from thuoctinh_sp where masp=$masp order by $column_name $sort";
        $result = $db->getList($select);
        return $result;
    }
    //sắp xếp trong bảng loại sản phẩm
    function sort_loai_sp($column_name, $sort)
    {
        $db = new connect();
        $select = "select * from loai_sp order by $column_name $sort";
        $result = $db->getList($select);
        return $result;
    }
    //thêm màu sắc vào bảng màu sắc
    function themmau($tenmau)
    {
        $db = new connect();
        $query = "insert into mausac(mamau,tenmau) values(null,'$tenmau')";
        $db->exec($query);
    }
    //sửa màu sắc sản phẩm
    function update_mausac_sp($mamau, $tenmau)
    {
        $db = new connect();
        $query = "update mausac set tenmau='$tenmau' where mamau=$mamau";
        $db->exec($query);
    }
    //xóa màu sắc
    function remove_mausac($mamau)
    {
        $db = new connect();
        $queryremove = "delete from mausac where mamau=$mamau";
        $query_update_sanpham = "update thuoctinh_sp set mamau=0 where mamau=$mamau";
        $db->exec($queryremove);
        $select = "select mamau from thuoctinh_sp where mamau=$mamau";
        $count = $db->getList($select)->rowCount();
        if ($count > 0) {
            $db->exec($query_update_sanpham);
        }
    }
    //lấy danh sách các màu sắc
    function getListMau()
    {
        $db = new connect();
        $select = "select * from mausac";
        $res = $db->getList($select);
        return $res;
    }
    //them size
    function themsize($so_size)
    {
        $db = new connect();
        $query = "insert into size(ma_size,so_size)values(null,'$so_size')";
        $db->exec($query);
    }
    //update size
    function update_size($ma_size, $so_size)
    {
        $db = new connect();
        $query = "update size set so_size='$so_size' where ma_size=$ma_size";
        $db->exec($query);
    }
    //xóa size 
    function remove_size($ma_size)
    {
        $db = new connect();
        $queryRemove = "delete from size where ma_size=$ma_size";
        $queryUpdateSp = "update thuoctinh_sp set masize=0 where masize=$ma_size";
        $db->exec($queryRemove);
        $select = "select masize from thuoctinh_sp where masize=$ma_size";
        $count = $db->getList($select)->rowCount();
        if ($count > 0) {
            $db->exec($queryUpdateSp);
        }
    }
    //lấy danh sách các size 
    function getListSize()
    {
        $db = new connect();
        $select = "select * from size";
        $res = $db->getList($select);
        return $res;
    }
    //lấy màu sắc của sản phẩm
    function getMauSp($mamau)
    {
        $db = new connect();
        $select = "select * from mausac where mamau=$mamau";
        $res = $db->getIntance($select);
        return $res;
    }
    //lấy size của sản phẩm
    function getSizeSp($ma_size)
    {
        $db = new connect();
        $select = "select * from size where ma_size=$ma_size";
        $res = $db->getIntance($select);
        return $res;
    }
    
}
