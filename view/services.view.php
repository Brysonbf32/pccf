<?php
error_reporting(0);
session_start();
?>
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
<style>
  .img-fluids{
    width: 50%!important;
    height: 50%!important;

  }
</style>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="">
        <div>
        <img src="assets/img/logo3.png" class="w-20 h-10 h-12 rounded-sm" alt="">
        </div>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="apropos.php">Apropos</a></li>
          <li><a href="services.php" class="active">Nos Programmes</a></li> 
          <li><a href="evenement.php" >Evenements</a></li> 
         <li><a href="contact.php">Contact</a></li> 
         <li>
          <a href="#" class="px-2"><button class=" bg-yellow-400 text-white px-2 p-2 rounded-full hover:border-yellow-400">Faire Don</button></a>
         </li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<body>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/logo3.png');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Programmes</h2>
        <ol>
          <li><a href="index.php">Accueil</a></li>
          <li>Programmes</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="fa-solid fa-mountain-city"></i>
              </div>
              <h3>Encadrement de la Jeunesse</h3>
              <p class="text-xs">P.C.C.F s'assignera le devoir d'encadrer la jeune , des enfants, aux personnes membres dans la lutte contre la pauvreté.</p>
              
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
              </div>
              <h3>Les Genres</h3>
              <p>Proumouvoir le genre et l'autonomisation de la femme.</p>
              
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-compass-drafting"></i>
              </div>
              <h3>Droit F& E</h3>
              <p>Promouvoir les droit de la femmes et des enfants.</p>
              
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-trowel-bricks"></i>
              </div>
              <h3>Santé Pour Tous</h3>
              <p>Promouvoir la santé pour tous en toutes ses formes (en mettant l'accent sur l'education et / ou donner des informations responsables et précises sur le VIH/SIDA ciblant les jeunes dans leurs communautés, maladie sexuellement transmissible, et etc.).</p>
              
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-helmet-safety"></i>
              </div>
              <h3>Eduquer et Droit</h3>
              <p>Eduquer, former ou renforcer les capacités des bénéficiaires en besoins.</p>

            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
              </div>
              <h3>Environnement et Agriculture</h3>
              <p>. Protéger l'environnement en toutes formes </p>
              <p>. Promouvoir l'agriculture et la commercialisation par des coopératives agricoles </p>

            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
              </div>
              <h3>Infrastructures et Assainissement</h3>
              <p>Réhabiliter des Infrastructures et Assainissement des milieux et autres aspects d'activités nécessitant um développements durables en notre societé</p>

            </div>
          </div><!-- End Service Item -->
          
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
              </div>
              <h3>Résolution des conflits</h3>
              <p>P.C.C.F encouragera les personnes en besoins a leurs compentences en matiere de resolution des conflits dans un contexte de reconciliatonde la communauté avec leurs experiences et leurs strategies </p>

            </div>
          </div><!-- End Service Item -->
        </div>

      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
    include('includes/footer.php')
  ?>
  <!-- End Footer -->
