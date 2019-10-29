<?php 
    //define db params
    $server = "localhost";
    $username = "Thorr";
    $password = "bobthegod";
    $database = "shoes";
    
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
        die("Connecttion failed: ". mysqli_connect_error());
    }
      



?>