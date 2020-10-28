<?php
	header("Content-type: image/png");

	$string ="ABIDAT Mohamed";
	$im     = imagecreatefrompng("images/1.png");
	$color = imagecolorallocate($im, 255, 255, 255);
	$px     = (imagesx($im) - 7.5 * strlen($string)) / 3;
	imagestring($im, 5, $px, 60, $string, $color);
	imagepng($im);
	imagedestroy($im);
?>
