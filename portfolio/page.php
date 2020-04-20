<?php
include_once "includes/header.php";
include_once "includes/connection.php";
include_once "includes/functions.php";
if(!isset($_GET['id'])){
	header("Location: index.php?geterr");
}else{
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	if(!is_numeric($id)){
		header("Location: index.php?numerror");
		exit();
	}else if(is_numeric($id)){
		$sql = "SELECT * FROM page WHERE page_id='$id'";
		$result = mysqli_query($conn, $sql);
		//Check if posts exits
		if(mysqli_num_rows($result)<=0){
			//no posts
			header("Location: index.php?nopagefound");
		}else if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
                $page_title = $row['page_title'];
                $page_subtitle = $row['page_subtitle'];
				$page_content = $row['page_content'];
				$page_image = $row['page_image'];
				
				?>
				<!-- Page start here -->
				
                <?php include "includes/nav.php"; ?>
         
         <!-- Masthead -->
        <header class="masthead bg-primary text-white text-center d-flex  flex-column justify-content-center" id="header">
            <div class="container d-flex align-items-center flex-column">
        
              <h1 class="masthead-heading text-uppercase mb-5">
                  <span class="heading-primary--main"><?php echo $page_title; ?></span>
                  <span class="heading-primary--sub"><?php echo $page_subtitle ?></span>
              </h1>
              <!-- Header BTN -->
              <a href="#feature" class="Btn Btn--white Btn--animated js-scroll-trigger">Find out more &nbsp;<i class="fas fa-arrow-down"></i></a>
            </div>
        </header>
             
        <main id="homePage-main-container">
          <!-- Feature Section -->
          <section class="page-section feature-section mb-0" id="feature">
            <div class="container">
    
              <div class="row">
                <div class="col-lg-12 py-5">
                  <h2 class="heading-secondary page-section-heading text-uppercase"><?php echo $page_title; ?></h2>
                  <p class="pt-3 long-copy lead"><?php echo $page_subtitle; ?></p>
                </div>
              </div><!-- ./ row -->
              <!-- About Section Content -->
               
              <div class="row">
                  <div class="col-md-12">
                    <p><?php $page_content; ?></p>
                  </div>
           
                
              </div> <!-- ./row -->
    
    
              </div><!-- ./ container -->
          </section>
            
                    
          
          
           

        </main>
          
                
        <?php include "includes/footer.php"; ?>
                <!-- Page end here -->
				<?php
			}
		}
	}
}
?>