<?php    
    
    //define db params
    $server = "localhost";
    $username = "clvsnhfo_Thorr";
    $password = "bobthegod";
    $database = "clvsnhfo_Shoes";


    //define url
    define("ROOT_PATH", "/shoes/");
    define("ROOT_URL", "http://elthoro.dk/shoes/Indtast.php");

   
    
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
        die("Connecttion failed: ". mysqli_connect_error());
    }
    
?>
