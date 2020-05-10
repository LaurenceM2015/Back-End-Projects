<?php
include_once "includes/connection.php";
include_once "includes/functions.php";
if(!isset($_GET['id'])){
	header("Location: index.php?geterr");
}else{
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	if(!is_numeric($id)){
		header("Location: index.php?numerror");
		exit();
	}else if(is_numeric($id)){
		$sql = "SELECT * FROM page WHERE page_id='$id'";
		$result = mysqli_query($conn, $sql);
		//Check if posts exits
		if(mysqli_num_rows($result)<=0){
			//no posts
			header("Location: index.php?nopagefound");
		}else if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$page_title = $row['page_title'];
				$page_content = $row['page_content'];
				$page_title2 = $row['page_title'];
				
?>
				
			<?php include "includes/header.php"; ?>	

            <body>
                
                <!--NAVIGATION BAR HERE-->
                <?php include_once "includes/nav.php"; ?>
                <!--NAVIGATION BAR ENDS HERE-->

				    <!-- Page Header -->
				<header class="header-blog" style="background-image: url('assets/css/img/chariteHero.jpg')">
					
					<div class="container h-100">
						<div class="row h-100 align-items-center justify-content-center text-center">
						<div class="col-lg-10 align-self-end">
							<h1 class="text-uppercase text-white heading-primary">
								<span class="heading-primary--main">Les Charite que nous Parrainents</span>
							</h1>
						
						</div>
						<div class="col-lg-8 align-self-baseline">
							<p class="text-white-75 font-weight-light mb-5"></p>
						
						</div>
						</div>
					<div>
				</header>
                    
                    
                <div class="container">
                            <h1 style="width:100%;background-color:grey;padding-top:25px;padding-bottom:25px;text-align:center;color:white"><?php echo $page_title2; ?></h1>
                            <hr>
                            
                            <p><?php echo $page_content; ?></p>
                            
                </div>

                        <!-- footer goes here -->
                <?php include "includes/footer.php"; ?>
                    
                
                            
                
            </body>
        </html>
				
				
				<?php
			}
		}
	}
}
?>