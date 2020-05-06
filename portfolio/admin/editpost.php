<?php
ini_set("display_errors", 1);
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
          $post_title         = $FormRow['post_title'];
			    $post_content       = $FormRow['post_content'];
          $post_category      = explode(",",$FormRow['post_category']);
          $post_feature       = explode(",",$FormRow['post_feature']);
          $post_technologies  = explode(",",$FormRow['post_technologies']);
          $post_image         = $FormRow['post_image'];
          $post_client_name  = $FormRow['post_client_name'];
          $post_website_link  = $FormRow['post_website_link'];
          $post_keywords      = $FormRow['post_keywords'];
      ?>
        <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="postTitle">Post Title</label>
                <input for="postTitle" type="text" name="post_title" class="form-control form-control-lg" placeholder="Post Title" value="<?php echo $post_title; ?>">
              </div>
              <div class="form-group">
						      <label for="exampleFormControlInput1">Post Category</label>
                  <div class="form-check">
                    <label class="form-check-label" for="check1">
                      <?php
                        $sql = "SELECT * FROM `categories`";
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_assoc($result)){
                          $category_id = $row['category_id'];
                          $category_name = $row['category_name'];
                          ?>
                          <input class="form-check-input" <?php if(in_array($category_id,$post_category)) { ?>
                          checked="checked"<?php } ?> name="post_category[]" type="checkbox" value="<?php echo $category_id; ?>" id="defaultCheck1"> <?php echo $category_name; ?><br>
                          <?php
                        }
                      ?>
                    </label>
                  </div><!-- form-check -->
              </div><!-- post Category -->

              <div class="form-group">
                <label for="">Post Content</label>
				        <textarea for="postContent" name="post_content" class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"><?php echo $post_content; ?></textarea>
              </div><!-- Post content -->

              <div class="form-group">
                  Project Features
                <div class="form-check">
                  <label class="form-check-label" for="check1">
                      <?php
                        $sql = "SELECT * FROM `features`";
                        $result = mysqli_query($conn, $sql);
                        while($row=mysqli_fetch_assoc($result)){
                          $feature_id = $row['feature_id'];
                          $feature_desc = $row['feature_desc'];
                      ?>
                        <input class="form-check-input" <?php if(in_array($feature_id,$post_feature)) { ?>checked="checked"<?php } ?> name="post_feature[]" type="checkbox" value="<?php echo $feature_id; ?>" id="defaultCheck1"> <?php echo $feature_desc; ?><br>
                        <?php
                        }
                      ?>
                  </label>
                </div>
              </div><!-- post category -->
                
              <div class="form-group">
                <figure>
                      <img src="../<?php echo $post_image; ?>" class="img-thumbnail" width="150px" height="150px">
                </figure>
                <label for="postImage">Post Image</label>
                <input for="postImage" type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>
              </div><!-- post image -->

              <div class="form-group">
                Project Technologies
                <div class="form-check">
                  <label class="form-check-label" for="check1">
                    <?php
                      $sql = "SELECT * FROM `technologies`";
                      $result = mysqli_query($conn, $sql);
                      while($row=mysqli_fetch_assoc($result)){
                        $technology_id = $row['technology_id'];
                        $technology_name = $row['technology_name'];
                    ?>
                      <input class="form-check-input" <?php if(in_array($technology_id,$post_technologies)) { ?>checked="checked"<?php } ?> name="post_technologies[]" type="checkbox" value="<?php echo $technology_id; ?>" id="defaultCheck1"> <?php echo $technology_name; ?><br>
                      <?php
                        }
                      ?>
                    </label>
                </div>
              </div><!-- post Technologies -->

              <div class="form-group">
                <label for="postImage">Project Client Name</label>
                <input type="text" name="post_client_name" class="form-control form-control-lg" placeholder="Please Enter Client Name" value="<?php echo $post_client_name; ?>">
              </div><!-- post Client Name -->

              <div class="form-group">
                <label for="postImage">Project Client Website Link</label>
                <input type="text" name="post_website_link" class="form-control form-control-lg" placeholder="Please Enter The Client Website Link" value="<?php echo $post_website_link; ?>">
              </div><!-- post Client Website Link -->

              <div class="form-group">
                <label for="postImage">Post Keywords</label>
                <input type="text" name="post_keywords" class="form-control form-control-lg" placeholder="Enter Keywords" value="<?php echo $post_keywords; ?>">
              </div><!-- post keywords -->
              
              <button name="submit" type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
                <?php } ?>
				<?php
					if(isset($_POST['submit'])){
						$post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
            $post_category = implode(",",$_POST['post_category']);
            $post_feature = implode(",",$_POST['post_feature']);
            $post_technologies = implode(",",$_POST['post_technologies']);
            $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
            $post_client_name = mysqli_real_escape_string($conn, $_POST['post_client_name']);
            $post_website_link = mysqli_real_escape_string($conn, $_POST['post_website_link']);
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
                    post_content='$post_content',
										post_category='$post_category',
                    post_feature='$post_feature', 
                    post_technologies='$post_technologies', 
                    post_keywords='$post_keywords',
                    post_client_name='$post_client_name',
                    post_website_link='$post_client_link',
                    post_image='$dbdestination'  
                    WHERE post_id='$post_id'";

                    if(mysqli_query($conn, $sql)){
                      echo '<script>window.location = "posts.php?message=Post+Updated";</script>';
                    }else{
                      echo '<script>window.location = "posts.php?message=Error+Message";</script>';
                      //   exit();
                    }
                    } else {
                      echo '<script>window.location = "editpost.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
                      exit();
                    }
                    }else{
                      echo '<script>window.location = "editpost.php?id='.$_REQUEST['id'].'&message=Oops Error Uploading your file";</script>';
                      exit();
                    }
                    }else{
                      echo '<script>window.location = "editpost.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
                      exit();
                    }

            } else{
                            // user don't want to update the file
               $sql = "UPDATE post SET 
               post_title         ='$post_title',
               post_content       ='$post_content',
							 post_category      ='$post_category',
               post_feature       ='$post_feature',
               post_technologies  ='$post_technologies',
               post_keywords      ='$post_keywords',
               post_client_name   ='$post_client_name',
               post_website_link  ='$post_website_link'
               WHERE post_id      ='$post_id'";

              if(mysqli_query($conn, $sql)){
                echo '<script>window.location = "posts.php?message=Post+Updated";</script>';
                 exit();
              }else{
                echo '<script>window.location = "posts.php?message=Error";</script>';
               exit();
              }
          }
						
			
			  } // if the form is submited 
							
			?>
				
		</div>
        
          </div>
        </main>
      </div>
    </div>
	
        

	 <?php include "../includes/footer.php"; ?>

    <?php }}
}else{
	header("Location: login.php?message=Please+Login");
}
?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ey5ln3e6qq2sq6u5ka28g3yxtbiyj11zs8l6qyfegao3c0su"></script>

	<script>tinymce.init({ selector:'textarea' });</script>
