<?php 
  // Global Header
  include_once "includes/header.php";
  include_once "includes/connection.php";
  include_once "includes/functions.php";
?>

  <!-- NAVIGATION BAR START HERE -->
  <?php include_once "includes/nav.php"; ?>
  <!-- NAVIGATION BAR END HERE -->

  <header class="header-blog parallax-window" data-z-index="0" data-parallax="scroll" data-image-src="assets/css/img/hero-blog-big-min.jpg">

    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white heading-primary">
            <span class="heading-primary--main">Toute Les Stage De KSM</span>
          </h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5"></p>
          
        </div>
      </div>
    <div>
  </header>

  
 
<main class="section-features page-section pb-0 container blog-page">
  <section class="row">
    <content class="main-container page-content col-md-9" id="page-content">
     
        <div class="card-columns">
          <?php 
            $sql = "SELECT * FROM `post` ORDER BY post_id DESC";
            $result = mysqli_query($conn, $sql);

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
            
          
          
          ?>
        
          <div class="card">
            <div class="card-img-top">
              <img src="<?php echo $post_image ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $post_title ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php getCategoryName($post_category); ?></h6>
              <p class="card-text"><?php echo substr(strip_tags($post_content),0,90)."..."; ?></p>
              <a href="post.php?id=<?php echo $post_id; ?>" class="btn-text">Read More &rarr;</a>
              
            </div>
          </div><!-- ./card -->
          <?php } } ?>
        </div><!-- ./card column -->
     

    </content>

    <!-- SIDEBAR
              ================================================== -->
      <aside class="col-md-3">
        
        <div class="feature-box card widget mb-4 py-3">
          <h4 class="card-title feature-box__text py-1">Search Our blog page</h4>
          <form action="search.php" class="input-group">
            <input name="s" type="search" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary p-2" type="button">Go!</button>
            </span>
          </form>
        </div><!-- widget -->
        
        <div class="feature-box card widget mb-4 text-left">
          <h4 class="card-title feature-box__text py-2">About KSM</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div><!-- widget -->
        
        <div class="feature-box card widget mb-4 text-left">
          <h4 class="card-title feature-box__text py-2">Recent Posts</h4>
          <ul class="list-unstyled text-left">
            <li><a href="">Un stage était organisé pour aider le jeune garçon</a></li>
            <li><a href="">L’association sportive a plus de vingt ans</a></li>
            <li><a href="">Un stage mémorable pour les 20 ans du KSM</a></li>
          </ul>
        </div><!-- widget -->
        <div class="feature-box card widget mb-4 text-left">
          <h4 class="card-title feature-box__text py-2">Archives</h4>
          <ul class="list-unstyled">
              <li><a href="">Mars 2020</a></li>
              <li><a href="">Janvier 2019</a></li>
              <li><a href="">Mai 2018</a></li>
              <li><a href="">Decembre 2017</a></li>
            
          </ul>
        </div><!-- widget -->
        
        <div class="feature-box card widget mb-4 text-left">
          <h4 class="card-title feature-box__text py-2">Categories</h4>
          <ul class="list-unstyled">
          
            <?php 
              
              $sql    = "SELECT * FROM category";
              $result = mysqli_query($conn, $sql);
              while($row=mysqli_fetch_array($result)){
              $category_id = $row['category_id'];
              $category_name = $row['category_name'];

            ?>
              <li>
              <a href="category.php?id=<?php echo $category_id; ?>"><?php echo $category_name; ?></a>
              </li>
              <?php 
            }
              ?>
          

          </ul>
        </div><!-- widget -->
        <div class="feature-box card widget mb-4 text-left">
          <h4 class="card-title feature-box__text py-2">Meta</h4>
          <ul class="list-unstyled">
              <li><a href="">Site Admin</a></li>
              <li><a href="">Log Out</a></li>
              <li><a href=""></a></li>
              <li><a href="">Comments RSS</a></li>
              <li><a href="">WordPress.org</a></li>
          </ul>
        </div><!-- widget -->
                
      </aside>
  </section>
</main>

  


  <?php include "includes/footer.php" ?>
