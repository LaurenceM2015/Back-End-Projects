 <?php ini_set("display_errors", 1);
  //include "include/header.php";
  include_once "includes/connection.php";
 ?>

 <!-- MAIN NAVIGATION -->
      
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container-fluid">
      <img href="#page-top" srcset="assets/img/ksmLogo95x59.png 1x, assets/img/ksmLogo196x148.png x2" alt="Karate Shotokan Mardie logo" class="navbar__logo-img navbar-brand js-scroll-trigger">

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar__nav navbar-nav ml-auto">
          <?php 
              $sql    = "SELECT * FROM category";
              $result = mysqli_query($conn, $sql);
              while($row=mysqli_fetch_array($result)){
              $category_id = $row['category_id'];
              $category_name = $row['category_name'];
          ?>

          <li class="navbar__item nav-item">
            <a class="navbar__link nav-link js-scroll-trigger" href="category.php?id=<?php echo $category_id; ?>"><?php echo $category_name; ?></a>
          </li>
          <?php } ?>
          
          
         

        </ul>

      </div>
    </div>
  </nav>