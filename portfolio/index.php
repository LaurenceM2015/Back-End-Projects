<?php 
  //ini_set("display_errors", 1);
  include ("includes/header.php");
  include ("includes/arrays.php");
  include ('includes/functions.php');
  include ('includes/connection.php');
?>

    <?php include "includes/main-nav.php"; ?>
         
     <!-- Masthead Hero section -->
     <?php include "template_parts/home_hero.php"; ?>
    
         
    <main id="homePage-main-container">
      <!-- Feature Section -->
      <?php include "template_parts/home_features.php"; ?>
        
                
      <!-- Portfolio Grid -->
      <?php  include "template_parts/home_portfolio.php"; ?>

     

      <!-- My Process Section -->
      <?php include "template_parts/home_process.php"; ?>
      
      <!-- About Section -->
      <?php include "template_parts/home_about.php"; ?>
      
      <!-- Cantact Section -->
      <?php include "template_parts/home_contact.php"; ?>
      
    </main><!-- ./main container -->
    <?php include "template_parts/footer_section.php"; ?>
   <?php include "includes/footer.php"; ?>

    



   
  
   




    
 