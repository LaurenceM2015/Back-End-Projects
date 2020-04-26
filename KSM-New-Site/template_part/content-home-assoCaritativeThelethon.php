<section class="page-section bg-light" id="assocari">
    <div class="container">
        <div class="content-section-heading text-center pb-5 my-5">
          <h2 class="heading-secondary heading-secondary--1"><?php getCategoryName(3); ?></h2>
       </div>
        <div class="row no-gutters">
          <?php 
              $sql = "SELECT * FROM `post` WHERE FIND_IN_SET('3', post_category)  ORDER BY post_id DESC LIMIT 0,4";
              $result = mysqli_query($conn, $sql);

              while($row=mysqli_fetch_assoc($result)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title']; 
                $post_image = $row['post_image']; 
                
            ?>

          <div class="col-lg-6">
            <div class="gallery">
            <a href="post.php?id=<?php echo $post_id; ?>"> 
                <div class="gallery__item">
                    <span class="caption">
                      <span class="caption-content">
                        <h4><?php echo $post_title ?></h4>
                        <p class="mb-0"></p>
                      </span>
                    </span>
                    <img class="img-fluid" src="<?php echo $post_image ?>" alt="Téléthon 2008">
                  </div>
              </a>
            </div>

            
          </div><!-- ./col -->
        
          <?php }  ?>
        
        </div>
    </div>
</section>