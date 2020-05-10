<?php
    session_start();
    ini_set("display_errors", 1);
    include_once "../includes/header.php";
    include_once "../includes/connection.php";
    include_once "../includes/functions.php";
    
    if(!isset($_GET['id'])){
        header("Location: page.php?message=Please+click+the+edit+button");
        exit();
    } else {
        if(!isset($_SESSION['author_role'])){
            header("Location: login.php?message=Please+Login");
            exit();
    } else{
		if($_SESSION['author_role']!="admin"){
			echo "You cannot access this page";
        } else {
            $page_id = $_GET['id'];
            $sql = "SELECT * FROM page WHERE page_id='$page_id' ";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)<=0){
				//We dont have any page for this id
				header("Location: page.php?message=No+page+found");
				exit();
			} else {
                ?>
                <!-- edit page -->
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
            <h1 class="h2">Edit Page</h1>
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
                $page_id = $_GET['id'];
                
                $FormSql = "SELECT * FROM page WHERE page_id='$page_id'";
                
                $FormResult = mysqli_query($conn, $FormSql);
                
                while($FormRow = mysqli_fetch_assoc($FormResult)){
            
                    $page_title     = $FormRow['page_title'];
                    $page_subtitle  = $FormRow['page_subtitle'];
                    $page_content   = $FormRow['page_content'];
                    $page_image     = $FormRow['page_image'];
            ?>
            <form method="post" enctype="multipart/form-data">
                   
				Page Title
                <input type="text" name="page_title" class="form-control form-control-lg" placeholder="Please enter the Title" value="<?php echo $page_title; ?>">
                
                Page 
				<input type="text" name="page_subtitle" class="form-control form-control-lg" placeholder="Please enter page subtitles" value="<?php echo $page_subtitle; ?>">
                  
				Page Content
				<textarea name="page_content" class="form-control form-control-lg" placeholder="Please enter page content" rows="3"><?php echo $page_content; ?></textarea><br>
                
                <figure>
                    <img src="../<?php echo $page_image; ?>" class="img-thumbnail" width="150px" height="150px">
                </figure>
				Page Image
				<input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>
				
				<!-- Remove page keyword -->
					 
				<button name="submit" type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
                <?php } ?>
				<?php
					if(isset($_POST['submit'])){
                        $page_title = mysqli_real_escape_string($conn, $_POST['page_title']);
                        $page_subtitle = mysqli_real_escape_string($conn, $_POST['page_subtitle']);
						$page_content = mysqli_real_escape_string($conn, $_POST['page_content']);
						
						
						//checking if above fields are empty
						if(empty($page_title) OR empty($page_content)){
                            
                            echo '<script>window.location = "page.php?message=Page+Updated";</script>';
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
                                       
                                        $sql = "UPDATE page SET 
                                        page_title='$page_title', 
                                        page_subtitle='$page_subtitle', 
                                        page_content='$page_content', 
                                        page_image='$dbdestination'  
                                        WHERE page_id='$page_id'";

                                        if(mysqli_query($conn, $sql)){
                                            echo '<script>window.location = "page.php?message=Page+Updated";</script>';
                                        }else{
                                            echo '<script>window.location = "page.php?message=Error file";</script>';
                                            exit();
                                            //echo $sql;
                                        }
                                    } else {
                                        echo '<script>window.location = "newpage.php?message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
                                        exit();
                                    }
                                }else{
                                    echo '<script>window.location = "newpage.php?message=Oops Error Uploading your file";</script>';
                                    exit();
                                }
                            }else{
                                echo '<script>window.location = "newpage.php?message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
                                exit();
                            }

                        } else{
                            // user don't want to update the file
                           $sql = "UPDATE page SET 
                            page_title='$page_title',
                            page_subtitle='$page_subtitle',
                            page_content='$page_content' 
                            WHERE page_id='$page_id'";

                            if(mysqli_query($conn, $sql)){
                                echo '<script>window.location = "page.php?message=Page+Updated";</script>';
                            }else{
                              echo '<script>window.location = "page.php?message=Error+last+section";</script>';
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




    <!-- ./ edid page -->
    <?php 
            }
        }

    }
}

?>