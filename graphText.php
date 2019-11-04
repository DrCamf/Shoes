<?php 
 
 



        $shoeSize = array();
        $numberpr = array();
        $file = fopen('users.csv','r');
        while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
          //Print out my column data.
          $shoeSize[] = $row[3];
          
        }
        fclose($file);
        //sort($shoeSize);
       
        
        
        $numberpr = array_count_values($shoeSize);
        //print_r($numberpr);
       // echo "<br />";

        $shoeSize = array_unique($shoeSize);
        ksort( $numberpr);
        $numberpr = array_values($numberpr);
        //print_r($numberpr);
        sort ($shoeSize);
        //$res2 = array_shift($numberpr);

 

# ------- The graph values in the form of associative array
//$shoeSize = array("35", "38", "39", "40", "41", "44", "45");
//$numberpr = array(1,1,2,3,2,5,4);




$img_width=450;
$img_height=300; 
$margins=20;


# ---- Find the size of graph by substracting the size of borders
$graph_width=$img_width - $margins * 2;
$graph_height=$img_height - $margins * 2; 
$img=imagecreate($img_width,$img_height);


$bar_width=25;
$total_bars=count($numberpr);
$gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);


# -------  Define Colors ----------------
$bar_color=imagecolorallocate($img,0,64,128);
$background_color=imagecolorallocate($img,240,240,255);
$border_color=imagecolorallocate($img,200,200,200);
$line_color=imagecolorallocate($img,220,220,220);

# ------ Create the border around the graph ------

imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);


# ------- Max value is required to adjust the scale -------
$max_value=max($numberpr);
$ratio= $graph_height/$max_value;


# -------- Create scale and draw horizontal lines  --------
$horizontal_lines=max($numberpr);
$horizontal_gap=$graph_height/$horizontal_lines;

for($i=1;$i<=$horizontal_lines;$i++){
$y=$img_height - $margins - $horizontal_gap * $i ;
imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
$v=intval($horizontal_gap * $i /$ratio);
imagestring($img,0,5,$y-5,$v,$bar_color);

}


# ----------- Draw the bars here ------
for($i=0;$i< $total_bars; $i++){ 
# ------ Extract key and value pair from the current pointer position
$key =$shoeSize[$i];
$value = $numberpr[$i];

$x1= $margins + $gap + $i * ($gap+$bar_width) ;
$x2= $x1 + $bar_width; 
$y1=$margins +$graph_height- intval($value * $ratio) ;
$y2=$img_height-$margins;
imagestring($img,0,$x1+3,$y1-10,$value,$bar_color);imagestring($img,0,$x1+3,$img_height-15,$key,$bar_color);        
imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
}
header("Content-type:image/png");
imagepng($img);
$_REQUEST['asdfad']=234234;




?>



       




