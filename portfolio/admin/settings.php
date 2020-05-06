<?php
include_once "../includes/functions.php";
include_once "../includes/connection.php";
session_start();
if(isset($_SESSION['author_role'])){
	if($_SESSION['author_role']=="admin"){
	?>
	<?php include "../includes/header.php"; ?>
	<body>
	
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
			
			<h1>ALL Home Page Section Headings:</h1>
				
			<div class="accordion" id="accordionExample">
				<form method="post">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h2 class="mb-0">
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Home Page Hero Section
								</button>
							</h2>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="card-body">
								<label for="heroTitle">Home Page Hero Section</label>
								<input id="heroTitle" type="text" name="home_jumbo_title" class="form-control form-control-lg" placeholder="Enter Jumbo Title" value="<?php getSettingValue("home_jumbo_title"); ?>"><br>
								
								<label for="heroDesc">HomePage Jumbotron Description</label>
								<input id="heroDesc" type="text" name="home_jumbo_desc" class="form-control form-control-lg" placeholder="Enter Jumbo Description" value="<?php getSettingValue("home_jumbo_desc"); ?>"><br>
							</div><!-- card body -->
						</div><!-- ./callapse -->
					</div><!-- ./card one: Hero section --> 

					<div class="card">
						<div class="card-header" id="headingTwo">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								Services Sections
							</button>
						</h2>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
							<div class="card-body">
								<label for="serviceHeading">Home Page Service Heading</label>
								<input id="serviceHeading" type="text" name="service_heading" class="form-control" placeholder="Enter Jumbo Title" value="<?php getSettingValue("service_heading"); ?>"><br>
								<label for="serviceDesc">Home Page Service Description</label>
								<textarea for="serviceDesc" type="text" name="service_desc" class="form-control form-control-lg" id="service" rows="3"><?php getSettingValue("service_desc"); ?></textarea>
							</div><!-- ./card-body --> 
						</div><!-- collapse -->
					</div><!-- ./card two: Service Seciton -->

					<div class="card">
						<div class="card-header" id="headingThree">
							<h2 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									Home Page Projects Section 
								</button>
							</h2>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							<div class="card-body">
								<label for="service">Home Page Projects Heading</label>
								<input id="service" type="text" name="portfolio_heading" class="form-control" placeholder="Enter Portfolio Title" value="<?php getSettingValue("portfolio_heading"); ?>"><br>
								<label for="service">Home Page Portfolio Description</label>
								<textarea for="postContent" name="portfolio_desc" class="form-control form-control-lg" id="service" rows="3"><?php getSettingValue("portfolio_desc"); ?></textarea>
							</div><!-- ./card-body -->
						</div><!-- ./collapse -->
					</div><!-- card three: Portfolio Section -->

					<div class="card">
						<div class="card-header" id="headingFour">
							<h2 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									Home Page Process Section 
								</button>
							</h2>
						</div>
						<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
							<div class="card-body">
								<label for="processHeading">Home Page Process Heading</label>
								<input id="processHeading" type="text" name="process_heading" class="form-control" placeholder=" Enter process Title" value="<?php getSettingValue("process_heading"); ?>"><br>
								<label for="processDesc">Home Page Process Description</label>
								<textarea for="processDesc" name="process_desc" class="form-control form-control-lg" id="service" rows="3"><?php getSettingValue("process_desc"); ?></textarea>
							</div><!-- ./card-body -->
						</div><!-- ./collapse -->
					</div><!-- card Four: Process Section -->

					<div class="card">
						<div class="card-header" id="headingFive">
							<h2 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									Home Page About Section 
								</button>
							</h2>
						</div>
						<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
							<div class="card-body">
								<label for="aboutHeading">Home Page About Heading</label>
								<input id="aboutHeading" type="text" name="about_heading" class="form-control" placeholder=" Enter About Heading" value="<?php getSettingValue("about_heading"); ?>"><br>

								<label for="aboutName">Home Page About Name</label>
								<input id="aboutName" type="text" name="about_name" class="form-control" placeholder=" Enter About name" value="<?php getSettingValue("about_name"); ?>"><br>

								<label for="aboutJobtitle">Home Page About Job Title</label>
								<input id="aboutJobtitle" type="text" name="about_job_title" class="form-control" placeholder=" Enter About Job Title" value="<?php getSettingValue("about_job_title"); ?>"><br>
								
								<label for="aboutDesc">Home Page About Description</label>
								<textarea id="aboutDesc" name="about_desc" class="form-control form-control-lg" rows="3"><?php getSettingValue("about_desc"); ?></textarea>
							</div><!-- ./card-body -->
						</div><!-- ./collapse -->
					</div><!-- card Four: Process Section -->
					
					<button name="submit" class="btn btn-success mt-5">Update Settings</button><br><br>
				</form>
			</div><!-- ./accordion -->
			
							
				<?php 
					if(isset($_POST['submit'])){
						// Hero Section
						$jumboTitle = mysqli_real_escape_string($conn, $_POST['home_jumbo_title']);
						$jumboDesc = mysqli_real_escape_string($conn, $_POST['home_jumbo_desc']);

						// Service
						$service_heading = mysqli_real_escape_string($conn, $_POST['service_heading']);
						$service_Desc = mysqli_real_escape_string($conn, $_POST['service_desc']);

						// PortFolio
						$portfolio_heading = mysqli_real_escape_string($conn, $_POST['portfolio_heading']);
						$portfolio_Desc = mysqli_real_escape_string($conn, $_POST['portfolio_desc']);

						// Process 
						$process_heading = mysqli_real_escape_string($conn, $_POST['process_heading']);
						$process_Desc = mysqli_real_escape_string($conn, $_POST['process_desc']);

						// About Me 
						$about_heading = mysqli_real_escape_string($conn, $_POST['about_heading']);
						$about_name = mysqli_real_escape_string($conn, $_POST['about_name']);
						$about_job_title = mysqli_real_escape_string($conn, $_POST['about_job_title']);
						$about_Desc = mysqli_real_escape_string($conn, $_POST['about_desc']);
						
						setSettingValue("home_jumbo_title",$jumboTitle);
						setSettingValue("home_jumbo_desc",$jumboDesc);

						setSettingValue("service_heading",$service_heading);
						setSettingValue("service_desc",$service_Desc);

						setSettingValue("portfolio_heading",$portfolio_heading);
						setSettingValue("portfolio_desc",$portfolio_Desc);

						setSettingValue("process_heading",$process_heading);
						setSettingValue("process_desc",$process_Desc);

						setSettingValue("about_heading",$about_heading);
						setSettingValue("about_name",$about_name);
						setSettingValue("about_job_title",$about_job_title);
						setSettingValue("about_desc",$about_Desc);

						//header("Location: settings.php?message=Settings Updated");
						echo '<script>window.location = "settings.php?message=Settings+Updated";</script>';
					}
				?>
				
				
				
				
			</div>
        
          </div>
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
