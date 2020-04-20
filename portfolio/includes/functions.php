<?php 

    // Hero sectoin function
    function masthead_hero(){
        echo '
           
                <div class="container d-flex align-items-center flex-column">
            
                <h1 class="masthead-heading text-uppercase mb-5">
                    <span class="heading-primary--main">Laurence Malonga</span>
                    <span class="heading-primary--sub">Personel Portfolio</span>
                </h1>
                <a href="#feature" class="Btn Btn--white Btn--animated js-scroll-trigger">Visit The Page &rarr;</a>
                </div>
           
        ';
    }

    function what_I_can_do(){
        echo '
            <div class="row">
                <div class="col-lg-12 py-5">
                <h2 class="heading-secondary page-section-heading text-uppercase">What I can do</h2>
                <p class="pt-3 long-copy lead">I enjoy building an advance responsive design layout, which multiple browsers platforms. With a usse of CSS Press-processors, I create large css libriary, with reusable across all projects, and easy to maintain.
                    I love creating my own website themes, from scrath or third party libriary, and Convert theme or into a Custom WordPress theme.</p>
                </div>
            </div><!-- ./ row -->
        ';
    }


    function getAuthorName($id){
        global $conn;
        $sql = "SELECT * FROM author WHERE author_id='$id'";
        
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            $name = $row['author_name'];
            echo $name;

        }


    }

    function getCategoryName($id){
        global $conn;
        $sql = "SELECT * FROM categories WHERE category_id='$id'";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            $name = $row['category_name'];
            echo $name;
        }
    }


?>