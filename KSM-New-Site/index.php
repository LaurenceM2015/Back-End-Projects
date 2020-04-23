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

  <header class="header-blog parallax-window" data-z-index="0" data-parallax="scroll" data-image-src="assets/css/img/hero-blog-big-min.jpg">

    
      <div class="row text-center">
        <div class="col-lg-10">
          <h1 class="text-uppercase text-white heading-primary">
            <span class="heading-primary--main"><?php getSettingValue("home_jumbo_title"); ?></span>
          </h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8">
          <p class="text-white-75 font-weight-light mb-5"><?php getSettingValue("home_jumbo_desc"); ?></p>
          
        </div>
      </div>
    
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
        echo $totalposts;
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
        
          <div class="card feature-box">
            <div class="card-img-top">
              <img src="<?php echo $post_image ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $post_title ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php getCategoryName($post_category); ?></h6>
              <p class="card-text"><?php echo substr(strip_tags($post_content),0,90)."..."; ?></p>
              <a href="post.php?id=<?php echo $post_id; ?>" class="btn-text">Read More &rarr;</a>
              
            </div> <!-- ./card-body -->
          </div><!-- ./card -->
          <?php } } ?>
        </div><!-- ./card column -->
     
    </content>

    <!-- SIDEBAR
              ================================================== -->
      <aside class="col-md-3">
        <?php include "includes/sidebar.php"; ?>
      </aside>
      <?php 
				echo "<center>";
				for($i=1;$i<=$totalpages;$i++){
					?>
					<a href="?p=<?php echo $i; ?>"><button class="btn btn-info"><?php echo $i; ?></button></a>&nbsp;
					<?php
				}
				echo "</center>";
			?>
  </section>
  <!-- Pagination -->
 
</main>

  


  <?php include "includes/footer.php" ?>
