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
            $user_id = $cheks['util_id'];
            $user_nom = $cheks['util_nom'];
            $user_passsword = $cheks['util_password'];
            $user_mail = $cheks['util_email'];
            $user_role = $cheks['util_role'];
        }

    }
    // ========================================TOUTES LES FONCTIONS DU PAGES  PROGRAMMES =========================================================
            //===========================AJOUTER PROGRAMMES=============
    if(isset($_POST['ajouterpro'])){
        $about_titre=htmlspecialchars($_POST['input_titreabout']);
        $content_pro=htmlspecialchars($_POST['content_pro']);
        $authornames=htmlspecialchars($_POST['authorname']);
        if(isset($about_titre)){
            $recupdata=$my_bd->prepare("SELECT * FROM tbl_programs WHERE titre_pro=?");
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
                $path='../assets/img/projects/'.$file_name;
                $extension_allowed=array('.jpg','.png','.jpeg','.jpg');
                if(in_array($file_extension,$extension_allowed)){
                    if(move_uploaded_file($file_tmp_name, $path)){
                    //$passeocrypt= md5($us_password);
                        $datepub= date("d/m/y");
                        $stus = 1;
                        $insert_blog=$my_bd->prepare("INSERT INTO tbl_programs(titre_pro,util_id,image_pro,content_pro,status_pro,datepub_pro)VALUE(?,?,?,?,?,?)");
                        $insert_blog->execute(array($about_titre,$idsessio,$file_name,$content_pro,$stus,$datepub));
                        $_SESSION['status'] = " Insertion Programme avec Success !!!";
                    }
                }
            }
        }
    }
            //===========================AJOUTER MISSION PROGRAMMES=============
    if(isset($_POST['ajoutermission'])){
        $pro_id = $_POST['input_id_pro'];
        $input_mission1=htmlspecialchars($_POST['input_mission1']);
        $input_mission2=htmlspecialchars($_POST['input_mission2']);
        $input_mission3=htmlspecialchars($_POST['input_mission3']);
        $input_mission4=htmlspecialchars($_POST['input_mission4']);

                $insert=$my_bd->prepare("INSERT INTO tbl_mission_programme(id_pro,titre1_mp,titre2_mp,titre3_mp,titre4_mp)VALUE(?,?,?,?,?)");
                $insert->execute(array($pro_id,$input_mission1,$input_mission2,$input_mission3,$input_mission4));
                $_SESSION['status'] = " Mission ajouter  avec Success";
    }
            //===========================MODIFIER IMAGE IN FOLDER=============
    if(isset($_POST['modifierimage'])){
        $pro_id = $_POST['input_id_pro'];
        $new_image = $_FILES['input_image']['name'];
        $old_image = $_POST['old_image'];

        if(file_exists("../assets/img/projects/" . $_FILES['input_image']['name'])){
            $filename = $_FILES['input_image']['name'];
            $_SESSION['status'] = " Image Existe Deja !!!".$filename;
        }
        else{
           $updateblog=$my_bd->prepare("UPDATE tbl_programs SET image_pro=? WHERE id_pro ='$pro_id'");
           $updateblog->execute(array($new_image));
            if($updateblog){
                if($new_image == NULL){
                    $_SESSION['status'] = "Image Non Selectionner !!!";
                }
                else{
                    move_uploaded_file($_FILES["input_image"]["tmp_name"], "../assets/img/projects/".$_FILES["input_image"]["name"]);
                    unlink("../assets/img/projects/".$old_image);
                    $_SESSION['status'] = " Modification De l'image avec Success";
                }
            }
            else{
                $_SESSION['status'] = " Image Not updated";

            }

        }
    }
            //===========================MODIFIER PROGRAMMES=============
    if(isset($_POST['modifierprogram'])){
        $pro_id = $_POST['input_idpro'];
        $pro_titre = $_POST['input_titre'];
        $pro_content = $_POST['content_pro'];
        $datepub= date("d/m/y");
           $updateblog=$my_bd->prepare("UPDATE tbl_programs SET titre_pro=?,content_pro=?,datepub_pro=? WHERE id_pro ='$pro_id'");
           $updateblog->execute(array($pro_titre,$pro_content,$datepub));
           $_SESSION['status'] = " Modification Faite avec Success";
    }
            //===========================SUPPRIMER PROGRAMMES=============
    if(isset($_POST['delete'])){
        $about_id=htmlspecialchars($_POST['input_blogid']);
        $file_name=$_POST['input_image'];

        if(isset($about_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_programs WHERE id_pro =?");
            $recupdeletdata->execute(array($about_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
               
                $deleteprograme=$my_bd->prepare("DELETE FROM tbl_programs WHERE id_pro =?");
                $deleteprograme->execute(array($about_id));
                unlink("../assets/img/projects/".$file_name);
                if($deleteprograme){
                    unlink("../assets/img/projects/".$file_name);
                    $_SESSION['status'] = " Suppression avec Success";
                }{
                    $_SESSION['status'] = " Echec de Suppression avec Success";

                }

            }
    
        }
    }


    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/s_programs.view.php');
        }
        else{
            header('location: index.php');
        }
    }
    ?>