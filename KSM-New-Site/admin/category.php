<?php
ini_set("display_errors", 1);
define("TITLE", "Admin | All Category Page");
include_once "../includes/functions.php";
include_once "../includes/connection.php";
session_start();
if(isset($_SESSION['author_role'])){
	if($_SESSION['author_role']=="admin"){
	?>
        <?php include "../includes/header.php"; ?>
	<body>
	
	 <nav class="navbar navbar-dark sticky-top bg-dark   shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <?php include_once "nav.inc.php"; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Category</h1>
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
			
				<h1>ALL CATEGORIES:</h1>
				<!--<button id="addCatBtn" class="btn btn-info">Add New</button> -->
				<a href="addcategory.php"><button class="btn btn-info">Add New</button></a>
				<hr>
				<!--<div style="display:none;" id="addCatForm">
					<form action="addcategory.php" method="post">
						<input type="text" name="category_name" class="form-control" placeholder="Category Name"><br>
						<button name="submit" class="btn btn-success">Add Category</button>
					</form><br>
				</div> -->
				
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Category Id</th>
					  <th scope="col">Category Image</th>
					  <th scope="col">Category Name</th>
					  <th scope="col">Category Description</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php
					$sql = "SELECT * FROM `category` ORDER BY category_id DESC";
					$result = mysqli_query($conn, $sql);
					while($row=mysqli_fetch_assoc($result)){
						$category_id = $row['category_id']; 
						$category_name = $row['category_name']; 
						$category_desc = $row['category_desc']; 
						$category_feature_img = $row['category_feature_img']; 
					
			
		?>
			<tr>
					  <th scope="row"><?php echo $category_id;?></th>
					  <td><img class="img-thumbnail" src="../<?php echo $category_feature_img; ?>" width="50px" height="50px"></td>
					  <td><?php echo $category_name; ?></td>
					  <td><?php echo $category_desc; ?></td>
					  
					 
			</tr>
			
			<?php }?>
				  
				  </tbody>
				</table>
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	<!-- Footer start -->
    <?php include "../includes/footer.php"; ?>
	
	</body>
</html>
<?php
}
}
?>
