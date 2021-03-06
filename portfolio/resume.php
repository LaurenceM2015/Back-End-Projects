
<?php 
  include "includes/header.php";
  include "includes/functions.php";
  include "includes/connection.php"; 
?>

<body id="page-top" class="body-resume bg-light">

  <!-- RESUME NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top" id="sideNav">

    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none"><?php getSettingValue("about_name"); ?></span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php getHeroValue("about_profile_img"); ?>" alt="">
      </span>
    </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#education">Education</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#interests">Interests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#awards">Awards</a>
        </li>
      </ul>
    </div>
  </nav>

  <header id="resume-header" class="">
    <div class="resume-section" id="about">
      <div class="container py-5">
          <h1 class="heading-primary">
              <span class="heading-primary--main text-secondary">Laurence</span>
              <span class="heading-primary--main heading-primary--main-sub text-primary">Malonga</span>
          </h1>
        <address class="mb-5 text-center">9 Shearwater Road · West Midland, WS3 1DG · (44) 075-9583-3234 · <br>
          <a href="mailto:laurencemalonga@hotmail.com">laurencemalonga@hotmail.com</a>
        </address>
        <hr class="mb-4">
        <p class="lead mb-3">A clear communicator with strong team ethic. Has genuine passion for web &amp; visually appealing design. Maintains a motivated and focused approach to developing new skills and knowledge. 
          Regularly works on &amp; releases independent personal projects</p>
          <p class="lead mb-5">Creative & disciplined developer with over 3 year experience in front end development and some experience in back-end developer. 
          Will take the initiative, solve problems & learn new technologies.</p>
        <div class="social-icons text-center">
          <a href="#" class="social-link">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-github"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="social-link">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
     
    </div>
  </header><!-- ./ resume header -->

  <!-- Resume main container -->
  <main class="resume-main">
    <div class="container">


      
      <!-- resume-section  p-lg-5 d-flex justify-content-center" -->
      <section class="resume-section" id="experience">

        <div class="resume-heading">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading-secondary">Experience</h2>
              <hr class="m-0 resume-hr">
            </div>
            
          </div>
        </div><!-- resume heading -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0 text-md-left heading-tertiary">Senior Web Developer</h3>
            <small class="subheading mb-3">Intelitec Solutions</small>
            <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">March 2013 - Present</span>
          </div>
        </div>
        
        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
              <h3 class="mb-0 text-md-left heading-tertiary card-title">Wordpress Theme Developer</h3>
              <small class="card-subtitle">Freelance</small>
              <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going 
                forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>
          </div>

            <div class="resume-date text-md-right">
              <span class="text-primary">March 2013 - Present</span>
            </div> <!-- ./ resume-date -->
        </div><!-- ./Freelance -->
        
        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
                <h3 class="mb-0 text-md-left heading-tertiary card-title">websites Administator</h3>
                <small class="card-subtitle">Scholl Compass</small>
                <p>Responsible for working on a range of projects, designing appealing websites and interacting on a daily basis with graphic designers, back-end developers and marketers.</p>

            </div>
  
            <div class="resume-date text-md-right">
                <div class="resume-date text-md-right">
                  <span class="text-primary">Oct 2018 - April 2019</span>
                </div>
            </div><!-- ./ resume-date -->
        </div><!-- school compass -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0 text-md-left heading-tertiary card-title">Web Developer</h3>
            <small class="card-subtitle">Gymshark</small>
            <p>Responsible for working on a range of projects, designing appealing websites and interacting on a daily basis with graphic designers, back-end developers and marketers.</p>
          </div>

            <div class="resume-date text-md-right">
              <span class="text-primary">March 2013 - Present</span>
            </div>
            
        </div><!-- Gymshark -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0 text-md-left heading-tertiary card-title">Junoir Developer</h3>
            <small class="card-subtitle">De Banke Group, Solihull</small>

            <p>
              Created and implemented a custom CSS grid system, with CSS media queries for mobile responsiveness.
              Increased front-end efficiency by transferring the blogs over to CMS and brand-associated them with the main site.
            </p>

            <p>
              Created and maintained the front-end standards document and oversaw production of Javascript, HTML, and CSS (and PHP blog).
              Leveraged responsive web frameworks to consistently complete product deliverables ahead of schedule. & Participated in projects in all stages of the product life cycle.
              Tested front-end code in multiple browsers to ensure cross-browser compatability.
            </p>
          </div>

          <div class="resume-date text-md-right">
            <span class="text-primary">March 2013 - Present</span>
          </div>
            
        </div><!-- De banke ground -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
              <h3 class="mb-0 text-md-left heading-tertiary card-title">Front-End Developer</h3>
              <small class="card-subtitle">Freelance</small>
              <p>
                  Website Maintenance: Hosting account, updating file, CMS Administrator such as WordPress, domain name system mail servers, firewalls and security.
                  Responsive Design: for the use of mobile web and tablet computing. Coding using front-end technologies, such as CSS3 and HTML5, JavaScript. Ensure site usability, SEO, web standards
              </p>
              <p>
                  Created and maintained the front-end standards document and oversaw production of Javascript, HTML, and CSS (and PHP blog).
                  Back-End Developer: Knowledge of back-end & front- end technologies such, and PHP MySQL & Nodejs.
              </p>
          </div><!-- ./resume-content -->
  
          <div class="resume-date text-md-right">
            <span class="text-primary">March 2013 - Present</span>
          </div>
          
        </div><!-- freelance -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
              <h3 class="mb-0 text-md-left heading-tertiary card-title">IT administration</h3>
              <small class="card-subtitle">Data4Real LTD</small>
              <p>
                Maintain the IT Asset Management System ensuring that all assets are recorded and up-dated/removed when required.
              </p>

              <p>
                  Provide general administrative support to the IT Support Team. Maintain staff accounts for email, management information
              </p>
            
          </div><!-- ./resume-content -->

          <div class="resume-date text-md-right">
            <span class="text-primary">Oct 2018 - April 2019</span>
          </div>
          
        </div><!-- Data 4 Real -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0 text-md-left heading-tertiary card-title">Software Developer</h3>
            <small class="card-subtitle">Clavis Technology, Ireland</small>
           
            <p>Produce reasonable estimates for tasks and meeting project schedules. Deploy and provide support to the latest releases of Clavis.                
                </p>
  
                <p>
                  Implement, test, and bug-fix well-defined functionality Participate in functional & design specifications
                  Developing new components. Marcurial SCM and GitHub
                </p>
            </div><!-- resume-item -->
  
            
            <div class="resume-date text-md-right">
              <span class="text-primary">2010 - 2011</span>
            </div>
            
          </div><!-- Data 4 Real -->
      </section><!-- ./ experience -->


      <section class="" id="education">

          <div class="resume-heading">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="heading-secondary">Education</h2>
                  <hr class="m-0 resume-hr">
                </div>
                
              </div>
          </div><!-- resume heading -->

          
          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
              <h3 class="card-title heading-tertiary text-md-left">Web Development</h3>
              <small class="card-subtitle">Codecademy</small>
           
            
              <ul class="">
                <li class="">Building Interactive JavaScript Websites</li>
                <li class="">Building Front-end Applications with React</li>
                <li class="">JavaScript Back-End Development</li>
                <li class="">SQL and Databases for Web Development</li>
                <li class="">Building a Persistent API</li>
                <li class="">Test-Driven Development with JavaScript</li>
              </ul>
            </div> <!-- ./ resume-content -->
           
            <div class="resume-date text-md-right">
              <span class="text-primary">August 2006 - May 2010</span>
            </div>
            
          </div><!-- Codeacademy  Ireland -->

          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
              <h3 class="card-title heading-tertiary text-md-left">DDP online Training</h3>
              <small class="card-subtitle">Just IT London</small>
            
              <ul class="">
                <li class="">MTA 98-361 – Software Development Fundamentals (expected 2019)</li>
                <li class="">MTA 98-363 – Web Development Fundamentals (expected 2019)</li>
                <li class="">MTA 98-375 – HTML5 Application Development Fundamentals (expected 2019)</li>
              </ul>
            </div>

            <div class="resume-date text-md-right">
              <span class="text-primary">August 2006 - May 2010</span>
            </div>
            
            
          </div><!-- Just IT  London -->

          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
              <h3 class="card-title heading-tertiary text-md-left">Software Developer</h3>
              <small class="card-subtitle">Computure Science, NCIRL, Ireland</small>
            
              <ul class="">
                <li class="">Math, Software Applications for Business, Computing, &amp; IT Project Management,
                    &amp; Analysis, Entrepreneurship,</li>
                <li class="">Web, Graphics, &amp; Computer Design, Animation, Multimedia &amp; Intro to AI Services.</li>
                <li class=""> API Development, Operating Systems, Wireless Networking Software Engineering &amp; Project.</li>
                <li class="">  Data Structures, &amp; Communications, Programming, OOP, Database,  &amp; Architecture.</li>

              </ul>
            </div>
  
           
            <div class="resume-date text-md-right">
              <span class="text-primary">August 2006 - May 2010</span>
            </div>
          </div><!-- NCIRL  Ireland -->
      </section><!-- education -->

    
<!-- resume-section p-3 p-lg-5 d-flex align-items-center -->
      <section class="" id="skills">
        <div class="resume-heading">
            <div class="row">
              <div class="col-md-12">
                <h2 class="heading-secondary"><?php getSettingValue("about_subtitle"); ?></h2>
                <hr class="m-0 resume-hr">
              </div>
              
            </div>
        </div><!-- resume heading -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="card-title heading-tertiary text-md-left"> Workflow</h3>
          
            <ul class="fa-ul mb-0">
              <li>
                <i class="fa-li fa fa-check"></i>
                Mobile-First, Responsive Design</li>
              <li>
                <i class="fa-li fa fa-check"></i>
                Cross Browser Testing &amp; Debugging</li>
              <li>
                <i class="fa-li fa fa-check"></i>
                Integrated Facebook, Twitter, and YouTube API.
              </li>
              <li>
                <i class="fa-li fa fa-check"></i>
                Understanding of W3C standards, web accessibility & best practice.
              </li>
            </ul>
          </div><!-- ./ resume-content -->
          
        </div><!-- ./ resume-item -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="heading-tertiary card-title text-md-left">Front-End Skills</h3>
          
            <div class="row text-center">
              <ul class="list-inline dev-icons">
                <?php
                  $sql = "SELECT * FROM `icons` ORDER BY icon_id";
                  $result = mysqli_query($conn, $sql);
                  while($row=mysqli_fetch_assoc($result)){
                  $icon_id = $row['icon_id'];
                  $icon_name = $row['icon_name']; 
                ?>
                  <li class="list-inline-item">
                    <i class="<?php echo $icon_name; ?>"></i>
                  </li>
                <?php } ?>
              </ul>
                  
            </div>
          </div>
           
        </div><!-- Back End Developer -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="heading-tertiary card-title text-md-left">Back-End Skills</h3>
          
           
            <div class="row text-center">
              <ul class="list-inline dev-icons">
            
              <li class="list-inline-item">
                <svg class="svg-box__icon">
                  <use xlink:href="vendors/img/symbol-defs.svg#icon-wordpress"></use>
                </svg>
              </li>

                <li class="list-inline-item">
                  <svg class="svg-box__icon">
                    <use xlink:href="vendors/img/symbol-defs.svg#icon-javascript"></use>
                  </svg>
                </li>

                <li class="list-inline-item">
                  <svg class="svg-box__icon">
                    <use xlink:href="vendors/img/symbol-defs.svg#icon-java"></use>
                  </svg>
                </li>
                <li class="list-inline-item">
                  <svg class="svg-box__icon">
                    <use xlink:href="vendors/img/symbol-defs.svg#icon-php"></use>
                  </svg>
                </li>
                <li class="list-inline-item">
                  <svg class="svg-box__icon">
                    <use xlink:href="vendors/img/symbol-defs.svg#icon-rails"></use>
                  </svg>
                </li>
                <li class="list-inline-item">
                  <svg class="svg-box__icon">
                    <use xlink:href="vendors/img/symbol-defs.svg#icon-mysql"></use>
                  </svg>
                </li>
              </ul>
                
            </div>
          </div><!-- ./ resume-content -->
             
        </div><!-- back -end Developer Skills -->
      </section><!-- Skills section -->


      <!--  resume-section p-3 p-lg-5 d-flex align-items-center"-->
      <section class="" id="awards">

          <div class="resume-heading">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="heading-secondary">Awards &amp; Certifications</h2>
                  <hr class="m-0 resume-hr">
                </div>
                
              </div>
          </div><!-- resume heading -->

          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
              <h3 class="heading-tertiary card-title text-md-left">Certifications</h3>
            
              <ul class="fa-ul mb-0">
                <li class="">
                  <i class="fa-li fa fa-trophy text-warning"></i>
                  Wordpres Theme Development - Udemy Certification</li>
                <li class="">
                  <i class="fa-li fa fa-trophy text-warning"></i>
                  Responsive Web Design - Udemy Certification</li>
                <li class="">
                  <i class="fa-li fa fa-trophy text-warning"></i>
                  Sass Workflow and Advanced CSS / SASS
                   - Udemy Certification
                </li>
              </ul>
            </div><!-- ./resume-content -->
          </div> <!-- ./resume-content -->
        </section>

     
        <!-- resume-section p-3 p-lg-5 d-flex align-items-center -->
      <section class="" id="interests">

        <div class="resume-heading">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading-secondary">Interests</h2>
              <hr class="m-0 resume-hr">
            </div>
            
          </div>
        </div><!-- resume heading -->

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="heading-tertiary card-title text-md-left">Love to Do</h3>
          
              <p>
                  Apart from being a web developer, when forced indoors, I follow a number of sci-fi and fantasy genre movies & television shows. I also enjoy home cookiing, & Sightseeing, Walking, Swimming. 
                  I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.
              </p>
          </div>
        </div>
      </section>

    </div><!-- ./ container -->
  </main><!-- ./ resume main -->

       
  <footer class="footer text-center">
    <div class="container-fluid">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="footer__nav">
            <ul class="nav footer__list justify-content-center">
              <li class="nav-item footer__item ">
                <a class="nav-link footer__link" href="#">Link</a>
              </li>
              <li class="nav-item footer__item ">
                <a class="nav-link footer__link" href="#">Link</a>
              </li>
              <li class="nav-item footer__item ">
                <a class="nav-link footer__link" href="#">Link</a>
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
              <h5 class="text-uppercase mb-4">Follow Me Around</h5>
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
<!-- Copyright Section -->
  <div class="container">
    <small>Copyright &copy; Laurence M 2019</small>
  </div>
</footer>

 

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
<a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
  <i class="fa fa-chevron-up"></i>
</a>
</div>

  <!-- Bootstrap core JavaScript -->
  <!--SCRIPT FILES -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>        
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="resources/js/main.js"></script>
  <script src="resources/js/main.min.js"></script>

 

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>
