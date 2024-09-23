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
    if($_GET['programdetail']){
      $idblog = $_GET['programdetail'];
      if(isset($idblog)){
        $detailblod = $my_bd->prepare(" SELECT * FROM tbl_programs WHERE id_pro =?");
        $detailblod->execute(array($idblog));
        $detailblod->rowCount();
        $check = $detailblod->fetch();
        if($check >0){
          $idpro = $check['id_pro'];
          $titre = $check['titre_pro'];
          $datepub = $check['datepub_pro'];
          $image = $check['image_pro'];
          $content = $check['content_pro'];

        }
        if(isset($idpro)){
          $fetchmissiondata=$my_bd->query("SELECT * FROM tbl_mission_programme WHERE id_pro='$idpro' LIMIT 2");
          $fetchmissiondata->rowCount();
          $checkmission=$fetchmissiondata->fetch();
          if($checkmission >0){
            $titre1 = $checkmission['titre1_mp'];
            $titre2 = $checkmission['titre2_mp'];
            $titre3 = $checkmission['titre3_mp'];
            $titre4 = $checkmission['titre4_mp'];
          } 
        }

      }
    }

    if($my_bd){
      require('view/project-details.view.php');

  }
?>