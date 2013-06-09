<?php
// echo rand(2,9);
// echo "<br />".dechex(rand(1,15))."<br />";
session_start();
$checkCode="";
for($i=0;$i<4;$i++){
	$checkCode.=dechex(rand(1,15));
}
//store the check code into session
$_SESSION['myCheckCode']=$checkCode;
//create the canvas, and draw the random code onto it
$img=imagecreatetruecolor(110,30);
//background is black by default, you can indicate your color
$bgcolor=imagecolorallocate($img, 0, 0, 0);
imagefill($img, 0, 0, $bgcolor);
//create new color
$white=imagecolorallocate($img, 255, 255, 255);
$blue=imagecolorallocate($img, 0, 0, 255);
$red=imagecolorallocate($img, 255, 0, 0);
$green=imagecolorallocate($img, 0, 255, 0);
//draw the interfere lines
for($i=0;$i<20;$i++){
	imageline($img, rand(0,110), rand(0,30), rand(0,110), rand(0,30), imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255)));
}
//draw the noise dot...

imagestring($img,rand(1,5),rand(2,80),rand(2,10), $checkCode, $white);

//chinese
// array imagefttext($img, 15, 10, 20, 25, $white, "STXINWEI.TTF","上海你好");

header("content-type:image/png");
imagepng($img);

?>