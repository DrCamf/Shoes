<?php 

 
echo "<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href='styles.css'>
</head>
<body>
    
<header>
            <h1><a href='index.html'>Header</a></h1>
        </header>
        
      <nav>  
        <ol>
           <a href='indtasttext.php'>Indtast oplysninger</a>        
        </ol>
            <ol>
            <a href='oplysningertext.php'>Oversigt oplysninger</a>        
        </ol>
            <ol>
            <a href='graph.php'>Graf skostørrelse </a>        
        </ol>
        </ol>
            <ol>
            <a href='test.php'>test </a>        
        </ol>
        </nav>
         
      
        <main>";
  echo  "<table><tr><th>Name</th> <th>Age</th> <th>Email</th> <th>Shoe size</th></tr>";

  $file = fopen('users.csv','r');
  while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
    //Print out my column data.
    echo '<tr><td> ' . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "<td></tr>";
    
}
fclose($file);
echo "</table>";
echo " </main> 
       
<footer>
<h3>Footer</h3>
</footer>
</body>
</html> ";




?>