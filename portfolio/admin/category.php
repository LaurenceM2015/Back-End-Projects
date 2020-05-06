<?php 
// Create new category.
 include_once "../includes/header.php";
 include_once "../includes/connection.php";
 session_start();
 if(isset($_SESSION['author_role'])){
     // Only if the user is admin
     if($_SESSION['author_role']=="admin"){

 ?>
    <header>
        <nav class="navbar navbar-dark sticky-top bg-dark shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
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
                <h1 class="h2">Categories</h1>
                    <h6>Howdy <?php echo $_SESSION['author_name']; ?> | Your role is <?php echo $_SESSION['author_role']; ?></h6>
            </div>

            <div id="admin-index-form" class=" admin-index-form">
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
                <h1>All Categories:</h1>
                <a href="addcategory.php"><button class="btn btn-info">Add New</button></a>
                <hr>
            </div> <!-- ./ admin-index-form -->
                
           
        
            <!-- Accordiants start here -->
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Project Category
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Category Id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM `categories` ORDER BY category_id DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $category_id = $row['category_id'];
                                            $category_name = $row['category_name'];
                                            $category_desc = $row['category_desc']; 
                                        ?>
                                
                                        <tr>
                                            <th scope="row"><?php echo $category_id; ?></th>
                                            <td scope="row"><?php echo $category_name; ?></td>
                                            <td scope="row"><?php echo $category_desc; ?></td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div><!-- ./card-body -->
                    </div>
                </div><!-- ./card one: category -->

                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Project Features
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Feature Id</th>
                                        <th scope="col">Feature Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM `features` ORDER BY feature_id DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $feature_id = $row['feature_id'];
                                            $feature_name = $row['feature_desc'];
                                            
                                        ?>
                                
                                        <tr>
                                            <th scope="row"><?php echo $feature_id; ?></th>
                                            <td scope="row"><?php echo $feature_name; ?></td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>            
                                            
                        </div> <!-- ./card-body -->
                    </div> <!-- ./callapse two -->
                </div><!-- ./card two: feature -->

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Technology Used
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Technology Id</th>
                                        <th scope="col">Technology Name</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM `technologies` ORDER BY technology_id DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $technology_id = $row['technology_id'];
                                            $technology_name = $row['technology_name'];
                                            
                                        ?>
                                
                                        <tr>
                                            <th scope="row"><?php echo $technology_id; ?></th>
                                            <td scope="row"><?php echo $technology_name; ?></td>
                                            
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- ./callapsed three -->
                </div><!-- ./card three: technology used -->
            </div><!-- ./accordiants -->
            
        </main> <!-- main -->
    </div> <!-- ./Row -->
</div><!-- ./Container dashboard -->

<?php } // autho session
}else{
	header("Location: login.php?message=Please+Login");
}

?>

<script>
	$(document).ready(function(){
        $("#addCatBtn").click(function(){
        $("#addCatForm").slideToggle();
        });
    });
</script>

