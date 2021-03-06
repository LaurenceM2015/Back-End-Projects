<section id="apropodenous" class="page-section projects-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 pb-5">
          <h2 class="mb-5 heading-secondary heading-secondary--1"><?php getSettingValue("about_title"); ?></h2>
        </div>
      </div>
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-5 col-lg-7">
          <div class="text-center wow fadeInLeft">
            <img class="img-fluid mb-3 mb-lg-0" src="<?php getSettingValue("about_image"); ?>" alt="Les Professeurs de KSM, Valerie Mabilleau et Fabien Poulin">
          </div>
        </div>
        <div class="col-xl-7 col-lg-5 wow fadeInRight">
          <div class="featured-text text-center text-lg-left">
            <h3><?php getSettingValue("about_subtitle"); ?></h3>
            <p class="text-black-50 mb-4">
              <?php getSettingValue("about_desc"); ?>
            </p>
          </div>
          
        </div>
      </div><!-- ./row -->

      <div class="row text-center pt-5">
      <?php 
          $sql = "SELECT * FROM `teams` ORDER BY team_id";
          $result = mysqli_query($conn, $sql);
          while($row=mysqli_fetch_assoc($result)){
          $team_id    = $row['team_id']; 
          $team_name  = $row['team_name'];
          $team_title = $row['team_title'];
          $team_belt  = $row['team_belt'];
      ?>

        <div class="col-md-3">
          <h4><?php echo $team_name; ?></h4>
          <span><i class="fas fa-medal fa-color"></i> <?php echo $team_belt; ?></span>
          <p class="text-muted"><?php echo $team_title; ?></p>
        </div><!-- team member: fabien poulin -->

          <?php } ?>

        
      </div><!-- ./team row -->

      <div class="row">
        <div class="col-md-12">
          <div class="section-lien py-5">
            <h3>No Lien</h3>
          </div>
        </div>
      </div>

      <!-- no lien -->
      <div class="row text-center justify-content-between align-items-center">

        <?php 
          $sql = "SELECT * FROM `clients` ORDER BY client_id";
          $result = mysqli_query($conn, $sql);
          while($row=mysqli_fetch_assoc($result)){
          $client_id    = $row['client_id']; 
          $client_name  = $row['client_name'];
          $client_link  = $row['client_link'];
          $client_img  = $row['client_img'];
          
      ?>

        <div class="col-md-2 col-sm-4 col-xs-6">
          <a class="text-center" href="<?php echo $client_link; ?>" alt="<?php echo $client_name; ?>" target="_blank">
            <img class="img-fluid d-block mx-auto" src="<?php echo $client_img; ?>">
          </a>
        </div>
          <?php } ?>

      </div>

      </div> <!-- row -->

    </div><!-- container -->
  
</section><!-- a propos de nous -->