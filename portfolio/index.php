<?php 
  include ("includes/header.php");
?>

  <body id="page-top">
        <!-- Navigation -->
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav">
        <div class="container-fluid">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Laurence Malonga</a>
          
          <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              Menu
              <i class="fas fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarResponsive">
          <?php include_once "includes/nav.php"; ?>
          </div>
        </div>
    </nav>
         <!-- ./ Navbar -->
         <!-- Header -->
     <!-- Masthead -->
    <header class="masthead bg-primary text-white text-center d-flex  flex-column justify-content-center" id="header">
        <div class="container d-flex align-items-center flex-column">
    
          <h1 class="masthead-heading text-uppercase mb-5">
                <span class="heading-primary--main"><?php echo $log_name; ?></span>
                <span class="heading-primary--sub"><?php echo $job_title ?></span>
          </h1>
    
          <!-- Header BTN -->
          <a href="#feature" class="Btn Btn--white Btn--animated js-scroll-trigger">Visit The Page &rarr;</a>
        </div>
    </header>
         
    <main id="homePage-main-container">

      <!-- Feature Section -->
      <!-- Feature Section -->
      <section class="page-section feature-section mb-0" id="feature">
        <div class="container">

          <div class="row">
            <div class="col-lg-12 py-5">
              <h2 class="heading-secondary page-section-heading text-uppercase">What I can do</h2>
              <p class="pt-3 long-copy lead">I enjoy building an advance responsive design layout, which multiple browsers platforms. With a usse of CSS Press-processors, I create large css libriary, with reusable across all projects, and easy to maintain.
                I love creating my own website themes, from scrath or third party libriary, and Convert theme or into a Custom WordPress theme.</p>
            </div>
          </div><!-- ./ row -->
          <!-- About Section Content -->
           
          <div class="row">
              
            <?php 
              foreach ($services as $service) { ?>

                <div class="col-md-6">
                  <div class="feature-box feature-box--card feature-box--border js-move-in-on-scroll">
                    <div class="feature-box--header">
                      <?php echo $service["icon"]; ?>
                      <h3 class="heading-tertiary"><?php echo $service["title"]; ?></h3>
                    </div>
                    <ul class="list-unstyled feature-box__text">
                    <?php 
                    $description = $service["newdesc"];
                for($i=0;$i<=count($service["newdesc"]);$i++) { ?>
                <li><?=$description[$i]?>
                </li>
                <?php } ?>
                </ul>
                  </div><!-- feature box 1 -->

                </div><!-- ./col-md-6 -->

              <?php } ?>
            
          </div>


          </div><!-- ./ container -->
      </section>
        
                
        <!-- Portfolio Grid -->
      <section class="page-section portfolio-section portfolio bg-light" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center mb-5">
              <h2 class="heading-secondary page-section-heading text-center text-secondary">My Work Projects</h2>
              <p class="text-muted pt-3">My most latest project that I worked with.</p>
            </div>
        </div>

        <div class="row no-gutters">
                  <!-- Portfolio Item 1 -->
            <?php $index=1;
            foreach ($portfolioItems as $portfolioItem) { ?>
            <div class="col-lg-6">
              <a class="portfolio-item" data-toggle="modal" data-target="#portfolioModal<?=$index++?>">
                <span class="caption d-flex align-items-center justify-content-center w-100">
                  <span class="caption-content text-center">
                    <i class="fas fa-plus fa-3x"></i>
                    <h3><?php echo $portfolioItem["title"]; ?></h3>
                    <p class="mb-0"><?php echo $portfolioItem["subTitle"]; ?></p>
                  </span>
                </span>
                <img class="img-fluid" src="resources/img/<?php echo $portfolioItem["img"]; ?>.jpg" alt="">
              </a>
            </div>
            <?php } ?>
          </div><!-- ./ end row -->

          <div class="row my-5 py-5">
            <div class="col-lg-12 text-center mt-4">
              <a href="#" class="Btn Btn--green">Visit The Page &rarr;</a>
            </div>
          </div>

            </div> 
            <!-- ./ end container -->
      </section>
      <!-- About Section -->
      <section class="page-section about-section text-white text-center mb-0" id="process">
            <div class="container">

            <div class="row">
              <div class="col-lg-12 text-center py-5">
                <h2 class="heading-secondary heading-secondary--white page-section-heading text-center text-uppercase">The Build Process, &amp; architecture</h2>
                <p class="text-white pt-3 long-copy lead">I work is based on the  three pillar of: writing good maintainable and scalable html codes. Making the Website Performance fast &amp; efficiently.
                     with clean HTML structure for naming classes, with easy-to-understand, Growth &amp; Reusable</p>
              </div>
              </div><!-- ./ row -->
            <!-- About Section Content -->
             
            <div class="row text-muted">

              <?php 
                foreach ($processItems as $processItem) { ?>  

                <!-- feature box 1 -->
                <div class="col-md-3 col-lg-6 mb-5">
                  <div class="feature-box feature-box--hover h-100">
                  <?php echo $processItem["icon"]; ?>
                      <h3 class="heading-tertiary u-margin-bottom-small"><?php echo $processItem["title"]; ?></h3>
                      
                      <ul class="feature-box__text list-unstyled">
                      
                  <?php $description = $processItem["processList"];
                    for($i=1;$i<=count($processItem["processList"]);$i++) { ?>
                  <li><i class="feature-box__icon feature-box__icon--small fas fa-check"></i><?=$description[$i]?></li>
                    
                  <?php } ?>
                  </ul>
                    
                  </div>
    
            </div>

          <?php } ?>
        </div>

            </div>
            <!-- ./ container -->
      </section>
        <!-- SKILLS SECTION -->
        
      <section class="page-section bg-light skills-section" id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center my-5">
              <h2 class="heading-secondary page-section-heading text-center text-uppercase py-5">About Me</h2>
      
            </div>
          </div><!-- ./ row -->

          <!-- Featured Project Row -->
          <div class="about-cards">
                   
            <div class="profile-img">
              <img class="img-fluid mb-3 mb-lg-0" src="resources/img/profil2.jpg" alt="">
            </div>
                        
            <div class="top-box top-box-a">
              <div class="about-card-header text-left">
                <h3 class="heading-tertiary text-left">Laurence Malonga</h3>
              </div>
              <p class="">A clear communicator with strong team ethic. Has genuine passion for web &amp; visually appealing design. Maintains a motivated and focused approach to developing new skills and knowledge. Regularly works on &amp; releases independent personal projects</p>
              <p class="">Creative & disciplined developer with over 3 year experience in front end development and some experience in back-end developer. Will take the initiative, solve problems & learn new technologies.<
            
              <div class="top-box top-box-b text-left">
                <h3 class="heading-tertiary text-left">Skills sets</h3>
                <div class="text-center">
                <ul class="list-inline dev-icons">
                  <li class="list-inline-item">
                    <i class="fab fa-html5"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fab fa-css3-alt"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fab fa-js-square"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fab fa-angular"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fab fa-react"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fab fa-wordpress-simple"></i>
                  </li>

                  <li class="list-inline-item">
                    <i class="fab fa-php"></i>
                  </li>
                  
                  <li class="list-inline-item">
                    <i class="fab fa-node-js"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fab fa-sass"></i>
                  </li>
                  <li class="list-inline-item">
                    <i class="fab fa-less"></i>
                  </li>
                
                  <li class="list-inline-item">
                    <i class="fab fa-npm"></i>
                  </li>
              </ul>
                </div> <!-- skill sets -->
              </div><!-- ./row -->
            </div><!-- about card -->
          </div><!-- container -->
       

        <div class="row my-5 py-5">
            <div class="col-lg-12 text-center mt-4">
              <a href="#" class="Btn Btn--green">Visit The Page &rarr;</a>
            </div>
        </div>
        </div><!-- ./ container -->
      </section>
        <!-- CANTACT FORM -->
      <section class="page-section contact-section" id="contact">
        <div class="bg-video">
          <video class="bg-video__content" autoplay muted loop>
              <source src="resources/img/video.mp4" type="video/mp4">
              <source src="resources/img/video.webm" type="video/webm">
              Your browser is not supported!
          </video>
        </div>

        <div class="container">
    
          <!-- Contact Section Heading -->
          <h2 class="page-section-heading text-center heading-secondary text-secondary mb-5">Contact Me</h2>
    
          <!-- Icon Divider -->
          
    
          <!-- Contact Section Form -->
          <div class="card">
          <div class="row">
              
            <div class="col-lg-8 mx-auto">
                  <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                
                    <form name="sentMessage" novalidate="novalidate" id="contactForm" class="form">
                      <div class="control-group py-5">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2 ">
                          <label>Name</label>
                          <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                          <label>Email Address</label>
                          <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                          <label>Phone Number</label>
                          <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                          <label>Message</label>
                          <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                          <p class="help-block text-danger"></p>
                        </div>
                      </div>
                      <br>
                      <div id="success"></div>
                      <div class="form-group">
                        <button type="submit" class="Btn Btn--green" id="sendMessageButton">Send</button>
                      </div>
                    </form>
              </div>
            </div>
          </div><!-- ./ card -->
    
        </div> <!-- ./ container -->
      </section>
    </main>
      
    <footer class="footer text-center">
          <div class="container-fluid">
            <div class="row">
      
              <!-- Footer Location -->
              <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="footer__nav">
                  <ul class="nav footer__list justify-content-center">
                    <li class="nav-item footer__item ">
                      <a class="nav-link footer__link" href="#about">About</a>
                    </li>
                    <li class="nav-item footer__item ">
                      <a class="nav-link footer__link" href="#portfolio">portfolio</a>
                    </li>
                    <li class="nav-item footer__item ">
                      <a class="nav-link footer__link" href="#contact">Contact</a>
                    </li>
                  </ul>
                </div>
              </div>
      
              <!-- Footer About Text -->
              <div class="col-lg-4">
                
                <p class="lead mb-0">A bootstrap theme build and created by 
                  <a href="#">Laurence Malonga</a>.</p>
              </div>

                <!-- Footer Social Icons -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Follow Me Around</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                      <i class="fab fa-fw fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                      <i class="fab fa-fw fa-twitter"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                      <i class="fab fa-fw fa-linkedin-in"></i>
                    </a>

                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                        <i class="fab fa-fw fa-github-alt"></i>
                      </a>
                    
                  </div>
      
            </div><!-- ./ row -->
          </div> <!-- container -->

        <div class="container">
            <small>Copyright &copy; Laurence M 2019</small>
        </div>
          
    </footer>

       <!-- Copyright Section -->
   
  
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

        <!--SCRIPT FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="resources/js/main.js"></script>
    <script src="resources/js/main.min.js"></script>
        
        
  </body>
</html>

    
      <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  <div class="portfolio-modal modal fade py-5" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center px-5">
              <div class="modal-card-header">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title heading-secondary py-5">Personal Portfolio</h2>
              </div>
                <div class="modal-card-img col-lg-12 text-center">
                  <!-- Portfolio Modal - Image -->
                  <img class="img-fluid rounded mb-5" src="resources/img/LaurenceMalongaPortfolioHeader.jpg" alt="Laurence Malonga Personal Portfolio">
                </div>

                <div class="modal-card-desc">
                     <!-- Portfolio Modal - Text -->
                  <p class="mb-5 long-copy">A simple beautiful responsive single, landing page, with a resources, blog, & contact pages, build from ground up, with, bootrapp framework. Then Convert the static Bootstrap them, into a Easy-to-use wordpress Theme.</p>
                </div>
                <div class="col-md-6">
                  <h4>Features</h4>
                  <ul class="list-unstyled">
                    <li>Responsive, full page header featuring a background image with overlay, with animated vertically centered content &amp; html image</li>
                    <li>Fully functional portfolio image grid with hover captions</li>
                    <li>NPM based development environment with a watch task for rapid custom development</li>
                    <li>JavaScript parallax scrolling effect</li>
                    <li>JavaScript parallax background image</li>
                    <li>UX friendly navigation</li>
                    <li>Custom SASS compiled filed</li>
                  </ul>
                </div>

                <div class="col-md-6 text-left">
                  <div class="tech-used">
                    <h4 class="">Technologies Used</h4>
                    <ul class="list-unstyled">
                      <li>Bootstap</li>
                      <li>HTML5  &amp; CSS3</li>
                      <li>JavaScript &amp; jQuery</li>
                      <li>SASS</li>
                      <li>NPM package</li>
                      <li>WordPress</li>
                    </ul>
                  </div>

                  <div class="tech-used">
                    
                    <ul class="list-unstyled">
                      <li>Category: Single Page, Responsive design</li>
                      <li>Client Based: Mardie, France</li>
                      <li>Date: July 2017</li>
                      <li>Version: 4.0.0</li>
                    </ul>
                  </div>
                    
                </div>
                
                <div class="modal-footer border-0">
                  <a href="resume.html" class="Btn Btn--green">Visit The Page &rarr;</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <!-- Portfolio Modal 2 -->
  <div class="portfolio-modal modal fade py-5" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center px-5">
              <div class="modal-card-header">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title heading-secondary py-5">Patatap Clone Project</h2>
              </div>
                <div class="modal-card-img col-lg-12 text-center">
                  <!-- Portfolio Modal - Image -->
                  <img class="img-fluid rounded mb-5" src="resources/img/patata.png" alt="Patatap Sound Animation">
                </div>

                <div class="modal-card-desc">
                     <!-- Portfolio Modal - Text -->
                  <p class="mb-5 long-copy">Patatap is a portable animation and sound kit. With the touch of a finger create melodies charged with moving shapes. Warning: contains flashing images</p>
                </div>
                <div class="col-md-6">
                  <h4>Features</h4>
                  <ul class="list-unstyled">
                    <li>Press any key on your keyboard to get sound and animation</li>
                    <li>A collection of two dimensional animations that are triggered by sound.</li>
                    <li>Build with JavaScript</li>
                    
                  </ul>
                </div>

                <div class="col-md-6 text-left">
                  <div class="tech-used">
                    <h4 class="">Technologies Used</h4>
                    <ul class="list-unstyled">
                      <li>HTML5</li>
                      <li>Paper.js Animation</li>
                      <li>Howler.js</li>
                      <li>JavaScript</li>
                      <li>SASS</li>
                      <li>NPM package</li>
                      
                    </ul>
                  </div>

                  <div class="tech-used">
                    
                    <ul class="list-unstyled">
                      <li>Canvas Animation</li>
                      <li>JavaScript Project</li>
                      <li>Date: June 2019</li>
                      <li>Version: 1.0.0</li>
                    </ul>
                  </div>
                    
                </div>
                
                <div class="modal-footer border-0">
                  <a href="http://laurencemalonga.com/patatapClone/circles.html" class="Btn Btn--green">Visit The Page &rarr;</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
     <!-- Portfolio Modal 3 -->
  <div class="portfolio-modal modal fade py-5" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center px-5">
              <div class="modal-card-header">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title heading-secondary py-5">Lili World Beauty Cosmetics</h2>
              </div>
                <div class="modal-card-img col-lg-12 text-center">
                  <!-- Portfolio Modal - Image -->
                  <img class="img-fluid rounded mb-5" src="resources/img/lileworldLogo.jpg" alt="Lili world beauty Cosmetics">
                </div>

                <div class="modal-card-desc">
                     <!-- Portfolio Modal - Text -->
                  <p class="mb-5 long-copy">A simple beautiful responsive single, landing page, with a resources, blog, & contact pages, build from ground up, with, bootrapp framework. Then Convert the static Bootstrap them, into a Easy-to-use wordpress Theme.</p>
                </div>
                <div class="col-md-6">
                  <h4>Features</h4>
                  <ul class="list-unstyled">
                    <li>Responsive, full page header featuring a background image with overlay, with animated vertically centered content &amp; html image</li>
                    <li>Fully functional portfolio image grid with hover captions</li>
                    <li>NPM based development environment with a watch task for rapid custom development</li>
                    <li>JavaScript parallax scrolling effect</li>
                    <li>JavaScript parallax background image</li>
                    <li>UX friendly navigation</li>
                    <li>Custom SASS compiled filed</li>
                  </ul>
                </div>

                <div class="col-md-6 text-left">
                  <div class="tech-used">
                    <h4 class="">Technologies Used</h4>
                    <ul class="list-unstyled">
                      <li>Bootstap</li>
                      <li>HTML5  &amp; CSS3</li>
                      <li>JavaScript &amp; jQuery</li>
                      <li>SASS</li>
                      <li>NPM package</li>
                      <li>WordPress</li>
                    </ul>
                  </div>

                  <div class="tech-used">
                    
                    <ul class="list-unstyled">
                      <li>Category: Single Page, Responsive design</li>
                      <li>Client Based: Mardie, France</li>
                      <li>Date: July 2017</li>
                      <li>Version: 1.0.0</li>
                    </ul>
                  </div>
                    
                </div>
                
                <div class="modal-footer border-0">
                  <a href="http://laurencemalonga.com/liliworldbeauty/" target="_blank" class="Btn Btn--green">Visit The Page &rarr;</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <!-- Portfolio Modal 4 -->
  <div class="portfolio-modal modal fade py-5" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioModal4Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center px-5">
              <div class="modal-card-header">
                <!-- Portfolio Modal - Title -->
                <h2 class="portfolio-modal-title heading-secondary py-5">Karate Shotokan Mardie</h2>
              </div>
                <div class="modal-card-img col-lg-12 text-center">
                  <!-- Portfolio Modal - Image -->
                  <img class="img-fluid rounded mb-5" src="resources/img/KarateShotokanMardie.jpg" alt="Karate Shotokan Mardie, France">
                </div>

                <div class="modal-card-desc">
                     <!-- Portfolio Modal - Text -->
                  <p class="mb-5 long-copy">A simple beautiful responsive single, landing page, with a resources, blog, & contact pages, build from ground up, with, bootrapp framework. Then Convert the static Bootstrap them, into a Easy-to-use wordpress Theme.</p>
                </div>
                <div class="col-md-6">
                  <h4>Features</h4>
                  <ul class="list-unstyled">
                    <li>Responsive, full page header featuring a background image with overlay, with animated vertically centered content &amp; html image</li>
                    <li>Fully functional portfolio image grid with hover captions</li>
                    <li>NPM based development environment with a watch task for rapid custom development</li>
                    <li>JavaScript parallax scrolling effect</li>
                    <li>Smooth scrolling animations</li>
                    <li>Scrollspy that highlights active page sections</li>
                    <li>Custom SASS compiled filed</li>
                  </ul>
                </div>

                <div class="col-md-6 text-left">
                  <div class="tech-used">
                    <h4 class="">Technologies Used</h4>
                    <ul class="list-unstyled">
                      <li>Bootstap</li>
                      <li>HTML5  &amp; CSS3</li>
                      <li>JavaScript &amp; jQuery</li>
                      <li>SASS</li>
                      <li>NPM package</li>
                      <li>WordPress</li>
                    </ul>
                  </div>

                  <div class="tech-used">
                    
                    <ul class="list-unstyled">
                      <li>Category: Single Page, Responsive design</li>
                      <li>Client Based: Mardie, France</li>
                      <li>Date: July 2017</li>
                      <li>Version: 4.0.0</li>
                    </ul>
                  </div>
                    
                </div>
                
                <div class="modal-footer border-0">
                  <a href="http://karateshotokanmardie.com/" target="_blank" class="Btn Btn--green">Visit The Page &rarr;</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
   
  
   




    
 