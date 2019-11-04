<?php

    
         
        $file = fopen('users.csv','r');
        while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
          //Print out my column data.
          $csv[] = $row[3];
          
        }
        fclose($file);
//sort($shoeSize);




function array_icount_values($arr,$lower=true) {
     $arr2=array();
     if(!is_array($arr['0'])){$arr=array($arr);}
     foreach($arr as $k=> $v){
      foreach($v as $v2){
      if($lower==true) {$v2=strtolower($v2);}
      if(!isset($arr2[$v2])){
          $arr2[$v2]=1;
      }else{
           $arr2[$v2]++;
           }
    }
    }
    return $arr2;
}



//sort($shoeSize);
//$csv = array_map('str_getcsv', file('users.csv'));

foreach ($csv as $key => $row) {
    $shoesize[$key] = $row['shoeSize'];
}

// Sort the data with age first, then favorite
// Add $csvData as the last parameter, to sort by the common key
array_multisort($shoesize, SORT_ASC, $csv);




$res = array_icount_values ($csv);

$res2 = array_shift($res);
print_r($res);

?>