<?php
  $action="home";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action){
      case "home":
        include 'views/home.php';
        break;
      case "search":
        include 'views/search.php';
        break;
      case "timkiem":
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          if(isset($_POST['searchQuery']) && $_POST['searchQuery']==' ' || $_POST['searchQuery']==null){
            if($_POST['table']=='sanpham'){
              echo "<meta http-equiv='refresh' content='0; url=index.php?action=sanpham&act=sanpham'/>";
            }
            elseif($_POST['table']=='tintuc'){
              echo "<meta http-equiv='refresh' content='0; url=index.php?action=news&act=news'/>";
            }
            
          }else{
            $table=$_POST['table'];
            $search=$_POST['searchQuery'];
            echo "<meta http-equiv='refresh' content='0; url=index.php?action=home&act=search&table=$table&name=$search'/>";
          }
          
        }
        break;
        case "introduce":
          include 'views/introduce.php';
          break;
      
}