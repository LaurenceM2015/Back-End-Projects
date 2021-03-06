<?php 
  // Global Header
  define("TITLE", "Admin | Sign up Page");
  include_once "../includes/header.php";
?>
<body>
 
  <main class="main-container">

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
		
		<!-- <div style="width:500px;margin:auto auto;  margin-top:250px;">
			<form method="post" class="form-signin">
				<h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
		
			<input type="text" name="author_name" id="input" class="form-control" placeholder="Enter name" required autofocus>
			
			<input type="email" name="author_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
			
			<input type="password" name="author_password" id="inputPassword" class="form-control" placeholder="Password" required>
		
			<button class="btn btn-lg btn-primary btn-block" name="signup" type="submit">Sign Up</button>
			
			</form>
		</div> -->

		<div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Please Sign up</h5>
                        <form method="post" class="form-signin">
							<div class="form-label-group">
								<input type="text" name="author_name" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
								<label for="inputUserame">Your Name</label>
							</div>

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
							<a class="d-block text-center mt-2 small pb-4" href="login.php">Sign In</a>
							
              
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" name="signup" type="submit">Register</button>
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- ./ card -->
            </div><!-- ./ col-md-9 -->
        </div><!-- ./ row -->
    </div><!-- ./ container -->
		
		<?php 
			if(isset($_POST['signup'])){
				
				$author_name = mysqli_real_escape_string($conn, $_POST['author_name']);
				$author_email = mysqli_real_escape_string($conn, $_POST['author_email']);
				$author_password = mysqli_real_escape_string($conn, $_POST['author_password']);
				
				//checking for empty fields
				if(empty($author_name) OR empty($author_email) OR empty($author_password)){
					header("Location: signup.php?message=Empty+PLACESS");
					exit();
				}
				
				//checking for validity of email
				if(!filter_var($author_email,FILTER_VALIDATE_EMAIL)){
					header("Location: signup.php?message=Please+Enter+A+Valid+email");
					exit();
				}else{
					//If email exists
					$sql = "SELECT * FROM `author` WHERE `author_email`='$author_email'";
				
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0){
						header("Location: signup.php?message=Email+Already+Exists");
						exit();
					} else {
						//hashing password
						$hash = password_hash($author_password, PASSWORD_DEFAULT);
						
						//Signing Up the USER
						//$sql = "INSERT INTO `author` ('author_name', 'author_email', 'author_password','author_bio', 'author_role') VALUES('$author_name','$author_email','$hash','Enter Bio', 'author')";
						$sql = "INSERT INTO `author` (`author_name`, `author_email`, `author_password`, `author_bio`, `author_role`) VALUES ('$author_name', '$author_email', '$hash', 'Enter Bio', 'author')";
						
						if(mysqli_query($conn, $sql)){
							header("Location: signup.php?message=SuccessFully+Registered");
							exit();
						}else{
							header("Location: signup.php?message=Registration+Failed");
							exit();
						}
					}
				}
			}
		?>
    



</body>
</html>

