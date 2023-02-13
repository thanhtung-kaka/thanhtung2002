<!-- văn -->
<?php
class Contact
{
    public function _construct()
    {
    }
    // trả về dữ liệu table liên hệ
    function getList_contact()
    {
        // kết nối 
        $db = new connect();
        $select = "SELECT * FROM `lienhe`";
        $result = $db->getList($select);
        // trả về kết quả truy vấn
        return $result;
    }
    ///tìm theo tên khách hàng 
    function search_contact($search)
    {
        $sear = "SELECT * FROM lienhe WHERE hoten LIKE :hoten";
        $db = new connect();
        $result = $db->execP($sear);
        $result->bindvalue(':hoten', "%" . $search . "%");
        $result->execute();
        return $result;
    }
    // phương thức xóa liên hệ 
    function delete_contact($id)
    {
        $db = new connect();
        $del = "DELETE  FROM lienhe WHERE id=$id";
        $db->exec($del);
    }
    function Get_edit_contact($id)
    {
        $db = new connect();
        $select = "SELECT * FROM lienhe WHERE id=$id ";
        $result = $db->getIntance($select);
        return $result;
    }
    // phương thức update liên hệ 
    // function update_contact($id,$hoten,$sdt,$email,$noidung)
    function update_contact($id, $hoten, $sdt, $email, $noidung)
    {
        $ngaysua = date('Y-m-d');
        $db = new connect();
        $up = "UPDATE lienhe SET hoten='$hoten', sdt=$sdt, email='$email', noidung='$noidung', ngaysua='$ngaysua' WHERE id=$id  ";
        // $up="UPDATE lienhe SET hoten='$hoten', sdt=$sdt, email='$email', noidung='$noidung' ngaysua='$ngaysua' WHERE id=$id  " ;
        $db->exec($up);
    }
    function get_page_contact($start, $limit)
    {
        $db = new connect();
        $select = "select * from lienhe limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    public function add_contact($hoten, $sdt, $email, $noidung, $thoigian)
    {
        $db = new connect();
        $date = new DateTime("now");
        $thoigian = $date->format("y-m-d");
        $query = "insert into lienhe(hoten,sdt,email,noidung,thoigian)values('$hoten','$sdt','$email','$noidung','$thoigian')";
        $db->exec($query);
    }
}
?>