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
        <?php 
          $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT 0,3";
          $result = mysqli_query($conn, $sql);
          $i=1;
          while($row=mysqli_fetch_assoc($result)){
          $post_title = $row['post_title']; 
                      
            $post_image = $row['post_image']; 
            $post_content = $row['post_content'];
            $post_id = $row['post_id'];
  
          ?>
        <div class="carousel-item <?php if ($i==1) { ?>active<?php }  ?>">
            <img src="<?php echo $post_image; ?>" class="d-block w-100" alt="<?php echo $post_title; ?>">
            <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4"><?php echo $post_title; ?></h3>
            <p class="lead"><?php echo $post_content; ?></p>
            </div>
        </div>
          <?php $i++; } ?>
       
      </div><!-- carousel inner -->
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
                      <h2 class="heading-secondary page-section-heading text-center"><?php getSettingValue("portfolio_heading"); ?></h2>
                      <p class="text-muted pt-3 long-copy lead"><?php getSettingValue("portfolio_desc"); ?></p>
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
                  //pagination
                  $sqlpg = "SELECT * FROM `post`";
                  $resultpg = mysqli_query($conn, $sqlpg);
                  $totalposts = mysqli_num_rows($resultpg);
                  $totalpages = ceil($totalposts/8);
                  //echo ceil($totalposts/7);
                  
                ?>
                <?php 
                  //pagination get
                  if(isset($_GET['p'])){
                    $pageid = $_GET['p'];
                    $start = ($pageid*8)-8;
                    $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT $start,8";
                  }else{
                    $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT 0,8";
                  }
                ?>


                  <?php 
                    //$sql = "SELECT * FROM `post` ORDER BY post_id DESC";
                    $result = mysqli_query($conn, $sql);
                    $i=1;
                    while($row=mysqli_fetch_assoc($result)){
                      $post_title = $row['post_title']; 
                      
                      $post_image = $row['post_image']; 
                      $post_author = $row['post_author']; 
                      $post_content = $row['post_content'];
                      $post_category = explode(",",$row['post_category']);
                      $post_id = $row['post_id'];
                      $post_id = $row['post_website_link'];

                      $sqlauth = "SELECT * FROM author WHERE author_id='$post_author'";
                      $resultauth = mysqli_query($conn, $sqlauth);
                   
                      while($authrow=mysqli_fetch_assoc($resultauth)){
                      $post_author_name = $authrow['author_name'];
                      }
                    
                  ?>

                  <!-- Portfolio Item 1 -->
                  <div class="filter <?php for($j=0;$j< count($post_category);$j++) { echo $post_category[$j]." " ; } ?>  col-lg-6">
                    <a class="portfolio-item" data-toggle="modal" data-target="#portfolioModal<?=$i++;?>">
                      <span class="caption d-flex align-items-center justify-content-center h-100 w-100">
                        <span class="caption-content text-center">
                          <i class="fas fa-plus fa-3x"></i>
                          <h3><?php echo $post_title; ?></h3>
                          <p class="mb-0"><?php //echo $post_content; ?></p>
                        </span>
                      </span>
                      <img class="img-fluid" src="<?php echo $post_image; ?>" alt="">
                    </a>
                  </div>
                  <?php   } ?>

                </div><!-- portfolio-grid   -->
                <!-- ./ end row -->
            </div> 
              <!-- ./ end container -->
          </section> 
          <div class="row">
            <div class="col-md-12">
              <?php 
				        echo "<center>";
                for($i=1;$i<=$totalpages;$i++){
                  ?>
                  <a href="?p=<?php echo $i; ?>"><button class="btn btn-info"><?php echo $i; ?></button></a>&nbsp;
                  <?php
                }
                echo "</center>";
              ?>

            </div>
          </div>
      </main>
      
      <?php include('includes/footer.php'); ?>

   

 

  