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
          $idblogs = $check['blog_id'];
          $blog_titre = $check['blog_titre'];
          $datepub_blog = $check['blog_date'];
          $image_blog = $check['blog_image'];
          $categori_blog = $check['categorie_blog'];
          $content_blog = $check['blog_content'];
          $util_id =$check['util_id'];                                                   
          if(isset($util_id)){
              $fetchutilisate=$my_bd->query("SELECT * FROM tbl_utilisateurs WHERE util_id='$util_id'");
              $fetchutilisate->rowCount();
              $checkutili=$fetchutilisate->fetch();
                if($checkutili >0){
                  $util_nom=$checkutili['util_nom'];                                    
                }
          }
          if(isset($idblog)){
            $fetchcomment=$my_bd->query("SELECT * FROM tbl_comentblog WHERE blog_id='$idblog'");
            $fetchcomment->rowCount();
            $checkcomment=$fetchcomment->fetch();
              if($checkcomment >0){
                $com_id =$checkcomment['com_id'];  
                $com_nom=$checkcomment['com_nom'];                                    
              }
        }
        }
      }
    } 

    //AJOUTER FAIRE DON
    if(isset($_POST['fairedon'])){
      $comment_name=htmlspecialchars($_POST['comment_name']);
      $comment_email=htmlspecialchars($_POST['comment_email']);
      $comment_address=htmlspecialchars($_POST['comment_address']);
      $comment_phone=htmlspecialchars($_POST['comment_phone']);
      $text_comment=htmlspecialchars($_POST['text_comment']);

      if(isset($comment_name) and !empty($comment_email) and !empty($comment_phone)){
          $recupdata=$my_bd->prepare("SELECT * FROM tbl_fairedon WHERE nom_don=? AND email_don=? AND phone_don=?");
          $recupdata->execute(array($comment_name,$comment_email,$comment_phone));
          $recupdata->rowCount();
          $checkdata=$recupdata->fetch();
          if($checkdata >0){
            $messagecomment= "Veillez Completer Toutes les informations demandees. Merci";
          }
          else{
            $datecomment = date("d/m/y");
            $insert_blog=$my_bd->prepare("INSERT INTO tbl_fairedon(nom_don,email_don,address_don,phone_don,commentaire_don,date_don)VALUE(?,?,?,?,?,?)");
            $insert_blog->execute(array($comment_name,$comment_email,$comment_address,$comment_phone,$text_comment,$datecomment));     
            $_SESSION['status'] = " Changa-Changa Fondation vous remercie pour votre Done, On va vous contactez tout de suite; Afin de vous montrez les processus a suivre Merci !!!";

            }
        }
  }

    if($my_bd){
      require('view/fairedon.view.php');

  }
?>