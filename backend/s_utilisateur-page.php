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
            $util_image = $cheks['util_image'];
        }

    }
    // ========================================TOUTES LES FONCTIONS DU PAGES  APROPOS =========================================================
            //===========================AJOUTER UTILISATEURS=============
    if(isset($_POST['ajouteruser'])){
        $us_username=htmlspecialchars($_POST['input_nonutili']);
        $us_password=htmlspecialchars($_POST['input_password']);
        $us_mail=htmlspecialchars($_POST['input_mail']);
        $us_role=htmlspecialchars($_POST['input_role']);
        if(isset($us_username) and !empty($us_password) and !empty($us_mail) and !empty($us_role)){
            $recupdata=$my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_email=?");
            $recupdata->execute(array($us_mail));
            $recupdata->rowCount();
            $checkdata=$recupdata->fetch();
            if($checkdata >0){
                ?>
                <script>
                    alert("Utilisateur exist deja");
                </script>
                <?php
            }
            else{
                $file_name=$_FILES['input_image']['name'];
                $file_extension=strrchr($file_name, ".");
                $file_tmp_name=$_FILES['input_image']['tmp_name'];
                $path='../assets/img/team/'.$file_name;
                $extension_allowed=array('.jpg','.png','.jpeg');
                if(in_array($file_extension,$extension_allowed)){
                    if(move_uploaded_file($file_tmp_name, $path)){
                        $insert_utili=$my_bd->prepare("INSERT INTO tbl_utilisateurs(util_nom,util_email,util_password,util_image,util_role)VALUE(?,?,?,?,?)");
                        $insert_utili->execute(array($us_username,$us_mail,$us_password,$file_name,$us_role));
                        $_SESSION['status'] = " Ajout De L'utilisateur Fait avec Success";

                    }
                }
            }
        }
    }
            //===========================MODIFIER IMAGE IN FOLDER=============
         if(isset($_POST['modifierimageutilisateur'])){
            $input_iduser = $_POST['input_iduser'];
            $new_image = $_FILES['input_image']['name'];
            $old_image = $_POST['old_image'];
    
            if(file_exists("../assets/img/team/" . $_FILES['input_image']['name'])){
                $filename = $_FILES['input_image']['name'];
                $_SESSION['status'] = " Image Existe Deja !!!".$filename;
            }
            else{
               $updateblog=$my_bd->prepare("UPDATE tbl_utilisateurs SET util_image=? WHERE util_id ='$input_iduser'");
               $updateblog->execute(array($new_image));
                if($updateblog){
                    if($new_image == NULL){
                        $_SESSION['status'] = "Image Non Selectionner !!!";
                    }
                    else{
                        move_uploaded_file($_FILES["input_image"]["tmp_name"], "../assets/img/team/".$_FILES["input_image"]["name"]);
                        unlink("../assets/img/team/".$old_image);
                        $_SESSION['status'] = " Modification De l'image avec Success";
                    }
                }
                else{
                    $_SESSION['status'] = " Image Not updated";
    
                }
    
            }
        }
            //===========================MODIFIER UTILISATEURS=============

    if(isset($_POST['modifierutilisateur'])){
        $us_userid=htmlspecialchars($_POST['input_idutili']);
        $us_username=htmlspecialchars($_POST['input_nonutili']);
        $us_password=htmlspecialchars($_POST['input_password']);
        $us_mail=htmlspecialchars($_POST['input_mail']);
        $us_role=htmlspecialchars($_POST['input_role']);
        $us_image=htmlspecialchars($_POST['input_image']);
            $updateuser=$my_bd->prepare("UPDATE tbl_utilisateurs SET util_nom=?,util_email=?,util_password=?,util_role=? WHERE util_id ='$us_userid'");
            $updateuser->execute(array($us_username,$us_mail,$us_password,$us_role));
            $_SESSION['status'] = " Modification De L'utilisateur Faite avec Success";

    }
            //===========================SUPPRIMER UTILISATEURS=============
    if(isset($_POST['delete'])){
        $us_id=htmlspecialchars($_POST['input_user_id']);
        $image_texts = $_POST['image_text'];
        if(isset($us_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_id=?");
            $recupdeletdata->execute(array($us_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                unlink("../assets/img/team/".$image_texts);
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_utilisateurs WHERE util_id=?");
                $deleteuser->execute(array($us_id));
                $_SESSION['status'] = " Suppression De L'utilisateur Faite avec Success";

            }
    
        }
    }

    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/s_utilisateur.view.php');
        }
        else{
            header('location: index.php');
        }
    }
?>