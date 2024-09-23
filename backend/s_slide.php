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
    //error_reporting(0);
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
            //===========================AJOUTER SLIDES=============
    if(isset($_POST['ajouterslide'])){
        $file_name=$_FILES['input_image']['name'];
        $file_extension=strrchr($file_name, ".");
        $file_tmp_name=$_FILES['input_image']['tmp_name'];
        $path='../assets/img/hero-carousel/'.$file_name;
        $extension_allowed=array('.jpg','.png','.jpeg','.jpg');
        if(in_array($file_extension,$extension_allowed)){
            if(move_uploaded_file($file_tmp_name, $path)){
            //$passeocrypt= md5($us_password);
                $insert_blog=$my_bd->prepare("INSERT INTO tbl_slides(image_sli)VALUE(?)");
                $insert_blog->execute(array($file_name));
                $_SESSION['status'] = " Insertion avec Success !!!";

            }
        }
    }
            //===========================MODIFIER IMAGE IN FOLDER=============
    if(isset($_POST['modifierslide'])){
        $idslide = $_POST['input_idslide'];
        $new_image = $_FILES['input_image']['name'];
        $old_image = $_POST['old_image'];

        if(file_exists("../assets/img/hero-carousel/" . $_FILES['input_image']['name'])){
            $filename = $_FILES['input_image']['name'];
            $_SESSION['status'] = " Image Existe Deja !!!".$filename;
        }
        else{
            $updateblog=$my_bd->prepare("UPDATE tbl_slides SET image_sli=? WHERE id_sli ='$idslide'");
            $updateblog->execute(array($new_image));
            if($updateblog){
                if($new_image == NULL){
                    $_SESSION['status'] = "Image Non Selectionner !!!";
                }
                else{
                    move_uploaded_file($_FILES["input_image"]["tmp_name"], "../assets/img/hero-carousel/".$_FILES["input_image"]["name"]);
                    unlink("../assets/img/hero-carousel/".$old_image);
                    $_SESSION['status'] = " Modification De l'image avec Success";
                }
            }
            else{
                $_SESSION['status'] = " Image Not updated";

            }

        }
    }
            //===========================SUPPRESSION DU PROJET=============
    if(isset($_POST['delete'])){
        $us_id=htmlspecialchars($_POST['id_sli']);
        $image_text = $_POST['image_text'];
        if(isset($us_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_slides WHERE id_sli=?");
            $recupdeletdata->execute(array($us_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                unlink("../assets/img/hero-carousel/".$image_text);
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_slides WHERE id_sli=?");
                $deleteuser->execute(array($us_id));
                $_SESSION['status'] = " Suppression avec Success !!!";

            }
    
        }
    }

    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/s_slide.view.php');
        }
        else{
            header('location: index.php');
        }
    }
?>