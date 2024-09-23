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
    $idsessio=$_SESSION['util_id'];
    $recupcookies = $_COOKIE['alluser_email'];

    if(isset($recupcookies)){
        $connectdonne = $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_email=?");
        $connectdonne->execute(array($recupcookies));
        $connectdonne->rowCount();
        $cheks = $connectdonne->fetch();
        if($cheks > 0){
            //$user_id = $cheks['util_id'];
            $user_nom = $cheks['util_nom'];
            $user_passsword = $cheks['util_password'];
            $user_mail = $cheks['util_email'];
            $user_role = $cheks['util_role'];
        }

    }
    // ========================================TOUTES LES FONCTIONS DU PAGES  CONTACT =========================================================
            //===========================AJOUTER CONTACTS=============
    if(isset($_POST['ajoutercontact'])){
        $input_email=htmlspecialchars($_POST['input_email']);
        $input_addresse=htmlspecialchars($_POST['input_addresse']);
        $input_contact=htmlspecialchars($_POST['input_contact']);
        if(isset($input_email)){
            $recupdata=$my_bd->prepare("SELECT * FROM tbl_contact WHERE email_co=?");
            $recupdata->execute(array($input_email));
            $recupdata->rowCount();
            $checkdata=$recupdata->fetch();
            if($checkdata >0){
                ?>
                <script>
                    alert("Contact exist deja");
                </script>
                <?php
            }
            else{
                $insert_blog=$my_bd->prepare("INSERT INTO tbl_contact(email_co,address_co,numero_co)VALUE(?,?,?)");
                $insert_blog->execute(array($input_email,$input_addresse,$input_contact));
                $_SESSION['status'] = "Ajout des Contacts avec Success";

                }
            }
    }
            //===========================MOFICATION DES CONTACT=============
    if(isset($_POST['modifier'])){
        $input_email=htmlspecialchars($_POST['input_email']);
        $input_addresse=htmlspecialchars($_POST['input_addresse']);
        $input_contact=htmlspecialchars($_POST['input_contact']);
        $id_co=htmlspecialchars($_POST['id_co']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_contact WHERE id_co =?");
            $logs->execute(array($id_co));
            $logs->rowCount();
            $checks=$logs->fetch();
                $updateblog=$my_bd->prepare("UPDATE tbl_contact SET email_co=?,address_co=?,numero_co=? WHERE id_co ='$id_co'");
                $updateblog->execute(array($input_email,$input_addresse,$input_contact));
                $_SESSION['status'] = " Modification des Contacts Faite avec Success";

    }
            //===========================SUPPRESSION DES CONTACT=============
    if(isset($_POST['delete'])){
        $about_id=htmlspecialchars($_POST['input_blogid']);
        if(isset($about_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_contact WHERE id_co =?");
            $recupdeletdata->execute(array($about_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_contact WHERE id_co =?");
                $deleteuser->execute(array($about_id));
                $_SESSION['status'] = " Supression des Contacts Faite avec Success";
            }
    
        }
    }


    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/s_contact.view.php');
        }
        else{
            header('location: index.php');
        }
    }
?>