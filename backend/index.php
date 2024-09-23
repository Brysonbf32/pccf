<?php
 /**
  *++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 * @author JABF32                                                  ++       
 * TELEPHONE: +243 901246672                                       ++
 * WHATSAP  : +243 991 074 111                                     ++
 * EMAIL    : nsibulabahati@gmail.com                              ++
 * DATE Co  : DU 14 AVRIL AU 26 AVRIL 2024                         ++
 * #=======SITE WEB DYNAMICS PEACE CHANGA-CHANGA FOUNDATION=====#  ++
 *                                                                 ++
 *                                                                 ++
 * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */

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
        header('Location: home-page');
    }
      else{
        $_SESSION['status'] = " Cet Utilisateur N'est Pas Reconnu !!!";
      }
    }
    else{
      $_SESSION['status'] = " Email ou Mot De Passe Incorect !!!";
    }
  }
}
if($my_bd == true){
  require('view/index.view.php');
}
?>
 