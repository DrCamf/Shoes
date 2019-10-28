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
          
       
         <main>
         <div class='info'>  </div>
         <fieldset>
        <legend>Indtast oplysninger</legend>
            <form method='post' action='indtasttext.php'>
                <label for='name'>Name: </label><br />
                <input id='text' type='text' name='Name' /> <span class='error'>  </span><br />
                <label for='email'>Email: </label><br />
                <input id='text' type='text' name='Email' /> <span class='error'>  </span> <br />
                
                <br />
                <label for='Age'>Age: </label>
                <input id='shoe' type='text' name='Age' /> <label id='shoeSize' for='shoeSize'>Shoe Size: </label>
                <input id='shoe' type='text' name='shoeSize' /> <span class='error'>  </span><br />
                
                <br />
                <input type='submit' id='submit' name='submit' value='Submit' />
             </form>
        </fieldset>
         
         
         ";
 
         
    $nameError = "";
    $emailError = "";
    $ageError = "";
    $shoeSizeError = "";
    $startError = "";
    
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
         $startError = '* Please Fill Out the following Fields.';
         
         if(empty($_POST['Name'])) { $nameError = '* Name must be entered'; } 
         else { 
             $name=Test_User_Input($_POST['Name']); 
             if(!preg_match('/^[A-Za-z. ]*$/' , $name)   ) {
                 $nameError = '* Only letters and whitespaces';
             }
         }
         if(empty($_POST['Email'])) { $emailError = '* Email must be entered'; } else { 
             $email = Test_User_Input($_POST['Email']); 
             if(!preg_match('/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/' , $email) ){
                 $emailError = '* Email in not valid';
             }
         }
         
         if(empty($_POST['Age'])) { $ageError = '* Age must be entered';
          }else { 
             $age=Test_User_Input($_POST['Age']); 
             if(is_numeric($_POST['Age'])) {
                 $ageError = '* That is not a valid Age input';
             }
         }
         if(empty($_POST['shoeSize'])) { $shoeSizeError = '* Shoe size must be entered'; 
         }else { 
             $size=Test_User_Input($_POST['shoeSize']); 
             if(is_numeric($_POST['shoeSize'])) {
                 $shoeSizeError = '* That is not a valid shoe size input';
             }
         }
         if (!empty($_POST['Name']) && !empty($_POST['Email']) && !empty($_POST['Age']) && !empty($_POST['shoeSize'])) {
            /* if (((preg_match('/[A-Za-z. ]/' , $name) === true) && (preg_match('/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/' , $email) === true) && (is_numeric($_POST['Age'])) && (is_numeric($_POST['shoeSize']))){*/
             $file = 'users.csv';
           // The new person to add to the file
           $value = $name . "," . $age . "," . $email . "," . $size;
           // Write the contents to the file, 
           // using the FILE_APPEND flag to append the content to the end of the file
           // and the LOCK_EX flag to prevent anyone else writing to the file at the same time
           file_put_contents($file, $value, FILE_APPEND | LOCK_EX);
           echo "User has been submitted";
         }
             
             
             /*
             
             echo '<h2>Your Submit Information</h2><div class="return"> '.'<br />';
                 echo 'Name: ' . ucwords($name) .'<br />';
                 echo 'Email: ' . $email .'<br />';
                 echo 'Age: ' . $age .'<br />';
                 echo 'Shoe Size: ' . $size .'</div><br /><br />';
                 echo "<input type='submit' id='submit' name='submit' value='Submit' />";
                 
             } else {
                 echo '<span class="error">Please Complete and correct your Form again </span>';
             }*/
             
          
         
     }
 
     function Test_User_Input($data) {
         $temp = strtolower($data);
         if (strpos($temp, '=') === false ) {
             return $data;
         } else {
             echo '<script language="javascript">';
             echo 'alert("Forsøg på ballade")';
             echo 'window.close()</script>';
             return null;
         }                                           
     }
 
     function validate_input($data, $type) {
     
         if ($type=='name') {
             if(!preg_match('/^[A-Za-z. ]*$/' , $data)) {
                 return $nameError = '* Only letters and whitespaces';
             }else {
                 return true;	
             }
         }
 
         if ($type=='email') {
             if(!preg_match('/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/' , $data)){
                 $emailError = 'Email in not valid';
             }else {
                 return true;	
             }
         }
 
         if ($type=='age'){
             if(is_numeric($_POST['Age'] )) {
                 return $ageError = 'That is not a valid age input';
             }else {
                 return true;	
             }
         }
         if ($type=='shoeSize'){
             if(is_numeric($_POST['shoeSize'] )) {
                 return $shoeSizeError = 'That is not a valid size input';
             }else {
                 return true;	
             }
         }
     }
 
 
  
         
 
 
 
 
 echo " </main> 
        
 <footer>
 <h3>Footer</h3>
 </footer>
 </body>
 </html> ";



?>