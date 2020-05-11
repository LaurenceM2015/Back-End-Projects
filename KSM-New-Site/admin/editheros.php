<?php
session_start();
ini_set("display_errors", 1);
define("TITLE", "KSM | Edit Heros"); 
include_once "../includes/header.php";
include_once "../includes/functions.php";
include "../includes/connection.php";

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
            <h1 class="h2">Edit Home Sections</h1>
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
            </div>

            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Hero Background Image Section
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <?php 
                                $hero_id = $_GET['id'];
                                $FormSql = "SELECT * FROM heros WHERE hero_id='$hero_id'";
                                $FormResult = mysqli_query($conn, $FormSql);
                                
                                while($FormRow = mysqli_fetch_assoc($FormResult)){
                                    $hero_img = $FormRow['hero_img'];
                                    $setting_name = $FormRow['setting_name'];
                            ?>
                            <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <figure>
                                    <img src="../<?php echo $hero_img ; ?>" class="img-thumbnail" width="150px" height="150px">
                                </figure>
                                <label for="postImage">Hero Image</label>
                                <input for="postImage" type="file" name="file" class="form-control-file" id="exampleFormControlFile1"><br>
                            </div><!-- post image -->

                           
                                <button name="submit" type="submit" class="btn btn-primary mt-3">Update</button>
                            </form>
                            <?php } ?>
                            <?php 
                                if(isset($_POST['submit'])){
                                   
                                    $setting_name = mysqli_real_escape_string($conn, $_POST['setting_name']);
                                
                                    //checking if above fields are empty
                                    if(empty($hero_img)){
                                        
                                        echo '<script>window.location = "home.php?message=Empty+Field";</script>';
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
                                                    // Not edding the setting_name = '$setting_name',
                                                    $sql = "UPDATE heros SET 
                                                    hero_img='$dbdestination' 
                                                      
                                                    WHERE hero_id='$hero_id'";
            
                                                    if(mysqli_query($conn, $sql)){
                                                      echo '<script>window.location = "heros.php?message=Hero+Image+Updated";</script>';
                                                    }else{
                                                        echo '<script>window.location = "editheros.php?message=Error+Message";</script>';
                                                     //   exit();
                                                    }
                                                } else {
                                                    echo '<script>window.location = "editheros.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
                                                    exit();
                                                }
                                            }else{
                                                echo '<script>window.location = "editheros.php?id='.$_REQUEST['id'].'&message=Oops Error Uploading your file";</script>';
                                                exit();
                                            }
                                        }else{
                                             echo '<script>window.location = "editheros.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
                                            exit();
                                        }
            
                                    } 
                                    else{
                                    // user don't want to update the file
                                    $sql = "UPDATE heros SET 
                                        <!--setting_name='$setting_name' -->
                                        WHERE hero_id='$hero_id'";
                                        if(mysqli_query($conn, $sql)){
                                        echo '<script>window.location = "heros.php?message=Hero+Image+Updated";</script>';
                                        }else{
                                        echo '<script>window.location = "heros.php?message=Error+In+Hero+Form";</script>';
                                    } // if the form is submited 
                                }
                            }
                            ?>
                        </div> <!-- ./card-body -->
                    </div><!-- ./collapse one -->
                </div> <!-- ./card One Hero Section -->

                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Terre Des Enfant
                        </button>
                    </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Terre Des Enfant 
                        </div>
                    </div>
                </div><!-- ./Card Two Service section -->

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                A Propo de Nous
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            A Propro de KSM
                        </div><!-- card-body -->
                    </div>
                </div><!-- ./Card Three: Process section -->

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Nos Lien
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                           No Lien
                        </div><!-- card-body -->
                    </div>
                </div><!-- ./Card Four about section -->
            </div><!-- ./accordion -->
        </main>
      </div><!-- ./row -->
    </div>
	
     
    <?php   }  }  
    
} else{
	header("Location: login.php?message=Please+Login");
}
    
    ?>

	 <?php include "../includes/footer.php"; ?>

    


