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
          <li><a href="evenement" class="active">Evenements</a></li> 
         <li><a href="contact"  >Contact</a></li> 
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

        <h2>Evenements</h2>
        <ol>
          <li><a href="index">Accueil</a></li>
          <li>Evenements</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 posts-list">

        <?php
            $recupedata=$my_bd->query("SELECT * FROM tbl_blog ORDER BY blog_id DESC LIMIT 25");
            if($recupedata->rowCount()>0){
            while($checkdata=$recupedata->fetch()){
                $idblog=$checkdata['blog_id'];
                $titreblog=$checkdata['blog_titre'];
                $imageblog=$checkdata['blog_image'];
                $blogcontent=$checkdata['blog_content'];
                $blogdatepub=$checkdata['blog_date'];
                $blogcateg=$checkdata['categorie_blog'];
                $util_id =$checkdata['util_id'];
                                                    
                if(isset($util_id)){
                    $fetchutilisate=$my_bd->query("SELECT * FROM tbl_utilisateurs WHERE util_id='$util_id'");
                    $fetchutilisate->rowCount();
                    $checkutili=$fetchutilisate->fetch();
                      if($checkutili >0){
                        $util_nom=$checkutili['util_nom'];                                    
                      }
                }
        ?>
          

          <div class="col-xl-3 col-md-3 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="post-item position-relative h-100">

              <div class="post-img position-relative overflow-hidden">
                <img src="assets/img/blog/<?=$imageblog?>" class="img-fluid" alt="">
                <span class="post-date"><?=$blogdatepub?></span>
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class=" text-lg hover:text-yellow-400"><?=$titreblog?> </h3>

                <div class="meta d-flex  text-sm align-items-center">
                  <div class=" text-sm">
                    <i class="bi bi-person"></i> <span class="text-sm"><?=$util_nom?></span>
                  </div>
                  <span class="px-3 text-black-50">/</span>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2"><?=$blogcateg?></span>
                  </div>
                </div>

                <hr>
                <p></p>
                <a href="evenement-details?blogdetail=<?=$idblog?>" class="readmore stretched-link"><span>Savoir Plus</span><i class="bi bi-arrow-right"></i></a>

              </div>
            </div>
          </div><!-- End post item -->

          <?php
            }
        }
        ?>
        </div><!-- End blog posts list -->

        <div class="blog-pagination">
          <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div><!-- End blog pagination -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php
    include('includes/footer.php')
  ?>
  <!-- End Footer -->