<!-- văn 05/07 -->
<?php
class Admin
{
    public function __construct()
    {
    }
    function getList_admin()
    {
        $db = new connect();
        $select = "select * from admin";
        $result = $db->getList($select);
        return $result;
    }
    function search_employee($search)
    {
        $sear = "select * from admin where hoten_nv like :hoten_nv";
        $db = new connect();
        $result = $db->execP($sear);
        $result->bindvalue(':hoten_nv', "%" . $search . "%");
        $result->execute();
        return $result;
    }
    function get_page_admin($start, $limit)
    {
        $db = new connect();
        $select = "select * from admin limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    public function add_employee($hoten_nv, $ngay_sinh, $gioi_tinh_nv, $sdt_nv, $email_nv, $dia_chi_nv, $avatar, $pass_dn, $role, $status, $ngay_tao)
    {
        $db = new connect();
        $date = new DateTime("now");
        $pass_dnMd5 = md5($pass_dn);
        $ngay_tao = $date->format("y-m-d");
        $query = "insert into admin(hoten_nv,ngay_sinh,gioi_tinh_nv,sdt_nv,email_nv,dia_chi_nv,avatar,pass_dn,role,status,ngay_tao) values('$hoten_nv','$ngay_sinh','$gioi_tinh_nv',$sdt_nv,'$email_nv','$dia_chi_nv','$avatar','$pass_dnMd5',$role,$status,'$ngay_tao')";
        $db->exec($query);
    }
    function Get_one_employee($id)
    {
        $db = new connect();
        $select = "select * from admin WHERE id=$id ";
        $result = $db->getIntance($select);
        return $result;
    }
    public function update_employee($id, $hoten_nv, $ngay_sinh, $gioi_tinh_nv, $sdt_nv, $email_nv, $dia_chi_nv, $avatar, $role, $status, $ngay_sua)
    {
        $ngay_sua = date('Y-m-d');
        $db = new connect();
        $query = "update admin set hoten_nv='$hoten_nv',ngay_sinh='$ngay_sinh', gioi_tinh_nv='$gioi_tinh_nv', sdt_nv=$sdt_nv, email_nv='$email_nv', dia_chi_nv='$dia_chi_nv', avatar='$avatar', role=$role, status=$status, ngay_sua='$ngay_sua' where id=$id";
        $db->exec($query);
    }
    public function update_pass_employee($id, $pass_dn)
    {
        $db = new connect();
        $pass_dnMD5 = md5($pass_dn);
        $query = "update admin set pass_dn='$pass_dnMD5' where id=$id";
        $db->exec($query);
    }
    public function update_role_employee($id, $role)
    {
        $db = new connect();
        $query = "update admin set role='$role' where id=$id";
        $db->exec($query);
    }
    public function update_status_employee($id, $status)
    {
        $db = new connect();
        $query = "update admin set status='$status' where id=$id";
        $db->exec($query);
    }
    function delete_employee($id)
    {
        $db = new connect();
        $del = "delete  from admin WHERE id=$id";
        $db->exec($del);
    }
    function get_one_role($id)
    {
        $db = new connect();
        $select = "select * from admin where id=$id";
        $result = $db->getIntance($select);
        return $result;
    }
    function update_statusAcc_employee($id, $statusAcc)
    {
        $db = new connect();
        $query = "update admin set statusAcc=$statusAcc where id=$id";
        $db->exec($query);
    }
    public function update_profile($id, $hoten_nv, $ngay_sinh, $gioi_tinh_nv, $sdt_nv, $email_nv, $dia_chi_nv, $avatar)
    {
        $db = new connect();
        $query = "update admin set hoten_nv='$hoten_nv', ngay_sinh='$ngay_sinh', gioi_tinh_nv='$gioi_tinh_nv', sdt_nv=$sdt_nv, email_nv='$email_nv', dia_chi_nv='$dia_chi_nv', avatar='$avatar' where id=$id";
        $db->exec($query);
    }
    function get_one_statusAcc($id)
    {
        $db=new connect();
        $select="SELECT * FROM `admin` where id=$id";
        $result=$db->getIntance($select);
        return $result;
    }
}
?>