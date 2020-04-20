<?php
include_once "../includes/header.php";
include_once "../includes/functions.php";
include "../includes/connection.php";
session_start();
if(isset($_SESSION['author_role'])){
    if($_SESSION['author_role']=="admin"){ // if user equal to admin: show this page
        if(isset($_GET['id'])){
?>

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
                
                while($FormRow = mysqli_fetch_assoc($FormResult)){
                
                    
                    $post_title     = $FormRow['post_title'];
                    $post_intro     = $FormRow['post_intro'];
                    $post_content   = $FormRow['post_content'];
                    $post_image     = $FormRow['post_image'];
                    $post_keywords  = $FormRow['post_keywords'];

                
            ?>
            <form method="post" enctype="multipart/form-data">
                   
				Post Title
                <input type="text" name="post_title" class="form-control form-control-lg" placeholder="Post Title" value="<?php echo $post_title; ?>">
                
                Post Intro
				<input type="text" name="post_intro" class="form-control form-control-lg" placeholder="Post Introduction" value="<?php echo $post_intro; ?>">
                  
				Post Content
				<textarea name="post_content" class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"><?php echo $post_content; ?></textarea><br>
                
                <figure>
                    <img src="../<?php echo $post_image; ?>" class="img-thumbnail" width="150px" height="150px">
                </figure>
				Post Image
				<input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>
				
				Post Keywords
				<input type="text" name="post_keywords" class="form-control form-control-lg" placeholder="Enter Keywords" value="<?php echo $post_keywords; ?>">
					 
				<button name="submit" type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
                <?php } ?>
				<?php
					if(isset($_POST['submit'])){
                        $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
                        $post_intro = mysqli_real_escape_string($conn, $_POST['post_intro']);
						$post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
						$post_keywords = mysqli_real_escape_string($conn, $_POST['post_keywords']);
						
						//checking if above fields are empty
						if(empty($post_title) OR empty($post_content)){
                            
                            echo '<script>window.location = "posts.php?message=Post+Updated";</script>';
							exit();
                        }
                        
                        if(is_uploaded_file($_FILES['file']['tmp_name'])){
                            // user want to update the file too
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
                                        //$sql = "INSERT INTO post (`post_title`,`post_content`,`post_category`, `post_author`, `post_date`, `post_keywords`, `post_image`) VALUES ('$post_title', '$post_content', '$post_category', '$post_author', '$post_date', '$post_keywords', '$dbdestination');";
                                        $sql = "UPDATE post SET 
                                        post_title='$post_title', 
                                        post_intro='$post_intro', 
                                        post_content='$post_content', 
                                        post_keywords='$post_keywords',
                                        post_image='$dbdestination',  
                                        WHERE post_id='$post_id'";

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

                        } else{
                            // user don't want to update the file
                           $sql = "UPDATE post SET 
                            post_title='$post_title',
                            post_intro='$post_intro',
                            post_content='$post_content', 
                            post_keywords='$post_keywords'
                            WHERE post_id='$post_id'";

                            if(mysqli_query($conn, $sql)){
                                echo '<script>window.location = "posts.php?message=Post+Updated";</script>';
                            }else{
                              echo '<script>window.location = "posts.php?message=Error";</script>';
                            }
                        }
						
			
					} // if the form is submited 
							
				?>
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>

	</body>
</html>
    <?php }}
}else{
	header("Location: login.php?message=Please+Login");
}
?>
