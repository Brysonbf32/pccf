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
    $recupcookies = $_COOKIE['alluser_email'];
    $idsession = $_SESSION['util_id'];
    if(isset($recupcookies)){
        $connectdonne = $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_email=?");
        $connectdonne->execute(array($recupcookies));
        $connectdonne->rowCount();
        $cheks = $connectdonne->fetch();
        if($cheks > 0 ){
            $user_id = $cheks['util_id'];
            $user_nom = $cheks['util_nom'];
            $user_passsword = $cheks['util_password'];
            $user_mail = $cheks['util_email'];
            $user_role = $cheks['util_role'];
        }
        else{
            header('Location: index.php');
            $_SESSION['status'] = " Supression des Contacts Faite avec Success";

        }
    }



    if($my_bd){
        if(isset($recupcookies) and !empty($idsession)){
            require('view/home.view.php');
        }
        else{
            header('location: index.php');
        }
    }
?>