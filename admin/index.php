<?php 
// set time default
date_default_timezone_set('Asia/Ho_Chi_Minh');
//set đường dẫn đến model
set_include_path(get_include_path().PATH_SEPARATOR.'models/');
//tự load phần mở rộng là .php
spl_autoload_extensions('.php');
//tự động load file
spl_autoload_register();
//khởi tạo session
session_start();
    
include 'models/manage_news.php';
include('./models/contact.php');
require ('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>
        <!-- favicon -->
        <link rel="shortcut icon" type="image/png" href="assets/images/logo.png"/> 
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- js bootstrap -->
        <!-- <script src="assets/js/popper.min.js"></script> -->
        <!-- <script src="./assets/js/bootstrap.bundle.min.js"></script> -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- ajax -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- tinyMCE -->
        <script src="https://cdn.tiny.cloud/1/b4nzfdhsg86pdzaf9jg5cxxxrdb7k3tq5umvbbzc7qjxpni1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <!-- css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/search_contact.css">
        <link rel="stylesheet" href="assets/css/style.css">
        
        <title>Shop giày</title>
    </head>
<body>
    <!-- header -->
    
    <?php 
    // echo $_SESSION['email_nv'];
    if(isset($_SESSION['email_nv']))
       {
        include 'include/header.php';
       }
        ?>
            <!-- content -->
            <div class="container-fluid ">
                <div class="row">
                    <?php 
                    if(isset($_SESSION['email_nv']))
                    {
                        include "include/sidebar.php";

                    }
                        ?>
                    <div class="col-md-9 ms-sm-auto col-lg-10">
                        <?php
                        $ctrl='login';
                        if(isset($_SESSION['email_nv']))
                        {
                        if(isset($_GET['action'])){
                            $ctrl=$_GET['action'];
                            include 'controllers/'.$ctrl.'.php';
                        }
                        }else
                        include 'controllers/login.php';
                        ?>
                    </div>
                </div>
            </div>
    
    <!-- js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./ajax/upImage.js"></script>
    <script src="./ajax/upload_img.js"></script>
    <script src="./ajax/sort_dm.js"></script>
    <script src="./ajax/sort_sanpham.js"></script>
    <script src="./ajax/sort_loai.js"></script>
    <script src="./ajax/status.js"></script>
    <script src="./ajax/sweetalert.js"></script>
    <script src="./ajax/contact.js"></script>
    <script src="./ajax/validate_sp.js"></script>
    <script src="./ajax/checkform.js"></script>
    <script src="./ajax/import.js"></script>
    <script src="./ajax/setting_admin.js"></script>
    <script src="./ajax/import_excel.js"></script>
    <script src="./assets/js/tinymce.js"></script>
    <script src="./ajax/export.js"></script>
</body>
</html>
