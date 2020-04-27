
 <!-- Section Les Charite -->
 <section class="section-charite page-section" id="charite">
        
    <div class="container">
              
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading-secondary heading-secondary--1 mb-5 pb-5 text-center"><?php getCategoryName(4); ?></h2>
            </div>
          </div>

         

          <div class="row wow fadeIn align-items-center section-primary no-gutters">
            <div class="col-lg-4">
              <?php 
                    $sql = "SELECT * FROM `post` WHERE FIND_IN_SET('4', post_category)  ORDER BY post_id DESC LIMIT 0,2";
                    $result = mysqli_query($conn, $sql);

                    while($row=mysqli_fetch_assoc($result)){
                      $post_id = $row['post_id'];
                      $post_image = $row['post_image']; 
                      
                  ?>

                <div class="article h-100 wow fadeInLeft">
                  <div class="article__left h-100 w-100">
                    <a href="post.php?id=<?php echo $post_id; ?>">
                      <img src="<?php echo $post_image; ?>" alt="Stage" class="img-fluid w-100 article__img">
                    </a>
                  </div>
                </div>
                <?php } ?>
            </div>
            

            <div class="col-lg-8">
              <div class="article h-100 wow fadeInRight px-5">
                <div class="article__right h-100">
                    <div class="">
                        <h3 class="heading-tertiary text-white text-center pt-4">Terre Des Enfant</h3>
                    </div>
                    <?php 
                                       
                     
                      $sql = "SELECT * FROM category WHERE category_id=(4)";

                      
                      $result = mysqli_query($conn, $sql);
                      while($row=mysqli_fetch_assoc($result)){
                        $category_id = $row['category_id']; 
                        $category_desc = $row['category_desc'];
                    ?>
                    <p class="article__text lead">
                    <?php } ?>
                    <?php echo $category_desc; ?>
                    </p>
                    
                </div>
                <a href="charities.php" target="_blank" class="btn-text btn-text--white">Lise l'article &rarr;</a>
              </div>
            </div>
          </div><!-- row -->

          

          
              
    </div><!-- container -->
          
</section>