<?php 
 include_once "connection.php";
// Main header function (main_head)
    function add_jumbotron() {
        echo '
            <header class="header blg-bkg">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                    <h1 class="display-4">Fluid jumbotron</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                    </div>
                </div>
        
            </header>
        ';

    }

    // GET THE AUTHOR ID

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
            $idarray = explode(",",$id);
        global $conn;
        $name = array();
        $sql = "SELECT * FROM category WHERE category_id IN ($id)";
        $result = mysqli_query($conn, $sql);

        while($row=mysqli_fetch_assoc($result)){
            array_push($name,$row['category_name']);
           
            
        }
        echo implode(", ",$name);
    }

    function getSettingValue($setting) {
        global $conn;
        $sql = "SELECT * FROM settings WHERE setting_name='$setting'";
        $result = mysqli_query($conn, $sql); 
        while($row=mysqli_fetch_assoc($result)){
            $value = $row['setting_value'];
            echo $value;
        }

    }

    function setSettingValue($setting,$value){
        global $conn;
        $sql = "UPDATE settings SET setting_value='$value' WHERE setting_name='$setting'";
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
    }

?>