<?php
session_start();
ini_set("display_errors", 1);
include_once "../includes/functions.php";
//include_once "../includes/header.php";
include_once "../includes/connection.php";

if(isset($_SESSION['author_role'])){
	if($_SESSION['author_role']=="admin"){
	?>
    <?php include "../includes/header.php"; ?>
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
			
				
			
			</div><!-- admin-index form -->

            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Header Hero Section
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Hero Id</th>
                                    <th scope="col">Hero image</th>
                                    <?php if($_SESSION['author_role']=="admin"){?>
                                    <th scope="col">Action</th>
                                    <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM `bkg_hero` ORDER BY hero_id DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $hero_img = $row['hero_img'];
                                            $setting_name = $row['setting_name'];
                                            $hero_id = $row['hero_id'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $hero_id;?></th>
                                        <td><img src="../<?php echo $hero_img;?>" width="50px" height="50px"></td>
                                        <th scope="row"><?php echo $setting_name;?></th>

                                        <?php if($_SESSION['author_role']=="admin"){?>
                                            <td>
                                                <a href="edithome.php?id=<?php echo $hero_id;?>">
                                                    <button class="btn btn-info">Edit</button>
                                                </a> 
                                                    <!-- Do not need the delete button -->
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php }?>
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- ./card 1 hero section -->

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Service Section
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Sevice Id</th>
                                <th scope="col">Service Title</th>
                                <th scope="col">Service Icon</th>
                                <th scope="col">Service content</th>
                                <?php if($_SESSION['author_role']=="admin"){?>
                                <th scope="col">Action</th>
                                <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM `services` ORDER BY service_id DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $service_title = $row['service_title'];
                                        $service_icon = $row['service_icon']; 
                                        $service_content = $row['service_content'];
                                        $service_id = $row['service_id'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $service_id;?></th>
                                    <td><?php echo $service_title; ?></td>
                                    <td><?php echo $service_icon;?></td>
                                    <td><?php echo substr(strip_tags($service_content),0,20)."..."; ?></td>
                                   
                                    
                                    <?php if($_SESSION['author_role']=="admin"){?>
                                        <td>
                                            <a href="edithome.php?id=<?php echo $service_id;?>">
                                                <button class="btn btn-info">Edit</button>
                                            </a> 
                                            
                                        </td>
                                    <?php } ?>
                                </tr>
                                <?php }?>
                        
                            </tbody>
                        </table>
                        </div> <!-- card body -->
                    </div><!-- callapse two -->
                </div><!-- ./card 2 services section  -->
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Process Section
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Process Id</th>
                                    <th scope="col">Process Name</th>
                                    <th scope="col">Process Icon</th>
                                    <th scope="col">Process content</th>
                                    <?php if($_SESSION['author_role']=="admin"){?>
                                    <th scope="col">Action</th>
                                    <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM `processes` ORDER BY process_id DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $process_name = $row['process_name'];
                                            $process_icon = $row['process_icon']; 
                                            $process_content = $row['process_content'];
                                            $process_id = $row['process_id'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $process_id;?></th>
                                        <td><?php echo $process_name; ?></td>
                                        <td><?php echo $process_icon;?></td>
                                        <td><?php echo substr(strip_tags($process_content),0,20)."..."; ?></td>
                                    
                                        
                                        <?php if($_SESSION['author_role']=="admin"){?>
                                            <td>
                                                <a href="edithome.php?id=<?php echo $process_id;?>">
                                                    <button class="btn btn-info">Edit</button>
                                                </a> 
                                                
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php }?>
                            
                                </tbody>
                            </table>
                        </div><!-- ./card-body -->
                    </div><!-- callapse Three: process -->
                </div><!-- ./card 3-->

                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                              About Section
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Icon Id</th>
                                    <th scope="col">Icon Name</th>
                                    <?php if($_SESSION['author_role']=="admin"){?>
                                    <th scope="col">Action</th>
                                    <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM `icons` ORDER BY icon_id DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                            $icon_id = $row['icon_id'];
                                            $icon_name = $row['icon_name']; 
                                            
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $icon_id;?></th>
                                        <td><?php echo $icon_name;?></td>
                                        
                                        <?php if($_SESSION['author_role']=="admin"){?>
                                            <td>
                                                <a href="edithome.php?id=<?php echo $icon_id;?>">
                                                    <button class="btn btn-info">Edit</button>
                                                </a> 
                                                <a onclick="return confirm('Are You sure');" href="deletepost.php?id=<?php echo $post_id;?>">
                                                    <button class="btn btn-danger">Delete</button>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php }?>
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- ./card 4-->
            </div><!-- ./accordiant -->
        
          </div><!-- ./container -->
        </main>
      </div>
    </div>
	
	<?php include "../includes/footer.php"; ?>
	
	
	<?php
}
}else{
	header("Location: login.php?message=Please+Login");
}
?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ey5ln3e6qq2sq6u5ka28g3yxtbiyj11zs8l6qyfegao3c0su"></script>

	<script>tinymce.init({ selector:'textarea' });</script>
