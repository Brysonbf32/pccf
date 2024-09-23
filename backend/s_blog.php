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

    if(isset($recupcookies) AND !empty($idsessio)){
        $connectdonne = $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_email=? AND util_id=?");
        $connectdonne->execute(array($recupcookies,$idsessio));
        $connectdonne->rowCount();
        $cheks = $connectdonne->fetch();
        if($cheks > 0){
            $user_nom = $cheks['util_nom'];
            $user_passsword = $cheks['util_password'];
            $user_mail = $cheks['util_email'];
            $user_role = $cheks['util_role'];
        }

    }
    // ========================================TOUTES LES FONCTIONS DU PAGES  BLOG =========================================================
            //===========================AJOUTER BLOGS=============
    if(isset($_POST['ajouterblog'])){
        $blog_titre=htmlspecialchars($_POST['input_titreblog']);
        $blog_text=htmlspecialchars($_POST['blog_text']);
        $blog_date=htmlspecialchars($_POST['datepub']);
        $blog_categ=htmlspecialchars($_POST['input_catego']);
        if(isset($blog_titre)){
            $recupdata=$my_bd->prepare("SELECT * FROM tbl_blog WHERE blog_titre=? AND categorie_blog=?");
            $recupdata->execute(array($blog_titre,$blog_categ));
            $recupdata->rowCount();
            $checkdata=$recupdata->fetch();
            if($checkdata >0){
                ?>
                <script>
                    alert("Blog exist deja");
                </script>
                <?php
            }
            else{
                $file_name=$_FILES['input_image']['name'];
                $file_extension=strrchr($file_name, ".");
                $file_tmp_name=$_FILES['input_image']['tmp_name'];
                $path='../assets/img/blog/'.$file_name;
                $extension_allowed=array('.jpg','.png','.jpeg','.jpg');
                if(in_array($file_extension,$extension_allowed)){
                    if(move_uploaded_file($file_tmp_name, $path)){
                    //$passeocrypt= md5($us_password);
                        $insert_blog=$my_bd->prepare("INSERT INTO tbl_blog(util_id,blog_image,blog_titre,blog_content,blog_date,categorie_blog)VALUE(?,?,?,?,?,?)");
                        $insert_blog->execute(array($idsessio,$file_name,$blog_titre,$blog_text,$blog_date,$blog_categ));
                        $_SESSION['status'] = " Enregistrement Effectuer avec Success";

                    }
                }
            }
        }
    }
            //===========================MODIFIER IMAGE IN FOLDER=============
    if(isset($_POST['modifierimage'])){
        $blog_id = $_POST['input_idblog'];
        $new_image = $_FILES['input_image']['name'];
        $old_image = $_POST['old_image'];

        if(file_exists("../assets/img/blog/" . $_FILES['input_image']['name'])){
            $filename = $_FILES['input_image']['name'];
            $_SESSION['status'] = " Image Existe Deja !!!".$filename;
        }
        else{
           $updateblog=$my_bd->prepare("UPDATE tbl_blog SET util_id=?,blog_image=? WHERE blog_id ='$blog_id'");
           $updateblog->execute(array($idsessio,$new_image));
            if($updateblog){
                if($new_image == NULL){
                    $_SESSION['status'] = "Image Non Selectionner !!!";
                }
                else{
                    move_uploaded_file($_FILES["input_image"]["tmp_name"], "../assets/img/blog/".$_FILES["input_image"]["name"]);
                    unlink("../assets/img/blog/".$old_image);
                    $_SESSION['status'] = " Modification De l'image avec Success";
                }
            }
            else{
                $_SESSION['status'] = " Image Not updated";

            }

        }
    }
            //===========================MODIFIER BLOGS=============
    if(isset($_POST['modifier'])){
        $blog_rid=htmlspecialchars($_POST['input_idblog']);
        $input_catego=htmlspecialchars($_POST['input_catego']);
        $blog_titre=htmlspecialchars($_POST['input_titreblog']);
        $blof_text=htmlspecialchars($_POST['blog_text']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_blog WHERE blog_id=?");
            $logs->execute(array($blog_rid));
            $logs->rowCount();
            $checks=$logs->fetch();
            if($checks >0){             
                $updateblog=$my_bd->prepare("UPDATE tbl_blog SET util_id=?,blog_titre=?,blog_content=?,categorie_blog=? WHERE blog_id ='$blog_rid'");
                $updateblog->execute(array($idsessio,$blog_titre,$blof_text,$input_catego));
                $_SESSION['status'] = " Modification Faite avec Success";

                }
    }
        //===========================SUPPRIMER BLOGS=============
    if(isset($_POST['delete'])){
        $us_id=htmlspecialchars($_POST['input_blogid']);
        $file_name=$_POST['input_image'];
        if(isset($us_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_blog WHERE blog_id=?");
            $recupdeletdata->execute(array($us_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_blog WHERE blog_id=?");
                $deleteuser->execute(array($us_id));
                if($deleteuser){
                    unlink("../assets/img/blog/".$file_name);
                    $_SESSION['status'] = " Suppression avec Success";
                }
            }
    
        }
    }


    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/s_blog.view.php');
        }
        else{
            header('location: index.php');
        }
    }
    ?>