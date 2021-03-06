<div class="widgets">
    <div class="feature-box card widget mb-4 py-3">
      <h4 class="card-title feature-box__text py-1">Search Our blog page</h4>
      <form action="search.php" class="input-group">
        <input name="s" type="search" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-secondary p-2" type="button">Go!</button>
        </span>
      </form>
    </div><!-- widget -->
          
    <div class="feature-box card widget mb-4 text-left">
      <h4 class="card-title feature-box__text py-2"><?php getSettingValue("slogan_title"); ?></h4>
      <p><?php getSettingValue("slogan_desc"); ?></p>
    </div><!-- widget -->
          
    <div class="feature-box card widget mb-4 text-left">
      <h4 class="card-title feature-box__text py-2">Recent Posts</h4>
      <ul class="list-unstyled text-left">
      <?php 
        $sql = "SELECT * FROM `post` ORDER BY post_id DESC LIMIT 0,3";
        $result = mysqli_query($conn, $sql);

            while($row=mysqli_fetch_assoc($result)){
              $post_title = $row['post_title']; 
              $post_id = $row['post_id'];

          ?>
        <li>
          <a href="<?php echo $post_id; ?>"><?php echo $post_title ?></a>
         
        </li>
        <?php } ?>
      </ul>
    </div><!-- widget -->
    
    <div class="feature-box card widget mb-4 text-left">
      <h4 class="card-title feature-box__text py-2">Categories</h4>
      <ul class="list-unstyled">
      
        <?php 
          
          $sql    = "SELECT * FROM category";
          $result = mysqli_query($conn, $sql);
          while($row=mysqli_fetch_array($result)){
          $category_id = $row['category_id'];
          $category_name = $row['category_name'];
        ?>
          <li>
          <a href="category.php?id=<?php echo $category_id; ?>"><?php echo $category_name; ?></a>
          </li>
          <?php 
        }
          ?>
      </ul>
    </div><!-- widget -->

    <div class="feature-box card widget mb-4 text-left">
      <h4 class="card-title feature-box__text py-2">Archives</h4>
      <ul class="list-unstyled">
          <?php 
           $sql = "SELECT DISTINCT( YEAR(post_date)) as post_date from post";
           $result = mysqli_query($conn, $sql);
           while($row=mysqli_fetch_assoc($result)){
            $post_date = $row['post_date']; ?>

          <li><a href="archiveYear.php?year=<?php echo $post_date; ?>"><?php echo $post_date; ?></a></li>
          <?php } ?>
      </ul>
    </div><!-- widget -->
          
    
    <div class="feature-box card widget mb-4 text-left">
      <h4 class="card-title feature-box__text py-2">Meta</h4>
      <ul class="list-unstyled">
          <li><a href="">Site Admin</a></li>
          <li><a href="">Log Out</a></li>
          <li><a href=""></a></li>
          <li><a href="">Comments RSS</a></li>
          <li><a href="">WordPress.org</a></li>
      </ul>
    </div><!-- widget -->
</div><!-- ./widget row -->