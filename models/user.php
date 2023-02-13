<?php
class User {
    function getList_User()
    {
        $db= new connect();
        $select= "select * from khach_hang";
        $result=$db->getList($select);
        return $result;
    }
    public function insertRegister($ten_kh,$ten_dn,$pass_dn,$ngay_dk,$status)
    {
        $db= new connect();
        $date= new DateTime("now");
        $ngay_dk=$date->format("y-m-d");
        $status=1;
        $pass_dnMd5=md5($pass_dn);
        $query="insert into khach_hang(ten_kh,ten_dn,pass_dn,ngay_dk,status)values ('$ten_kh','$ten_dn','$pass_dnMd5','$ngay_dk',$status)";
        $db->exec($query);
    }
    public function login($ten_dn,$pass_dn)
    {
        $db = new connect();
        $select="select * from khach_hang where ten_dn='$ten_dn' and pass_dn='$pass_dn' and status=1";
        $set=$db->getIntance($select);
        return $set ;
    }
    public function get_one_client($id)
    {
        $db = new connect();
        $select="SELECT * FROM khach_hang WHERE id=$id ";
        $result=$db->getIntance($select);
        return $result;
    }
    public function update_profile($id,$ten_kh,$email_kh,$sdt_kh,$dia_chi_kh,$gioi_tinh_kh,$avatar)
    {
        $db = new connect();
        $query = "UPDATE khach_hang SET ten_kh='$ten_kh', email_kh='$email_kh', sdt_kh=$sdt_kh, dia_chi_kh='$dia_chi_kh', gioi_tinh_kh='$gioi_tinh_kh', avatar='$avatar' where id=$id";
        $db->exec($query);
    }
    function get_one_status($id)
    {
        $db=new connect();
        $select="SELECT * FROM `khach_hang` where id=$id";
        $result=$db->getIntance($select);
        return $result;
    }
    function getEmail($email)
    {
        $select="select email_kh, pass_dn from khach_hang where email_kh='$email'";
        $db = new connect();
        $result=$db->getIntance($select);
        return $result;
    }
    function getPassEmail($email, $pass)
        {
            $select ="select email_kh, pass_dn from khach_hang 
                      where md5(email_kh)='$email' and md5(pass_dn)='$pass'";
            $db=new connect();
            $result= $db->getIntance($select);
            return $result;
        }
    function updateEmail($emailold,$passnew)
    {
        $db=new connect();
        $query="update khach_hang set pass_dn='$passnew' where email_kh='$emailold'";
        $db->exec($query);
    }
}
?>