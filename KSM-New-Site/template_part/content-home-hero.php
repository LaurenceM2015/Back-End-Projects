    
    <!-- main Header -->
    <?php 
      $sql = "SELECT * FROM `home` WHERE home_id='7'";
      $result = mysqli_query($conn, $sql);
      while($row=mysqli_fetch_assoc($result)){
        $home_id = $row['home_id'];
        $home_content = $row['home_content'];
        $home_title = $row['home_title'];
        //$home_feature_img = $row['home_feature_img']; 
    ?>
<?php if ( trim($home_feature_img) =="" ){  // check for feature image ?> 
    <header class="header text-white fallback-image" style="background-image: url('../assets/css/img/chariteHero.jpg')">


<?php } else { ?>
    <header class="header text-white fallback-image" style="background-image: url('../<?php getHeroValue("header_hero_image"); ?>')">

    <div class="container header__container h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-12">
          
          <div class="header__text animated text-center">
              <h1 class="heading-primary text-lg-left">
                <span class="heading-primary--main"><?php echo $home_title; ?></span>
              </h1>
              <div class="">
                <p class="lead my-5"><?php echo $home_content; ?></p>
                <a class="btn btn--orange js-scroll-trigger" href="#slogan">En Savoir Plus</a>
              </div>
              
          </div>
        </div>
      </div><!-- ./row -->
    </div><!-- ./container -->
  </header>
  <?php }  ?>
<?php }  ?>

