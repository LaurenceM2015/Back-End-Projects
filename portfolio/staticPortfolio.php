Portfolio Modals 
  <div class="portfolio-modal modal fade py-5" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
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
                
                <h2 class="portfolio-modal-title heading-secondary py-5">Personal Portfolio</h2>
              </div>
                <div class="modal-card-img col-lg-12 text-center">
                  
                  <img class="img-fluid rounded mb-5" src="resources/img/LaurenceMalongaPortfolioHeader.jpg" alt="Laurence Malonga Personal Portfolio">
                </div>

                <div class="modal-card-desc">
                     
                  <p class="mb-5 long-copy">A simple beautiful responsive single, landing page, with a resources, blog, & contact pages, build from ground up, with, bootrapp framework. Then Convert the static Bootstrap them, into a Easy-to-use wordpress Theme.</p>
                </div>
                <div class="col-md-6">
                  <h4>Features</h4>
                  <ul class="list-unstyled">
                    <li>Responsive, full page header featuring a background image with overlay, with animated vertically centered content &amp; html image</li>
                    <li>Fully functional portfolio image grid with hover captions</li>
                    <li>NPM based development environment with a watch task for rapid custom development</li>
                    <li>JavaScript parallax scrolling effect</li>
                    <li>JavaScript parallax background image</li>
                    <li>UX friendly navigation</li>
                    <li>Custom SASS compiled filed</li>
                  </ul>
                </div>

                <div class="col-md-6 text-left">
                  <div class="tech-used">
                    <h4 class="">Technologies Used</h4>
                    <ul class="list-unstyled">
                      <li>Bootstap</li>
                      <li>HTML5  &amp; CSS3</li>
                      <li>JavaScript &amp; jQuery</li>
                      <li>SASS</li>
                      <li>NPM package</li>
                      <li>WordPress</li>
                    </ul>
                  </div>

                  <div class="tech-used">
                    
                    <ul class="list-unstyled">
                      <li>Category: Single Page, Responsive design</li>
                      <li>Client Based: Mardie, France</li>
                      <li>Date: July 2017</li>
                      <li>Version: 4.0.0</li>
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
  
  
 
  
   
     <section class="page-section portfolio-section portfolio bg-light" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center mb-5">
              <h2 class="heading-secondary page-section-heading text-center text-secondary">My Work Projects</h2>
              <p class="text-muted pt-3">My most latest project that I worked with.</p>
            </div>
          </div>

          <div class="row no-gutters">
             
              <?php 
               
                $sql = "SELECT * FROM `post` ORDER BY post_id ASC LIMIT 0,4";
                $result = mysqli_query($conn, $sql);
                  $i=1;
                  while($row=mysqli_fetch_assoc($result)){
                    $post_title = $row['post_title']; 
                    $post_image = $row['post_image']; 
                    $post_id = $row['post_id'];
  
              ?>
              <div class="col-lg-6">
                <a class="portfolio-item" data-toggle="modal" data-target="#portfolioModal<?=$i++?>">
                  <span class="caption d-flex align-items-center justify-content-center w-100">
                    <span class="caption-content text-center">
                      <i class="fas fa-plus fa-3x"></i>
                      <h3><?php echo $post_title; ?></h3>
                      <p class="mb-0"><?php //echo $post_intro; ?></p>
                    </span>
                  </span>
                  <img class="img-fluid" src="<?php echo $post_image; ?>" alt="">
                </a>
              </div>
              <?php } ?>
            </div>
            

            <div class="row my-5 py-5">
              <div class="col-lg-12 text-center mt-4">
                <a href="portfolio.php" class="Btn Btn--green">Visit The Page &rarr;</a>
              </div>
            </div>
          </div> 
       
      </section>


      <section class="page-section feature-section mb-0" id="feature">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 py-5">
        <h2 class="heading-secondary page-section-heading text-uppercase"><?php getSettingValue("service_heading"); ?></h2>
        <p class="pt-3 long-copy lead"><?php getSettingValue("service_desc"); ?></p>
      </div>
      <!-- About Section Content -->
           
      <?php 
        foreach ($services as $service) { ?>

          <div class="col-md-6">
            <div class="feature-box feature-box--card feature-box--border js-move-in-on-scroll">
              <div class="feature-box--header">
                <?php echo $service["icon"]; ?>
                <h3 class="heading-tertiary"><?php echo $service["title"]; ?></h3>
              </div>
              <ul class="list-unstyled feature-box__text">
              <?php 
              $description = $service["newdesc"];
              for($i=0;$i<=count($service["newdesc"]);$i++) { ?>
              <li><?php echo $description[$i]?>
              </li>
          <?php } ?>
              </ul>
          </div><!-- feature box 1 -->

        </div><!-- ./col-md-6 -->
      <?php } ?>
    </div>
  </div><!-- ./ container -->
</section>


<section class="page-section about-section text-white text-center mb-0" id="process">
            <div class="container">

            <div class="row">
              <div class="col-lg-12 text-center py-5">
                <h2 class="heading-secondary heading-secondary--white page-section-heading text-center text-uppercase"><?php getSettingValue("process_heading"); ?></h2>
                <p class="text-white pt-3 long-copy lead"><?php getSettingValue("process_desc"); ?></p>
              </div>
              </div><!-- ./ row -->
            <!-- About Section Content -->
             
            <div class="row text-muted">

              <?php 
                foreach ($processItems as $processItem) { ?>  

                <!-- feature box 1 -->
                <div class="col-md-3 col-lg-6 mb-5">
                  <div class="feature-box feature-box--hover h-100">
                  <?php echo $processItem["icon"]; ?>
                      <h3 class="heading-tertiary u-margin-bottom-small"><?php echo $processItem["title"]; ?></h3>
                      
                      <ul class="feature-box__text list-unstyled">
                      
                  <?php $description = $processItem["processList"];
                    for($i=1;$i<=count($processItem["processList"]);$i++) { ?>
                  <li><i class="feature-box__icon feature-box__icon--small fas fa-check"></i><?=$description[$i]?></li>
                    
                  <?php } ?>
                  </ul>
                    
                  </div>
    
            </div>

          <?php } ?>
        </div>

            </div>
            <!-- ./ container -->
      </section>