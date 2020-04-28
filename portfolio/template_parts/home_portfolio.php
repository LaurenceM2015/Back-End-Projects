<section class="page-section portfolio-section portfolio bg-light" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center mb-5">
              <h2 class="heading-secondary page-section-heading text-center text-secondary">My Work Projects</h2>
              <p class="text-muted pt-3">My most latest project that I worked with.</p>
            </div>
        </div>

        <div class="row no-gutters">
                  <!-- Portfolio Item 1 -->
            <?php $index=1;
            foreach ($portfolioItems as $portfolioItem) { ?>
            <div class="col-lg-6">
              <a class="portfolio-item" data-toggle="modal" data-target="#portfolioModal<?=$index++?>">
                <span class="caption d-flex align-items-center justify-content-center w-100">
                  <span class="caption-content text-center">
                    <i class="fas fa-plus fa-3x"></i>
                    <h3><?php echo $portfolioItem["title"]; ?></h3>
                    <p class="mb-0"><?php echo $portfolioItem["subTitle"]; ?></p>
                  </span>
                </span>
                <img class="img-fluid" src="resources/img/<?php echo $portfolioItem["img"]; ?>.jpg" alt="">
              </a>
            </div>
            <?php } ?>
          </div><!-- ./ end row -->

          <div class="row my-5 py-5">
            <div class="col-lg-12 text-center mt-4">
              <a href="portfolio.php" class="Btn Btn--green">Visit The Page &rarr;</a>
            </div>
          </div>

            </div> 
            <!-- ./ end container -->
      </section>