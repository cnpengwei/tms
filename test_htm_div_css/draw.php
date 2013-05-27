<?php
/*
 $img = imagecreatetruecolor(600, 600);
 $color1 = imagecolorallocate($img, 24, 177, 121);
 $color2 = imagecolorallocate($img, 208, 223, 38);
 $color3 = imagecolorallocate($img, 35, 195, 200);
 imagefill($img, 0, 0, $color1);
 $white = imagecolorallocate($img,255,2555,255);
 
 imageline($img, 0, 0, 600, 600, $white);
 imageline($img, 600, 0, 0, 600, $white);
 imageline($img, 50, 500, 22, 155, $color2);

 for($i=0;$i<50;$i++){
 	$x1 = mt_rand(0,200);
 	$y1 = mt_rand(0,200);

 	$x2 = mt_rand(0,300);
 	$y2 = mt_rand(0,300);
 	
 	$color[] = imagecolorallocate($img, 255, 0, 0);
 	$color[] = imagecolorallocate($img, 0, 255, 0);
 	$color[] = imagecolorallocate($img, 0, 0, 255);
 	$color[] = $color1;
 	$color[] = $color2;
 	$color[] = $color3;
 	$key = array_rand($color);
 	imageline($img, $x1, $y1, $x2, $y2, $color[$key]);
 }

 header("content-type:image/jpeg");
 imagejpeg($img);
 */

/*
 $img = imagecreatetruecolor(300, 300);
 $red = imagecolorallocate($img, 255, 0, 0);
 imagedashedline($img, 0, 0, 300, 600, $red);
 header("content-type:image/jpeg");
 imagejpeg($img);
 */

 
?>