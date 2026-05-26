<html>
	<head>
	</head>
	<body>
		<h2>Detyra 1 convertCtoF (15grad)</h2>
		<?php
			function convertCtoF($c)
			{
				$x = (9/5) * $c + 32;
				return $x;
			}
			echo convertCtoF(15);
		?>
		<br>
		<h2>Detyra 2 convertFtoC (15grad)</h2>
		<?php
			function convertFtoC($f)
			{
				$y = ($f - 32) * 5/9;
				return $y;
			}
			echo convertFtoC(15);
		?>
		<h2>Detyra 3 Mesatarja</h2>
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
