<?php
  $action="hoadon";
  if(isset($_GET['act']))
  {
      $action=$_GET['act'];
  }
  switch($action){
    case 'donmua':
      include 'views/donmua.php';
      break;
  }