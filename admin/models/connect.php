<!-- connection dung(10062022) -->
<?php 
    class connect{
        
        private $db;
        public function __construct(){
            $dsn='mysql:host=localhost;dbname=shopgiay';
            $user='root';
            $pass='';
            // connect data
            try{
                $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));

            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        //lấy 1 dữ liệu
        public function getIntance($select){
            $results=$this->db->query($select);
            $result=$results->fetch();
            return $result;
        }
        //lấy nhiều dòng dữ liệu
        public function getList($select){
            $results=$this->db->query($select);
            return $results;
        }
        //thực thi câu truy vấn bằng execute
        public function exec($query){
            $results=$this->db->exec($query);
            return $results;
        }
        public function execP($query){
            $statement=$this->db->prepare($query);
            return $statement;
        }
        
    }
?>