<?php 
    ini_set("display_errors", 1);
    
    define("TITLE", "KSM | Post Page");
    
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
            $sql = "SELECT * FROM post WHERE post_id='$id'";
            $result = mysqli_query($conn, $sql);
            //Check if posts exits
            if(mysqli_num_rows($result)<=0){
                //no posts
                header("Location: index.php?noresult");
            }else if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_keywords = $row['post_keywords'];
                    $post_author = $row['post_author'];
                    $post_category = $row['post_category'];
            ?>
            <!-- index page past start here -->
            <?php include "includes/header.php"; ?>

            <body>
            
            <!-- NAVIGATION BAR START HERE -->
            <?php 
                include_once "includes/nav.php";
               
            ?>
            <header class="post-header">
                <div class="section-primary page-section">
                    <div class="container">
                    <h1 class=""> <?php echo $post_title; ?></h1>
                    
                    </div>
                </div>
            </header>
           

            <main class="main-container page-section page-content" id="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-img-top">
                                    <img class="w-100" src="<?php echo $post_image; ?>">
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3></h3>
                                    </div>
                                    <div class="card-subtitle">
                                        <h6>Posted On: <?php echo $post_date; ?> | By: <?php getAuthorName($post_author); ?></h6>
                                        <h4>Category: <a href="category.php?id=<?php echo $post_category; ?>"><?php getCategoryName($post_category); ?></a></h4>
                                    </div>

                                    <p class="card-text">
                                        <?php echo $post_content; ?>
                                    </p>
                                </div>
                            </div><!-- ./card -->
                        </div><!-- col-md-8 -->

                        <div class="col-md-4">
                            <?php include "includes/sidebar.php"; ?>
                        </div>
                    </div> <!-- ./row -->
                    
                </div><!-- ./container -->

            </main>


 <!-- <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Copyright &copy; Your Website</small>
    </div>
  </footer> -->
  <?php include "includes/footer.php"; ?>
</body>
</html>


                    <?php 
                }
            }
        }
    }
?>

