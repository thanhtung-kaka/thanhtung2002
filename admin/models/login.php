<?php
class Login{
    var $email=null;
    var $pass=null;
    function __construct()
    {
        
    }
    function logAdmin($email_nv,$pass_dn)
    {
        $select="select * from admin where email_nv='$email_nv' and pass_dn='$pass_dn' and statusAcc=1";
        $db=new connect();
        $result=$db->getList($select);
        $set=$result->fetch();
        return $set;
    }
}
?>
