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



    if(isset($_POST['subscribe'])){
      $input_name=htmlspecialchars($_POST['input_name']);
      $input_email=htmlspecialchars($_POST['input_email']);
      $input_subject=htmlspecialchars($_POST['input_subject']);
      $input_message=htmlspecialchars($_POST['input_message']);
      if(isset($input_name,$input_email)){
          $recupdata=$my_bd->prepare("SELECT * FROM tbl_subscribe WHERE nom_sub=? AND email_sub=?");
          $recupdata->execute(array($input_name,$input_email));
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

                      $insert_blog=$my_bd->prepare("INSERT INTO tbl_subscribe(nom_sub,email_sub,subject_sub,message_sub)VALUE(?,?,?,?)");
                      $insert_blog->execute(array($input_name,$input_email,$input_subject,$input_message));
                  }
              }
          }


    if($my_bd){
          require('view/contact.view.php');

  }
?>