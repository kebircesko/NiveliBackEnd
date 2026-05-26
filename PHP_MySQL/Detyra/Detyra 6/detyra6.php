<html>
	<head>
	</head>
	<body>
		<p>Detyra 1 (while loop)</p>
		<?php
			$x = 1;
			
			while($x <= 10)
			{
				//echo "numeri eshte: $x <br>";
				echo "Numeri eshte: " . $x .  "<br>";
				$x++;
				//$x+=2; Pyetje? Si mund te i rrisim nga dy vlera, ose me shume.
			}
		?>
		<p>Detyra 1 (Do while loops)</p>
		<?php
			$y = 1;
			do{
				echo 'Numeri eshte:' . $y . '<br>';
				$y++;
			}
			while($y <= 10)
		?>
		<p>Detyra 2</p>
		<?php 
			$x = 1;
			while($x<=10)
			{
				echo $x.' '.'x'.' '.'5'.' '.'='.' '.$x * '5'.'<br>';
				$x++;
			}
		?>
        
		<p>Detyra 3</p>
        
		<?php
			for($x=1;$x<=3;$x++)
			{
				for($y=1;$y<=3;$y++)
				{
					echo "$x $y <br>";
				}		
			}
		?>
        
        
		<p>Detyra 4</p>
		<?php
			$text = array('Prizren','Prishtine','Mitrovice','Gjakove','Gjilan','Peje');
			sort($text);
			foreach($text as $arr)
			{
				echo "$arr <br>";
			}
		?>
		
		<p>Detyra 5</p>
        
		<?php
			$text = array('Prizreni','Prishtina','Mitrovica','Gjakova','Gjilani','Peja');
			sort($text);
			
			$txt = count($text);
			for($x=0;$x<$txt;$x++)
			{
				echo $text[$x]. ' eshte: '.($x+1).'<br>';
			}
		?>
		
		
		
		
		
		
		
		
		
		
	</body>
</html>