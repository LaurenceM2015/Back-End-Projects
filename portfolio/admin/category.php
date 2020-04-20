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
                    <button id="addCatBtn" class="btn btn-info">Add New</button>
                      <hr>
                     <div style="display:none;" id="addCatForm">
                        <form action="addcategory.php" method="post">
                            <div class="form-group">
                            <input type="text" name="category_name" class="form-control form-control-lg" placeholder="Category Name">
                            </div>
                            
                            <button name="submit" type="submit" class="btn btn-success">Add Category</button>

                        </form>
                     </div>
        
        
                <table class="table mt-4">
                    <thead>
                    <tr>
                        <th scope="col">Post Id</th>
                        <th scope="col">Post Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM `categories` ORDER BY category_id DESC";
                            $result = mysqli_query($conn, $sql);
                            while($row=mysqli_fetch_assoc($result)){
                                $category_id = $row['category_id']; 
                                $category_name = $row['category_name']; 
                            ?>
                    
                            <tr>
                                <th scope="row"><?php echo $category_id; ?></th>
                                <td scope="row"><?php echo $category_name; ?></td>
                                
                            </tr>

                        <?php  } ?>
                    </tbody>
                </table>
            </div> <!-- ./ admin-index-form -->
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

