<?php 
 ini_set("display_errors", 1);
 include_once "../includes/header.php";
 include_once "../includes/connection.php";
 session_start();
 if(isset($_SESSION['author_role'])){
 ?>

  <nav class="navbar navbar-dark sticky-top bg-dark shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
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
        <h1 class="h2">Posts</h1>
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
              <h1>All Posts:</h1>
            <a href="newpost.php"><button class="btn btn-info">Add New</button></a>
      </div> <!-- ./ admin-index-form -->
      <hr>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Post Id</th>
            <th scope="col">Post Image</th>
            <th scope="col">Post Title</th>
            <th scope="col">Post Intro</th>
            <th scope="col">Post author</th>
            <?php if($_SESSION['author_role']=="admin"){ ?>
            <th scope="col">Action</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT * FROM `post` ORDER BY post_id DESC";
          $result = mysqli_query($conn, $sql);

          while($row=mysqli_fetch_assoc($result)){
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title']; 
            $post_intro = $row['post_intro']; 
            $post_content = $row['post_content'];
            $post_image = $row['post_image']; 
             

            $sqlauth = "SELECT * FROM author WHERE author_id='$post_author'";
            $resultauth = mysqli_query($conn, $sqlauth);
            while($authrow=mysqli_fetch_assoc($resultauth)){
            $post_author_name = $authrow['author_name'];
          
        ?>
      
          <tr>
            <th scope="row"><?php echo $post_id; ?></th>
            <td><img class="img-thumbnail" src="../<?php echo $post_image; ?>" width="50px" height="50px"></td>
            <td><?php echo $post_title; ?></td>
            <td><?php echo $post_intro; ?></td>
            <td><?php echo $post_author_name; ?></td>

            <?php if($_SESSION['author_role']=="admin"){ ?>
              <td>
                <a href="editpost.php?id=<?php echo $post_id; ?>"><button class="btn btn-info">Edit</button></a>
                <a onclick="return confirm('Are You sure')" href="deletepost.php?id=<?php echo $post_id; ?>"><button class="btn btn-danger">Delete</button></a>
              </td>
            <?php } ?>

          </tr>

        
        <?php } } ?>
          
        </tbody>
      </table>
                

    </main>
  </div>
</div><!-- dashboard -->





<?php
}else{
	header("Location: login.php?message=Please+Login");
}

include "../includes/footer.php";
?>

