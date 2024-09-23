<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title class="text-red-400">Pccf</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link class=" rounded-full" href="assets/img/logo.jpg" rel="icon">
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

        <h2>Details Evenements</h2>
        <ol>
          <li><a href="index">Accueil</a></li>
          <li>Details Evenements</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="assets/img/blog/<?=$image_blog?>" alt="" class="img-fluid">
              </div>

              <h2 class="title"><?=$blog_titre?></h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?=$util_nom?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01"><?=$datepub_blog?></time></a></li>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-chat-dots"></i> 
                    <?php
                      $recupedata=$my_bd->query("SELECT * FROM tbl_comentblog WHERE blog_id= '$idblogs' LIMIT 1");
                      if($recupedata->rowCount()>0){
                      while($checkdata=$recupedata->fetch()){
                          $idddcomments = current(($my_bd->query("SELECT COUNT(*) FROM tbl_comentblog WHERE blog_id='$idblogs' LIMIT 1"))->fetch());
                    ?>
                    <a href="evenement-details"><?=$idddcomments?> Commentaires</a>
                    <?php
                      }
                    }
                    ?>
                  </li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p>
                  <?=$content_blog?>
                </p>

              </div><!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#"><?=$categori_blog?></a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="evenement">Evenements</a></li>
                  <li><a href="#">Changa Changa</a></li>
                </ul>
              </div><!-- End meta bottom -->
              <div class="comments">
                  <?php
                    $recupedata=$my_bd->query("SELECT * FROM tbl_comentblog WHERE blog_id= '$idblogs' LIMIT 1");
                    if($recupedata->rowCount()>0){
                    while($checkdata=$recupedata->fetch()){
                        $idddcomments = current(($my_bd->query("SELECT COUNT(*) FROM tbl_comentblog WHERE blog_id='$idblogs' LIMIT 1"))->fetch());
                  ?>
              <h4 class="comments-count"><?=$idddcomments?> Commentaires</h4>
              <?php
                    }
                  }
              ?>
              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div>
                  <?php
                    $recupedata=$my_bd->query("SELECT * FROM tbl_comentblog WHERE blog_id= '$idblogs'");
                    if($recupedata->rowCount()>0){
                    while($checkdata=$recupedata->fetch()){
                        $com_idd =$checkdata['com_id'];
                        $com_nom =$checkdata['com_nom'];
                        $com_comment =$checkdata['com_comment'];
                        $com_date =$checkdata['com_date'];

                        $idddcomments = current(($my_bd->query("SELECT COUNT(*) FROM tbl_comentblog WHERE blog_id='$idblogs'"))->fetch());
                  ?>
                    <i class="bi bi-person text-yellow-400"></i> <a href="#" class="px-2"><?=$com_nom?></a></li>
                    <time datetime="<?=$com_date?>">Commenté le <?=$com_date?></time>
                    <p>
                      <?=$com_comment?>
                    </p>
                    <?php
                     }
                    }
                    ?>
                  </div>
                </div>
              </div><!-- End comment #1 -->

            </article><!-- End blog post -->
            
            <div class="comments">

              <div class="reply-form">
                <div class="bg-yellow-400 py-2 rounded-sm">
                    <h3 class="text-sm text-red-100 font-semibold px-2"><?=$messagecomment?></h3>
                    <h3 class="text-sm px-2 text-white"><?=$messagecommentgood?></h3>
                </div>
                <h4 class="py-3">Laissez Nous votre Commentaire</h4>
                <form method="POST">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="comment_name" type="text" class="form-control" placeholder="Votre Nom*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="comment_email" type="text" class="form-control" placeholder="Votre Email*">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col form-group">
                      <textarea name="text_comment" class="form-control" placeholder="Votre Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary hover:text-white" name="commentaire">Envoyer</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">
                <div class="sidebar-item recent-posts">
                    <h3 class="sidebar-title">Recent Evenements</h3>
                    <div class="mt-3">

                        <?php
                            $recupedata=$my_bd->query("SELECT * FROM tbl_blog  ORDER BY blog_id DESC LIMIT 5");
                            if($recupedata->rowCount()>0){
                            while($checkdata=$recupedata->fetch()){
                                $idblog=$checkdata['blog_id'];
                                $titreblog=$checkdata['blog_titre'];
                                $imageblog=$checkdata['blog_image'];
                                $blogcontent=$checkdata['blog_content'];
                                $blogdatepub=$checkdata['blog_date'];
                                $blogcateg=$checkdata['categorie_blog'];
                                
                            ?>
                        <div class="post-item mt-3">
                            <img src="assets/img/blog/<?=$imageblog?>" alt="">
                            <div>
                            <h4><a href="evenement-details?blogdetail=<?=$idblog?> "><?=$titreblog?></a></h4>
                            <time datetime="2020-01-01"><?=$blogdatepub?></time>
                            </div>
                        </div><!-- End recent post item-->
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div><!-- End sidebar recent posts-->


            </div><!-- End Blog Sidebar -->
            <br>
            <div class="sidebar">

              <div class="sidebar-item search-form">
              </div><!-- End sidebar search formn-->

                <div class="sidebar-item recent-posts">
                    <h3 class="sidebar-title">Reseaux Socio</h3>
                    <div class="mt-3">

                    </div>
                </div><!-- End sidebar recent posts-->


            </div><!-- End Blog Sidebar -->
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
