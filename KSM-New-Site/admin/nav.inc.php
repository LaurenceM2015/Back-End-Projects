<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <aside class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">
              <span data-feather="home"><i class="fas fa-tachometer-alt"></i></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="settings.php">
              <span data-feather="file"><i class="fas fa-home"></i></span>
                Page D'accuel
            </a>
				  </li>
          
          <?php 
            if(isset($_SESSION['author_role'])){
              if($_SESSION['author_role']=="admin"){
                // Show all the link for admin
                ?>

                 <!-- ONLY ADMIN LINK HERE -->
                 <li class="nav-item">
                    <a class="nav-link" href="page.php">
                      <span data-feather="file"><i class="fas fa-book-open"></i></span>
                      All Pages
                    </a>
                  </li>

                  <!-- ONLY ADMIN LINK HERE -->
                  <li class="nav-item">
                    <a class="nav-link" href="category.php">
                      <span data-feather="file"><i class="fas fa-list"></i></span>
                      All Categories
                    </a>
                  </li>


            <?php } } ?>
            <li class="nav-item">
              <a class="nav-link" href="teams.php">
                <span data-feather="file"><i class="fas fa-users"></i></span>
                L'equipe
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="posts.php">
                <span data-feather="file"><i class="fas fa-pager"></i></span>
                Les Photos des Stages
              </a>
            </li>

          </ul>

    
      </aside>
    </nav>