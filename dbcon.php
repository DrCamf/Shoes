<?php 
    require('config.php');
    
    
    
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
 
   /* $servername = "localhost";
    $username = "Thorr";
    $password = "bobthegod";
    $dbname = 'shoes';*/
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
 


?>
<?php 






?>