<?php 
    ini_set("display_errors", 1);
    define("TITLE", "Archives Page");
    include "includes/connection.php";
    include "includes/functions.php";
?>

<?php include "includes/header.php"; ?>

<body>
        <!-- ARCHIVE START HERE -->
    <header class="section-primary text-white fallback-image" id="feature-image" style="background-image: linear-gradient(to right bottom, rgba(0, 0, 0, 0.7) 0, rgba(0, 0, 0, 0.7) 100%), url('<?php getHeroValue('archive_img') ; ?>')">
        <div class="container header__container h-100 page-section">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="header__text animated text-center">
                        <h1 class="heading-primary">
                            <span class="heading-primary--main"><?php getSettingValue("archive_title"); ?></span>
                        </h1>
                        <div class="">
                            
                            <p class="long-copy my-5 wow fadeInRight"><?php getSettingValue("archive_desc"); ?></p>
                        
                        </div>
                    </div><!-- header-text -->
                </div> <!-- col-md-12 -->
            </div><!-- ./row -->
        </div><!-- ./container -->
    </header>

        <!-- Main Container start here -->
        <main class="main-container page-section" id="page-content">
            <div class="container">
                <div class="row">
                    

                    <div class="card-columns col-md-9">
                    <?php 
                    $sql = "SELECT * FROM post order by post_date DESC";
                    $result = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_assoc($result)){
                        $post_title = $row['post_title']; 
                        $post_image = $row['post_image']; 
                        $post_content = $row['post_content'];
                        $post_category = $row['post_category'];
                        $post_id = $row['post_id'];
                        $post_date = date("YY-m-d");
        
                    
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
                    <aside class="col-md-3">
                        <?php include "includes/sidebar.php"; ?>
                    </aside>
                </div> <!-- ./row -->
            </div><!-- ./container -->
        </main><!-- ./main content -->

<?php include "includes/footer.php"; ?>

