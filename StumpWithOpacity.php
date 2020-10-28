<?php

	error_reporting(-1);
	ini_set('display_errors', 'On');

	// Charge le cachet et la photo afin d'y appliquer le tatouage numérique
	$im = imagecreatefromjpeg('images/picture.jpg');
	// Tout d'abord, nous créons un cachet manuellement grâce à GD
	$stamp = imagecreatetruecolor(100, 70);
	imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
	imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
	imagestring($stamp, 5, 20, 20, 'Mohamed', 0x0000FF);
	imagestring($stamp, 3, 20, 40, '(R) 2020', 0x0000FF);

	// Définit les marges du cachet et récupère la largeur et la hauteur du cachet
	$marge_right = 10;
	$marge_bottom = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	// Fusionne le cachet dans notre photo avec une opacité de 50%
	imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

	// Sauvegarde l'image dans un fichier et libère la mémoire
	imagepng($im, 'images/photo_stamp.png');
	header('Content-type: image/png');
	imagepng($im);
	imagedestroy($im); 
?>