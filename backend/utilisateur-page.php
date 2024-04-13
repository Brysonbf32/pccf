<?php
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
    //Ajouter Users
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
                    //$passeocrypt= md5($us_password);
                        $insert_utili=$my_bd->prepare("INSERT INTO tbl_utilisateurs(util_nom,util_email,util_password,util_image,util_role)VALUE(?,?,?,?,?)");
                        $insert_utili->execute(array($us_username,$us_mail,$us_password,$file_name,$us_role));
                    }
                }
            }
        }
    }

    if(isset($_POST['modifier'])){
        $us_userid=htmlspecialchars($_POST['input_idutili']);
        $us_username=htmlspecialchars($_POST['input_nonutili']);
        $us_password=htmlspecialchars($_POST['input_password']);
        $us_mail=htmlspecialchars($_POST['input_mail']);
        $us_role=htmlspecialchars($_POST['input_role']);
        $us_image=htmlspecialchars($_POST['input_image']);
            $logs= $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_id=?");
            $logs->execute(array($us_userid));
            $logs->rowCount();
            $checks=$logs->fetch();
            if($checks >0){
                $file_name=$_FILES['input_image']['name'];
                $file_extension=strrchr($file_name, ".");
                $file_tmp_name=$_FILES['input_image']['tmp_name'];
                $path='../assets/img/team/'.$file_name;
                $extension_allowed=array('.jpg','.png','.jpeg');
                if(in_array($file_extension,$extension_allowed)){
                    if(move_uploaded_file($file_tmp_name, $path)){
                $updateuser=$my_bd->prepare("UPDATE tbl_utilisateurs SET util_nom=?,util_email=?,util_password=?,util_image=?,util_role=? WHERE util_id ='$us_userid'");
                $updateuser->execute(array($us_username,$us_mail,$us_password,$file_name,$us_role));
                }
            }
        }
    }

    if(isset($_POST['delete'])){
        $us_id=htmlspecialchars($_POST['input_user_id']);
        if(isset($us_id)){
            $recupdeletdata=$my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_id=?");
            $recupdeletdata->execute(array($us_id));
            $recupdeletdata->rowCount();
            $check=$recupdeletdata->fetch();
            if($check >0){
                $deleteuser=$my_bd->prepare("DELETE FROM tbl_utilisateurs WHERE util_id=?");
                $deleteuser->execute(array($us_id));
            }
    
        }
    }

    // if(isset($_POST['modifier'])){
    //     $us_userid=htmlspecialchars($_POST['input_idutili']);
    //     $us_username=htmlspecialchars($_POST['input_nonutili']);
    //     $us_password=htmlspecialchars($_POST['input_password']);
    //     $us_mail=htmlspecialchars($_POST['input_mail']);
    //     $us_role=htmlspecialchars($_POST['input_role']);
    //     // $us_image=htmlspecialchars($_POST['input_image']);
    //     // $usold_image=htmlspecialchars($_POST['input_oldimage']);
    //     $new_img = $_FILES['input_image']['name'];
    //     $old_img = $_POST['input_oldimage'];
    //     if($new_img != ''){
    //         $updatefilename =  $_FILES['input_image']['name'];
    //     }
    //     else{
    //         $usold_image = $old_img;
    //     }if(file_exists("../assets/img/team/" .$_FILES['input_image']['name']))
    //     {
    //         $file_name = $_FILES['input_image']['name'];
    //         $_SESSION['status'] = "image already exist".$file_name;
    //     }
    //     else{
    //         $updateuser=$my_bd->prepare("UPDATE tbl_utilisateurs SET util_nom=?,util_email=?,util_password=?,util_image=?,util_role=? WHERE util_id ='$us_userid'");
    //         $updateuser->execute(array($us_username,$us_mail,$us_password,$new_img,$us_role));
    //         if($updateuser){


    //             $_SESSION['status']= "success full update";
    //             header('location: view/utilisateur.view.php');

    //         }
    //         else{
    //             $_SESSION['status']= "success not full update";
    //             header('location: view/utilisateur.view.php');

    //         }
    //     }


    //     // if(isset($us_username) and !empty($us_password) and !empty($us_mail) and !empty($us_role)){
    //     //     $logs= $my_bd->prepare("SELECT * FROM tbl_utilisateurs WHERE util_id=?");
    //     //     $logs->execute(array($us_userid));
    //     //     $logs->rowCount();
    //     //     $checks=$logs->fetch();
    //     //     if($checks >0){
    //     //         $updateuser=$my_bd->prepare("UPDATE tbl_utilisateurs SET util_nom=?,util_email=?,util_password=?,util_image=?,util_role=? WHERE util_id ='$us_userid'");
    //     //         $updateuser->execute(array($us_username,$us_mail,$us_password,$us_image,$us_role));
    //     //         header('location: view/utilisateur.view.php');
    //     //     }
    //     // }
    //     // else{

    //     // }
    
    // }

    if($my_bd){
        if(isset($recupcookies) and !empty($idsessio) ){
            require('view/utilisateur.view.php');
        }
        else{
            header('location: index.php');
        }
    }
?>