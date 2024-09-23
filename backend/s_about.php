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

    // ========================================TOUTES LES FONCTIONS DU PAGES  APROPOS =========================================================
            //===========================AJOUTER APROPOS=============
    if(isset($_POST['ajouterabout'])){
        $about_titre=htmlspecialchars($_POST['input_titreabout']);
        $about_text=htmlspecialchars($_POST['about_text']);
        //$blog_categ=htmlspecialchars($_POST['input_catego']);
        $authornames=htmlspecialchars($_POST['authorname']);
        if(isset($about_titre)){
            $recupdata=$my_bd->prepare("SELECT * FROM tbl_about WHERE titre_about=?");
            $recupdata->execute(array($about_titre));
            $recupdata->rowCount();
            $checkdata=$recupdata->fetch();
            if($checkdata >0){
                ?>
                <script>
                    alert("About exist deja");
                </script>
                <?php
            }
            else{
                $file_name=$_FILES['input_image']['name'];
                $file_extension=strrchr($file_name, ".");
                $file_tmp_name=$_FILES['input_image']['tmp_name'];
                $path='../assets/img/about/'.$file_name;
                $extension_allowed=array('.jpg','.png','.jpeg','.jpg');
                if(in_array($file_extension,$extension_allowed)){
                    if(move_uploaded_file($file_tmp_name, $path)){
                    //$passeocrypt= md5($us_password);
                        $datepub= date("d/m/y");
                        $stus = 1;
                        $insert_blog=$my_bd->prepare("INSERT INTO tbl_about(titre_about,util_id,image_about,text_about,datepub_blog,status_blog)VALUE(?,?,?,?,?,?)");
                        $insert_blog->execute(array($about_titre,$idsessio,$file_name,$about_text,$datepub,$stus));
                    }
                }
            }
        }
    }
            //===========================MODIFIER IMAGE IN FOLDER.=============
    if(isset($_POST['modifierimageabout'])){
        $input_idabout = $_POST['input_idabout'];
        $new_image = $_FILES['input_image']['name'];
        $old_image = $_POST['old_image'];

        if(file_exists("../assets/img/about/" . $_FILES['input_image']['name'])){
            $filename = $_FILES['input_image']['name'];
            $_SESSION['status'] = " Image Existe Deja !!!".$filename;
        }
        else{
            $updateblog=$my_bd->prepare("UPDATE tbl_about SET image_about=? WHERE id_about ='$input_idabout'");
            $updateblog->execute(array($new_image));
            if($updateblog){
                if($new_image == NULL){
                    $_SESSION['status'] = "Image Non Selectionner !!!";
                }
                else{
                    move_uploaded_file($_FILES["input_image"]["tmp_name"], "../assets/img/about/".$_FILES["input_image"]["name"]);
                    unlink("../assets/img/about/".$old_image);
                    $_SESSION['status'] = " Modification De l'image avec Success";
                }
            }
            else{
                $_SESSION['status'] = " Image Not updated";

            }

        }
    }
            //===========================MODIFICATION APROPOS=============
    if(isset($_POST['modifierabout'])){
        $about_id=htmlspecialchars($_POST['input_idabout']);
        $blog_titre=htmlspecialchars($_POST['input_titre']);
        $about_text=htmlspecialchars($_POST['about_text']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_about WHERE id_about =?");
            $logs->execute(array($about_id));
            $logs->rowCount();
            $checks=$logs->fetch();
            if($checks >0){
                $updateblog=$my_bd->prepare("UPDATE tbl_about SET titre_about=?,text_about=? WHERE id_about ='$about_id'");
                $updateblog->execute(array($blog_titre,$about_text));
                }
            }

            //===========================SUPPRESSION APROPOS=============
    if(isset($_POST['delete'])){
        $about_id=htmlspecialchars($_POST['input_blogid']);
        $image_text = $_POST['image_text'];
        if(isset($about_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_about WHERE id_about =?");
            $recupdeletdata->execute(array($about_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                unlink("../assets/img/about/".$image_text);
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_about WHERE id_about =?");
                $deleteuser->execute(array($about_id));
            }
    
        }
    }
    // ========================================EQUIPE===============================
            //===========================AJOUTER EQUIPE===================
    if(isset($_POST['ajouterequipe'])){
        $about_titre=htmlspecialchars($_POST['input_titreabout']);
        $poste=htmlspecialchars($_POST['input_poste']);
        $link=htmlspecialchars($_POST['input_linkfb']);
        if(isset($about_titre)){
            $recupdata=$my_bd->prepare("SELECT * FROM tbl_equipe WHERE titre_tim =?");
            $recupdata->execute(array($about_titre));
            $recupdata->rowCount();
            $checkdata=$recupdata->fetch();
            if($checkdata >0){
                ?>
                <script>
                    alert("About exist deja");
                </script>
                <?php
            }
            else{
                $file_name=$_FILES['input_image']['name'];
                $file_extension=strrchr($file_name, ".");
                $file_tmp_name=$_FILES['input_image']['tmp_name'];
                $path='../assets/img/team/'.$file_name;
                $extension_allowed=array('.jpg','.png','.jpeg','.jpg');
                if(in_array($file_extension,$extension_allowed)){
                    if(move_uploaded_file($file_tmp_name, $path)){
                    //$passeocrypt= md5($us_password);
                        $datepub= date("d/m/y");
                        $stus = 1;
                        $insert_blog=$my_bd->prepare("INSERT INTO tbl_equipe(titre_tim,role_tim,image_tim,linkf_tim)VALUE(?,?,?,?)");
                        $insert_blog->execute(array($about_titre,$poste,$file_name,$link));
                        $_SESSION['status'] = "Insertion Du Membre De L'equipe Faite avec Success !!!!";
                    }
                }
            }
        }
    }
            //===========================MODIFIER EQUIPE==================
    if(isset($_POST['modifierquipe'])){
        $idprofile=htmlspecialchars($_POST['idprofile']);
        $input_noequi=htmlspecialchars($_POST['input_noequi']);
        $input_posteequi=htmlspecialchars($_POST['input_posteequi']);
        $input_linkfb=htmlspecialchars($_POST['input_linkfb']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_equipe WHERE id_tim=?");
            $logs->execute(array($idprofile));
            $logs->rowCount();
            $checks=$logs->fetch();
            if($checks >0){             
                $updateblog=$my_bd->prepare("UPDATE tbl_equipe SET titre_tim=?,role_tim=?,linkf_tim=? WHERE id_tim ='$idprofile'");
                $updateblog->execute(array($input_noequi,$input_posteequi,$input_linkfb));
                $_SESSION['status'] = " Modification Faite avec Success";

            }
    }
            //===========================MODIFIER IMAGE IN FOLDER========
    if(isset($_POST['modifierimage'])){
        $equipe_id = $_POST['input_equi'];
        $new_image = $_FILES['input_image']['name'];
        $old_image = $_POST['old_image'];

        if(file_exists("../assets/img/team/" . $_FILES['input_image']['name'])){
            $filename = $_FILES['input_image']['name'];
            $_SESSION['status'] = " Image Existe Deja !!!".$filename;
        }
        else{
            $updateblog=$my_bd->prepare("UPDATE tbl_equipe SET image_tim=? WHERE id_tim ='$equipe_id'");
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
            //===========================SUPPRESSION EQUIPE===============
    if(isset($_POST['deleteequip'])){
        $about_id=htmlspecialchars($_POST['input_id']); 
        $image_text = $_POST['image_text'];
        if(isset($about_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_equipe WHERE id_tim =?");
            $recupdeletdata->execute(array($about_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                unlink("../assets/img/team/".$image_text);
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_equipe WHERE id_tim =?");
                $deleteuser->execute(array($about_id));
                $_SESSION['status'] = " Suppression du Membre d'equipe Faite Avec Success";
            }
    
        }
    }
    // ==========================VISION PAGE ABOUT=============================
            //===========================AJOUT VISION=======================
    if(isset($_POST['ajoutervision'])){
        $input_vision1=htmlspecialchars($_POST['input_vision1']);
        $input_vision2=htmlspecialchars($_POST['input_vision2']);
        $input_vision3=htmlspecialchars($_POST['input_vision3']);
        $input_vision4=htmlspecialchars($_POST['input_vision4']);
        $input_titre=htmlspecialchars($_POST['input_titre']);
        $input_descri=htmlspecialchars($_POST['input_descri']);
            $datepub= date("d/m/y");
            $stus = 0;
            if($stus == 0){
                $insert_blog=$my_bd->prepare("INSERT INTO tbl_vision(titre_vi,descri_vi,detail_vi1,detail_vi2,detail_vi3,detail_vi4,statuss_vi)VALUE(?,?,?,?,?,?,?)");
                $insert_blog->execute(array($input_titre,$input_descri,$input_vision1,$input_vision2,$input_vision3,$input_vision4,$stus));
                $_SESSION['status'] = " Ajout des Vision Faite avec Success";
            }else{
                $_SESSION['status'] = "Interdit de publier 2 fois, soit supprimer l existant.Merci!";
            }
    } 
            //===========================SUPPRESSION DES VISIONS============
    if(isset($_POST['deletevisions'])){
        $id_vis=htmlspecialchars($_POST['id_vis']);
        if(isset($id_vis)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_vision WHERE id_vi =?");
            $recupdeletdata->execute(array($id_vis));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_vision WHERE id_vi =?");
                $deleteuser->execute(array($id_vis));
                $_SESSION['status'] = " Suppression des Visions Faite avec Success";
            }
    
        }
    }
    //MODIFICATION DES VISIONS
    if(isset($_POST['modificationvision'])){
        $id_vis=htmlspecialchars($_POST['id_vis']);
        $input_titre=htmlspecialchars($_POST['input_titre']);
        $input_descri=htmlspecialchars($_POST['input_descri']);
        $input_vision1=htmlspecialchars($_POST['input_vision1']);
        $input_vision2=htmlspecialchars($_POST['input_vision2']);
        $input_vision3=htmlspecialchars($_POST['input_vision3']);
        $input_vision4=htmlspecialchars($_POST['input_vision4']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_vision WHERE id_vi =?");
            $logs->execute(array($id_vis));
            $logs->rowCount();
            $checks=$logs->fetch();
                $update=$my_bd->prepare("UPDATE tbl_vision SET titre_vi=?,descri_vi=?,detail_vi1=?,detail_vi2=?,detail_vi3=?,detail_vi4=? WHERE id_vi ='$id_vis'");
                $update->execute(array($input_titre,$input_descri,$input_vision1,$input_vision2,$input_vision3,$input_vision4));
                $_SESSION['status'] = " Modification des Visions Faite avec Success";           
    }
    // ==========================MISSION================================
            //===========================AJOUTER MISSSION===============
    if(isset($_POST['ajoutermisson'])){
        $input_mission1=htmlspecialchars($_POST['input_mission1']);
        $input_mission2=htmlspecialchars($_POST['input_mission2']);
        $input_mission3=htmlspecialchars($_POST['input_mission3']);
        $input_mission4=htmlspecialchars($_POST['input_mission4']);
        $input_titre=htmlspecialchars($_POST['input_titre']);
        $input_descri=htmlspecialchars($_POST['input_descri']);
            $datepub= date("d/m/y");
            $stus = 0;
            if($stus == 0){
                $insert_blog=$my_bd->prepare("INSERT INTO tbl_mission(titre_mi,descri_mi,detail_mi1,detail_mi2,detail_mi3,detail_mi4,status_mi)VALUE(?,?,?,?,?,?,?)");
                $insert_blog->execute(array($input_titre,$input_descri,$input_mission1,$input_mission2,$input_mission3,$input_mission4,$stus));
            }else{
                $_SESSION['status'] = " Interdit de publier 2 fois, soit supprimer l existant.Merci!";           

            }
    }
            //===========================MODIFICATION DES MISSIONS======
    if(isset($_POST['modifiermission'])){
        $id_mi=htmlspecialchars($_POST['id_mi']);
        $input_titre=htmlspecialchars($_POST['input_titre']);
        $input_descri=htmlspecialchars($_POST['input_descri']);
        $input_mission1=htmlspecialchars($_POST['input_mission1']);
        $input_mission2=htmlspecialchars($_POST['input_mission2']);
        $input_mission3=htmlspecialchars($_POST['input_mission3']);
        $input_mission4=htmlspecialchars($_POST['input_mission4']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_contact WHERE id_co =?");
            $logs->execute(array($id_mi));
            $logs->rowCount();
            $checks=$logs->fetch();
                $update=$my_bd->prepare("UPDATE tbl_mission SET titre_mi=?,descri_mi=?,detail_mi1=?,detail_mi2=?,detail_mi3=?,detail_mi4=? WHERE id_mi  ='$id_mi'");
                $update->execute(array($input_titre,$input_descri,$input_mission1,$input_mission2,$input_mission3,$input_mission4));
                $_SESSION['status'] = " Modification des Missions Faite avec Success";           
    }
            //===========================SUPPRESSION MISSION============
    if(isset($_POST['deletemission'])){
        $id_mi=htmlspecialchars($_POST['id_mi']);
        if(isset($id_mi)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_mission WHERE id_mi =?");
            $recupdeletdata->execute(array($id_mi));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_mission WHERE id_mi =?");
                $deleteuser->execute(array($id_mi));
                $_SESSION['status'] = " Suppression des Missions Faite avec Success";

            }
    
        }
    }
    // ==========================VALEUR=================================
            //===========================AJOUTER VALEURS================
    if(isset($_POST['ajoutervaleur'])){    
        $input_vision1=htmlspecialchars($_POST['input_vision1']);
        $input_vision2=htmlspecialchars($_POST['input_vision2']);
        $input_vision3=htmlspecialchars($_POST['input_vision3']);
        $input_vision4=htmlspecialchars($_POST['input_vision4']);
        $input_titre=htmlspecialchars($_POST['input_titre']);
        $input_descri=htmlspecialchars($_POST['input_descri']);
            $datepub= date("d/m/y");
            $stus = 0;
            if($stus == 0){
                $insert_blog=$my_bd->prepare("INSERT INTO tbl_valeurs(titre_va,descri_va,detail_va1,detail_va2,detail_va3,detail_va4,status_va)VALUE(?,?,?,?,?,?,?)");
                $insert_blog->execute(array($input_titre,$input_descri,$input_vision1,$input_vision2,$input_vision3,$input_vision4,$stus));
                $_SESSION['statusva'] = " Ajout des Valeurs Fait avec Success";
            }else{
                $_SESSION['status'] = " Interdit de publier 2 fois, soit supprimer l existant.Merci!";
            }
    }
             //===========================MODIFICATION DES MISSIONS=====
    if(isset($_POST['modifiervaleur'])){
        $id_va=htmlspecialchars($_POST['id_va']);
        $input_titre=htmlspecialchars($_POST['input_titre']);
        $input_descri=htmlspecialchars($_POST['input_descri']);
        $input_valeur1=htmlspecialchars($_POST['input_valeur1']);
        $input_valeur2=htmlspecialchars($_POST['input_valeur2']);
        $input_valeur3=htmlspecialchars($_POST['input_valeur3']);
        $input_valeur4=htmlspecialchars($_POST['input_valeur4']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_valeurs WHERE id_va =?");
            $logs->execute(array($id_va));
            $logs->rowCount();
            $checks=$logs->fetch();
                $update=$my_bd->prepare("UPDATE tbl_valeurs SET titre_va=?,descri_va=?,detail_va1=?,detail_va2=?,detail_va3=?,detail_va4=? WHERE id_va ='$id_va'");
                $update->execute(array($input_titre,$input_descri,$input_valeur1,$input_valeur2,$input_valeur3,$input_valeur4));
                $_SESSION['status'] = " Modification des Valeurs Faite avec Success";           
    }
            //===========================SUPPRESSION VALEURS============
    if(isset($_POST['deletavaleur'])){
        $about_id=htmlspecialchars($_POST['input_id']);
        if(isset($about_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_valeurs WHERE id_va =?");
            $recupdeletdata->execute(array($about_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_valeurs WHERE id_va =?");
                $deleteuser->execute(array($about_id));
                $_SESSION['status'] = " Suppression des Valeurs Faite avec Success";

            }
        }
    }
    
    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/s_about.view.php');
        }
        else{
            header('location: index.php');
        }
    }
    ?>