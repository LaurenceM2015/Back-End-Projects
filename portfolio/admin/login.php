<?php 
    session_start();
    include "../includes/header.php";
    include "../includes/connection.php";
?>

<body>
 
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
    
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form method="post" class="form-signin">
                            <div class="form-label-group">
                                <input type="email" name="author_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="author_password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>

                            <hr class="my-2">
							

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" name="signup" type="submit">Sign in</button>
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- ./ card -->
            </div><!-- ./ col-md-9 -->
        </div><!-- ./ row -->
    </div><!-- ./ container -->

		
		<?php 
			if(isset($_POST['signup'])){
		
			
				$author_email = mysqli_real_escape_string($conn, $_POST['author_email']);
				$author_password = mysqli_real_escape_string($conn, $_POST['author_password']);
				
				//checking for empty fields
				if(empty($author_email) OR empty($author_password)){
					header("Location: login.php?message=Empty+Fields");
					exit();
				}
				
				//checking for validity of email
				if(!filter_var($author_email,FILTER_VALIDATE_EMAIL)){
					header("Location: login.php?message=Please+Enter+A+Valid+email");
					exit();
				}else{
					//If email exists
					$sql = "SELECT * FROM `author` WHERE `author_email`='$author_email'";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)<=0){
						header("Location: login.php?message=Login+error");
						exit();
					} else {
						while($row = mysqli_fetch_assoc($result)){
							//checking if password matches
							if(!password_verify($author_password, $row['author_password'])){
								header("Location: login.php?message=Login+error");
								exit();
							} else if(password_verify($author_password, $row['author_password'])) {
								$_SESSION['author_id'] = $row['author_id'];
								$_SESSION['author_name'] = $row['author_name'];
								$_SESSION['author_email'] = $row['author_email'];
								$_SESSION['author_bio'] = $row['author_bio'];
								$_SESSION['author_role'] = $row['author_role'];
								header("Location: index.php");
								exit();
							}
						}
					}
				}
			}
		?>
  
</body>
</html>