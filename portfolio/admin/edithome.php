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
                    <div class="card-header" id="headingThwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Hero Background Image Section
                            </button>
                        </h5>
                    </div>

                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <?php 
                                $hero_id = $_GET['id'];
                                $FormSql = "SELECT * FROM bkg_hero WHERE hero_id='$hero_id'";
                                $FormResult = mysqli_query($conn, $FormSql);
                                
                                while($FormRow = mysqli_fetch_assoc($FormResult)){
                                    
                                    $setting_name = $FormRow['setting_name'];
                                    $hero_img = $FormRow['hero_img'];
                                  

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
                                                    $sql = "UPDATE bkg_hero SET 
                                                    hero_img='$dbdestination' 
                                                      
                                                    WHERE hero_id='$hero_id'";
            
                                                    if(mysqli_query($conn, $sql)){
                                                      echo '<script>window.location = "home.php?message=Hero+Image+Updated";</script>';
                                                    }else{
                                                        echo '<script>window.location = "edithome.php?message=Error+Message";</script>';
                                                     //   exit();
                                                    }
                                                } else {
                                                    echo '<script>window.location = "edithome.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
                                                    exit();
                                                }
                                            }else{
                                                echo '<script>window.location = "edithome.php?id='.$_REQUEST['id'].'&message=Oops Error Uploading your file";</script>';
                                                exit();
                                            }
                                        }else{
                                             echo '<script>window.location = "edithome.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
                                            exit();
                                        }
            
                                    } 
                                    else{
                                    // user don't want to update the file
                                    $sql = "UPDATE bkg_hero SET 
                                        <!--setting_name='$setting_name' -->
                                        WHERE hero_id='$hero_id'";
                                        if(mysqli_query($conn, $sql)){
                                        echo '<script>window.location = "home.php?message=Hero+Image+Updated";</script>';
                                        }else{
                                        echo '<script>window.location = "home.php?message=Error+In+A+Form";</script>';
                                    } // if the form is submited 
                                }
                            }
                            ?>
                        </div> <!-- ./card-body -->
                    </div><!-- ./collapse one -->
                </div> <!-- ./card -->
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                            Service Section
                        </button>
                    </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        <?php 
                                $service_id = $_GET['id'];
                                $FormSql = "SELECT * FROM services WHERE service_id='$service_id'";
                                $FormResult = mysqli_query($conn, $FormSql);
                                
                                while($FormRow = mysqli_fetch_assoc($FormResult)){
                                    
                                    $service_name = $FormRow['service_name'];
                                    $service_icon = $FormRow['service_icon']; 
                                    $service_content = $FormRow['service_content'];
                                    $service_id = $FormRow['service_id'];

                            ?>
                            <form method="post" enctype="multipart/form-data">
                                
                                Service Name
                                <input type="text" name="service_name" class="form-control form-control-lg" placeholder="Enter Keywords" value="<?php echo $service_name; ?>">

                                Service icon
                                <input type="text" name="service_icon" class="form-control form-control-lg" placeholder="Enter Keywords" value="<?php echo $service_icon; ?>">

                                Service content
                                <input type="text" name="service_content" class="form-control form-control-lg" placeholder="Enter Keywords" value="<?php echo $service_content; ?>">
                                    
                                <button name="submit" type="submit" class="btn btn-primary mt-3">Update</button>
                            </form>
                            <?php } ?>
                            <?php 
                                if(isset($_POST['submit'])){
                                    $service_name       = mysqli_real_escape_string($conn, $_POST['service_name']);
                                    $service_icon       = mysqli_real_escape_string($conn, $_POST['service_icon']);
                                    $service_content    = mysqli_real_escape_string($conn, $_POST['service_content']);
                                
                                
                                    //checking if above fields are empty
                                    if(empty($service_content) OR empty($service_name)){
                                        
                                        echo '<script>window.location = "home.php?message=Empty+Field";</script>';
                                        exit();
                                    }
                                
                                    // user don't want to update the file
                                    $sql = "UPDATE services SET 
                                        service_icon='$service_icon',
                                        service_content='$service_content'

                                        WHERE service_id='$service_id'";

                                        if(mysqli_query($conn, $sql)){
                                        echo '<script>window.location = "home.php?message=Service+Updated";</script>';
                                        }else{
                                        echo '<script>window.location = "home.php?message=Error+In+A+Form";</script>';
                                        }
                                
                                    } // if the form is submited 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #4
                        </button>
                    </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                    </div>
                </div>
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

    


