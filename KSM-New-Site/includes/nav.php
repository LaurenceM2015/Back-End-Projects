 <?php ini_set("display_errors", 1);
  //include "include/header.php";
  include_once "includes/connection.php";
 ?>

 <!-- MAIN NAVIGATION -->
  
  <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container-fluid">
      <img href="/ind" srcset="<?php getHeroValue("ksm_logo_1x"); ?> 1x, <?php getHeroValue("ksm_logo_x2"); ?> x2" alt="Karate Shotokan Mardie logo" class="navbar__logo-img navbar-brand js-scroll-trigger">

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar__nav navbar-nav ml-auto">

            <?php
                $sql = "SELECT * FROM `navbar_two` ORDER BY navbar_id ASC";
                $result = mysqli_query($conn, $sql);
      
                while($row=mysqli_fetch_assoc($result)){
                  $navbar_slug = $row['navbar_slug']; 
                  $navbar_title = $row['navbar_title'];
                   
                    echo    '<li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="'.$navbar_slug.'">'.$navbar_title.'</a>
                        </li>
                        ';
                }
            ?>
        </ul>

      </div>
    </div>
</nav>