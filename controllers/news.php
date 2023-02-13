<?php
  $action="news";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action){
      case "news":
        include 'views/news.php';
        break;
      case "news_detail":
        include 'views/news_detail.php';
        break;
}