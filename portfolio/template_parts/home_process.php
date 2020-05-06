<section class="page-section about-section text-center mb-0" id="process" style="background-image: linear-gradient(to right bottom, rgba(126, 213, 111, 0.8), rgba(21, 165, 137, 0.8)), url(<?php getHeroValue("process_hero_img"); ?>);">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 text-center text-white py-5">
        <h2 class="heading-secondary heading-secondary--white page-section-heading text-center text-uppercase"><?php getSettingValue("process_heading"); ?></h2>
        <p class="text-white pt-3 long-copy lead"><?php getSettingValue("process_desc"); ?></p>
      </div>
      <?php
        $sql = "SELECT * FROM `processes` ORDER BY process_id";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
          $process_name = $row['process_name'];
          $process_icon = $row['process_icon']; 
          $process_content = $row['process_content'];
          $process_id = $row['process_id'];
      ?>

        <div class="col-md-4 mb-5">
          <div class="feature-box feature-box--hover h-100">
              <i class="feature-box__icon mr-2 pb-2 <?php echo $process_icon; ?>"></i>
             
              <h3 class="heading-tertiary u-margin-bottom-small"><?php echo $process_name; ?></h3>
              <p class="feature-box__text"><?php echo $process_content; ?></p>
          </div>
        </div><!-- ./col-md-4 -->
      <?php } ?>
    </div><!-- ./row -->
  </div><!-- ./ container -->
</section>

