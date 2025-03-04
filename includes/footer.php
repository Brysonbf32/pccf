  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h4 class="text-red-200 text-lg">PEACE CHANGA-CHANGA FONDATION</h4>
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
                <p> 
              <div>
               <?=$address_co?><br><br>
                  <strong>Phone:</strong><a href="tel:<?=$numero_co?>"><?=$numero_co?></a><br>
                  <strong>Email:</strong><a href="mailto:<?=$email_co?>" target="_blank"><?=$email_co?></a><br>
                </p>
                <div class="social-links d-flex mt-3">
                  <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                  <a href="https://www.facebook.com/profile.php?id=100070116601772"  class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="d-flex align-items-center justify-content-center" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <?php
                  }
                }
              ?>
            </div>

          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Liens Importants</h4>
            <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="apropos.php">Apropos</a></li>
            <li><a href="services.php">Nos Programmes</a></li> 
            <li><a href="evenement.php">Evenements</a></li> 
            <li><a href="contact.php">Contact</a></li> 
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nos Programmes</h4>
            <ul>
              <li><a href="#">Microfinance</a></li>
              <li><a href="#">Humanisme</a></li>
              <li><a href="#">Entreprenariat</a></li>
              <li><a href="#">Agriculture</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Notre Mission</h4>
            <ul>
              <li><a href="#">Promouvoir L'equité,La Tolerance et La solidarité</a></li>
              <li><a href="#">Repect de la Dignité Humaine</a></li>
              <li><a href="#">Accompagné Les Pauvres</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Notre Vision</h4>
            <ul>
              <li><a href="#">Societé équitable</a></li>
              <li><a href="#">Societé Tolérante</a></li>
              <li><a href="#">Societé Solidaire</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Pccf</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
         
          Designed by <a href="mailto:nami.industry@gmail.com"target="_blank">Nami-Industry</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>