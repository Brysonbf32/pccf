<?php
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

    //Ajouter Users
    if(isset($_POST['ajouterblog'])){
        $blog_titre=htmlspecialchars($_POST['input_titreblog']);
        $blog_text=htmlspecialchars($_POST['blog_text']);
        $blog_date=htmlspecialchars($_POST['datepub']);
        $blog_categ=htmlspecialchars($_POST['input_catego']);
        $authornames=htmlspecialchars($_POST['authorname']);
        //$blof_date=htmlspecialchars($_POST['input_date']);
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
                        $insert_blog=$my_bd->prepare("INSERT INTO tbl_blog(blog_image,blog_titre,blog_content,blog_date,categorie_blog,blog_author)VALUE(?,?,?,?,?,?)");
                        $insert_blog->execute(array($file_name,$blog_titre,$blog_text,$blog_date,$blog_categ,$user_nom));
                    }
                }
            }
        }
    }

    if(isset($_POST['modifier'])){
        $blog_rid=htmlspecialchars($_POST['input_idblog']);
        $blog_titre=htmlspecialchars($_POST['input_titreblog']);
        $blof_text=htmlspecialchars($_POST['blog_text']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_blog WHERE blog_id=?");
            $logs->execute(array($blog_rid));
            $logs->rowCount();
            $checks=$logs->fetch();
            if($checks >0){
                $file_name=$_FILES['input_image']['name'];
                $file_extension=strrchr($file_name, ".");
                $file_tmp_name=$_FILES['input_image']['tmp_name'];
                $path='../assets/img/blog/'.$file_name;
                $extension_allowed=array('.jpg','.png','.jpeg');
                if(in_array($file_extension,$extension_allowed)){
                    if(move_uploaded_file($file_tmp_name, $path)){
                $updateblog=$my_bd->prepare("UPDATE tbl_blog SET blog_image=?,blog_titre=?,blog_content=? WHERE blog_id ='$blog_rid'");
                $updateblog->execute(array($file_name,$blog_titre,$blof_text));
                }
            }
        }
    }


    if(isset($_POST['delete'])){
        $us_id=htmlspecialchars($_POST['input_blogid']);
        if(isset($us_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_blog WHERE blog_id=?");
            $recupdeletdata->execute(array($us_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_blog WHERE blog_id=?");
                $deleteuser->execute(array($us_id));
            }
    
        }
    }


    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/aboutsection.view.php');
        }
        else{
            header('location: index.php');
        }
    }
    ?>