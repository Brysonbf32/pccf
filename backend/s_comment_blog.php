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
    // ========================================TOUTES LES FONCTIONS DU PAGES  COMMENTAIRE BLOG =========================================================
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

    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/s_comment_blog.view.php');
        }
        else{
            header('location: index.php');
        }
    }
    ?>