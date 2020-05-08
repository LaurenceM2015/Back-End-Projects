<section class="page-section feature-section mb-0" id="feature">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 py-5">
        <h2 class="heading-secondary page-section-heading text-uppercase"><?php getSettingValue("service_heading"); ?></h2>
        <p class="pt-3 long-copy lead"><?php getSettingValue("service_desc"); ?></p>
      </div>

      <?php
        $sql = "SELECT * FROM `services` ORDER BY service_id DESC";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
          $service_title = $row['service_title'];
          $service_icon = $row['service_icon']; 
          $service_content = $row['service_content'];
          $service_id = $row['service_id'];
        ?>
         <div class="col-md-4">
            <div class="feature-box feature-box--card feature-box--border js-move-in-on-scroll animate">
              
              <i class="feature-box__icon <?php echo $service_icon; ?>"></i>
              <h3 class="heading-tertiary text-center"><?php echo $service_title; ?></h3>
              <p class="feature-box__text"><?php echo $service_content; ?></p>
            </div>
         </div>
          
        <?php } ?>


    </div><!-- ./row -->
  </div><!-- ./container -->
</section>



