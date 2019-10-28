

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
           <a href="indtast.php">Indtast oplysninger</a>        
        </ol>
            <ol>
            <a href="oplysninger.php">Oversigt oplysninger</a>        
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


</main> 
       
    <footer>
       <h3>Footer</h3>
    </footer>
</body>
</html> 