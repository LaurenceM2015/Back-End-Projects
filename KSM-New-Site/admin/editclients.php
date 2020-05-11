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
            <h1 class="h2">Modifie Les Lien de Karate Shotokan Mardie</h1>
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
				$client_id = $_GET['id'];
				$FormSql = "SELECT * FROM clients WHERE client_id='$client_id'";
				$FormResult = mysqli_query($conn, $FormSql);
				while($FormRow=mysqli_fetch_assoc($FormResult)){
					
					$client_link = $FormRow['client_link'];
					$client_name  = $FormRow['client_name'];
					$client_img   = $FormRow['client_img'];
					
				
			?>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
                        <label for="clientName">Nom du Lien</label>
                        <input id="clientName" type="text" name="client_name" class="form-control" placeholder="Nom Du Membre" value="<?php echo $client_name; ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="clientLink">Le Site Du lien</label>
                        <input id="clientLink" type="text" name="client_link" class="form-control" placeholder="Le Post Aucupe Du Membre" value="<?php echo $client_link; ?>"><br>
                    </div>

                    <div class="form-group">
                        <label for="clientImage">Change Le Image de Profile Du Membre</label>
                        <figure><img src="../<?php echo $client_img; ?>" width="150px" height="150px"><br></figure>
                        <input id="clientImage" type="file" name="file" class="form-control-file"><br>
                    </div>
                    
					 <button name="submit" type="submit" class="btn btn-primary">Update</button>
				</form>
				<?php } ?>
				<?php
					if(isset($_POST['submit'])){
						$client_link    = mysqli_real_escape_string($conn, $_POST['client_link']);
						$client_name    = mysqli_real_escape_string($conn, $_POST['client_name']);
						$client_img     = mysqli_real_escape_string($conn, $_POST['client_img']);
						
						//checking if above fields are empty
						if(empty($client_name) OR empty($client_link)){
							echo '<script>window.location = "editclients.php?message=Empty+Fields+In+Client";</script>';
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
                                        
										$sql = "UPDATE clients SET 
                                        client_link  ='$client_link', 
                                        client_name   ='$client_name', 
                                        client_img    ='$dbdestination'

                                        WHERE client_id   ='$client_id'";
										if(mysqli_query($conn, $sql)){
											echo '<script>window.location = "teams.php?message=Client+Updated";</script>';
										}else{
											echo '<script>window.location = "editclients.php?message=Error+Dans+La+Form";</script>';
											exit();
										}
									} else {
                                        echo '<script>window.location = "editclients.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
										//echo '<script>window.location = "newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
										exit();
									}
								}else{
                                    echo '<script>window.location = "editclients.php?id='.$_REQUEST['id'].'&message=Oops Error Uploading your file";</script>';
									//echo '<script>window.location = "newpost.php?message=Oops Error Uploading your file";</script>';
									exit();
								}
							}else{
                                echo '<script>window.location = "editclients.php?id='.$_REQUEST['id'].'&message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
								//echo '<script>window.location = "newpost.php?message=YOUR FILE IS TOO BIG TO UPLOAD!";</script>';
								exit();
							}
						}else{
							//user dont want to update the file
							$sql = "UPDATE teams SET 
                            client_link ='$client_link', 
                            client_name ='$client_name' 
                             

                            WHERE client_id='$client_id'";
							if(mysqli_query($conn, $sql)){
								echo '<script>window.location = "teams.php?message=Client+De+Updated";</script>';
							}else{
								echo '<script>window.location = "teams.php?message=Error+Where+User+Dont+Update+Image";</script>';
							}
						}
						
						
					}
							
				?>
				
            </div><!-- admin form -->
            
            
        
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