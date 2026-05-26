<html>
	<head>
	</head>
	<body>
		<p>Detyra 1</p>
		<?php
			function convertCtoF($c)
			{
				$x = (9/5) * $c + 32;
				return $x;
			}
			echo convertCtoF(15);
		?>
		<br>
		<?php
			function convertFtoC($f)
			{
				$y = ($f - 32) * 5/9;
				return $y;
			}
			echo convertFtoC(15);
		?>
        
		
        <p>Detyra 2</p>
        <?php
            function convertKmtoM($kilometer)
				{
					$meter = $kilometer*1000;
					
					return $meter;
				}
				echo convertKmtoM(1);
        ?>
        
        <p>Detyra 3</p>
        
		<?php
			function mesatarja($p1,$p2,$p3,$p4,$p5)
			{
				$sum = ($p1+$p2+$p3+$p4+$p5)/5;
				return $sum;
			}
            echo mesatarja(1,2,3,4,5);
		?>
	</body>
</html>
