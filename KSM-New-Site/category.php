<?php 
    ini_set("display_errors", 1);
    define("TITLE", "Category Page");
    include "includes/header.php";
    include "includes/connection.php";
    include "includes/functions.php";
   

    if(!isset($_GET['id'])){
        header("Location: index.php?geterr");
    } else{
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        if(!is_numeric($id)){
            //header("Location: index.php?numerror");
            //exit();
            echo "Error";
        }else if(is_numeric($id)){
            $sql = "SELECT * FROM category WHERE category_id='$id'";
            $result = mysqli_query($conn, $sql);
            //Check if category exits
            if(mysqli_num_rows($result)<=0){
                //no category
                header("Location: index.php?noresult");
            }else{
        ?>
    <?php include "includes/header.php"; ?>

        <body class="category-page">
            <!-- NAVIGATION BAR START HERE -->
            <?php include_once "includes/nav.php"; ?>
            <!-- NAVIGATION BAR END HERE -->
                
            <header class="section-primary text-white fallback-image">
                <div class="container header__container h-100 page-section">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12">
                            <div class="header__text animated text-center">
                                <h1 class="heading-primary">
                                    <span class="heading-primary--main"><?php getCategoryName($id); ?></span>
                                </h1>
                                <div class="">
                                    <?php 
                                       
                                       $sql = "SELECT * FROM category WHERE category_id IN ($id)";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                        $category_id = $row['category_id']; 
                                        $category_desc = $row['category_desc'];
                                        
                                    ?>
                                    <p class="long-copy my-5"><?php echo $category_desc; ?> </p>
                                        <?php } ?>
                                    
                                    
                                </div>
                            </div><!-- header-text -->
                        </div> <!-- col-md-12 -->
                    </div><!-- ./row -->
                </div><!-- ./container -->
            </header>

            <main class="main-container page-section" id="page-content">
                    
                <div class="container">
                    
                   <div class="row">
                        <div class="card-columns col-md-9">
                                <?php 
                                $sql = "SELECT * FROM `post` WHERE post_category='$id' ORDER BY post_id DESC";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){
                                    $post_title = $row['post_title']; 
                                    $post_image = $row['post_image']; 
                                    $post_author = $row['post_author']; 
                                    $post_content = $row['post_content'];
                                    $post_id = $row['post_id'];
                                    $sqlauth = "SELECT * FROM author WHERE author_id='$post_author'";
                                    $resultauth = mysqli_query($conn, $sqlauth);
                                    while($authrow=mysqli_fetch_assoc($resultauth)){
                                    $post_author_name = $authrow['author_name'];
                                
                                
                                
                                ?>
                            
                                <div class="card">
                                <img src="/<?php echo $post_image ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post_title ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $post_author_name ?></h6>
                                    <p class="card-text"><?php echo substr(strip_tags($post_content),0,90)."..."; ?></p>
                                    <a href="/post.php?id=<?php echo $post_id; ?>" class="btn-text">Read More</a>
                                    
                                </div>
                                </div><!-- ./card -->
                                <?php } } ?>
                        </div><!-- ./card column -->
                        <aside class="col-md-3">
                        <?php include "includes/sidebar.php"; ?>
                        </aside>
                    </div> <!-- ./row -->
                </div><!-- ./container -->
             
            </main>
                <!-- footer goes here -->
            <?php include "includes/footer.php"; ?>
        </body>
    </html>
                


                <?php
            } 
            
        }
    }
?>