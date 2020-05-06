<?php
include_once "../includes/connection.php";
session_start();
if(!isset($_POST['submit'])){
	header("Location: page.php?message=Please+Submit+form");
	exit();
}else{
	if(!isset($_SESSION['author_role'])){
		header("Location: login.php");
	}else{
		if($_SESSION['author_role']!="admin"){
			echo "You can't access this page";
			exit();
		}else if($_SESSION['author_role']=="admin"){
			
			$page_title = $_POST['page_title'];
            $page_subtitle = $_POST['page_subtitle'];
            $page_content = $_POST['page_content'];
			
			echo $sql = "INSERT INTO page (`page_title`, `page_content`, `page_subtitle`) VALUES ('$page_title', '$page_subtitle', '$page_content', '$page_subtitle');";
			if(mysqli_query($conn, $sql)){
				header("Location: page.php?message=New+Page+Added");
				exit();
			}else{
				//header("Location: page.php?message=Page+Error");
				echo $sql;
				exit();
			}
		}
	}
}
?>