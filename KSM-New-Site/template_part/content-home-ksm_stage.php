 <!-- Section Les Stage bg image -->
 <section class="section-stage page-section h-100 parallax-BkgImg-jg">
    <div class="stage parallax">
      <div class="container stage__container">

        <div class="row">
          <div class="col-md-12 mb-5">
            <h2 class="heading-secondary heading-secondary--2"><?php getCategoryName(1); ?></h2>
          </div>
        </div>


        <?php 
            $sql = "SELECT * FROM category WHERE category_id=(1)";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)){
              $category_id = $row['category_id']; 
              $category_desc = $row['category_desc'];
        ?>
        <div class="row justify-content-center align-items-center">
          
          <div class="col-lg-9 u-text-center ">
            <div class="stage__box lead wow fadeIn">
            <p class="">
              <?php echo $category_desc; ?> 
            </p>
               
             
            </div> <!-- stage__box -->
          </div> <!-- ./col -->

          <div class="col-lg-3 text-center my-5 animated fadeInUp parallax">
            <div>
                <img src="<?php getSettingValue("stage_logo"); ?>" class="img-fluid">
            </div>
          </div>
            
        </div><!-- ./row -->
        <?php }?>
      </div> <!-- container -->
    </div> <!-- ./stage parallax -->
</section>