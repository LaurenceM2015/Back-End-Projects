<?php
session_start();
ini_set("display_errors", 1);
define("TITLE", "Admin | New post Page");
include_once "../includes/functions.php";
include "../includes/connection.php";

if(isset($_SESSION['author_role'])){
	?>
	<!-- header Start here  -->
	<?php include "../includes/header.php"; ?>

	 <nav class="navbar navbar-dark sticky-top bg-dark   shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/index.php">Karate Shotokan Mardie</a>
      
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
            <h1 class="h2">Add New Category</h1>
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
            <form method="post" enctype="multipart/form-data">
                   
                <div class="form-group">
                    <label for="categoryname">Category Name</label>
                    <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                </div>

                <div class="form-group">
                    <label for="categorydesc">Category Description</label>
                    <textarea name="category_desc" class="form-control form-control-lg" id="categorydesc" rows="3"></textarea><br>
                </div>

					
				<div class="form-group">
                    <label for="categoryfeatureimg">Category Feature Image</label>
				    <input type="file" name="file" class="form-control-file" id="categoryfeatureimg"><br>
                </div>
					 
				<button name="submit" type="submit" class="btn btn-primary">Submit</button>
			</form>
			
				<!-- Image storage -->
				<?php
					if(isset($_POST['submit'])){
						$category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
						$category_desc = mysqli_real_escape_string($conn, $_POST['category_desc']);
						
						
						//checking if above fields are empty
						if(empty($category_name) OR empty($category_desc)){
                            //header("Location: addcategory.php?message=Empty+Fields");
                            echo '<script>window.location = "addcategory.php?message=Name+Description+Cannot+Be+Empty+Fields";</script>';
							exit();
						}
						
						$file = $_FILES['file'];
				
						$fileName = $file['name'];
						$fileType = $file['type'];
						$fileTmp = $file['tmp_name'];
						$fileErr = $file['error'];
						$fileSize = $file['size'];
						
						$fileEXT = explode('.',$fileName);
						$fileExtension = strtolower(end($fileEXT));
						
						$allowedExt = array("jpg", "jpeg", "png", "gif");
						
						if(in_array($fileExtension, $allowedExt)){
							if($fileErr === 0){
								if($fileSize < 3000000){
									$newFileName = uniqid('',true).'.'.$fileExtension;
									$destination = "../uploads/$newFileName";
									$dbdestination = "uploads/$newFileName";
									move_uploaded_file($fileTmp, $destination);
									$sql = "INSERT INTO category 
									 (`category_name`,
									 `category_desc`,
									 `category_feature_img`) 

                                    VALUES ('$category_name', '$category_desc', '$dbdestination');";
                                   // exit();
									if(mysqli_query($conn, $sql)){
										//header("Location: posts.php?message=Post+Published");
										echo "<meta http-equiv='refresh' content='0;url=http://localhost:8888/admin/category.php?message=Category+added'>";

									}else{
										//header("Location: addcategory.php?message=Error");
										echo '<script>window.location = "addcategory.php?message=Il-Ya-Une+Error+Fields";</script>';

									}
								} else {
									//header("Location: addcategory.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
									echo '<script>window.location = "addcategory.php?message=YOUR+FILE+IS+TO+BIG+TO+UPLOAD";</script>';
									exit();
								}
							}else{
								//header("Location: addcategory.php?message=Oops Error Uploading your file");
								echo '<script>window.location = "addcategory.php?message=OOPS+ERROR+IS+UPLOADING+YOUR+FILE";</script>';
								exit();
							}
						}else{
							//header("Location: addcategory.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
							echo '<script>window.location = "addcategory.php?message=YOUR+FILE+IS+BIG+TO+UPLOADING";</script>';
							exit();
						}
					} // Submit 
							
				?>
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	
		<!-- footer goes here -->
	
	
	</body>
</html>
	<?php
}else{
	header("Location: login.php?message=Please+Login");
}
?>
