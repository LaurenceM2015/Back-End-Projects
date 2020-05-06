<?php 
    // Main navigation arrays
    $navItems = array (
        array(
            "slug"  => "#feature",
            "title" => "What I Can Do"
        ),

        array(
            "slug"  => "#portfolio",
            "title" => "portfolio"
        ),

        array(
            "slug"  => "#process",
            "title" => "Process"
        ),

        array(
            "slug"  => "#about",
            "title" => "About"
        ),

        array(
            "slug"  => "#contact",
            "title" => "contact"
        )
    );

    // What Can I Do (services )

    $services = array (
        array (
            "title"		=> "Responsive Desgin",
			"icon"		=> "<i class=\"feature-box__icon fas fa-mobile-alt\"></i>",
            "desc"		=> "<ul class=\"list-unstyled feature-box__text\">
             
          </ul>",
          "newdesc" => ["Advance responsive images in HTML and CSS for faster pageloads: resolution switching, density switching, art direction;
          ","Modern responsive layout design: fluid grids, layout types, flexible images, using media queries to test for different screen widths,pixel densities and touch capabilities; 
          ", "Videos in HTML and CSS: building a background video effect"]
			
        ),

        array (
            "title"		=> "CSS Developer",
			"icon"		=> "<i class=\"feature-box__icon far fa-file-code\"></i></i>",
            "desc"		=> "<ul class=\"list-unstyled feature-box__text\">
            
                            </ul>",
            "newdesc" => ["CSS architecture: The 7-1 rule, component-based design, the BEM (Block Element Modifier) methodology, writing reusable, maintainable and scalable code",
            "NPM development process with Sass and automatic browser reload, a build process to concatenate, prefix and compress CSS files",
            "SVG images instead of icons in HTML , generating and change of SVG sprites and colors in CSS"]
			
			
        ),

        array (
            "title"		=> "Wordpress Theme Dev",
			"icon"		=> "<i class=\"feature-box__icon fab fa-wordpress-simple\"></i>",
            "desc"		=> "<ul class=\"list-unstyled feature-box__text\">
            
                            </ul>",

            "newdesc" => ["Easy To Use CMS: can easly easily updatable website by converting any static HTML, Bootstrap or any website to Wordpress Theme",
            "I fully understand how to use Custom Post Types &amp; Advanced Custum Field in WordPress",
            "Can easily intergrate WordPress plugin &amp; more.",
            "Modern professional quality design &amp; Layout",
            "Hand-craft stynning website with valid, semantic &amp; beautiful HTML5 &amp; CSS3"]
			
			
        ),

        array (
            "title"		=> "Web Administrator",
			"icon"		=> "<i class=\"feature-box__icon fas fa-laptop-code\"></i>",
            "desc"		=> "<ul class=\"list-unstyled feature-box__text\">
            
                            </ul>",

            "newdesc" => ["Uploading product to our website to ensure our products have accurate product descriptions, relevant imagery 
            and video content to help our customers select the right product for them",
            "Build &amp; maintain websites using a program such as WordPress, Shopify, &amp; Perch",
            "Working knowledge Photoshop",
            "Good working knowledge of Microsoft Office",
            "Good understanding of Google products such as Webmaster Tools & Analytics",
            " A 'love what you do' attitude, Processing & Checking invoices",
            "<!-- Friendly, passionate and approachable demeanor --> Monitoring stock levels"]
			
			
        )

    );

    // PORTFOLIO SECTION
    
    $portfolioItems = array (
            array (
                "title" =>   "Personel Portfolio",
                "img"   => "LaurenceMalongaPortfolioHeader",  
                "popuDesc" => "A simple beautiful responsive single, landing page, with a resources, blog, & contact pages, build from ground up, with, bootrapp framework. Then Convert the static Bootstrap them, into a Easy-to-use wordpress Theme.",
                "popuSubhead1" => "Features", 
                "popupList1" => ["Fully functional portfolio image grid with hover captions", 
                                "Fully functional portfolio image grid with hover captions",
                                "NPM based development environment with a watch task for rapid custom development",
                                "JavaScript parallax scrolling effect",
                                "JavaScript parallax background image",
                                "UX friendly navigation",
                                "Custom SASS compiled filed"],

                "popuSubhead2" => "Technologies Used",

                "popupList2" => ["Bootstap",
                                "HTML5  &amp; CSS3",
                                "JavaScript &amp; jQuery",
                                "SASS",
                                "NPM package",
                                "WordPress"],
                "popupList3" => [ "Category: Single Page, Responsive design",
                "Client Based: Mardie, France",
                "Date: July 2017",
                "Version: 4.0.0"]
            ),


            array (
                "title" =>   "Patata Clone",
                "subTitle" => "Animation &amp; sound kit",
                "img"   => "patata",  
                "popuDesc" => "That is the wrong description responsive single, landing page, with a resources, blog, & contact pages, build from ground up, with, bootrapp framework. Then Convert the static Bootstrap them, into a Easy-to-use wordpress Theme.",
                "popuSubhead1" => "Features", 
                "popupList1" => ["Fully functional portfolio image grid with hover captions", 
                                "Fully functional portfolio image grid with hover captions",
                                "NPM based development environment with a watch task for rapid custom development",
                                "JavaScript parallax scrolling effect",
                                "JavaScript parallax background image",
                                "UX friendly navigation",
                                "Custom SASS compiled filed"],

                "popuSubhead2" => "Technologies Used",

                "popupList2" => ["Bootstap",
                                "HTML5  &amp; CSS3",
                                "JavaScript &amp; jQuery",
                                "SASS",
                                "NPM package",
                                "WordPress"],
                "popupList3" => [ "Category: Single Page, Responsive design",
                "Client Based: Mardie, France",
                "Date: July 2017",
                "Version: 4.0.0"]
            ),

            array (
                "title" =>   "Lili World",
                "subTitle" => "Beauty Cosmetic Salon",
                "img"   => "lileworldLogo",  
                "popuDesc" => "A simple beautiful responsive single, landing page, with a resources, blog, & contact pages, build from ground up, with, bootrapp framework. Then Convert the static Bootstrap them, into a Easy-to-use wordpress Theme.",
                "popuSubhead1" => "Features", 
                "popupList1" => ["Responsive, full page header featuring a background image with overlay, with animated vertically centered content &amp; html image",
                "Fully functional portfolio image grid with hover captions",
                "NPM based development environment with a watch task for rapid custom development",
                "JavaScript parallax scrolling effect",
                "JavaScript parallax background image",
                "UX friendly navigation",
                "Custom SASS compiled filed"],

                "popuSubhead2" => "Technologies Used",

                "popupList2" => [
                        "Bootstap",
                        "HTML5  &amp; CSS3",
                        "JavaScript &amp; jQuery",
                        "SASS",
                        "NPM package",
                        "WordPress"],
                "popupList3" => [ "Category: Single Page, Responsive design",
                "Client Based: Birmingham, UK",
                "Date: July 2017",
                "Version: 4.0.0"]
            ),


            array (
                "title" =>   "KSM (Karate Shotokan Mardie)",
                "subTitle" => "Martial Art, France",
                "img"   => "KarateShotokanMardie",  
                "popuDesc" => "A simple beautiful responsive single, landing page, with a resources, blog, & contact pages, build from ground up, with, bootrapp framework. Then Convert the static Bootstrap them, into a Easy-to-use wordpress Theme.",
                "popuSubhead1" => "Features", 
                "popupList1" => ["Responsive, full page header featuring a background image with overlay, with animated vertically centered content &amp; html image",
                "Fully functional portfolio image grid with hover captions",
                "NPM based development environment with a watch task for rapid custom development",
                "JavaScript parallax scrolling effect",
                "JavaScript parallax background image",
                "UX friendly navigation",
                "Custom SASS compiled filed"],

                "popuSubhead2" => "Technologies Used",

                "popupList2" => [
                        "Bootstap",
                        "HTML5  &amp; CSS3",
                        "JavaScript &amp; jQuery",
                        "SASS",
                        "NPM package",
                        "WordPress"],
                "popupList3" => [ "Category: Single Page, Responsive design",
                "Client Based: Mardie, France",
                "Date: July 2017",
                "Version: 4.0.0"]
            )


    );


    $processItems = array (
        array (
            "icon"		=> "<i class=\"feature-box__icon fa fa-clipboard mr-2 pb-2\"></i>",
            "title"		=> "Planning",
            "desc"		=> "<ul class=\"feature-box__text list-unstyled\">
            
                        </ul>",
                        
            "processList" => ["Gathering Information",
            "Planning: Sitemap &amp; wireframe creation",
            "Select technology stack: Programming Language, Frameworks, CMS",
             "Create page &amp; review, page layouts or change when required"]
			
        ),

        array (
            "icon"		=> "<i class=\"feature-box__icon fa fa-code mr-2 pb-2\"></i>",
            "title"		=> "Creating",
            "desc"		=> "<ul class=\"feature-box__text list-unstyled\">
            
                        </ul>",
            "processList" => [
                        "Build and deploy website",
                        "Add special feature &amp; interactivity",
                        "SEO for the website",
                        "Use of BEM for marking up the layout.",
                        "SASS 7-1 Patern, base folder",
                        "Compress Code and images"]
			
        ),

        array (
            "icon"		=> "<i class=\"feature-box__icon fas fa-rocket mr-2 pb-2\"></i>",
            "title"		=> "Launching",
            "desc"		=> "<ul class=\"feature-box__text list-unstyled\">

                            </ul>",
            "processList" => [
                 "Cross-browser testing website",
                 "Upload the website to server",
                 "Less code &amp; HTTP requests",
                 "Final (Regression) testing and launch"]
			
        ),

        array (
            "icon"		=> " <i class=\"feature-box__icon fas fa-rocket mr-2 pb-2\"></i>",
            "title"		=> "Maintenance",
            "desc"		=> "<ul class=\"feature-box__text list-unstyled\">
                        
                        </ul>",
            "processList" => [
                 "Add user report system",
                 "Fix bugs asap",
                 "Keep website up-to-date",
                 "Final (Regression) testing and launch"]
            
        )

        

    );

    // ABOUT SECTION 

    $aboutSection = array (
        array (

            "img"  => "profil2",
            "name" => "Laurence Malonga",
            "desc" => "<p>A clear communicator with strong team ethic. Has genuine passion for web &amp; visually appealing design. Maintains a motivated and focused approach to developing new skills and knowledge. Regularly works on &amp; releases independent personal projects</p>
                       <p Creative & disciplined developer with over 3 year experience in front end development and some experience in back-end developer. Will take the initiative, solve problems & learn new technologies.</p>",
            "subHeading" => "Skills sets", 

            "icon" => ""


        ),
    );

        function savingPortfolioItem(){
           ' <div class="row no-gutters">
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
        </div><!-- ./ end row --> ';
        }



    



?>