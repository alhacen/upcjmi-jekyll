<?php

//error_reporting(E_ERROR |E_PARSE);
$td = date("dmy").date("his");
function rand_() {
  $salt = "abchefghjkmnpqrstuvwxyz0123456789";
  srand((double)microtime()*1000000); 
      $i = 0;
      $a=0;
  	while ($i <= 7) {
    		$num = rand() % 33;
    		$tmp = substr($salt, $num, 1);
    		$a = $a . $tmp;
    		$i++;
  	}
  	return $a;
}
function getimagesize_($string_data){
    $uri = 'data://application/octet-stream;base64,'  . base64_encode($string_data);
    return getimagesize($uri);
}
function make_thumb($src, $dest, $desired_width) {
    /* read the source image */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
	return $virtual_image;
	imagedestroy( $virtual_image);
}
$current_time=date("Y-m-d H:i:s");
$img_rand=rand_();
$email=$_SESSION['email'];
$file_name  =  "$td-".rand_() ;
$name_flag=0;
function image_upload($img,$file_name){
    // Check if file was uploaded without errors
    $b64 = $img;
    $bin = base64_decode($b64);
    $im = imageCreateFromString($bin);
    if (!$im) {
      die('Base64 value is not a valid image');
    }
    $img_file = 'img_upload/'.$file_name.'.png';
    imagepng($im, $img_file, -1);
}
?>