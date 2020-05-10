<?php
define("TITLE", "Admin | New Page");
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
			$page_content = $_POST['page_content'];

				//checking if above fields are empty
				if(empty($page_title) OR empty($post_content)){
					header("Location: page.php?message=Empty+Fields");
					exit();
				}
			

			$file = $_FILES['file'];
				
			$fileName = $file['name'];
			$fileType = $file['type'];
			$fileTmp = $file['tmp_name'];
			$fileErr = $file['error'];
			$fileSize = $file['size'];
			
			$fileEXT = explode('.',$fileName);
			$fileExtension = strtolower(end($fileEXT));
			
			$allowedExt = array("jpg", "jpeg", "png", "gif");

			if(in_array($fileExtension, $allowedExt)){
				if($fileErr === 0){
					if($fileSize < 3000000){
						$newFileName = uniqid('',true).'.'.$fileExtension;
						$destination = "../uploads/$newFileName";
						$dbdestination = "uploads/$newFileName";
						move_uploaded_file($fileTmp, $destination);
						$sql = "INSERT INTO `page` (`page_title`, `page_content`, `page_feature_img`) VALUES ('$page_title', '$page_content' '$dbdestination');";
						echo $sql;

						if(mysqli_query($conn, $sql)){
							//header("Location: posts.php?message=Post+Published");
							echo "<meta http-equiv='refresh' content='0;url=http://localhost:8888/admin/posts.php?message=Post+Published'>";

						}else{
							header("Location: page.php?message=Error");
						}
					} else {
						header("Location: page.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
						exit();
					}
				}else{
					header("Location: page.php?message=Oops Error Uploading your file");
					exit();
				}
			}else{
				header("Location: page.php?message=YOUR FILE IS TOO BIG TO UPLOAD!");
				exit();
			}

			if(mysqli_query($conn, $sql)){
				header("Location: page.php?message=Added");
				exit();
			}else{
				header("Location: page.php?message=Error");
				exit();
			}
		}
	}
}
?>