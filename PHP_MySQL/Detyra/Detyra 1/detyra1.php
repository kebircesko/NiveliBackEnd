<html>
	<head>
	</head>
	<body>
	<p>Detyra pare</p>
		<?php
			$xo = array('x', ' ', 'o');
			$oox = array('o', 'o', 'x');
			$ox = array(' ', 'o', 'x');
							
			print_r($xo);
			echo '<br>';
			print_r($oox);
			echo '<br>';
			print_r($ox);
		?>
	<p>Detyra e dyte</p>
		<?php
			$brinja = 7;
			$brinja1 = 5;
			$siperfaqja = $brinja * $brinja1;
			$perimetri = (2 * $brinja)+(2 * $brinja1);
			
			echo 'Siperfaqja e paralelogramit eshte: '.$siperfaqja;
			echo '<br>';
			echo 'Perimetri i paralelogramit eshte: '.$perimetri;
		?>
	</body>
</html>