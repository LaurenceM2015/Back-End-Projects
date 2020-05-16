<?php 
    //$conn = mysqli_connect("localhost", "root", "root", "ksm_db");
    $conn = mysqli_connect("karateshotokanmardie.com.mysql", "karateshotokanmardie_comksm", "2laurencemegan", "karateshotokanmardie_comksm");


    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
?>

