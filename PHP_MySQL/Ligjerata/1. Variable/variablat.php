<html>
	<head>
	</head>
	<body>
		<?php
			//Mbledhja e dy variablave
			
			$x = 7;
			$y = 13;
			
			$z=$x+$y;

		    echo $z;
		?>
		<br>
		<?php  
			//Dallimi ne mes te ketyre dy variablave, $x dhe $$x eshte, variabla $$x mund te i qaset edhe vleres brenda variables me nje $x.
			$x = "Prizren";  
			$$x = "200";  
			echo $x."<br>";  //konkatinimi behet edhe me "." edhe me ","
			echo $$x."<br>";  
			echo $Prizren;  
		?>  
	</body>
</html>