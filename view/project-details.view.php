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
  <script src="https://cdn.tailwindcss.com"></script>
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
          <li><a href="apropos">Apropos</a></li>
          <li><a href="services" class="active">Nos Programmes</a></li> 
          <li><a href="evenement">Evenements</a></li> 
         <li><a href="contact">Contact</a></li> 
         <li>
          <a href="fairedon" class="px-2"><button class=" bg-yellow-400 text-white px-2 p-2 rounded-full hover:border-yellow-400">Faire Don</button></a>
         </li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/logo3.png');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2><?=$titre?></h2>
        <ol>
          <li><a href="index">Home</a></li>
          <li>Service Details</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Service Details Section ======= -->
    <section id="service-details" class="service-details">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
 
          <div class="col-lg-4">
            
            <div class="services-list">
            <p class="text-lg font-italic text-lg">Notre Mission</p>
            <?php
              if($titre1 == NULL){
                ?>
               
                <?php
              }else{
                ?>
                  <a href="#" class="active"><?=$titre1?> </a>
                <?php
              }
              ?>
             <?php
              if($titre2 == NULL){
                ?>
               
                <?php
              }else{
                ?>
                  <a href="#" class="active"><?=$titre2?> </a>
                <?php
              }
              ?>
             <?php
              if($titre3 == NULL){
                ?>
               
                <?php
              }else{
                ?>
                  <a href="#" class="active"><?=$titre3?> </a>
                <?php
              }
              ?>
              <?php
              if($titre4 == NULL){
                ?>
               
                <?php
              }else{
                ?>
                  <a href="#" class="active"><?=$titre4?> </a>
                <?php
              }
              ?>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <img src="assets/img/projects/<?=$image = $check['image_pro'];?>" alt="" class="img-fluid services-img">
                    </div>
                </div>
            </div>
            <h3><?=$titre?></h3>
            <p>
                <?=$content?>
            <p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span><?=$datepub?></span></li>

              <?php
              if($titre1 == NULL){
                ?>
               
                <?php
              }else{
                ?>
                <li><i class="bi bi-check-circle"></i> <span><?=$titre1?></span></li>
                <?php
              }
              ?>
             <?php
              if($titre2 == NULL){
                ?>
               
                <?php
              }else{
                ?>
                <li><i class="bi bi-check-circle"></i> <span><?=$titre2?></span></li>
                <?php
              }
              ?>
             <?php
              if($titre3 == NULL){
                ?>
               
                <?php
              }else{
                ?>
                <li><i class="bi bi-check-circle"></i> <span><?=$titre3?></span></li>
                <?php
              }
              ?>
              <?php
              if($titre4 == NULL){
                ?>
               
                <?php
              }else{
                ?>
                <li><i class="bi bi-check-circle"></i> <span><?=$titre4?></span></li>
                <?php
              }
              ?>             
            </ul>
          </div>

        </div>

      </div>
    </section><!-- End Service Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include('includes/footer.php')
  ?>
  <!-- End Footer -->

