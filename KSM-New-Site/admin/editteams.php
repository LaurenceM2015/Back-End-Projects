<?php
session_start();
ini_set("display_errors", 1);
define("TITLE", "Admin | Modifie Equipe");
include_once "../includes/functions.php";
include "../includes/connection.php";

if(isset($_SESSION['author_role'])){
	if($_SESSION['author_role']=="admin"){
		if(isset($_GET['id'])){
	?>
	<!-- Header Goes Here -->
	<?php include "../includes/header.php" ?>

	<body>
	
	 <nav class="navbar navbar-dark sticky-top bg-dark   shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/index.php">KSM</a>
      
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
            <h1 class="h2">Modifie Les Membre de L'Equipe</h1>
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
				$team_id = $_GET['id'];
				$FormSql = "SELECT * FROM teams WHERE team_id='$team_id'";
				$FormResult = mysqli_query($conn, $FormSql);
				while($FormRow=mysqli_fetch_assoc($FormResult)){
					
					$team_title = $FormRow['team_title'];
					$team_name  = $FormRow['team_name'];
					$team_img   = $FormRow['team_img'];
					$team_belt  = $FormRow['team_belt'];
				
			?>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <label for="teamName">Nom et Prenom du Membre</label>
                        <input id="teamName" type="text" name="team_name" class="form-control" placeholder="Nom Du Membre" value="<?php echo $team_name; ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="teamTitle">Le Post Aucupe Par Le Membre</label>
                        <input type="text" name="team_title" class="form-control" placeholder="Le Post Aucupe Du Membre" value="<?php echo $team_title; ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="teamTitle">Modifie Les Dan du Membre</label>
                        <input type="text" name="team_belt" class="form-control" placeholder="Modifie Les Dan" value="<?php echo $team_belt; ?>"><br>
                    </div>
					 
                    <div class="form-group">
                        <label for="teamImage">Change Le Image de Profile Du Membre</label>
                        <figure><img src="../<?php echo $team_img; ?>" width="150px" height="150px"><br></figure>
                        <input id="teamImage" type="file" name="file" class="form-control-file"><br>
                    </div>
                    
				
					
					
					 <button name="submit" type="submit" class="btn btn-primary">Update</button>
				</form>
				<?php } ?>
				<?php
					if(isset($_POST['submit'])){
						$team_title = mysqli_real_escape_string($conn, $_POST['team_title']);
						$team_name  = mysqli_real_escape_string($conn, $_POST['team_name']);
						$team_belt  = mysqli_real_escape_string($conn, $_POST['team_belt']);
						
						//checking if above fields are empty
						if(empty($team_title) OR empty($team_name)){
							echo '<script>window.location = "editteams.php?message=Empty+Fields+In+Team";</script>';
							exit();
						}
						
						if(is_uploaded_file($_FILES['file']['tmp_name'])){
							//user wants to update the file too
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
										$sql = "UPDATE teams SET 
                                        team_title  ='$team_title', 
                                        team_name   ='$team_name', 
                                        team_belt   ='$team_belt', 
                                        team_img    ='$dbdestination'

                                        WHERE team_id   ='$team_id'";
										if(mysqli_query($conn, $sql)){
											echo '<script>window.location = "teams.php?message=Membre+Equipe+Updated";</script>';
										}else{
											echo '<script>window.location = "editteams.php?message=Error+Dans+La+Form";</script>';
											exit();
										}
									} else {
                                        echo '<script>window.location = "editteams.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
										//echo '<script>window.location = "newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
										exit();
									}
								}else{
                                    echo '<script>window.location = "editteams.php?id='.$_REQUEST['id'].'&message=Oops Error Uploading your file";</script>';
									//echo '<script>window.location = "newpost.php?message=Oops Error Uploading your file";</script>';
									exit();
								}
							}else{
                                echo '<script>window.location = "editteams.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
								//echo '<script>window.location = "newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
								exit();
							}
						}else{
							//user dont want to update the file
							$sql = "UPDATE teams SET 
                            team_title  ='$team_title', 
                            team_name   ='$team_name', 
                            team_belt   ='$team_belt' 

                            WHERE team_id='$team_id'";
							if(mysqli_query($conn, $sql)){
								echo '<script>window.location = "teams.php?message=Membre+De+Equipe+Updated";</script>';
							}else{
								echo '<script>window.location = "teams.php?message=Error+Where+User+Dont+Update+Image";</script>';
							}
						}
						
						
					}
							
				?>
				
			</div>
        
          </div>
        </main>
      </div>
    </div>
	
	<!-- Footer start here -->
	<?php include "../includes/footer.php"; ?>
	</body>
</html>
	<?php
		}}
}else{
	header("Location: login.php?message=Please+Login");
}
?>