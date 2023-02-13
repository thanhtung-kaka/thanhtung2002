<!-- văn  -->
<?php
    class lienhe{
        //phương thức insert data vào bảng 
        public function insertLienHe( $hoten,$sdt,$email,$noidung,$thoigian )
        {
            $db=new connect();
            $date= new DateTime("now");
            $thoigian=$date->format("y-m-d");
            $query="insert into lienhe(hoten,sdt,email,noidung,thoigian)values('$hoten','$sdt','$email','$noidung','$thoigian')";
            $db->exec($query);
        }
    }
