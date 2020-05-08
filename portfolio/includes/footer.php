

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

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

    <!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=quy69270j2zull9yao8jgu4yula8yyu7r8yav8jb3v0un3au"></script>

	<script>tinymce.init({ selector:'textarea' });</script> -->

        
  </body>
</html>

<!-- Portfolio Modals -->
<?php $index=1;
 $sql1 = "SELECT * FROM `post` ORDER BY post_id DESC";
 $result1 = mysqli_query($conn, $sql1);
 
while($portfolioItem=mysqli_fetch_assoc($result1)){
 // print_r("<pre>");
//print_r($portfolioItem);
 //print_r("</pre>");
 ?>
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
                <h2 class="portfolio-modal-title heading-secondary py-5"><?php echo $portfolioItem['post_title'] ?></h2>
              </div>
              <div class="modal-card-img col-lg-12 text-center">
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="./<?php echo $portfolioItem['post_image'] ?>" alt="Laurence Malonga Personal Portfolio">
              </div>
                  <!-- Portfolio Modal - Text -->
              <div class="modal-card-desc col-md-12">
                <p class="mb-5 long-copy"><?php echo $portfolioItem['post_content']; ?></p>
              </div> <!-- ./ modal card -->
              <div class="col-md-6">
                <h4>Features</h4>
                <ul class="list-unstyled">
                  <?php// echo $portfolioItem['post_feature']; ?>
                  <?php getFeatureName($portfolioItem['post_feature']); ?>
                  
                </ul>
              </div> <!-- ./col-md-6 -->

              <div class="col-md-6 text-left">
                <div class="tech-used">
                  <h4 class="">Technologies Used</h4>
                  <ul class="list-unstyled">
                  <?php //$portfolioItem['post_technologies']; ?>
                    <?php getTechnologyName($portfolioItem['post_technologies']); ?>
                  </ul>
                </div><!-- ./tech used -->
              
                <div class="tech-used">
                  <ul class="list-unstyled">
                    <li>Category:<?php getCategoryName($portfolioItem['post_category']); ?></li>
                    <li>Client Based: Mardie, France</li>
                    <li>Created on: <?php echo $portfolioItem['post_date']; ?></li>
                    <li>Version: 4.0.0</li>
                  </ul>
                </div><!-- ./tech used -->
              </div><!-- ./col-md-6 -->
                  
              <div class="modal-footer border-0">
                <?php if (substr($portfolioItem['post_website_link'], 0, 7) == "http://"){
									 $post_website_link = $portfolioItem['post_website_link'];
            } else{
              $post_website_link ="http://".$portfolioItem['post_website_link'];
             
            }
            ?>
                <a href="<?php echo $post_website_link; ?>" target="_blank" class="Btn Btn--green">Visit The Page →</a>
              </div> <!-- ./modal footer -->

            </div> <!-- ./ row modal -->
          </div> <!-- ./ container modal -->
        </div><!-- ./modal body --> 
      </div><!-- ./modal-content -->
    </div> <!-- ./modal-dialog -->
  </div> <!-- ./modal -->
<?php } ?>




 

  
   
  
   