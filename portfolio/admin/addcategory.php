<?php 
    ini_set("display_errors", 1);
    include "../includes/functions.php";
    include "../includes/connection.php";
    
    session_start();
        if($_SESSION['author_role']!="admin"){
            echo "You can't access this page";
            exit();
        } else if($_SESSION['author_role']=="admin"){

            /*if(!isset($_POST['submit'])){
                header("Location: category.php?message=Please+Add+a+Category");
                exit();
            }*/
        ?>
        <!-- Header goes here -->
        <?php include_once "../includes/header.php"; ?>
        <!-- Admin Navigation --> 
        <header>
            <nav class="navbar navbar-dark sticky-top bg-dark shadow">
                <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/index.php">Laurence Malonga</a>
                <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="logout.php">Sign out</a>
                </li>
                </ul>
            </nav>
        </header>
       <div class="container-fluid">
            <div class="row">
                <?php include_once "nav.inc.php"; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Add New Post</h1>
                        <h6>Howdy <?php echo $_SESSION['author_name']; ?> | Your role is <?php echo $_SESSION['author_role']; ?></h6>
                    </div>
		
                    <div id="admin-index-form">
                        <?php
                            if(isset($_GET['message'])){
                                $msg = $_GET['message'];
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                '.$msg.'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                            }
                        ?>
                    </div>

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Add new Project Features
                                </button>
                            </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form action="addcategory" method="post">
                                        <div class="form-group">
                                            <input type="text" name="feature_desc" class="form-control form-control-lg" placeholder="Feature Description">
                                        </div>
                                                
                                        <button name="submit" type="submit" class="btn btn-success">Add Project Feature</button>
                                    </form>
                                    <?php   
                                    // if the user is admin
                                        if(isset($_POST['submit'])){
                                            $feature_desc = $_POST['feature_desc'];
                                            echo $sql = "INSERT INTO features (`feature_desc`) VALUES ('$feature_desc');";
                                            
                                            if(mysqli_query($conn, $sql)){
                                                //header("Location: category.php?message=Added+New+Feature");
                                               echo '<script>window.location = "category.php?message=Added+New+Feature";</script>';
                                                exit();
                                            } else {
                                               // header("Location: category.php?message=Error");
                                               echo '<script>window.location = "category.php?message=Error";</script>';
                                                exit();
                                            }
                                        } // ../submit
                                    ?>

                                </div><!-- ./card-body -->
                            </div><!-- ./callapse one -->
                        </div><!-- card one: Features -->

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Add New Project technologies
                                </button>
                            </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form action="addcategory.php" method="post">
                                        <div class="form-group">
                                            <input type="text" name="technology_name" class="form-control form-control-lg" placeholder="Technology Name">
                                        </div>
                                                
                                        <button name="addTech" type="submit" class="btn btn-success">Add Project Technology</button>
                                    </form>
                                    <?php   
                                    // if the user is admin
                                        if(isset($_POST['addTech'])){
                                            $technology_name = $_POST['technology_name'];
                                            echo $sql = "INSERT INTO technologies (`technology_name`) VALUES ('$technology_name');";
                                            
                                            if(mysqli_query($conn, $sql)){
                                                //header("Location: category.php?message=Added+New+Feature");
                                               echo '<script>window.location = "category.php?message=Added+New+Technology";</script>';
                                                exit();
                                            } else {
                                               // header("Location: category.php?message=Error");
                                               echo '<script>window.location = "category.php?message=Error";</script>';
                                                exit();
                                            }
                                        } // ../submit
                                    ?>
                                    
                                </div><!-- ./card-body -->
                            </div><!-- collapse two -->
                        </div> <!-- ./card two: Technology -->

                        <div class="card">
                            <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Add New Project Categories
                                </button>
                            </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form action="addcategory.php" method="post">
                                        <div class="form-group">
                                            <input type="text" name="category_name" class="form-control form-control-lg" placeholder="Category Name">
                                        </div>
                                        
                                        <button name="addCat" type="submit" class="btn btn-success">Add Category</button>
                                    </form>
                                    
                                    <?php   
                                    // if the user is admin
                                        if(isset($_POST['addCat'])){
                                            $category_name = $_POST['category_name'];
                                            echo $sql = "INSERT INTO categories (`category_name`) VALUES ('$category_name');";
                                            
                                            if(mysqli_query($conn, $sql)){
                                                //header("Location: category.php?message=Added+New+Category");
                                                echo '<script>window.location = "category.php?message=Added+New+Category";</script>';
                                                exit();
                                            } else {
                                               // header("Location: category.php?message=Error");
                                               echo '<script>window.location = "category.php?message=Error";</script>';
                                                exit();
                                            }
                                        } // ../submit
                                    ?>
                                </div>
                            </div>
                        </div><!-- card three: Categories -->
                    </div><!-- ./accordion -->
                </main> <!-- main -->
            </div> <!-- row -->
        </div><!-- container fluid -->


           
<?php
    }else{
        header("Location: login.php?message=Please+Login");
    }
?>
        
    

