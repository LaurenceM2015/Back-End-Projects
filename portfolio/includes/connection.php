<?php 
    $conn = mysqli_connect("localhost", "root", "root", "pers_portfolioDB");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>