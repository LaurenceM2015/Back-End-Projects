<?php
  define("TITLE", "KSM | Page Terre Des Enfant"); 
  include "includes/header.php";
  include "includes/connection.php";
  include "includes/functions.php";
 
?>

  <body id="page-top">

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container-fluid">
          <img href="#page-top" srcset="assets/img/ksmLogo95x59.png 1x, assets/img/ksmLogo196x148.png x2" alt="Karate Shotokan Mardie logo" class="navbar__logo-img navbar-brand js-scroll-trigger">
    
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar__nav navbar-nav ml-auto">
    
              <li class="navbar__item nav-item">
                <a class="navbar__link nav-link js-scroll-trigger" href="index.html">Home</a>
              </li>
              
              <li class="navbar__item nav-item">
                <a class="navbar__link nav-link js-scroll-trigger" href="blog.html">Les Info De KSM</a>
              </li>
    
              <li class="navbar__item nav-item">
                  <a class="navbar__link nav-link js-scroll-trigger" href="charities.html">Nos Charite</a>
              </li>
    
            </ul>
    
          </div>
        </div>
      </nav>

   
    <!-- Page Header -->
  <header>
    <!-- Section Les Remerciment -->
    <?php include "template_part/content-home-ksm-remerciment.php"; ?>
    
    
  </header>


       <!-- Blog Section -->
  <main class="section-features">
     <!-- Section Les Charite -->
  <section class="section-charite page-section " id="charite">
        
    <div class="container">
          
      <div class="row">
        <div class="col-md-12">
          <h2 class="heading-secondary heading-secondary--1 mb-5 pb-5 text-center">Terre Des Enfant</h2>
        </div>
      </div>
          
      <div class="row wow fadeIn align-items-center section-primary no-gutters">

        <div class="col-lg-6">
          <div class="article h-100 wow fadeInLeft">
            <div class="article__left h-100 w-100">
                <img src="assets/img/terredesenfant1.jpg" alt="Stage" class="img-fluid w-100 article__img">
                <img src="assets/img/terredesenfant2.jpg" alt="Stage" class="img-fluid w-100 article__img">
            </div>
          </div>
        </div>
           
        <div class="col-lg-6">
          <div class="article h-100 wow fadeInRight px-5">
            <div class="article__right h-100">
                <p class="lead">
                    Au cours de cette journée qui a vu passer près de 100 personnes dans notre petite salle polyvalente qui nous tient lieu de dojo, et grâce à votre contribution à tous, nous avons pu réunir 1840 € qui sont intégralement transférés à Terre des enfants qui se chargera elle-même d'approvisionner le compte de Démiséyélé. Fabien Poullin, professeur du KSM et ses assistants envoient également un très grand merci aux enfants du KSM 
                    qui se sont mobilisés et nous ont proposé une démonstration après le stage qui était déjà intensif. Merci à tous
                </p>
            </div>
          </div>

        </div>

      </div><!-- row -->
          
    </div><!-- container -->
      
  </section>


  <section class="section-bkg__img section-bkg__img--1 page-section h-100 parallax-window" data-z-index="1" data-parallax="scroll" data-image-src="assets/css/img/remerciment-min.jpg">
    <div class="container info h-100">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-white heading-secondary heading-secondary--1">Remerciment</h2>
      </div>
    </div><!-- row 1 -->
      
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center my-5">
        <div class="stage__box wow fadeIn h-100">
            
            <p class="lead text-center">
              Nous tenons à remercier l'ensemble des enfants qui chaque année font preuve de sérieux, de courage, 
              de respect et d'assiduité dans leur pratique et pendant les différentes manifestations et compétitions.
            </p>
            
        </div>
      
      </div>
    </div>
  </div><!-- container -->
</section>

<section class="section-gallery page-section">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <h2 class="heading-secondary heading-secondary--1 mb-5 pb-5 text-center">L'Afrique En Sac a Dos</h2>
      </div>
    </div>

    <div class="row no-gutters galleryShowcase">
  
      <div class="col-md-2 col-md-4">
        <div class="parent" onclick="">
          <div class="child bg-three">
            <img src="assets/img/Afrique/Bamako-Mali-afrique1-min.jpg" alt="">
            <span>Bamako, Mali</span>
          </div>
        </div>
      </div><!-- ./ box 1 -->
  
      <div class="col-md-2 col-md-4">
        <div class="parent right" onclick="">
          <div class="child bg-four">
            <img src="assets/img/Afrique/Bamako-Mali-afrique2-min.jpg" alt="">
            <span>Bamako, Mali</span>
          </div>
        </div>
      </div> <!-- ./ box 2 -->
  
      <div class="col-md-2 col-md-4">
        <div class="parent" onclick="">
          <div class="child bg-five">
            <img src="assets/img/Afrique/Senegal-Dakar-affique-min.jpg" alt="">
            <span>Dakar, Senegal</span>
          </div>
        </div>
      </div><!-- ./ box 3 -->
        
      <div class="col-md-2 col-md-4">
        <div class="parent right" onclick="">
          <div class="child bg-six">
            <img src="assets/img/Afrique/cote-ivoire-afrique-min.jpg" alt="Fabien Poullin en stage on cote d'ivoir">
            <span>Cote d'Ivoire, Afrique</span>
          </div>
        </div>
      </div> <!-- ./ box 4-->
  
  
      <div class="col-md-2 col-md-4">
        <div class="parent" onclick="">
          <div class="child bg-one">
            <img src="assets/img/Afrique/fabien-min.jpg" alt="">
            <span>Fabien En Afrique</span>
          </div>
        </div>
      </div><!-- ./ box 5 -->
  
      <div class="col-md-2 col-md-4">
        <div class="parent right" onclick="">
          <div class="child bg-two">
            <img src="assets/img/Afrique/fabien1-min.jpg" alt="">
            <span>Fabien En Afrique</span>
          </div>
        </div>
      </div>
        
    </div>
  </div>
</section>

  
  </main><!-- ./ main content -->

        

  <footer class="footer">
		<div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-4">
          <p><a href="/"><img class="footer__logo" src="assets/img/ksmLogo95x59.png" alt="Karate Shotokan Mardie Site"></a></p>
        </div><!-- end col -->
        <div class="col-md-4">
          <nav class="text-center secondary-navbar navbar navbar-expand-sm">
            <ul class="navbar-nav">
              <li class="nav-item"><a href="" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="" class="nav-link">Les Enfo</a></li>
              <li class="nav-item"><a href="" class="nav-link">Nos Charite</a></li>
            </ul>
          </nav>
        </div><!-- end col -->
        <div class="col-md-4">
          <p class="text-right">Karate Shotokan Mardie Copyright &copy; 2014 - build by: <a href="http://laurencemalonga.com/" target="_blank">Lauence M</a></p>
        </div><!-- end col -->
      </div>
		</div><!-- container -->
	</footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- jquery parallax plugin -->
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/js/wow.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
      new WOW().init();
    </script>
  </body>
</html>


      
           <!-- 
             <figcaption class="gallery-inline__caption">
                  <span class="gallery-inline__caption-content">
                    <h4>Téléthon</h4>
                  </span>
                </figcaption>
           -->
