<?php 
$action='sanpham';
if(isset($_GET['act'])){
    $action=$_GET['act'];
}
switch($action){
    case 'sanpham':
        include 'views/sanpham.php';
        break;
    case 'sp_detail':
        include 'views/sp_detail.php';
        break;
    case 'search':
        include 'views/sanpham.php';
        break;
}
?>