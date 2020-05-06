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
                                    Add new Project Category
                                </button>
                            </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div style="" id="addCatForm">
                                        <form action="addcategory.php" method="post">
                                            <div class="form-group">
                                                <input type="text" name="category_name" class="form-control form-control-lg" placeholder="Category Name">
                                            </div>
                                            
                                            <button name="submit" type="submit" class="btn btn-success">Add Category</button>
                                        </form>
                                    </div> <!-- add category form -->
                                    <?php   
                                    // if the user is admin
                                        if(isset($_POST['submit'])){
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
                                </div><!-- ./card-body -->
                            </div><!-- ./callapse one -->
                        </div><!-- card one: categories -->

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Collapsible Group Item #2
                                </button>
                            </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                            </div>
                        </div> <!-- ./card two: feature -->

                        <div class="card">
                            <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                                </button>
                            </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                            </div>
                        </div><!-- card three: technologies -->
                    </div><!-- ./accordion -->
                </main> <!-- main -->
            </div> <!-- row -->
        </div><!-- container fluid -->


           
<?php
    }else{
        header("Location: login.php?message=Please+Login");
    }
?>
        
    

