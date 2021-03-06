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
            <form method="post" enctype="multipart/form-data">
                   
				Post Title
				<input type="text" name="post_title" class="form-control form-control-lg" placeholder="Post Title">

                Post Category
				
				
				<?php
					$sql = "SELECT * FROM `category`";
					$result = mysqli_query($conn, $sql);
					while($row=mysqli_fetch_assoc($result)){
						$category_id = $row['category_id'];
						$category_name = $row['category_name'];
						?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="post_category[]" class="form-check-input"  value="<?php echo $category_id; ?>" id="defaultCheck1"> <?php echo $category_name; ?>
							</label>
						</div>
						<?php
					}
				?>
				
                
				Post Content
				<textarea name="post_content" class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"></textarea><br>
					
				Post Image
				<input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>
					
				Post Keywords
				<input type="text" name="post_keywords" class="form-control" placeholder="Enter Keywords"><br>
					 
				<button name="submit" type="submit" class="btn btn-primary">Submit</button>
			</form>
			
				<!-- Image storage -->
				<?php
					if(isset($_POST['submit'])){
						$post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
						$post_category = implode(",",$_POST['post_category']);
						$post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
						$post_keywords = mysqli_real_escape_string($conn, $_POST['post_keywords']);
						$post_author = $_SESSION['author_id'];
						$post_date = date("Y-m-d");
						
						//checking if above fields are empty
						if(empty($post_title) OR empty($post_category) OR empty($post_content)){
							//header("Location: newpost.php?message=Empty+Fields");
							echo '<script>window.location = "newpost.php?message=Empty+Fields+Da+La+Form";</script>';

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
									$sql = "INSERT INTO post 
									(`post_title`,
									`post_content`,
									`post_category`, 
									`post_author`, 
									`post_date`, 
									`post_keywords`, 
									`post_image`) 
									VALUES ('$post_title', 
									'$post_content', 
									'$post_category', 
									'$post_author', 
									'$post_date', 
									'$post_keywords', 
									'$dbdestination');";
									//exit();
									if(mysqli_query($conn, $sql)){
										//header("Location: posts.php?message=Post+Published");
										echo "<meta http-equiv='refresh' content='0;url=http://localhost:8888/admin/posts.php?message=Post+Published'>";

									}else{
										//header("Location: newpost.php?message=Error");
										echo '<script>window.location = "newpost.php?message=Une-Error-Dans+La+Form";</script>';
										exit();
									}
								} else {
									header("Location: newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
									exit();
								}
							}else{
								header("Location: newpost.php?message=Oops Error Uploading your file");
								exit();
							}
						}else{
							header("Location: newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
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
