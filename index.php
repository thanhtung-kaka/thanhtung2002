<?php 

// set time default
date_default_timezone_set('Asia/Ho_Chi_Minh');
//khởi tạo session
//set đường dẫn đến model
set_include_path(get_include_path().PATH_SEPARATOR.'models/');
//tự load phần mở rộng là .php
spl_autoload_extensions('.php');
//tự động load file
spl_autoload_register();
//khởi tạo session
session_start();
include('./models/contact.php');
include('./models/cart.php');

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
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/register.js"></script>
<!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- ajax -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.css">
<link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Shop giày</title>
</head>
<body>
 <!-- header -->
 <?php
        include "include/header.php";
    ?>
    <!-- content -->
    <div class="container">
        <!-- <div class="row"> -->
            <?php 
                $ctrl='home';
                if(isset($_GET['action'])){
                    $ctrl=$_GET['action'];
                }
                include "controllers/".$ctrl.'.php';
            ?>
        <!-- </div> -->
    </div>
    <!-- footer -->
    <?php
        include 'include/footer.php';
    ?>

<!-- js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/owl.carousel.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="ajax/detail_sp.js"></script>
<script src="ajax/addcart.js"></script>
<script src="ajax/filterProduct.js"></script>
<script src="ajax/thanhtoan.js"></script>
<script src="assets/js/slide_sp.js"></script>
<script src="./assets/ajax/upload_avatar.js"></script>
</body>
</html>