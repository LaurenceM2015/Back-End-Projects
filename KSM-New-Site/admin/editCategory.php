<?php 
     session_start();
    ini_set("display_errors", 1);
    include "../includes/connection.php";
    //include "../includes/functions.php";
   
    if(!isset($_POST['submit'])){
        header("Location: category.php?message=Please+Add+a+Category");
        exit();
    }else{
        // the user log in 
        if(!isset($_SESSION['author_role'])){
            header("Location: login.php");
        }else {
            if($_SESSION['author_role']!="admin"){
                echo "You can't access this page";
                exit();
            } else if($_SESSION['author_role']=="admin"){
                // if the user is admin
                $category_name = $_POST['category_name'];
                $category_name = $_POST['category_desc'];
                //$sql = "INSERT INTO category (`category_name`, `category_desc`) VALUES ('$category_name', '$category_desc');";
                $sql = "UPDATE category SET category_name='$category_name', category_desc='$category_desc'
                WHERE category_id='$category_id'";
               
                if(mysqli_query($conn, $sql)){
                    header("Location: category.php?message=Added+New+Category");
				exit();
                } else {
                    header("Location: category.php?message=Error");
				    exit();
                }
            } // author_role == admin
        }
    }

?>