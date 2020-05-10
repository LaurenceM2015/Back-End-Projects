<?php
  session_start(); 
 define("TITLE", "Admin | Home Page");
 include_once "../includes/functions.php";
 include_once "../includes/connection.php";
 
 if(isset($_SESSION['author_role'])){
 ?>
  
  <?php include_once "../includes/header.php"; ?>

  <nav class="navbar navbar-dark sticky-top bg-dark shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/index.php">Karate Shotokan Mardie</a>
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
        <h1 class="h2">Landing Page</h1>
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
              <h1>All Home page Settings</h1>
            
      </div> <!-- ./ admin-index-form -->
      <hr>

      <table class="table">
        <thead>
          <tr>
            <th>Home Section Id</th>
            <th>Home Feature Img</th>
            <th>Home Section Title</th>
            <th>Home Section logo</th>
            <th>Home Section content</th>
            
            <?php if($_SESSION['author_role']=="admin"){ ?>
            <th>Action</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT * FROM `home` ORDER BY home_id DESC";
          $result = mysqli_query($conn, $sql);

          while($row=mysqli_fetch_assoc($result)){
            $home_id = $row['home_id'];
           echo  $home_feature_img = $row['home_feature_img'];
            $home_title = $row['home_title']; 
            $home_logo = $row['home_logo']; 
            $home_content = $row['home_content']; 
             
           
        ?>
      
          <tr>
            <th scope="row"><?php echo $home_id; ?></th>

            <td>
            <img class="img-thumbnail" src="../<?php echo $home_feature_img; ?>" width="50px" height="50px"></td>
            <td><?php echo $home_title; ?></td>
            <td><img class="img-thumbnail" src="../<?php echo $home_logo; ?>" width="50px" height="50px"></td>
            <td><?php echo $home_content; ?></td>

            <?php if($_SESSION['author_role']=="admin"){ ?>
              <td>
                <a href="edithome.php?id=<?php echo $home_id; ?>"><button class="btn btn-info">Edit</button></a>
                <a onclick="return confirm('Are You sure')" href="deletepost.php?id=<?php echo $home_id; ?>"><button class="btn btn-danger">Delete</button></a>
              </td>
            <?php } ?>

          </tr>

        
        <?php } ?>
          
        </tbody>
      </table>
                

    </main>
  </div>
</div><!-- dashboard -->





<?php
}else{
	header("Location: login.php?message=Please+Login");
}


?>

