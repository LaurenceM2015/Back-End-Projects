
<?php
    // Landing Home Page Setting 
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
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
    }

     // All Settings Values
     function getHeroValue($value){
        global $conn;
        $sql = "SELECT * FROM heros WHERE setting_name='$value'";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            $hero = $row['hero_img'];
            echo $hero;
        }
    }

    function setHeroValue($id,$value){
        global $conn;
        $sql = "UPDATE heros SET hero_img='$value' WHERE hero_id='$id'";
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
    }
    
    /*function setSettingValue($setting,$value, $img, $feature){
        global $conn;
        $sql = "UPDATE settings SET setting_value='$value' settting_img='$img' setting_feature='$feature' 
        WHERE setting_name='$setting'";
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
    } */





     // Main navigation arrays
     $navItems = array (
        array(
            "slug"  => "#home",
            "title" => "Page<small>D'accueil</small>"
        ),

        array(
            "slug"  => "#stage",
            "title" => "Les Stage <small>De KSM</small>"
        ),

        array(
            "slug"  => "#competition",
            "title" => "Competition <small>Et Rencontre</small>"
        ),

        array(
            "slug"  => "#assocari",
            "title" => "Asso Caritatives <small>Telethon</small>"
        ),

        array(
            "slug"  => "#chrities",
            "title" => "Charite<small>Nous Parrainent</small>"
        ), 

        array(
            "slug" => "#apropodenous",
            "title" => "Contact <small>Pour Savoir Plus</small>"
        )
    );

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
        $html='';
        while($row=mysqli_fetch_assoc($result)){
            $html .='<a href="category.php?id='.$row['category_id'].'">'.$row['category_name'].'</a>&nbsp;' ;
           // array_push($name,$row['category_name']);
            
           
            
        }
        echo $html;
        //echo implode(", ",$name);
    }

 