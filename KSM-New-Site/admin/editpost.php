<?php
session_start();
ini_set("display_errors", 1);

define("TITLE", "Admin | Edit Post");
include_once "../includes/functions.php";
include "../includes/connection.php";

if(isset($_SESSION['author_role'])){
	if($_SESSION['author_role']=="admin"){
		if(isset($_GET['id'])){
	?>
	<!-- Header Goes Here -->
	<?php include "../includes/header.php" ?>

	<body>
	
	 <nav class="navbar navbar-dark sticky-top bg-dark   shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/index.php">
		  Karate Shotokan Mardie
	  </a>
      
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
            <h1 class="h2">Edit Post</h1>
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
			<?php
				$post_id = $_GET['id'];
				$FormSql = "SELECT * FROM post WHERE post_id='$post_id'";
				$FormResult = mysqli_query($conn, $FormSql);
				while($FormRow=mysqli_fetch_assoc($FormResult)){
					
					$postTitle = $FormRow['post_title'];
					$post_category = explode(",",$FormRow['post_category']);
					$postContent = $FormRow['post_content'];
					$postImage = $FormRow['post_image'];
					$postKeywords = $FormRow['post_keywords'];
				
			?>
				<form method="post" enctype="multipart/form-data">
					Post Title
					 <input type="text" name="post_title" class="form-control" placeholder="Post Title" value="<?php echo $postTitle; ?>"><br>
					 
					 Post Category
                
					<?php
						$sql = "SELECT * FROM `category`";
						$result = mysqli_query($conn, $sql);
						while($row=mysqli_fetch_assoc($result)){
							$category_id = $row['category_id'];
							$category_name = $row['category_name'];
							?>
							<input class="form-check-input" <?php if(in_array($category_id,$post_category)) { ?>checked="checked"<?php } ?> name="post_category[]" type="checkbox" value="<?php echo $category_id; ?>" id="defaultCheck1"> <?php echo $category_name; ?><br>
							
							<?php
						}
					?>
					
					Post Content
					<div class="form-group">
						<textarea name="post_content" class="form-control" id="exampleFormControlTextarea1" clols="30" rows="10"><?php echo $postContent ?></textarea><br>
						Post image
						<img src="../<?php echo $postImage; ?>" width="150px" height="150px"><br>
						
						<input name="image" type="file" id="upload" class="hidden" onchange="">
			
					</div>
					<input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>
					
					Post Keywords
					 <input type="text" name="post_keywords" class="form-control" placeholder="Enter Keywords"value="<?php echo $postKeywords; ?>"><br>
					 
					 
					 <button name="submit" type="submit" class="btn btn-primary">Update</button>
				</form>
				<?php } ?>
				<?php
					if(isset($_POST['submit'])){
						$post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
						$post_category = implode(",",$_POST['post_category']);
						$post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
						$post_keywords = mysqli_real_escape_string($conn, $_POST['post_keywords']);
						
						//checking if above fields are empty
						if(empty($post_title) OR empty($post_content)){
							echo '<script>window.location = "posts.php?message=Empty+Fields";</script>';
							exit();
						}
						
						if(is_uploaded_file($_FILES['file']['tmp_name'])){
							//user wants to update the file too
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
										$sql = "UPDATE post SET post_title='$post_title', post_category='$post_category', post_keywords='$post_keywords', post_content='$post_content', post_image='$dbdestination' WHERE post_id='$post_id'";
										if(mysqli_query($conn, $sql)){
											echo '<script>window.location = "posts.php?message=Post+Updated";</script>';
										}else{
											echo '<script>window.location = "posts.php?message=Error";</script>';
											exit();
										}
									} else {
										echo '<script>window.location = "newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
										exit();
									}
								}else{
									echo '<script>window.location = "newpost.php?message=Oops Error Uploading your file";</script>';
									exit();
								}
							}else{
								echo '<script>window.location = "newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
								exit();
							}
						}else{
							//user dont want to update the file
							$sql = "UPDATE post SET post_title='$post_title', post_category='$post_category', post_keywords='$post_keywords', post_content='$post_content' WHERE post_id='$post_id'";
							if(mysqli_query($conn, $sql)){
								echo '<script>window.location = "posts.php?message=Post+Updated";</script>';
							}else{
								echo '<script>window.location = "posts.php?message=Error";</script>';
							}
						}
						
						
					}
							
				?>
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=quy69270j2zull9yao8jgu4yula8yyu7r8yav8jb3v0un3au"></script>

	<script>tinymce.init({ selector:'textarea' });</script>
	<!-- Footer start here -->
	<?php include "../includes/footer.php"; ?>
	</body>
</html>
	<?php
		}}
}else{
	//header("Location: login.php?message=Please+Login");
	echo '<script>window.location = "login.php?message=Please+Login";</script>';

}
?>