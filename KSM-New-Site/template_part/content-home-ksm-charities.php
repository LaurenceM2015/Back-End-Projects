<section class="section-charite page-section" id="charite">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="heading-secondary heading-secondary--1 mb-5 pb-5 text-center"><?php getCategoryName(4); ?></h2>
        </div>
      </div>

      <?php 
          $sql = "SELECT * FROM `post` WHERE FIND_IN_SET('4', post_category)  ORDER BY post_id DESC LIMIT 0,2";
          $result = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($result)){
              $post_id = $row['post_id'];
              $post_title = $row['post_title']; 
              $post_image = $row['post_image']; 
                
            ?>
      <div class="row wow fadeIn align-items-center section-primary no-gutters">
        <div class="col-lg-4">
          <div class="article h-100 wow fadeInLeft">
            <div class="article__left h-100 w-100">
                <img src="<?php echo $post_image; ?>" alt="Stage" class="img-fluid w-100 article__img">
                
            </div>
          </div>
        </div>
           
        <div class="col-lg-8">
          <div class="article h-100 wow fadeInRight px-5">
            <div class="article__right h-100">
                <div class="">
                    <h4 class="heading-tertiary text-white text-center pt-4"><?php echo $post_title; ?></h4>
                </div>
                <p class="article__text lead">
                  <?php echo substr(strip_tags($post_content),0,90)."..."; ?>
                </p>
            </div>

            <a href="post.php?id=<?php echo $post_title; ?>" target="_blank" class="btn-text btn-text--white">Lise l'article &rarr;</a>
          </div>

        </div> <!-- ./ col-lg-8 -->
       
      </div><!-- row -->
      <?php }  ?>
          
    </div><!-- container -->
      
</section>