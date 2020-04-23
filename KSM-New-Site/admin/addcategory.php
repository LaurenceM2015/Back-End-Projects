<?php 
    ini_set("display_errors", 1);
    define("TITLE", "Admin | New Category Page");
    include "../includes/connection.php";
    //include "../includes/functions.php";
    session_start();
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
                $sql = "INSERT INTO category (`category_name`) VALUES ('$category_name');";
               

                if(mysqli_query($conn, $sql)){
                    header("Location: category.php?message=Added+New+Category");
				exit();
                } else {
                    header("Location: category.php?message=Error");
				    exit();
                }
            }
        }
    }

?>