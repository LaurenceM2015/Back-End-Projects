<?php
define("TITLE", "Admin | Setting Page");
include_once "../includes/functions.php";
include_once "../includes/connection.php";
session_start();
if(isset($_SESSION['author_role'])){
	if($_SESSION['author_role']=="admin"){
	?>
        <!-- Header Start here -->
        <?php include_once "../includes/header.php"; ?>
	
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
            <h1 class="h2">Settings</h1>
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
			
				<h1>ALL Settings:</h1>
				
				<hr>
				
				<form method="post" enctype="multipart/form-data">
                   
					<div class="form-group">
    					<label for="hometitle">Home Title</label>
						<input type="text" name="home_title" id="HomeTitle" class="form-control form-control-lg" placeholder="Home Page Title">
					</div>

					<div class="form-group">
    					<label for="heroimage">Home Hero Image</label>
						<input type="file" name="featureImg" class="form-control-file" id="heroimage"><br>
  					</div>

					<div class="form-group">
    					<label for="homepagecontent">Home Page Content</label>
						<textarea name="home_content" class="form-control form-control-lg" id="homepagecontent" placeholder="Home Page Content" rows="3"></textarea><br>
  					</div>

					<div class="form-group">
    					<label for="homelogo">Home Logo Image</label>
						<input type="file" name="file" class="form-control-file" id="homelogo">
  					</div>
				  
				   <button name="submit" type="submit" class="btn btn-primary">Submit</button>
			   </form>
			   
				   <!-- Image storage -->
				   <?php
					   if(isset($_POST['submit'])){
						   $home_title = mysqli_real_escape_string($conn, $_POST['home_title']);
						   $home_content = mysqli_real_escape_string($conn, $_POST['home_content']);
						  
						   //checking if above fields are empty
						   if(empty($home_title) OR empty($home_content)){
							   header("Location: homeSettings.php?message=Empty+Fields");
							   exit();
						   }

						   // First Thumb image 

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
									   //$sql = "INSERT INTO home (`home_title`,`home_desc`, `post_date`, `home_image` `home_feature_img`) VALUES ('$home_title', '$home_desc', '$home_img', '$dbdestination');";
									   
								   } else {
									   header("Location: homeSettings.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
									   exit();
								   }
							   }else{
								   header("Location: homeSettings.php?message=Oops Error Uploading your file");
								   exit();
							   }
						   }else{
							   header("Location: homeSettings.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
							   exit();
						   }

						   // Feature Hero image
						   
						   $featureImg = $_FILES['featureImg'];
				   
						   $fileName = $featureImg['name'];
						   $fileType = $featureImg['type'];
						   $fileTmp = $featureImg['tmp_name'];
						   $fileErr = $featureImg['error'];
						   $fileSize = $featureImg['size'];
						   
						   
						   $fileEXT = explode('.',$fileName);
						   $fileExtension = strtolower(end($fileEXT));
						   $allowedExt = array("jpg", "jpeg", "png", "gif");
						   
						   if(in_array($fileExtension, $allowedExt)){
							
							   if($fileErr === 0){
								   if($fileSize < 3000000){
									   $newFileName = uniqid('',true).'.'.$fileExtension;
									   $featureImg = "../uploads/$newFileName";
									   $dbfeatureImg = "uploads/$newFileName";
									   move_uploaded_file($fileTmp, $featureImg);
									   
								   } else {
									   header("Location: homeSettings.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
									   exit();
								   }
							   }else{
								   header("Location: homeSettings.php?message=Oops Error Uploading your file");
								   exit();
							   }
						   }else{
							   header("Location: homeSettings.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
							   exit();
						   }

						 $sql = "INSERT INTO home (`home_title`,`home_content`, `home_logo` ,`home_feature_img`) VALUES ('$home_title', '$home_desc',  '$dbdestination', '$dbfeatureImg')";

						if(mysqli_query($conn, $sql)){
							//header("Location: posts.php?message=Post+Published");
							echo "<meta http-equiv='refresh' content='0;url=http://localhost:8888/admin/home.php?message=Home+Setting+Published'>";

						}else{
							header("Location: homeSettings.php?message=Error");
						}

					   }
							   
				   ?>
				
				
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	<!-- footer start here -->
   
	
	</body>
</html>
	<?php
}
}else{
	header("Location: login.php?message=Please+Login");
}
?>
