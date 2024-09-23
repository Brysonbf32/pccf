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
        <img src="assets/img/logo3.png" class="w-20  h-12 rounded-sm" alt="">
        </div>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index" class="active">Accueil</a></li>
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
<style>
  .titre2{
  font-weight: 700;
  position: relative;
  color: #2e3135;
  }
</style>
<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down text-sm">Welcome at Pccf</h2>
            <p data-aos="fade-down text-sm">Peace Changa-Changa Foundation</p>
            <a data-aos="fade-up" data-aos-delay="200" href="contact" class="btn-get-started">Contactez-nous</a>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <?php
        $recupedata=$my_bd->query("SELECT * FROM tbl_slides ORDER BY id_sli ASC");
        if($recupedata->rowCount()>0){
        while($checkdata=$recupedata->fetch()){
            $image_sli=$checkdata['image_sli'];
        ?>
      <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/slideall.jpg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/<?=$image_sli?>)"></div>
      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <?php
        }
      }
   ?>


      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="get-started section-bg">
      <div class="container">
        <?php
            $recupedata=$my_bd->query("SELECT * FROM tbl_about ORDER BY id_about DESC LIMIT 1");
            if($recupedata->rowCount()>0){
            while($checkdata=$recupedata->fetch()){
                $titre_about=$checkdata['titre_about'];
                $image_about=$checkdata['image_about'];
                $text_about=$checkdata['text_about'];
                $status_about=$checkdata['text_about'];
                if($status_about != 1){

        ?>
        <div class="row justify-content-between gy-4">

          <div class="col-lg-5 rounded-sm" data-aos="fade">
            <div>
                <img src="assets/img/about/<?=$image_about?>" class="img-fluid shadow-sm rounded-sm" alt="">
            </div>
          </div><!-- End Quote Form -->

          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
            <div class="content">
              <h3 class=" text-yellow-200">Qui Sommes-Nous?</h3>
              <p class="text-sm">Nous Sommes PEACE CHANGA-CHANGA FOUNDATION, une Association sans but lucratif, apolitique et non confessionnelle a été créée en ce jour: Janvier 2015.
              </p>
              <p>On est a la recherche constant d'une societé équitable, tolérante et solidaire en mettant notre action au service des personnes en situation de pauvreté.</p>
                  <div class="py-2">
                    <a href="apropos" class="readmore stretched-link"><span>Lire Plus</span><i class="bi bi-arrow-right"></i></a>
                  </div>
            </div>
          </div>
        </div>
        <?php
            }else{
              ?>
              <p>Pas des photo ici</p>
              <?php
            }
            ?>
            <?php
            }
          } 
            ?>
      </div>
    </section>
      <!-- ======= Services Sectio ======= -->
    <section id="services" class="recent-blog-posts">
      <div class="container" data-aos="fade-up">
        <div class=" section-header">
          <h2>Nos Programmes</h2>
          <p>Nous oeuvrons dans plusieurs domaines dont nos programmes si-dessous. </p>
        </div>
        <div class="row gy-5">
        <?php
          $recupedata=$my_bd->query("SELECT * FROM tbl_programs ORDER BY id_pro DESC LIMIT 3");
          if($recupedata->rowCount()>0){
          while($checkdata=$recupedata->fetch()){
              $id_pro=$checkdata['id_pro'];
              $titre=$checkdata['titre_pro'];
              $image=$checkdata['image_pro'];
              $content=$checkdata['content_pro'];
              $datepub=$checkdata['datepub_pro'];
              $status=$checkdata['status_pro'];
              
          ?>
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="post-item position-relative h-100">

              <div class="post-img position-relative overflow-hidden rounded-sm">
                <img src="assets/img/projects/<?=$image?>" class="rounded-sm img-fluid" alt="">
               
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class="post-title"><?=$titre?>  </h3>

                <div class="meta d-flex align-items-center">
                  <p class=" text-sm">
                  <?=$content?>
                  </p>
                </div>

                <hr>
                <a href="project-detailsMicro?programdetail=<?=$id_pro?>" class="readmore stretched-link"><span>Savoir Plus</span><i class="bi bi-arrow-right"></i></a>

              </div>
            </div>
          </div><!-- End post item -->
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section>

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Nos Projets</h2>
          <p>Nous oeuvrons dans plusieurs domaines particulierement informatique</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">Album</li>
            <li data-filter=".Microfinance">Microfinance</li>
            <li data-filter=".Entreprenariat"> Entreprenariat</li>
            <li data-filter=".Agriculture">Agriculture</li>
          </ul><!-- End Projects Filters -->

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php
            $recupedata=$my_bd->query("SELECT * FROM tbl_projets ORDER BY id_prj DESC");
            if($recupedata->rowCount()>0){
            while($checkdata=$recupedata->fetch()){
              $categorie_prj=$checkdata['categorie_prj'];
              $image_prj=$checkdata['image_prj'];
          ?>
            <div class="col-lg-4 col-md-6 portfolio-item <?=$categorie_prj?>">
              <div class="portfolio-content h-100">
                <img src="assets/img/projects/<?=$image_prj?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?=$categorie_prj?></h4>
                  <p>Pour Plus de details</p>
                  <a href="assets/img/projects/<?=$image_prj?>" title="<?=$categorie_prj?>" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->
            <?php
            }
          }
            ?>
          </div><!-- End Projects Container -->

        </div>

      </div>
    </section><!-- End Our Projects Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up">
        <div class=" section-header">
          <h2>Nos Evenements</h2>
          <p>Suivez nos evenements et nos publications concernant nos activités </p>
        </div>
        <div class="row gy-5">
          <?php
            $recupedata=$my_bd->query("SELECT * FROM tbl_blog ORDER BY blog_id DESC LIMIT 3");
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
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
       
            <div class="post-item position-relative h-100">

              <div class="post-img position-relative overflow-hidden">
                <img src="assets/img/blog/<?=$imageblog?>" class="img-fluid" alt="">
                <span class="post-date"><?=$blogdatepub?></span>
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class="post-title"><?=$titreblog?> </h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2"><?=$util_nom?></span>
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
        </div>
      </div>
    </section>
    <!-- End Recent Blog Posts Section -->
     <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter section-bg">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="102" data-purecounter-duration="1" class="purecounter"></span>
                <p> Clients Satisfaits</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="21" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projets</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Temps Realisés</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Travailleurs</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

  </main><!-- End #main -->

<?php
include('includes/footer.php')
?>