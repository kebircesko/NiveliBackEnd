<html>
	<head>
	</head>
	<body>
		<h3>String</h3>
		<?php
			//Na mundeson gjetjen e gjatesis se stringut.
			echo strlen("Prizren");
		?>
		<br>
		<?php
			//Na tergon sa fjal i kemi brenda nje stringu.
			echo str_word_count('Shkolla Digjitale Prizren');
		?>
		<br>
		<?php
			
			//Eshte nje metod e cila ne kthen stringun mbrapsht.
			echo strrev('Shkolla');
		?>
		<br>
		<?php
			//Na mundeson te gjejme se ne cilen pozite fillon cfardo shkronje 
			$pozicioni= strpos('Shkolla Digjitale Prizren', 'D');//e lexon shkronje per shkronje dhe e gjen ne cilen index eshte
			$pozicioni2= strpos('Shkolla Digjitale Prizren', 'Prizren');
			echo $pozicioni.'<br>';
			echo $pozicioni2;
		?>
		<br>
		<?php
			//Na mundeson te ndryshojme nje fjale me nje fjale tjeter brenda nje stringu.
			$emri='Shkolla Digjitale Prizren'.'<br>';
			$ndrroje= str_replace('Prizren','Prishtine',$emri);
			
			echo $emri;
			echo $ndrroje;
		?>
		<br>
	</body>
</html>