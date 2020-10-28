<?php
	// Charge le cachet et la photo afin d'y appliquer le tatouage numérique
	$stamp = imagecreatefrompng('images/stamp.png');
	$im = imagecreatefromjpeg('images/picture.jpg');
	
	// Définit les marges pour le cachet et récupère la hauteur et la largeur de celui-ci
	$marge_right = 10;
	$marge_bottom = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);
	
	// Copie le cachet sur la photo en utilisant les marges et la largeur de la photo originale  afin de calculer la position du cachet
	imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
	

	// Affichage et libération de la mémoire
	header('Content-type: image/png');
	imagepng($im);
	imagedestroy($im);
?>
