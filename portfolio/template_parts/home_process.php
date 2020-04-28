<section class="page-section about-section text-white text-center mb-0" id="process">
            <div class="container">

            <div class="row">
              <div class="col-lg-12 text-center py-5">
                <h2 class="heading-secondary heading-secondary--white page-section-heading text-center text-uppercase">The Build Process, &amp; architecture</h2>
                <p class="text-white pt-3 long-copy lead">I work is based on the  three pillar of: writing good maintainable and scalable html codes. Making the Website Performance fast &amp; efficiently.
                     with clean HTML structure for naming classes, with easy-to-understand, Growth &amp; Reusable</p>
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