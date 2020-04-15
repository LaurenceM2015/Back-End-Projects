

<footer id="sticky-footer" class="footer text-center">
    <div class="container-fluid">
            <div class="row">
      
              <!-- Footer Location -->
              <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="footer__nav">
                  <ul class="nav footer__list justify-content-center">
                    <li class="nav-item footer__item ">
                      <a class="nav-link footer__link" href="#about">Home</a>
                    </li>
                    <li class="nav-item footer__item ">
                      <a class="nav-link footer__link" href="portfolio.php">portfolio</a>
                    </li>
                    <li class="nav-item footer__item ">
                      <a class="nav-link footer__link" href="resume.php">My Resume</a>
                    </li>
                  </ul>
                </div>
              </div>
      
              <!-- Footer About Text -->
              <div class="col-lg-4">
                
                <p class="lead mb-0">A bootstrap theme build and created by 
                  <a href="#">Laurence Malonga</a>.</p>
              </div>

                <!-- Footer Social Icons -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Follow Me Around</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                      <i class="fab fa-fw fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                      <i class="fab fa-fw fa-twitter"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                      <i class="fab fa-fw fa-linkedin-in"></i>
                    </a>

                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                        <i class="fab fa-fw fa-github-alt"></i>
                      </a>
                    
                  </div>
      
            </div><!-- ./ row -->
    </div> <!-- container -->

    <div class="container">
        <small>Copyright &copy; Laurence M 2019</small>
    </div>
          
    </footer>

       <!-- Copyright Section -->
   
  
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

        <!--SCRIPT FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="resources/js/main.js"></script>
    <script src="resources/js/main.min.js"></script>
        
        
  </body>
</html>

    
<!-- Portfolio Modals -->
<?php $index=1;
      foreach ($portfolioItems as $portfolioItem) { ?>
  <!-- Portfolio Modal 1 -->
  <div class="portfolio-modal modal fade py-5" id="portfolioModal<?=$index?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal<?=$index++?>Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center px-5">
              <div class="modal-card-header">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title heading-secondary py-5"><?php echo $portfolioItem["title"]; ?></h2>
              </div>
                <div class="modal-card-img col-lg-12 text-center">
                  <!-- Portfolio Modal - Image -->
                  <img class="img-fluid rounded mb-5" src="resources/img/<?php echo $portfolioItem["img"]; ?>.jpg" alt="Laurence Malonga Personal Portfolio">
                </div>

                <div class="modal-card-desc">
                     <!-- Portfolio Modal - Text -->
                  <p class="mb-5 long-copy"><?php echo $portfolioItem["popuDesc"]; ?></p>
                </div>
                <div class="col-md-6">
                  <h4><?php echo $portfolioItem["popuSubhead1"]; ?></h4>
                  <ul class="list-unstyled">
                  <?php 
                      $popupList1 =$portfolioItem["popupList1"];
                  for($i=0;$i<=count($portfolioItem["popupList1"]);$i++) { ?>
                  <li><?=$popupList1[$i]?>
                  </li>
                  <?php } ?>

                  </ul>
                </div>

                <div class="col-md-6 text-left">
                  <div class="tech-used">
                    <h4 class=""><?php echo $portfolioItem["popuSubhead2"]; ?></h4>
                    <ul class="list-unstyled">
                    <?php 
                      $popupList2 =$portfolioItem["popupList2"];
                  for($i=0;$i<=count($portfolioItem["popupList2"]);$i++) { ?>
                  <li><?=$popupList2[$i]?>
                  </li>
                  <?php } ?>
                    </ul>
                  </div>

                  <div class="tech-used">
                    
                    <ul class="list-unstyled">
                    <?php 
                      $popupList3 =$portfolioItem["popupList3"];
                  for($i=0;$i<=count($portfolioItem["popupList3"]);$i++) { ?>
                  <li><?=$popupList3[$i]?>
                  </li>
                  <?php } ?>
                    </ul>
                  </div>
                    
                </div>
                
                <div class="modal-footer border-0">
                  <a href="resume.html" class="Btn Btn--green">Visit The Page &rarr;</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <?php } ?>


  
   
  
   