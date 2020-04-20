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
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Home</a>
        </li>

        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="portfolio.php">Portfolio</a>
        </li>

          <?php
          $sqlpage = "SELECT * FROM page";
            $resultpage = mysqli_query($conn, $sqlpage);
            while($rowpage=mysqli_fetch_array($resultpage)){
              $page_id = $rowpage['page_id'];
              $page_title = $rowpage['page_title'];
              
              ?>
              <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="page.php?id=<?php echo $page_id; ?>"><?php echo $page_title; ?></a>
              </li>
              <?php
            }
            ?>
          
        
            

         
        </ul>
      </div>
    </div>
  </nav>
  <!-- ./ Navbar --> 



