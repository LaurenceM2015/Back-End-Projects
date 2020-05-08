<!-- Navigation -->
<nav class="navbar navbar-expand-lg text-uppercase fixed-top navbar-shrink" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Laurence Malonga</a>
          
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php
            foreach ($navItemSecond as $ItemSecond) {
              echo 
                "
                <li class=\"nav-item mx-0 mx-lg-1\">
                <a class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\" href=\"$ItemSecond[slug]\">$ItemSecond[title]</a></li>
                ";
            }
          ?>

        </ul>
      </div>
    </div>
  </nav>
  <!-- ./ Navbar --> 



