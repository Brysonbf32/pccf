<?php
    require('config/databases.php');
    //error_reporting(0);
    session_start();
    $idsessio=$_SESSION['util_id'];
    $recupcookies = $_COOKIE['alluser_email'];





    if($my_bd){
          require('view/evenement.view.php');

  }
?>