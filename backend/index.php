<?php
require('../config/databases.php');
error_reporting(0);
session_start();
if(isset($_POST['loginpccf'])){
  $password=htmlspecialchars($_POST['input_password']);
  $email = htmlspecialchars($_POST['input_email']);
  if(isset($password) and !empty($email)){
    $logs=$my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_password=? AND util_email=?");
    $logs->execute(array($password,$email));
    $logs->rowCount();
    $checks=$logs->fetch();
    if($checks >0){ 
      $access= $checks['util_role'];
      $_SESSION['util_id']= $checks['util_id'];
      $_SESSION['util_nom']= $checks['util_nom'];
      $_SESSION['util_password']= $checks['util_password'];
      $_SESSION['util_email']= $checks['util_email'];
      $_SESSION['util_role']= $checks['util_role'];
      setcookie('alluser_email', $email, time() + (86400 * 30), "/");
      if($access == "Administrateur"){
        header('Location: home-page.php');
    }
      elseif($access == "Particulier"){
        header('Location: home-page.php');
    }
      else{
        $utilinonreco= "cet utilisateur ne pa reconnu";
      }
    }
    else{
      $incorect= "incorect email or password";
    }
  }
}
if($my_bd == true){
  require_once('view/index.view.php');
}
?>
 