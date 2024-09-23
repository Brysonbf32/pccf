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

        <h2>Nous faire un don</h2>
        <ol>
          <li><a href="index">Accueil</a></li>
          <li>Nous faire un don</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">
            <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="comments">

              <div class="reply-form">
                <?php
                    if(isset($_SESSION['status']) && $_SESSION != ''){
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Merci!</strong> <?=$_SESSION['status']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>
                <h4 class="py-3">Veillez completer ce formulaire pour nous faire un don </h4>
                <form method="POST">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="comment_name" type="text" class="form-control" placeholder="Votre nom complet*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="comment_email" type="email" class="form-control" placeholder="Votre email*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="comment_address" type="text" class="form-control" placeholder="Votre address">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="comment_phone" type="text" class="form-control" placeholder="Votre telephone*">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col form-group">
                      <textarea name="text_comment" class="form-control" placeholder="Votre comment"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary hover:text-white" name="fairedon">Envoyer</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-2">
          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include('includes/footer.php')
  ?>
  <!-- End Footer -->
