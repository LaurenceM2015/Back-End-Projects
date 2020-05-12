<section id="contact" class="page-section page-contact section-contact">
    <div class="container">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12 mb-3 text-center text-white">
            <h2 class="heading-secondary heading-secondary--2">Contact Nous</h2>
          </div>
        </div>
              
        <div class="row my-5">
        <?php 
            $sql = "SELECT * FROM `contacts` ORDER BY contact_id";
            $result = mysqli_query($conn, $sql);

            $row=mysqli_fetch_assoc($result);
              $contact_id                 = $row['contact_id'];
              $contact_title              = $row['contact_title']; 
              $contact_title2              = $row['contact_title2']; 
              $contact_title3              = $row['contact_title3']; 
              $contact_title4              = $row['contact_title4']; 
              $contact_name1              = $row['contact_name1']; 
              $contact_name2              = $row['contact_name2'];
              $contact_icon               = $row['contact_icon']; 
              $contact_icon2               = $row['contact_icon2']; 
              $contact_icon3               = $row['contact_icon3']; 
              $contact_icon4               = $row['contact_icon4']; 
              $contact_address            = $row['contact_address'];
              $contact_email              = $row['contact_email'];
              $contact_tarif_adult        = $row['contact_tarif_adult'];
              $contact_tarif_enfants      = $row['contact_tarif_enfants'];
              $contact_tarif_Adolescents  = $row['contact_tarif_Adolescents'];
         
          ?>


          <div class="col-lg-3 col-md-6 mb-3">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas <?php echo $contact_icon4; ?> mb-2"></i>
                <h4 class="text-uppercase m-0"><?php echo $contact_title; ?></h4>
                <hr class="my-4">
                <div class="text-black-50">
                  <address>
                    <div class="my-0"><?php echo $contact_address; ?></div>
                   
                  </address>
                </div>
              </div>
            </div>
          </div><!-- contact-box 1-->

          <div class="col-lg-3 col-md-6 mb-3">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas <?php echo $contact_icon2; ?> mb-2"></i>
                <h4 class="text-uppercase m-0"><?php echo $contact_title2; ?></h4>
                <hr class="my-4">
                <div class="text-black-50">
                  <div class="my-0">
                   <abbr title="Phone"></abbr>: <?php echo $contact_name1; ?>
                  </div>
                  <div class="my-0"> 
                    
                    <abbr title="Phone"></abbr>: <?php echo $contact_name2; ?>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- contact-box 2 -->

          <div class="col-lg-3 col-md-6 mb-3">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas <?php echo $contact_icon3; ?> mb-2"></i>
                <h4 class="text-uppercase m-0"><?php echo $contact_title3; ?> </h4>
                <hr class="my-4">
                <div class="text-black-50">
                  <abbr title="Email"></abbr><a href="mailto:valerie.mabilleau@sfr.fr"><?php echo $contact_email; ?></a>
                </div>
              </div>
            </div>
          </div><!-- contact-box 3 -->

          <div class="col-lg-3 col-md-6 mb-3">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas <?php echo $contact_icon4; ?> mb-2"></i>
                <h4 class="text-uppercase m-0"><?php echo $contact_title4; ?></h4>
                <hr class="my-4">
                <div class="text-black-50">
                  <ul class="list-unstyled list-social-icons">
                    <li><?php echo $contact_tarif_adult; ?> <i class="fas fa-euro-sign"></i></li>
                    <li><?php echo $contact_tarif_enfants; ?> <i class="fas fa-euro-sign"></i></li>
                    <li><?php echo $contact_tarif_Adolescents; ?> <i class="fas fa-euro-sign"></i></li>
                  </ul>
                </div>
              </div>
            </div>
          </div><!-- conctact-box 4 -->



        </div> <!-- row --> 
                   
      </div><!-- fade in -->
 
    </div><!-- container -->
  </section><!-- Contact US -->