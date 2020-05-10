<!-- header goes heare -->
<?php 
 define("TITLE", "KSM | Page d'accueil");
  include "includes/header.php";
  include "includes/connection.php";
  include "includes/functions.php";
?>
<body>
  <!-- Main Navbar -->
  <?php include "includes/main-nav.php"; ?>
  
    <!-- Hero Section -->
  <?php include "template_part/content-home-header.php"; ?>

  <!-- KSM Lastest Blog --> 
  <?php include "template_part/content-home-blog.php"; ?>

  <!-- Les Stage de KSM -->
  <?php include "template_part/content-home-ksm_stage.php"; ?>

    <!-- LES COMPETITION-->
  <?php include "template_part/content-home-compeRencontre.php"; ?>

  <!-- KSM SLOGAN --> 
  <?php include "template_part/content-home-ksm-slogan.php"; ?>

  <!-- LES Assocation Caritative Telethon -->
  <?php include "template_part/content-home-assoCaritativeThelethon.php"; ?>

  <!-- Section Les Remerciment -->
  <?php include "template_part/content-home-ksm-remerciment.php"; ?>
  
  <!-- Section Les Charite -->
  <?php include "template_part/content-home-ksm-charities.php"; ?>

  <!-- div gallery 

  <section class="section-gallery">
    <div class="container-fluid py-5 px-0 bg-faded">
      <h2 class="heading-secondary heading-secondary--1 mb-5 pb-5 text-center">Nos gallery</h2>
    <div class="card-columns galleryShowcase">
       
    <div class="card parent">
     
      <div class="child">
        <img class="card-img-top img-fluid" src="assets/img/telethon2008-min1.jpg" alt="Card image cap">
        <span>Card Title</span>
      </div>
    </div>
    <div class="card parent">
      <div class="child">
        <img class="card-img img-fluid" src="assets/img/StKarateOuverts-min.jpg" alt="Card image">
      </div>
    </div>
    <div class="card parent">
       <div class="child">
        <img class="card-img-top img-fluid" src="assets/img/Telethon2007-min1.jpg" alt="Card image cap">
       </div>
    </div>
    <div class="card parent">
      <div class="child">
        <img class="card-img-top img-fluid" src="assets/img/Telethon2007-min2.jpg" alt="Card image cap">
      </div>
    </div>
    <div class="card parent">
      <div class="child">
        <img class="card-img-top img-fluid" src="assets/img/institut_ocean.jpg" alt="Card image cap">
      </div>
    </div>
    <div class="card parent">
       <div class="child">
        <img class="card-img-top img-fluid" src="assets/img/LassoSportive-min.jpg" alt="Card image cap">
       </div>
    </div>
    <div class="card parent">
       <div class="child">
        <img class="card-img-top img-fluid" src="assets/img/compRenc-min.jpg" alt="Card image cap">
       </div>
    </div>
    <div class="card parent">
      <div class="child">
        <img class="card-img img-fluid" src="assets/img/compet5-min.jpg" alt="Card image">
      </div>
    </div>
    <div class="card parent">
        <div class="child">
          <img class="card-img-top img-fluid" src="assets/img/stageMemorial-min.jpg" alt="Card image cap">
        </div>
    </div>
    <div class="card parent">
        <div class="child">
          <img class="card-img-top img-fluid" src="assets/img/valerie-min.jpg" alt="Card image cap">
        </div>
    </div>
    <div class="card parent">
       <div class="child">
        <img class="card-img img-fluid" src="assets/img/telethon2008-min2.jpg" alt="Card image">
       </div>
    </div>
    
    <div class="card parent">
      <div class="child">
        <img class="card-img-top img-fluid" src="assets/img/Telethon2007-min2.jpg" alt="Card image cap">
      </div>
    </div>
          
          
         
    </div>
    </div>
  
  </section>
  -->

  <!-- NOS PRINCIPE -->
  <?php include "template_part/content-home-ksm-principe.php"; ?>

  <!-- apropo de nous -->
  <?php include "template_part/content-home-about.php"; ?>
  
    <!-- Contact US -->
  <?php include "template_part/content-home-contactUs.php"; ?>

  <!-- footer-goes here -->
  <?php include "includes/footer.php"; ?>
  </body>
</html>


      
        
