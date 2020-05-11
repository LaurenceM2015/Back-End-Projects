<?php 
 define("TITLE", "Admin | Les Membre De L'equipe");
 include_once "../includes/functions.php";
 include_once "../includes/connection.php";
 session_start();
 if(isset($_SESSION['author_role'])){
 ?>
  
  <?php include_once "../includes/header.php"; ?>

  <nav class="navbar navbar-dark sticky-top bg-dark shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="logout.php">Sign out</a>
      </li>
    </ul>
  </nav>

<div class="container-fluid">
  <div class="row">
    <?php include_once "nav.inc.php"; ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts</h1>
            <h6>Howdy <?php echo $_SESSION['author_name']; ?> | Your role is <?php echo $_SESSION['author_role']; ?></h6>
      </div>

      <div id="admin-index-form" class=" admin-index-form">
            <?php
                if(isset($_GET['message'])){
                  $msg = $_GET['message'];
                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  '.$msg.'
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>';
                }
			      ?>
              <h1>All Posts:</h1>
            <a href="newpost.php"><button class="btn btn-info">Add New</button></a>
      </div> <!-- ./ admin-index-form -->
      <hr>

      <!-- Accordiant Callapse -->
        <div class="accordion" id="accordionExample">
            <div class="card border-bottom-0">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        A Propos De Nous 
                    </button>
                </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">   
                            <thead>
                                <tr>
                                    <th>Home Hero Id</th>
                                    <th>Home Hero Image</th>
                                    <th>Home Setting Name</th>
                                
                                    <?php if($_SESSION['author_role']=="admin"){ ?>
                                    <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                             <tbody>
                                <?php 
                                
                                $sql = "SELECT * FROM `heros` ORDER BY hero_id DESC";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){
                                    $hero_id        = $row['hero_id'];
                                    $hero_img       = $row['hero_img'];
                                    //$hero_logo      = $row['hero_logo']; 
                                    $setting_name   = $row['setting_name']; 
                                ?>
      
                                <tr>
                                    <th scope="row"><?php echo $hero_id; ?></th>

                                    <td>
                                    <img class="img-thumbnail" src="../<?php echo $hero_img; ?>" width="150px" height="50px"></td>
                            
                                    <td><?php echo $setting_name; ?></td>

                                    <?php if($_SESSION['author_role']=="admin"){ ?>
                                    <td>
                                        <a href="editheros.php?id=<?php echo $hero_id; ?>"><button class="btn btn-info">Edit</button></a>
                                    </td>
                                    <?php } ?>

                                </tr>

                                <?php } ?>
          
                             </tbody>
                        </table>
                    </div><!-- ./Card-body -->
                </div><!-- CollapseOne -->
            </div><!-- ./Card-one: Team Member -->
            <div class="card border-bottom-0">
                <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     L'equipe Du Karate Shotokan 
                    </button>
                </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Bureau Id</th>
                                    <th>Le Profile</th>
                                    <th>Nom et Prenom</th>
                                    <th>Le Role Du Travaille</th>
                                    <th>Les Dan</th>
                                    
                                    <?php if($_SESSION['author_role']=="admin"){ ?>
                                    <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                    $sql = "SELECT * FROM `teams` ORDER BY team_id DESC";
                                    $result = mysqli_query($conn, $sql);

                                    while($row=mysqli_fetch_assoc($result)){
                                        $team_id    = $row['team_id'];
                                        $team_img   = $row['team_img']; 
                                        $team_name  = $row['team_name']; 
                                        $team_title = $row['team_title'];
                                        $team_belt = $row['team_belt'];

                                    ?>
                
                                    <tr>
                                        <th scope="row"><?php echo $team_id; ?></th>
                                        <td><img class="img-thumbnail" src="../<?php echo $team_img; ?>" width="50px" height="50px"></td>
                                        <td><?php echo $team_name; ?></td>
                                        <td><?php echo $team_title; ?></td>
                                        <td><?php echo $team_belt; ?></td>
                                        

                                        <?php if($_SESSION['author_role']=="admin"){ ?>
                                        <td>
                                            <a href="editteams.php?id=<?php echo $team_id; ?>"><button class="btn btn-info">Edit</button></a>
                                        </td>
                                        <?php } ?>

                                    </tr>

                    
                                    <?php } ?>
                    
                            </tbody>
                        </table>
                    </div><!-- card-body -->
                </div><!-- collapsetwo -->
            </div><!-- .card two: Equipe Du KSM -->
            <div class="card border-bottom-0">
                <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Collapsible Group Item #3
                    </button>
                </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
                </div>
            </div>
        </div><!-- ./accordion -->
                

    </main>
  </div>
</div><!-- dashboard -->





<?php
}else{
	header("Location: login.php?message=Please+Login");
}

include "../includes/footer.php";
?>

