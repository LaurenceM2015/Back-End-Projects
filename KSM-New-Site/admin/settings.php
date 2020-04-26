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
				
					<form method="post">
						HomePage Jumbotron Title
						<input type="text" name="home_hero_title" class="form-control" placeholder="Enter hero Title" value="<?php getSettingValue("home_hero_title"); ?>"><br>
						HomePage Jumbotron Description
						<input type="text" name="home_hero_desc" class="form-control" placeholder="Enter hero Description" value="<?php getSettingValue("home_hero_desc"); ?>"><br>
						
						Les Stage De KSM
						<textarea name="stage_desc" class="form-control form-control-lg" value="" id="" rows="3"><?php getSettingValue("stage_desc"); ?></textarea><br>

						HomePage Slogan Title
						<input type="text" name="slogan_title" class="form-control" placeholder="Enter Slogan Title" value="<?php getSettingValue("slogan_title"); ?>"><br>

						HomePage Slogan Description
						<textarea name="slogan_desc" class="form-control form-control-lg" value="" id="" rows="3"><?php getSettingValue("slogan_desc"); ?></textarea><br>
						
						<button name="submit" class="btn btn-success">Update Settings</button><br><br>
					</form>
					<?php 
						if(isset($_POST['submit'])){
							$heroTitle = mysqli_real_escape_string($conn, $_POST['home_hero_title']);
							$heroDesc = mysqli_real_escape_string($conn, $_POST['home_hero_desc']);
							$stageDesc = mysqli_real_escape_string($conn, $_POST['stage_desc']);
							$sloganTitle = mysqli_real_escape_string($conn, $_POST['slogan_title']);
							$sloganDesc = mysqli_real_escape_string($conn, $_POST['slogan_desc']);
							
							setSettingValue("home_hero_title",$heroTitle);
							setSettingValue("home_hero_desc",$heroDesc);
							setSettingValue("stage_desc",$stageDesc);
							setSettingValue("slogan_title",$sloganTitle);
							setSettingValue("slogan_desc",$sloganDesc);
							header("Location: settings.php?message=Settings Updated");
						}
					?>
				
				
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	<!-- footer start here -->
    <?php include_once "../includes/footer.php"; ?>
	
	</body>
</html>
	<?php
}
}else{
	header("Location: login.php?message=Please+Login");
}
?>
