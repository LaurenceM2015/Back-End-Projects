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

            <?php
                foreach ($navItems as $item) {
                    echo 
                        "
                        <li class=\"nav-item mx-0 mx-lg-1\">
                        <a class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\" href=\"$item[slug]\">$item[title]</a></li>
                        ";
                }
            ?>
        </ul>

      </div>
    </div>
</nav>