<section class="page-section portfolio-section portfolio bg-light" id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">
        <h2 class="heading-secondary page-section-heading text-center"><?php getSettingValue("portfolio_heading"); ?></h2>
        <p class="text-muted pt-3"><?php getSettingValue("portfolio_desc"); ?></p>
      </div>
    </div>

    <div class="row no-gutters">
      <?php 
        $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT 0,4";
        $result = mysqli_query($conn, $sql);
        $i=1;
        while($row=mysqli_fetch_assoc($result)){
          $post_title = $row['post_title']; 
          
          $post_image = $row['post_image']; 
          $post_author = $row['post_author']; 
          $post_content = $row['post_content'];
          $post_category = $row['post_category'];
          $post_id = $row['post_id'];
          $sqlauth = "SELECT * FROM author WHERE author_id='$post_author'";
          $resultauth = mysqli_query($conn, $sqlauth);
       
          while($authrow=mysqli_fetch_assoc($resultauth)){
          $post_author_name = $authrow['author_name'];
        }
        
      ?>

                  <!-- Portfolio Item 1 -->
      <div class="col-lg-6">
        <a class="portfolio-item" data-toggle="modal" data-target="#portfolioModal<?=$i++?>">
          <span class="caption d-flex align-items-center justify-content-center h-100 w-100">
            <span class="caption-content text-center">
              <i class="fas fa-plus fa-3x"></i>
              <h3><?php echo $post_title ?></h3>
              <p class="mb-0"><?php getCategoryName('post_category'); ?></p>
            </span>
          </span>
          <img class="img-fluid" src="<?php echo $post_image ?>" alt="">
        </a>
      </div>
      
      <?php  } ?>

    </div><!-- portfolio-grid   -->

    <div class="row my-5 py-5">
      <div class="col-lg-12 text-center mt-4">
        <a href="portfolio.php" class="Btn Btn--green">Visit The Page &rarr;</a>
      </div>
    </div>

  </div><!-- ./ end container -->
</section>