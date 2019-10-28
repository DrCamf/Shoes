<?php


$shoeSize = array();
$numberOfSizes  = array();
// Create GD Image
$img = imagecreatetruecolor(400, 350);

// Assign some 
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
$red = imagecolorallocate($img, 255, 0, 102);
$green = imagecolorallocate($img, 0, 153, 51);

// Set background colour to white
imagefill($img, 0, 0, $white);

// Cats: 6
imagefilledrectangle($img, 40, 320, 90, 320-(6*35), $red);
imagerectangle($img, 40, 320, 90, 320-(6*35), $black);


// Dogs: 8
imagefilledrectangle($img, 110, 320, 160, 320-(8*35), $green);
imagerectangle($img, 110, 320, 160, 320-(8*35), $black);

// Sheep: 3
imagefilledrectangle($img, 180, 320, 230, 320-(3*35), $red);
imagerectangle($img, 180, 320, 230, 320-(3*35), $black);

// Whales: 8
imagefilledrectangle($img, 250, 320, 300, 320-(8*35), $green);
imagerectangle($img, 250, 320, 300, 320-(8*35), $black);

// Draw x-axis
imageline($img, 20, 320, 320, 320, $black);

// Draw y-axis
imageline($img, 20, 320, 20, 320-(8*35)-20, $black);

// Define output header
header('Content-Type: image/png');

// Output the png image
imagepng($img);

// Destroy GD image
imagedestroy($img);

?>