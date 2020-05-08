<?php 

    // All Settings Values
    function getSettingValue($setting){
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
      // echo "<br/>";
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
    }

     // All Settings Values
     function getHeroValue($value){
        global $conn;
        $sql = "SELECT * FROM bkg_hero WHERE setting_name='$value'";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            $hero = $row['hero_img'];
            echo $hero;
        }
    }

    function setHeroValue($id,$value){
        global $conn;
        $sql = "UPDATE bkg_hero SET hero_img='$value' WHERE hero_id='$id'";
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
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

   // Project post categories

    function getCategoryName($id){
        $idarray = explode(",",$id);
        global $conn;
        $name = array();
        $sql = "SELECT * FROM categories WHERE category_id IN ($id)";
        $result = mysqli_query($conn, $sql);
        $html='';
        while($row=mysqli_fetch_assoc($result)){
            $html .='<a href="category.php?id='.$row['category_id'].'">'.$row['category_name'].'</a>&nbsp;' ;
            //array_push($name,$row['category_name']);
            
        }
        echo $html;
        //echo implode(", ",$name, );
    }

    // Feature Categories
    function getFeatureName($id){
        $idarray = explode(",",$id);
        global $conn;
        $name = array();
        $sql = "SELECT * FROM features WHERE feature_id IN ($id)";
        $result = mysqli_query($conn, $sql);
        $html='';
        while($row=mysqli_fetch_assoc($result)){
            $html .='<li>'.$row['feature_desc'].'</li>';
           // $html .='<a href="category.php?id='.$row['category_id'].'">'.$row['category_name'].'</a>&nbsp;' ;
            //array_push($name,$row['feature_desc']);
        }
        echo $html;
        //echo implode(", ",$name);
       
    }

    // Technology used category:
    function getTechnologyName($id){
        $idarray = explode(",",$id);
        global $conn;
        $name = array();
       $sql = "SELECT * FROM technologies WHERE technology_id IN ($id)";
        $result = mysqli_query($conn, $sql);
        $html='';
        while($row=mysqli_fetch_assoc($result)){
            $html .='<li>'.$row['technology_name'].'</li>';
           // $html .='<a href="category.php?id='.$row['category_id'].'">'.$row['category_name'].'</a>&nbsp;' ;
            //array_push($name,$row['feature_desc']);
        }
        echo $html;
        //echo implode(", ",$name);
        
    }


?>