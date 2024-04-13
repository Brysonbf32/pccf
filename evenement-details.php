<?php
    require('config/databases.php');
    error_reporting(0);
    session_start();
    $idsessio=$_SESSION['util_id'];
    $recupcookies = $_COOKIE['alluser_email'];
    if($_GET['blogdetail']){
      $idblog = $_GET['blogdetail'];
      if(isset($idblog)){
        $detailblod = $my_bd->prepare(" SELECT * FROM tbl_blog WHERE blog_id=?");
        $detailblod->execute(array($idblog));
        $detailblod->rowCount();
        $check = $detailblod->fetch();
        if($check >0){
          $blog_titre = $check['blog_titre'];
          $datepub_blog = $check['blog_date'];
          $image_blog = $check['blog_image'];
          $categori_blog = $check['categorie_blog'];
          $authori_blog = $check['blog_author'];
          $content_blog = $check['blog_content'];

        }
      }
    }

    //Ajouter Users
    if(isset($_POST['commentaire'])){
      $comment_name=htmlspecialchars($_POST['comment_name']);
      $comment_email=htmlspecialchars($_POST['comment_email']);
      $text_comment=htmlspecialchars($_POST['text_comment']);
      //$blof_date=htmlspecialchars($_POST['input_date']);
      if(isset($comment_name,$comment_email,$text_comment)){
          $recupdata=$my_bd->prepare("SELECT * FROM tbl_comentblog WHERE com_mail=? AND blog_id=?");
          $recupdata->execute(array($comment_email,$idblog));
          $recupdata->rowCount();
          $checkdata=$recupdata->fetch();
          if($checkdata >0){
            $messagecomment= "Vous avez deja commenter attendez votre Reponse. Merci";
         
          }
          else{
            $datecomment = date("d/m/y");
            //$passeocrypt= md5($us_password);
            $insert_blog=$my_bd->prepare("INSERT INTO tbl_comentblog(blog_id,com_nom,com_mail,com_date,com_comment)VALUE(?,?,?,?,?)");
            $insert_blog->execute(array($idblog,$comment_name,$comment_email,$datecomment,$text_comment));     
            $messagecommentgood= "Changa-Changa Fondation vous remercie pour votre commentaire. Merci";
 
    }
      }
  }



    if($my_bd){
      require('view/evenement-details.view.php');

  }
?>