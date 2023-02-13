<!-- văn văn -->
<?php
class Client
{
    public function __construct()
    {
    }

    function getList_client()
    {
        $db = new connect();
        $select = "SELECT * FROM `khach_hang`";
        $result = $db->getList($select);
        return $result;
    }
    function delete_client($id)
    {
        $db = new connect();
        $del = "DELETE  FROM khach_hang WHERE id=$id";
        $db->exec($del);
    }
    function search_client($search)
    {
        $sear = "SELECT * FROM khach_hang WHERE ten_kh LIKE :ten_kh";
        $db = new connect();
        $result = $db->execP($sear);
        $result->bindvalue(':ten_kh', "%" . $search . "%");
        $result->execute();
        return $result;
    }
    function get_page_client($start, $limit)
    {
        $db = new connect();
        $select = "SELECT * FROM khach_hang LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function Get_edit_client($id)
    {
        $db = new connect();
        $select = "SELECT * FROM khach_hang WHERE id=$id ";
        $result = $db->getIntance($select);
        return $result;
    }
    public function update_client($id, $ten_kh, $email_kh, $sdt_kh, $dia_chi_kh, $gioi_tinh_kh, $avatar, $ngay_sua)
    {
        $ngay_sua = date('Y-m-d');
        $db = new connect();
        $query = "UPDATE khach_hang SET ten_kh='$ten_kh', email_kh='$email_kh', sdt_kh=$sdt_kh, dia_chi_kh='$dia_chi_kh', gioi_tinh_kh='$gioi_tinh_kh', avatar='$avatar', ngay_sua='$ngay_sua' WHERE id=$id";
        $db->exec($query);
    }
    public function update_PassWord($id, $ten_dn, $pass_dn)
    {
        $db = new connect();
        $pass_dnMD5 = md5($pass_dn);
        $query = "UPDATE khach_hang SET ten_dn='$ten_dn', pass_dn='$pass_dnMD5' WHERE id=$id";
        $db->exec($query);
    }
    public function insert_Client($ten_kh, $email_kh, $sdt_kh, $dia_chi_kh, $gioi_tinh_kh, $ten_dn, $pass_dn, $ngay_dk, $avatar, $status)
    {
        $db = new connect();
        $date = new DateTime("now");
        $ngay_dk = $date->format("y-m-d");
        $pass_dnMd5 = md5($pass_dn);
        $query = "insert into khach_hang(ten_kh,email_kh,sdt_kh,dia_chi_kh,gioi_tinh_kh,ten_dn,pass_dn,ngay_dk,avatar,status) values('$ten_kh','$email_kh',$sdt_kh,'$dia_chi_kh','$gioi_tinh_kh','$ten_dn','$pass_dnMd5','$ngay_dk','$avatar',$status)";
        $db->exec($query);
    }
    function update_status_client($id, $status)
    {
        $db = new connect();
        $query = "update khach_hang set status=$status where id=$id";
        $db->exec($query);
    }
}
?>