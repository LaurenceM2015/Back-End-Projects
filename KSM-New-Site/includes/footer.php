<footer class="footer">
		<div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-2">
          <p><a href="/index.php"><img class="footer__logo" srcset="<?php getHeroValue("ksm_logo_1x"); ?> 1x, <?php getHeroValue("ksm_logo_x2"); ?> x2" alt="Karate Shotokan Mardie Site"></a></p>
        </div><!-- end col -->
        <div class="col-md-4">
          <nav class="text-center secondary-navbar navbar navbar-expand-sm justify-content-center">
            <ul class="navbar-nav">
              <li class="nav-item"><a href="" class="nav-link"><p>Home</p></a></li>
              <li class="nav-item"><a href="" class="nav-link"><p>Les Enfo</p></a></li>
              <li class="nav-item"><a href="" class="nav-link"><p>Nos Charite</p></a></li>
            </ul>
          </nav>
        </div><!-- end col -->
        <div class="col-md-6">
          <p class="text-center">Karate Shotokan Mardie &copy; 2014 - build by: <a href="http://laurencemalonga.com/" target="_blank">Laurence M</a></p>
        </div><!-- end col -->
      </div>
		</div><!-- container -->
	</footer>
	
	<!-- Plugin JavaScript -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
	<script src="https://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		

    
	<script src="vendor/js/scroll.js"></script>
	<script src="vendor/js/wow.js"></script>
	<script src="assets/js/main.js"></script>
	
    
	

  	<script>
		$(document).ready(function(){
			$("#addCatBtn").click(function(){
				$("#addCatForm").slideToggle();
			});
			$("#toggleForm").click(function(){
				$("#newPageForm").slideToggle();
			});
		});

		new WOW().init();
	</script>

