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
          <h2 class="page-section-heading text-center heading-secondary text-secondary mb-5"><?php getSettingValue("contact_heading"); ?></h2>
    
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