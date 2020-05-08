<section class="page-section bg-light skills-section section-stories" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center my-5">
        <h2 class="heading-secondary page-section-heading text-center text-uppercase py-5"><?php getSettingValue("about_heading"); ?></h2>
      </div>
    </div><!-- ./ row -->
        
    <div class="row">
      <div class="story mb-5">
        <figure class="story__shape">
            <!--<img src="resources/img/profile2.jpg" alt="Laurence Malonga" class="story__img"> -->
            <img src="<?php getHeroValue("about_profile_img"); ?>" alt="Laurence Malonga" class="story__img">
            <figcaption class="story__caption"><?php getSettingValue("about_name"); ?></figcaption>
        </figure>
        <div class="story__text">
            <h3 class="heading-tertiary u-margin-bottom-small"><?php getSettingValue("about_job_title"); ?></h3>
            <p>
              <?php getSettingValue("about_desc"); ?>
              <a href="#contact" class="btn btn-text js-scroll-trigger">Let's Create Something Special.</a>
          </p>
            

            
        </div>
      </div>
    
      <div class="story">
        <div class="story__text">
            <h3 class="heading-tertiary u-margin-bottom-small"><?php getSettingValue("about_subtitle"); ?></h3>
            
            <ul class="list-inline dev-icons text-center">
              <?php
                $sql = "SELECT * FROM `icons` ORDER BY icon_id";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
                $icon_id = $row['icon_id'];
                $icon_name = $row['icon_name']; 
              ?>
                <li class="list-inline-item">
                  <i class="<?php echo $icon_name; ?>"></i>
                </li>
              <?php } ?>
            </ul>
        </div>

        <div class="row text-center">
          <div class="col-md-12">
          <ul class="list-inline dev-icons text-center">
            
            <li class="list-inline-item">
              <svg class="svg-box__icon">
                <use xlink:href="vendors/img/symbol-defs.svg#icon-wordpress"></use>
              </svg>
            </li>

            <li class="list-inline-item">
              <svg class="svg-box__icon">
                <use xlink:href="vendors/img/symbol-defs.svg#icon-javascript"></use>
              </svg>
            </li>

            <li class="list-inline-item">
              <svg class="svg-box__icon">
                <use xlink:href="vendors/img/symbol-defs.svg#icon-java"></use>
              </svg>
            </li>
            <li class="list-inline-item">
              <svg class="svg-box__icon">
                <use xlink:href="vendors/img/symbol-defs.svg#icon-php"></use>
              </svg>
            </li>
            <li class="list-inline-item">
              <svg class="svg-box__icon">
                <use xlink:href="vendors/img/symbol-defs.svg#icon-rails"></use>
              </svg>
            </li>
            <li class="list-inline-item">
              <svg class="svg-box__icon">
                <use xlink:href="vendors/img/symbol-defs.svg#icon-mysql"></use>
              </svg>
            </li>
          </ul>
          </div>
            
                
        </div><!-- .row -->
      </div>
     
        
              
  </div><!-- ./ container -->

    <div class="row my-5 py-5 text-center">
      <div class="col-lg-12 text-center mt-4">
        <a href="resume.php" class="Btn Btn--green">Visit The Page &rarr;</a>
      </div>
    </div>
</section>