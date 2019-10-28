

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    
<header>
    <h1><a href="index.html">Header</a></h1>
</header>
    <nav>  
        <ol>
           <a href="Indtast.php">Indtast oplysninger</a>        
        </ol>
            <ol>
            <a href="Oplysninger.php">Oversigt oplysninger</a>        
        </ol>
            <ol>
            <a href="graph.php">Graf skostørrelse </a>        
        </ol>
        </ol>
            <ol>
            <a href="test.php">test </a>        
        </ol>
    </nav>
         
      
<main>


<?php 
    require_once('config.php');

    echo "<table><tr><th>Name</th> <th>Age</th> <th>Email</th> <th>Shoe size</th></tr>";


    $sql = "SELECT name, age, email, shoeSize FROM users";

    try{
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                echo " <tr><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td><td>" . $row["email"]. "</td><td>".  $row["shoeSize"]. "<td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();

        echo "</table>";
    } catch(Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
    

?>






 <?php
    /*
    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>Id</th><th>Name</th><th>Age</th><th>Email</th><th>Shoe Size</th></tr>";
 
    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }

        function beginChildren() {
            echo "<tr>";
        }

        function endChildren() {
            echo "</tr>" . "\n";
        }
    }   
 
 
    
    try {



       $sqlstr = "SELECT * FROM users";
         $result = mysqli_query($conn, $sqlstr);
    $values = array();
    
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                $values[] = $row;
            }
        }
        

        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
        $conn = null;
    echo "</table>";
        }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
        $conn->close();
    } 
 
*/

?>




</main> 
       
    <footer>
       <h3>Footer</h3>
    </footer>
</body>
</html> 