<?php session_start(); ?>

  <title>Captcha.php</title>
   <body style="background-color:#ddd; ">


       <?php    
	       create_image();
	    ?>    
	       
        <div style="text-align:center;">
           <h3>TYPE THE TEXT YOU SEE IN THE IMAGE</h3>
           <b>This is just to check if you are a robot</b>
           <div style="display:block;margin-bottom:20px;margin-top:20px;">
          		<img src="image.png">
        	</div>
      	</div>
    
		<?php 
			
			function  create_image()
			{
		        $image = imagecreatetruecolor(200, 50);
		        // affichage image
		        $background_color = imagecolorallocate($image, 255, 255, 255);
		        imagefilledrectangle($image,0,0,200,50,$background_color);
		        // distortion
		        $line_color = imagecolorallocate($image, 64,64,64);
		        for($i=0;$i<6;$i++) 
		        {
		          imageline($image,0,rand()%50,200,rand()%50,$line_color);
		        }
		        // dot display
		        $pixel_color = imagecolorallocate($image, 0,0,255);
		        for($i=0;$i<1000;$i++) 
		        {
				    imagesetpixel($image,rand()%200,rand()%50,$pixel_color);
		        }
		        // display letters
		        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
		        $len = strlen($letters);
		        //~ $letter = $letters[rand(0, $len-1)];
		        $text_color = imagecolorallocate($image, 0,0,0);

		        $word = "";
		        for ($i = 0; $i< 6;$i++)
		        {						
		            $letter = $letters[rand(0, $len-1)];
		            imagestring($image, 5,  5+($i*30), 20, $letter, $text_color);
		          $word= $word . $letter;
		        }
		        $_SESSION['captcha'] = $word;
		        //display
		        imagepng($image, "captcha.png");
			}
		?>
  </body> 