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
      <h4 class="card-title feature-box__text py-2">About KSM</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div><!-- widget -->
          
    <div class="feature-box card widget mb-4 text-left">
      <h4 class="card-title feature-box__text py-2">Recent Posts</h4>
      <ul class="list-unstyled text-left">
        <li><a href="">Un stage était organisé pour aider le jeune garçon</a></li>
        <li><a href="">L’association sportive a plus de vingt ans</a></li>
        <li><a href="">Un stage mémorable pour les 20 ans du KSM</a></li>
      </ul>
    </div><!-- widget -->
    <div class="feature-box card widget mb-4 text-left">
      <h4 class="card-title feature-box__text py-2">Archives</h4>
      <ul class="list-unstyled">
          <li><a href="">Mars 2020</a></li>
          <li><a href="">Janvier 2019</a></li>
          <li><a href="">Mai 2018</a></li>
          <li><a href="">Decembre 2017</a></li>
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