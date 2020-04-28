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