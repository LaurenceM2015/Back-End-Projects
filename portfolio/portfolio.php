<?php 
 ini_set("display_errors", 1);
  
  include('includes/header.php');
  include('includes/connection.php');
  include('includes/arrays.php');
  include('includes/functions.php');
  
?>
  
  <!-- Secondary Navigation -->
  <?php include "includes/nav.php";?>

  <header class="text-white text-center d-flex  flex-column justify-content-center header">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/RCAhiGJsUUE/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">First Slide</h3>
            <p class="lead">This is a description for the first slide.</p>
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">Second Slide</h3>
            <p class="lead">This is a description for the second slide.</p>
            </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/O7fzqFEfLlo/1920x1080')">
            <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">Third Slide</h3>
            <p class="lead">This is a description for the third slide.</p>
            </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
    </div>
  </header>
         
        <main>
            
          <!-- Portfolio Grid -->
          <section class="page-section portfolio-section portfolio" id="portfolio">
              <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center my-5">
                        <h2 class="heading-secondary page-section-heading text-center text-secondary">My Work Projects</h2>
                      <p class="text-muted pt-3">Lorem ipsum dolor sit amet consectetur.</p>
                    </div>

                    <div class="col-lg-12 text-center my-5">
                      <nav class="navbar">
                        <!-- d-flex justify-content-around -->
                          <ul class="nav caption">
                          <!--<li class="button active" data-filter="all">All</li> -->

                          <?php 
                              $sql    = "SELECT * FROM categories";
                              $result = mysqli_query($conn, $sql);
                              while($row=mysqli_fetch_array($result)){
                              $category_id = $row['category_id'];
                              $category_name = $row['category_name'];
                          ?>
                              <li class="button" data-filter="<?php echo $category_id; ?>"><?php echo $category_name; ?></li>
                              <?php } ?>
                          </ul>
                      </nav>
                    </div>
                </div>
                
                <div class="row no-gutters">
                <?php 
                    $sql = "SELECT * FROM `post` ORDER BY post_id DESC";
                    $result = mysqli_query($conn, $sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($result)){
                      $post_title = $row['post_title']; 
                      $post_intro = $row['post_intro']; 
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
                  <div class="filter <?php echo $post_category; ?> sass col-lg-6">
                    <a class="portfolio-item" data-toggle="modal" data-target="#portfolioModal<?=$i++?>">
                      <span class="caption d-flex align-items-center justify-content-center h-100 w-100">
                        <span class="caption-content text-center">
                          <i class="fas fa-plus fa-3x"></i>
                          <h3><?php echo $post_title ?></h3>
                          <p class="mb-0"><?php echo $post_intro ?></p>
                        </span>
                      </span>
                      <img class="img-fluid" src="<?php echo $post_image ?>" alt="">
                    </a>
                  </div>
                  
                  <?php  } ?>

                </div><!-- portfolio-grid   -->
                <!-- ./ end row -->
            </di> 
              <!-- ./ end container -->
          </section> 
      </main>
      
      <?php include('includes/footer.php'); ?>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

 

  <!-- Portfolio Modal 1 -->
  <!-- Portfolio Modals -->
<?php $index=1;
 $sql1 = "SELECT * FROM `post` ORDER BY post_id DESC";
 $result1 = mysqli_query($conn, $sql1);
while($portfolioItem=mysqli_fetch_assoc($result1)){
  
 ?>
  <!-- Portfolio Modal 1 -->
  <div class="portfolio-modal modal fade py-5" id="portfolioModal<?=$index?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal<?=$index++?>Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center px-5">
              <div class="modal-card-header">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title heading-secondary py-5"><?php echo $portfolioItem['post_title'] ?></h2>
              </div>
              <div class="modal-card-img col-lg-12 text-center">
                <!-- Portfolio Modal - Image -->
                <img class="img-fluid rounded mb-5" src="./<?php echo $portfolioItem['post_image'] ?>" alt="Laurence Malonga Personal Portfolio">
              </div>
                  <!-- Portfolio Modal - Text -->
              <div class="modal-card-desc col-md-12">
                <p class="mb-5 long-copy"><?php echo $portfolioItem['post_content']; ?></p>
              </div> <!-- ./ modal card -->
              <div class="col-md-6">
                <h4>Features</h4>
                <ul class="list-unstyled">
                  <li>Responsive, full page header featuring a background image with overlay, with animated vertically centered content &amp; html image</li>
                  <li>Fully functional portfolio image grid with hover captions</li>
                  <li>NPM based development environment with a watch task for rapid custom development</li>
                  <li>JavaScript parallax scrolling effect</li>
                  <li>JavaScript parallax background image</li>
                  <li>UX friendly navigation</li>
                  <li>Custom SASS compiled filed</li>
                </ul>
              </div> <!-- ./col-md-6 -->

              <div class="col-md-6 text-left">
                <div class="tech-used">
                  <h4 class="">Technologies Used</h4>
                  <ul class="list-unstyled">
                    <li>Bootstap</li>
                    <li>HTML5  &amp; CSS3</li>
                    <li>JavaScript &amp; jQuery</li>
                    <li>SASS</li>
                    <li>NPM package</li>
                    <li>WordPress</li>
                  </ul>
                </div><!-- ./tech used -->
              
                <div class="tech-used">
                  <ul class="list-unstyled">
                    <li>Category: <?php getCategoryName($post_category); ?></li>
                    <li>Client Based: Mardie, France</li>
                    <li>Date: July 2017</li>
                    <li>Version: 4.0.0</li>
                  </ul>
                </div><!-- ./tech used -->
              </div><!-- ./col-md-6 -->
                  
              <div class="modal-footer border-0">
                <a href="resume.html" class="Btn Btn--green">Visit The Page →</a>
              </div> <!-- ./modal footer -->

            </div> <!-- ./ row modal -->
          </div> <!-- ./ container modal -->
        </div><!-- ./modal body --> 
      </div><!-- ./modal-content -->
    </div> <!-- ./modal-dialog -->
  </div> <!-- ./modal -->
<?php } ?>
  
 


   


    
 