<!-- Blog Section -->
<section class="section-features page-section" id="stage">
    <div class="container">
        <div class="row">
          <div class="col-md-12 pb-5">
            <h2 class="mb-5 heading-secondary heading-secondary--1"><?php getCategoryName(1); ?></h2>
          </div>
        </div>
  
        <div class="row">
          <?php 
            $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT 0,3";
            $result = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($result)){
              $post_title = $row['post_title']; 
              $post_image = $row['post_image']; 
              $post_author = $row['post_author']; 
              $post_content = $row['post_content'];
              $post_category = $row['post_category'];
              $post_id = $row['post_id'];

          ?>
        
          <div class="col-md-4 my-4">
            <div class="feature-box card h-100">
              <div class="card-img-top feature-box__img-box">
                <img class="feature-box__img"  src="<?php echo $post_image ?>" alt="Un stage était organisé pour aider le jeune garçon">
              </div>
              <div class="card-body">
                  <h4 class="card-title feature-box__text"><?php echo $post_title ?></h4>
                  <p class="card-text"><?php echo substr(strip_tags($post_content),0,90)."..."; ?></p>
                      <a href="post.php?id=<?php echo $post_id; ?>" class="btn-text">Lise l'article &rarr;</a>
                </div>
            </div> <!-- feature box 1 -->
          </div><!-- ./col-md-4 -->

          <?php } ?>
    
        </div><!-- row -->

        <div class="row justify-content-center pt-5">
          <div class="col-md-12 text-center"> 
            <a class="btn btn--orange js-scroll-trigger" href="blog.php">En Savoir Plus</a>
          </div>
        </div>
  
    </div> <!-- container -->   
            
</section>