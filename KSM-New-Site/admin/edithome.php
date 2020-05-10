<?php 
ini_set("display_errors",1);
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

				<?php
				$home_id = $_GET['id'];
				$FormSql = "SELECT * FROM home WHERE home_id='$home_id'";
				$FormResult = mysqli_query($conn, $FormSql);
				while($FormRow=mysqli_fetch_assoc($FormResult)){
					
					$homeTitle = $FormRow['home_title'];
					$homeFeatureImg = $FormRow['home_feature_img'];
					$homeContent = $FormRow['home_content'];
					$homeLogo = $FormRow['home_logo'];
				
				?>
				
				<form method="post" enctype="multipart/form-data">
                   
				   home Tile
				   <input type="text" name="home_title" class="form-control form-control-lg" placeholder="Home Title" value="<?php echo $homeTitle; ?>" >
				   
				   <div class="form-group">
					Post hero img<br>
						<img src="../<?php echo $homeFeatureImg; ?>" width="250px" height="250px"><br>
						<input type="file" name="featureImg" class="form-control-file" value="<?php echo $homeFeatureImg; ?>" >
				   </div>
				   <br>
				   
				   home Content
				   <textarea name="home_content" class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"><?php echo $homeContent; ?></textarea><br>
				   <div class="form-group">   
					logo Image<br>
					<img src="../<?php echo $homeLogo; ?>" width="150px" height="150px"><br>
					<input type="file" name="file" class="form-control-file" ><br>
				   </div>
					   
				   <button name="submit" type="submit" class="btn btn-primary">Update Settings</button>
			   </form>
			   <?php } ?>
				   <!-- Image storage -->
				   <?php
					   if(isset($_POST['submit'])){
						  
						  $home_title = mysqli_real_escape_string($conn, $_POST['home_title']);
						 $home_content = mysqli_real_escape_string($conn, $_POST['home_content']);
						   
						   //checking if above fields are empty
						   if(($home_title =='') || (trim($home_content) =='')){
							echo '<script>window.location = "edithome.php?id='.$home_id.'&message=Empty+Fields";</script>';
							  // exit();
						   }

						   // First Thumb image 

						   $file = $_FILES['file'];
				   
						   $fileName = $file['name'];
						   $fileType = $file['type'];
						   $fileTmp = $file['tmp_name'];
						   $fileErr = $file['error'];
						   echo $fileSize = $file['size'];
						   
						   $fileEXT = explode('.',$fileName);
						   $fileExtension = strtolower(end($fileEXT));
						   
						   $allowedExt = array("jpg", "jpeg", "png", "gif");
						   if($fileExtension!=''){
						   if(in_array($fileExtension, $allowedExt)){
							   if($fileErr === 0){
								   if($fileSize < 3000000){
									   $newFileName = uniqid('',true).'.'.$fileExtension;
									   $destination = "../uploads/$newFileName";
									   $dbdestination = "uploads/$newFileName";
									   move_uploaded_file($fileTmp, $destination);
									   //$sql = "INSERT INTO home (`home_title`,`home_desc`, `post_date`, `home_image` `home_feature_img`) VALUES ('$home_title', '$home_desc', '$home_img', '$dbdestination');";
									   
								   } else {
									   //header("Location: settings.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
									  // echo '<script>window.location = "edithome.php?id='.$home_id.'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
									   exit();
								   }
							   }else{
								   //header("Location: settings.php?message=Oops Error Uploading your file");
								   echo '<script>window.location = "edithome.php?id='.$home_id.'&message=Oops Error Uploading your file";</script>';
								   exit();
							   }
						   }else{
							   //header("Location: settings.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
							   echo '<script>window.location = "edithome.php?id='.$home_id.'&message=EXT ERROR";</script>';

							   exit();
						   }
						}
						   // Feature Hero image
						   
						   $featureImg = $_FILES['featureImg'];
				   
						   $fileName = $featureImg['name'];
						   $fileType = $featureImg['type'];
						   $fileTmp = $featureImg['tmp_name'];
						   $fileErr = $featureImg['error'];
						   echo $fileSize = $featureImg['size'];
						   
						   $fileEXT = explode('.',$fileName);
						   $fileExtension = strtolower(end($fileEXT));
						   
						   $allowedExt = array("jpg", "jpeg", "png", "gif");
						   if($fileExtension!=''){
						   if(in_array($fileExtension, $allowedExt)){
							   if($fileErr === 0){
								   if($fileSize < 3000000){
									   $newFeatureImg = uniqid('',true).'.'.$fileExtension;
									   $featureImg = "../uploads/$newFeatureImg";
									   $dbfeatureImg = "uploads/$newFeatureImg";
									   move_uploaded_file($fileTmp, $featureImg);
									   
								   } else {
									   echo "me";
									  // header("Location: settings.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
									 // '<script>window.location = "edithome.php?id='.$home_id.'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
									   exit();
								   }
							   }else{
								  // header("Location: settings.php?message=Oops Error Uploading your file");
								  echo '<script>window.location = "edithome.php?id='.$home_id.'&message=Oops Error Uploading your file";</script>';

								   exit();
							   }
						   }else{
							  // header("Location: settings.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
							   echo '<script>window.location = "edithome.php?id='.$home_id.'&message=ext error!";</script>';

							   exit();
						   }
						}
						
					
					$dbdestination = ($dbdestination )?$dbdestination  : $homeLogo;
					$dbfeatureImg = ($dbfeatureImg )?$dbfeatureImg  : $homeFeatureImg;
						 //$sql = "INSERT INTO home (`home_title`,`home_desc`, `home_image` ,`home_feature_img`) VALUES ('$home_title', '$home_desc',  '$dbdestination', '$dbfeatureImg')";
						echo $sql = "UPDATE home SET home_title='$home_title', home_content='$home_content', home_logo='$dbdestination', home_feature_img='$dbfeatureImg' 
						 WHERE home_id='".$_REQUEST['id']."'";

						if(mysqli_query($conn, $sql)){
							//header("Location: posts.php?message=Post+Published");
							//echo "<meta http-equiv='refresh' content='0;url=http://localhost:8888/admin/home.php?message=Home+Page+Setting+Updated'>";
							//echo '<script>window.location = "home.php?message=Home+Page+Setting+Updated";</script>';

						}else{
							header("Location: settings.php?message=Error");
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
