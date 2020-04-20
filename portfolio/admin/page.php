
<?php 
 ini_set("display_errors", 1);
 include_once "../includes/header.php";
 include_once "../includes/connection.php";
 session_start();
 if(isset($_SESSION['author_role'])){
    if($_SESSION['author_role']=="admin"){
 ?>

  <nav class="navbar navbar-dark sticky-top bg-dark shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Laurence Malonga</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid" id="page-content">
  <div class="row">
    <?php include_once "nav.inc.php"; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Pages</h1>
                <h6>Howdy <?php echo $_SESSION['author_name']; ?> | Your role is <?php echo $_SESSION['author_role']; ?></h6>
        </div> 

        <div id="admin-index-form" class=" admin-index-form">
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
              <h1>All Pages:</h1>
              <button id="toggleForm" class="btn btn-info">Add New</button>      </div> <!-- ./ admin-index-form -->
           

            <div style="display:none" id="newPageForm">
                <hr>
				<form action="newpage.php" method="post">
					<input type="text" name="page_title" class="form-control" placeholder="Enter Page Title"><br>
                    <input type="text" name="page_subtitle" class="form-control" placeholder="Enter Page Subtitle"><br>
					<textarea name="page_content" class="form-control" rows="3" placeholder="Enter Content"></textarea><br>
					<button name="submit" class="btn btn-success">Add Page</button><br><br>
				</form>
			</div>

            <table class="table mt-5">
				  <thead>
					<tr>
					  <th scope="col">Page Id</th>
					  <th scope="col">Page Title</th>
                      <th scope="col">Page Subtitle</th>
					  <th scope="col">Actions</th>
					  
					</tr>
				  </thead>
				  <tbody>
				  <?php
					$sql = "SELECT * FROM `page` ORDER BY page_id DESC";
					$result = mysqli_query($conn, $sql);
					while($row=mysqli_fetch_assoc($result)){
                        $page_id = $row['page_id'];
                        $page_image = $row['page_image']; 
                        $page_title = $row['page_title'];
                        $page_subtitle = $row['page_subtitle']; 
						
					
					?>
					<tr>
					  <th scope="row"><?php echo $page_id;?></th>
                      <td><img class="img-thumbnail" src="../<?php echo $page_image; ?>" width="50px" height="50px"></td>
					  <td><?php echo $page_title;?></td>
                      <td><?php echo $page_subtitle;?></td>
				
					 
					  <td>
                        <a href="editpage.php?id=<?php echo $page_id;?>">
                            <button class="btn btn-info">Edit</button>
                        </a> 
                        <a onclick="return confirm('Are You sure');" href="deletepage.php?id=<?php echo $page_id;?>">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                        </td>
					   
			</tr>
			
			<?php }?>
				  
				  </tbody>
				</table>
        </div> <!-- ./ admin index-form -->
                

    </main> <!-- ./main -->
  </div> <!-- /.Row -->
</div><!-- dashboard container -->


        <script>
            $(document).ready(function(){
                $("#toggleForm").click(function(){
                    $("#newPageForm").slideToggle();
                });
            });
        </script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </body>
</html>

<?php
    }
}else{
	header("Location: login.php?message=Please+Login");
}


?>


