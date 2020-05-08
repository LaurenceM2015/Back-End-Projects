<?php ini_set("display_errors", 1);
include_once "../includes/header.php";
include_once "../includes/functions.php";
include "../includes/connection.php";
session_start();
if(isset($_SESSION['author_role'])){
	?>	 
	 <?php //include "../includes/header.php"; ?>

	<nav class="navbar navbar-dark sticky-top bg-dark   shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/index.php">Laurence Malonga</a>
      
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
					<div class="form-group">
						<label for="postTitle">Post Title</label>
					 	<input for="postTitle" type="text" name="post_title" class="form-control" placeholder="Post Title"><br>
					</div>

					<div class="form-group">
						<label for="clientName">Project Client Name</label>
					 	<input id="clientName" type="text" name="post_client_name" class="form-control" placeholder="Please Enter The Client Name">
					</div>

					<div class="form-group">
						<label for="websiteLink">Project Website Link</label>
						
					 	<input id="websiteLink" type="text" name="post_website_link" class="form-control" placeholder="Please Enter The Website Link">
					</div>

					<div class="form-group">
						<label for="postyear">Project Year Created</label>
					 	<input id="postyear" type="text" name="post_year_made" class="form-control" placeholder="Enter the Date the project was created">
					</div>

					<div class="form-group">
						<label for="exampleFormControlTextarea1">Post Content</label>
						<textarea name="post_content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>

					<div class="form-group">
						Post Image
						<input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>
					</div>
					
					<div class="row">
						<div class="form-group col-md-3">
							<label for="postcategory">Post Categories</label>
							<div class="form-check">
								<label class="form-check-label" for="postcategory">
									<?php
										$sql = "SELECT * FROM `categories`";
										$result = mysqli_query($conn, $sql);
										while($row=mysqli_fetch_assoc($result)){
											$category_id = $row['category_id'];
											$category_name = $row['category_name'];
											?>
											
											<input type="checkbox" class="form-check-input" name="post_category[]" value="<?php echo $category_id; ?>"><?php echo $category_name; ?><br>
									<?php }?>
								</label>
							</div>
						</div><!--  post categories -->

						<div class="form-group col-md-6">
							<label for="exampleFormControlInput1">Post Features</label>
							<div class="form-check">
								<label class="form-check-label" for="check1">
									<?php
										$sql = "SELECT * FROM `features`";
										$result = mysqli_query($conn, $sql);
										while($row=mysqli_fetch_assoc($result)){
											$feature_id = $row['feature_id'];
											$feature_desc = $row['feature_desc'];
											?>
											
											<input type="checkbox" class="form-check-input" name="post_feature[]" value="<?php echo $feature_id; ?>"><?php echo $feature_desc; ?><br>
									<?php } ?>
								</label>
                    		</div>
						</div><!-- Post Feature -->

						<div class="form-group col-md-3">
							<label for="exampleFormControlInput1">Post Features</label>
							<div class="form-check">
								<label class="form-check-label" for="check1">
									<?php
										$sql = "SELECT * FROM `technologies`";
										$result = mysqli_query($conn, $sql);
										while($row=mysqli_fetch_assoc($result)){
											$technology_id = $row['technology_id'];
											$technology_name = $row['technology_name'];
											?>
											<input type="checkbox" class="form-check-input" name="post_technologies[]" value="<?php echo $technology_id; ?>"><?php echo $technology_name; ?><br>
									<?php } ?>
								</label>
							</div>
						</div><!-- Post Technologies -->

					</div><!-- ./row post categories -->
					 
					 
					 <button name="submit" type="submit" class="btn btn-primary">Submit</button>
				</form>
				<?php
					if(isset($_POST['submit'])){
						//print_r($_POST['post_category']);
						echo $post_title 		= mysqli_real_escape_string($conn, $_POST['post_title']);
						$post_category 		= implode(",",$_POST['post_category']);
						$post_feature 		= implode(",",$_POST['post_feature']);
						$post_technologies 	= implode(",",$_POST['post_technologies']);
						$post_content 		= mysqli_real_escape_string($conn, $_POST['post_content']);
						$post_client_name 	= mysqli_real_escape_string($conn, $_POST['post_client_name']);
						$post_website_link	= mysqli_real_escape_string($conn, $_POST['post_website_link']);
						$post_year_made	= mysqli_real_escape_string($conn, $_POST['post_year_made']);
						$post_author 		= $_SESSION['author_id'];
						//$post_date 			= date("d/m/y");
						
						//checking if above fields are empty
						if(empty($post_title) OR empty($post_category) OR empty($post_feature) OR empty($post_technologies)){
						//header("Location: newpost.php?message=Empty+Fields");
						echo '<script>window.location = "newpost.php?message=Empty+Fields";</script>';

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

									$sql = "INSERT INTO post (
										`post_title`,
										`post_content`,
										`post_category`, 
										`post_feature`,
										`post_technologies`, 
										`post_author`,
										`post_client_name`,
										`post_website_link`,
										`post_year_made`,  
										`post_image`) 
										VALUES (
											'$post_title',
											'$post_content', 
											'$post_category',
											'$post_feature',
											'$post_technologies', 
											'$post_author', 
											'$post_client_name',
											'$post_website_link',
											'$post_year_made', 
											'$dbdestination');";
									if(mysqli_query($conn, $sql)){
										//header("Location: posts.php?message=Post+Published");
										echo '<script>window.location = "posts.php?message=Post+Published";</script>';
										//exit();
									}else{
										//header("Location: newpost.php?message=Error");
										 echo '<script>window.location = "newpost.php?message=Error";</script>';
										//echo $sql;
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
							//header("Location: newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
							echo "<meta http-equiv='refresh' content='0;url=http://localhost:8888/admin/newpost.php?message=Post+Published'>";
							exit();
						}
					}
							
				?>
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	<?php include "../includes/footer.php"; ?>
<?php 
} else{
	header("Location: login.php?message=Please+Login");
}
?>
