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

      <a href="index" class="">
        <div>
        <img src="assets/img/logo3.png" class="w-20 h-10 h-12 rounded-sm" alt="">
        </div>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index">Accueil</a></li>
          <li><a href="apropos">Apropos</a></li>
          <li><a href="services">Nos Programmes</a></li> 
          <li><a href="evenement">Evenements</a></li> 
         <li><a href="contact"  class="active">Contact</a></li> 
         <li class="text"><a href="backend/index">login</a></li>

         <li>
          <a href="fairedon" class="px-2"><button class=" bg-yellow-400 text-white px-2 p-2 rounded-full hover:border-yellow-400">Faire Don</button></a>
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

        <h2>Contact</h2>
        <ol>
          <li><a href="index">Accueil</a></li>
          <li>Contact</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

      <?php
          $datetoday = date("d/m/y");
          $recupedata=$my_bd->query("SELECT * FROM tbl_contact ORDER BY id_co LIMIT 1");
          if($recupedata->rowCount()>0){
          while($checkdata=$recupedata->fetch()){
              $id_co=$checkdata['id_co'];
              $email_co=$checkdata['email_co'];
              $address_co=$checkdata['address_co'];
              $numero_co=$checkdata['numero_co'];
      ?>
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-map"></i>
              <h3>Notre Address</h3>
              <p><?=$address_co?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-envelope"></i>
              <h3>Notre Email</h3>
              <p><a href="mailto:peacechangachangafoudation1@gmail.com" ><?=$email_co?></a> </p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-telephone"></i>
              <h3>Numero Telephone</h3>
              <p><a href="tel:+243 972584021"><?=$numero_co?></a></p>
              <p></p>
            </div>
          </div><!-- End Info Item -->
        </div>
      <?php
          }
        }
      ?>
        <div class="row gy-4 mt-1">

          <div class="col-lg-6 shadow-sm ">
            <img src="assets/img/about/logo3.png" alt="">
          </div>

          <div class="col-lg-6">
            <form method="POST" >
              <div class="row gy-4">
                <div class="col-lg-6 form-group py-2">
                  <input type="text" name="input_name" class="text-sm px-2 py-3 border border-slate-200 inline-block w-full rounded-md focus:outline-none" id="name" placeholder="Votre Name" required>
                </div>
                <div class="col-lg-6 form-group py-2">
                  <input type="email" class="text-sm px-2 py-3 border border-slate-200 inline-block w-full rounded-md focus:outline-none" name="input_email" id="email" placeholder="Votre Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="text-sm px-2 py-3 border border-slate-200 inline-block w-full rounded-md focus:outline-none" name="input_subject" id="subject" placeholder="Subjet" required>
              </div>
              <div class="form-group py-2">
                <textarea class="text-sm px-2 py-3 border border-slate-200 inline-block w-full rounded-md focus:outline-none" name="input_message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
              </div>
              <div class="text-center "><button class="bg-yellow-400 px-3 py-3 rounded-lg text-white" type="submit" name="subscribe">Envoyer Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include('includes/footer.php')
  ?>
  <!-- End Footer -->
