<section class="page-section projects-section" id="competition">
      <div class="wow fadeIn">
        <div class="container">

          <div class="row">
            <div class="col-md-12">
                <h2 class="heading-secondary heading-secondary--1 mb-5 pb-4"><?php getCategoryName(2); ?></h2>
            </div>
          </div>

              <!-- Project One Row -->
          <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
          <?php 
              $sql = "SELECT * FROM `post` WHERE FIND_IN_SET('2', post_category)  ORDER BY post_id DESC LIMIT 0,2";
              $result = mysqli_query($conn, $sql);

              while($row=mysqli_fetch_assoc($result)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title']; 
                $post_image = $row['post_image'];
                $post_content = $row['post_content']; 
                
            ?>
              
            <div class="col-lg-6">
              <div class="">
                  <img class="img-fluid w-100" src="<?php echo $post_image ?>" alt="">
              </div>
            </div>
            <div class="col-lg-6 align-items-center">
              <div class="bg-black text-center project h-100 section-primary">
                <div class="d-flex">
                  <div class="project-text w-100 h-100 text-center text-lg-left">
                    <h4 class="text-white page-header page-header--1 mt-0"><?php echo $post_title ?></h4>
                    <p class="mb-0">
                    <?php echo substr(strip_tags($post_content),0,90)."..."; ?>
                     <!-- Des compétitions et interclubs sont organisés chaque année afin de permettre à nos élèves de s'affronter dans un bon esprit de compétition et de bonne humeur. -->
                    </p>
                      <hr class="d-none d-lg-block mb-0 ml-0">
                  </div><!-- ./project-text -->
                </div>
              </div>
            </div>
            <?php } ?>
           
          </div><!-- ./row one -->

      <!-- Project Two Row 
      <div class="row justify-content-center no-gutters">
          <div class="col-lg-6">
            <img class="img-fluid" src="assets/img/valerie-min.jpg" alt="">
          </div>
          <div class="col-lg-6 order-lg-first">
            <div class="bg-black text-center h-100 project section-primary">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-right">
                  <h4 class="text-white page-header page-header--1 mt-0">Stage aux Sable d'Olonne</h4>
                  <p class="mb-0">
                    Nous vous proposons également tous les ans un stage aux Sables d'Olonne avec Fabien. Si vous souhaitez vous exercer 
                    à cet art martial qu'est le karaté dans l'effort, le bien être et la convivialité, venez nous rejoindre.
                  </p>
                  <hr class="d-none d-lg-block mb-0 mr-0">
                </div>
              </div>
            </div>
          </div>
      </div> -->

        </div> <!-- container -->
      </div>
    </section><!-- Competition -->