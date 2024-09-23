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
    // ========================================TOUTES LES FONCTIONS DU PAGES  PROGRAMMES =========================================================
            //===========================AJOUTER PROJET=============
    if(isset($_POST['ajouterprojet'])){
        $input_projet=htmlspecialchars($_POST['input_projet']);
        $file_name=$_FILES['input_image']['name'];
        $file_extension=strrchr($file_name, ".");
        $file_tmp_name=$_FILES['input_image']['tmp_name'];
        $path='../assets/img/projects/'.$file_name;
        $extension_allowed=array('.jpg','.png','.jpeg','.jpg');
        if(in_array($file_extension,$extension_allowed)){
            if(move_uploaded_file($file_tmp_name, $path)){
            //$passeocrypt= md5($us_password);
                $insert_blog=$my_bd->prepare("INSERT INTO tbl_projets(categorie_prj,image_prj)VALUE(?,?)");
                $insert_blog->execute(array($input_projet,$file_name));
                $_SESSION['status'] = " Ajout du Projet Fait avec Success";
            }
        }
    }
            //===========================MODIFIER PROJET=============
    if(isset($_POST['modifier'])){
        $input_projet=htmlspecialchars($_POST['input_projet']);
        $id_prj=htmlspecialchars($_POST['id_prj']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_projets WHERE id_prj=?");
            $logs->execute(array($id_prj));
            $logs->rowCount();
            $checks=$logs->fetch();
            if($checks >0){
                $file_name=$_FILES['input_image']['name'];
                $file_extension=strrchr($file_name, ".");
                $file_tmp_name=$_FILES['input_image']['tmp_name'];
                $path='../assets/img/projects/'.$file_name;
                $extension_allowed=array('.jpg','.png','.jpeg');
                if(in_array($file_extension,$extension_allowed)){
                    if(move_uploaded_file($file_tmp_name, $path)){
                $updateblog=$my_bd->prepare("UPDATE tbl_projets SET categorie_prj=?,image_prj=? WHERE id_prj ='$id_prj'");
                $updateblog->execute(array($input_projet,$file_name));
                $_SESSION['status'] = " Modification Du Projet Faite avec Success";
                }
            }
        }
    }
            //===========================SUPPRIMER PROJET=============
    if(isset($_POST['delete'])){
        $id_prj=htmlspecialchars($_POST['id_prj']);
        if(isset($id_prj)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_projets WHERE id_prj=?");
            $recupdeletdata->execute(array($id_prj));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_projets WHERE id_prj=?");
                $deleteuser->execute(array($id_prj));
                $_SESSION['status'] = " Suppression Faite avec Success";
            }
    
        }
    }

    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/s_projets.view.php');
        }
        else{
            header('location: index.php');
        }
    }
    ?>