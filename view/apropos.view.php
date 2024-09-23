<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title class="text-red-400">Pccf</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link class=" rounded-full" href="assets/img/logo3.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index" class="">
        <div>
        <img src="assets/img/logo3.png" class="w-20 h-10 h-12 rounded-sm" alt="">
        </div>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index" >Accueil</a></li>
          <li><a href="apropos" class="active">Apropos</a></li>
          <li><a href="services">Nos Programmes</a></li> 
          <li><a href="evenement">Evenements</a></li> 
         <li><a href="contact">Contact</a></li> 
         <li>
          <a href="fairedon" class="px-2"><button class=" bg-yellow-400 text-white px-2 p-2 rounded-full hover:border-yellow-400">Faire Don</button></a>
         </li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <style>
    .notre{
      font-size: 30px!important;
      color: #52565E!important;
    }
  </style>
<body>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/logo3.png');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Apropos De Nous</h2>
        <ol>
          <li><a href="index">Accueil</a></li>
          <li>Apropos</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Apropos Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="get-started section-bg">
      <div class="container">
        <?php
            $recupedata=$my_bd->query("SELECT * FROM tbl_about ORDER BY id_about ASC LIMIT 1");
            if($recupedata->rowCount()>0){
            while($checkdata=$recupedata->fetch()){
                $titre_about=$checkdata['titre_about'];
                $image_about=$checkdata['image_about'];
                $text_about=$checkdata['text_about'];
                $status=$checkdata['status_blog'];

        ?>
        <div class="row justify-content-between gy-4">

          <div class="col-lg-5" data-aos="fade">
            <div>
                <img src="assets/img/about/<?=$image_about?>" class="img-fluid shadow-lg" alt="">
            </div>
          </div><!-- End Quote Form -->

          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
            <div class="content">
              <h3 class=" text-yellow-200 pb-2"><?=$titre_about?></h3>
              <p><?=$text_about?></p>
            </div>
          </div>
        </div>
        <?php
            }
        }
        ?>
      </div>
    </section>
        <!-- ======= Servie Cards Section ======= -->
        <section id="services-cards" class="services-cards">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
        <div class=" section-header">
          <h5 class=" notre font-bold text-lg">Notre Vision, Mission et Valeurs </h5>
        </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <?php
                $recupedata=$my_bd->query("SELECT * FROM tbl_vision ORDER BY id_vi DESC LIMIT 1  ");
                  if($recupedata->rowCount()>0){
                  while($checkdata=$recupedata->fetch()){
                      $idabout=$checkdata['id_vi'];
                      $titre=$checkdata['titre_vi'];
                      $descri=$checkdata['descri_vi'];
                      $vi1=$checkdata['detail_vi1'];
                      $vi2=$checkdata['detail_vi2'];
                      $vi3=$checkdata['detail_vi3'];
                      $vi4=$checkdata['detail_vi4'];

            ?>
            <h3><?=$titre?></h3>
            <p><?=$descri?></p>

            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> <span><?=$vi1?></span></li>
              <li><i class="bi bi-check2"></i> <span><?=$vi2?></span></li>
              <?php
              if($vi4 == true){
                ?>
                <li><i class="bi bi-check2"></i> <span><?=$vi4?></span></li>
                <?php
              }else{
                ?>
               
                <?php
              }
              ?>
              <?php
              if($vi3 == true){
                ?>
                <li><i class="bi bi-check2"></i> <span><?=$vi3?></span></li>
                <?php
              }else{
                ?>
               
                <?php
              }
              ?>
            </ul>
            <?php
              }
            }
            ?>
          </div><!-- End feature item-->

          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <?php
                $recupedata=$my_bd->query("SELECT * FROM tbl_mission ORDER BY id_mi DESC LIMIT 1  ");
                  if($recupedata->rowCount()>0){
                  while($checkdata=$recupedata->fetch()){
                      $idmi=$checkdata['id_mi'];
                      $titre=$checkdata['titre_mi'];
                      $descri=$checkdata['descri_mi'];
                      $vi1=$checkdata['detail_mi1'];
                      $vi2=$checkdata['detail_mi2'];
                      $vi3=$checkdata['detail_mi3'];
                      $vi4=$checkdata['detail_mi4'];

            ?>
            <h3><?=$titre?></h3>
            <p><?=$descri?></p>

            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> <span><?=$vi1?></span></li>
              <li><i class="bi bi-check2"></i> <span><?=$vi2?></span></li>
              <?php
              if($vi4 == true){
                ?>
                <li><i class="bi bi-check2"></i> <span><?=$vi4?></span></li>
                <?php
              }else{
                ?>
               
                <?php
              }
              ?>
              <?php
              if($vi3 == true){
                ?>
                <li><i class="bi bi-check2"></i> <span><?=$vi3?></span></li>
                <?php
              }else{
                ?>
               
                <?php
              }
              ?>
            </ul>
            <?php
              }
            }
            ?>
          </div><!-- End feature item-->

          <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <?php
                $recupedata=$my_bd->query("SELECT * FROM tbl_valeurs ORDER BY id_va DESC LIMIT 1  ");
                  if($recupedata->rowCount()>0){
                  while($checkdata=$recupedata->fetch()){
                      $idmi=$checkdata['id_va'];
                      $titre=$checkdata['titre_va'];
                      $descri=$checkdata['descri_va'];
                      $vi1=$checkdata['detail_va1'];
                      $vi2=$checkdata['detail_va2'];
                      $vi3=$checkdata['detail_va3'];
                      $vi4=$checkdata['detail_va4'];

            ?>
            <h3><?=$titre?></h3>
            <p><?=$descri?></p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check2"></i> <span><?=$vi1?></span></li>
              <li><i class="bi bi-check2"></i> <span><?=$vi2?></span></li>
              <?php
              if($vi4 == true){
                ?>
                <li><i class="bi bi-check2"></i> <span><?=$vi4?></span></li>
                <?php
              }else{
                ?>
               
                <?php
              }
              ?>
              <?php
              if($vi3 == true){
                ?>
                <li><i class="bi bi-check2"></i> <span><?=$vi3?></span></li>
                <?php
              }else{
                ?>
               
                <?php
              }
              ?>
            </ul>
          </div><!-- End feature item-->
        <?php
                          }
                        }
        ?>
        </div>

      </div>
    </section><!-- End Servie Cards Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class=" section-header">
          <h5 class=" notre font-bold text-lg">Notre Equipe </h5>
        </div>
        
        <div class="row gy-1">
        <?php
            $recupedata=$my_bd->query("SELECT * FROM tbl_equipe");
            if($recupedata->rowCount()>0){
            while($checkdata=$recupedata->fetch()){
                $idblog=$checkdata['id_tim'];
                $titre=$checkdata['titre_tim'];
                $role=$checkdata['role_tim'];
                $image=$checkdata['image_tim'];
                $faceb=$checkdata['linkf_tim'];

          ?>
          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="assets/img/team/<?=$image?>" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="<?=$faceb?>"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4><?=$titre?></h4>
              <span><?=$role?></span>
            </div>
          </div><!-- End Team Member -->
          <?php
            }
          }
          ?>
        </div>

      </div>
    </section><!-- End Our Team Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include('includes/footer.php')
  ?>
  <!-- End Footer -->
