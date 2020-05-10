<?php 
  // Global Header
  ini_set("display_errors", 1);
  define("TITLE", "KSM | Blog Page");
  include_once "includes/header.php";
  include_once "includes/connection.php";
  include_once "includes/functions.php";
?>

  <!-- NAVIGATION BAR START HERE -->
  <?php include_once "includes/nav.php"; ?>
  <!-- NAVIGATION BAR END HERE -->
<body class="blog-page">
  <header class="header-blog parallax-window" data-z-index="0" data-parallax="scroll" data-image-src="assets/css/img/hero-blog-big-min.jpg">
  <div class="container header__container h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-12">
          
          <div class="header__text animated text-center">
              <h1 class="heading-primary text-lg-left">
                <span class="heading-primary--main text-center"><?php getSettingValue("slogan_title"); ?></span>
              </h1>
              <div class="">
                <p class="lead my-5"><?php getSettingValue("slogan_desc"); ?></p>
               
              </div>
              
          </div>
        </div>
      </div><!-- ./row -->
    </div><!-- ./container -->
    
  </header>


  

  
 
<main class="section-features page-section pb-0 container blog-page">

  <section class="row">
    <content class="main-container page-content col-md-9" id="page-content">
      <?php
          //pagination
          $sqlpg = "SELECT * FROM `post`";
          $resultpg = mysqli_query($conn, $sqlpg);
          $totalposts = mysqli_num_rows($resultpg);
          $totalpages = ceil($totalposts/9);
        ?>
        <?php 
          //pagination get
          if(isset($_GET['p'])){
            $pageid = $_GET['p'];
            $start = ($pageid*9)-9;
          $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT $start,9";
          }else{
            $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT 0,9";
          }
        ?>
     
        <div class="card-columns">
            <?php 
              //$sql = "SELECT * FROM `post` ORDER BY post_id DESC";
              $result = mysqli_query($conn, $sql);

              while($row=mysqli_fetch_assoc($result)){
                $post_title = $row['post_title']; 
                $post_image = $row['post_image']; 
                $post_author = $row['post_author']; 
                $post_content = $row['post_content'];
                $post_category = $row['post_category'];
                $post_id = $row['post_id'];

            
            ?>
          
            <div class="card feature-box">
              <div class="card-img-top">
                <img src="<?php echo $post_image ?>" class="card-img-top" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $post_title ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php getCategoryName($post_category); ?></h6>
                
                <a href="post.php?id=<?php echo $post_id; ?>" class="btn-text">Read More &rarr;</a>
                
              </div> <!-- ./card-body -->
            </div><!-- ./card -->
            <?php } ?>
        </div><!-- ./card column -->
     
    </content>

    <!-- SIDEBAR
              ================================================== -->
    <aside class="col-md-3">
      <?php include "includes/sidebar.php"; ?>
    </aside>
      <div class="col-md-12">
        <?php 
          echo "<center>";
          for($i=1;$i<=$totalpages;$i++){
            ?>
            <a href="?p=<?php echo $i; ?>"><button class="btn btn-primary"><?php echo $i; ?></button></a>&nbsp;
            <?php
          }
          echo "</center>";
        ?>

      </div>
  </section>
  <!-- Pagination -->
 
</main>

  


  <?php include "includes/footer.php" ?>
