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

						<!-- Hero Section -->
						<div class="form-group">
							<label for="">HomePage Jumbotron Title</label>
							<input type="text" name="home_jumbo_title" class="form-control" placeholder="Enter Jumbo Title" value="<?php getSettingValue("home_jumbo_title"); ?>">
						</div>
						<!-- Les Slogan -->
						<div class="form-group">
							<label for="">HomePage Jumbotron Description</label>
							<input type="text" name="home_jumbo_desc" class="form-control" placeholder="Enter Jumbo Description" value="<?php getSettingValue("home_jumbo_desc"); ?>">
						</div>
						
						<!-- Nos Principe -->
						<div class="form-group">
							<label for="">Le Slogan</label>
							<input id="sloganTitle" name="slogan_title" type="text" class="form-control" placeholder="Enter Slogan Title" value="<?php getSettingValue('slogan_title') ?>">
						</div>

						<div class="form-group">
							<label for="sloganDesc">La Description</label>
							<textarea id="sloganDesc" name="slogan_desc" class="form-control" rows="3"><?php getSettingValue('slogan_desc') ?></textarea>
						</div>

						<!-- Remerciment -->
						<div class="form-group">
							<label for="remercimentTitle">Nos Remerciment Titre</label>
							<input id="remercimentTitle" name="remerciment_title" type="text" class="form-control" placeholder="Enter Remerciment Title" value="<?php getSettingValue('remerciment_title') ?>">
						</div>

						<div class="form-group">
							<label for="remercimentDesc">La Description Du Remerciment</label>
							<textarea id="remercimentDesc" name="remerciment_desc" class="form-control" rows="3"><?php getSettingValue('remerciment_desc') ?></textarea>
						</div>


						<!-- Remerciment -->
						<div class="form-group">
							<label for="remercimentTitle">Nos Principe Titre</label>
							<input id="remercimentTitle" name="nos_principe_title" type="text" class="form-control" placeholder="Enter Principe Title" value="<?php getSettingValue('nos_principe_title') ?>">
						</div>

						<div class="form-group">
							<label for="remercimentDesc">La Description Du Principe</label>
							<textarea id="remercimentDesc" name="nos_principe_desc" class="form-control" rows="3"><?php getSettingValue('nos_principe_desc') ?></textarea>
						</div>

			
						
						<button name="submit" class="btn btn-success">Update Settings</button><br><br>
					</form>
					<?php 
						if(isset($_POST['submit'])){
							$jumboTitle = mysqli_real_escape_string($conn, $_POST['home_jumbo_title']);
							$jumboDesc = mysqli_real_escape_string($conn, $_POST['home_jumbo_desc']);

							$slogan_title = mysqli_real_escape_string($conn, $_POST['slogan_title']);
							$slogan_desc = mysqli_real_escape_string($conn, $_POST['slogan_desc']);

							$remerciment_title = mysqli_real_escape_string($conn, $_POST['remerciment_title']);
							$remerciment_desc = mysqli_real_escape_string($conn, $_POST['remerciment_desc']);

							$nos_principe_title = mysqli_real_escape_string($conn, $_POST['nos_principe_title']);
							$nos_principe_desc = mysqli_real_escape_string($conn, $_POST['nos_principe_desc']);
							
							setSettingValue("home_jumbo_title",$jumboTitle);
							setSettingValue("home_jumbo_desc",$jumboDesc);

							setSettingValue("slogan_title",$slogan_title);
							setSettingValue("slogan_desc",$slogan_desc);

							setSettingValue("remerciment_title",$remerciment_title);
							setSettingValue("remerciment_desc",$remerciment_desc);

							setSettingValue("nos_principe_title",$nos_principe_title);
							setSettingValue("nos_principe_desc",$nos_principe_desc);

							//header("Location: settings.php?message=Settings Updated");
							echo '<script>window.location = "settings.php?message=Setting+Updated";</script>';
						}
					?>
				
				
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	
	
	</body>
</html>
	<?php
}
}else{
	header("Location: login.php?message=Please+Login");
}
?>
