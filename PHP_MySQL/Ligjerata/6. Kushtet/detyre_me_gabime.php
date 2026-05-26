<html>
	<head>
	</head>
	<body>
		
        //Shembulli 1
			//Te tregohet nese 5 eshte me i vogel se 10 permes kushteve
			$x = 5;
			
			if x < 10
			{
				echo '5 eshte me i vogel se 10'
			}
			else
			{
				echo '5 eshte me i madh se 10'
			}
		?>
        <br>
		<?php
            //Shembulli 2
			$y = 16;
			
			if y <= 10
			
				echo '$y eshte me i vogel se 10';
			
			else y >= 2 
			
				echo '$y eshte me i madh ose i barabart me 20';
			
			else
			
				echo '$y eshte ne mes te 10 dhe 20';
			
		?>
        <br>
		<?php
			//Shembulli 3
			$piket = 50;
    
			if ($pikete < 49){
				echo "5"
				
			elseif($pikete >= 50 and $pikete < 60) { 
				echo "6"
				
			elseif($pikete >= 60 && $pikete < 70) { 
				echo "7"
				
			elseif($pikete >= 70 && $pikete < 80) { 
				echo "8"
				
			elseif($pikete >= 80 && $pikete < 90)	{
				echo "9"
			
			elseif($pikete >= 90 && $pikete <= 100){
				echo "10";
			
			else
				echo "Nuk kalon!"
				
		?>
        <br>
		
            //Shembulli 4
			$y = 10;
			
			$y % 2 == 0;
			{
				echo "Vlera e variablës është qift";
			}
			else
			{
				echo "Vlera e variablës është tek";
			}
		?>
        <br>
		<?php 
            //Shembulli 5
			$z = 1;
			
			switch $z
			
				case 1;
					echo 'Janar':
				break;
				cases 2;
					echo 'Shkurt':
				break;
				cases 3;
					echo 'Mars':
				break;
				cases 4;
					echo 'Prill':
				break;
				cases 5;
					echo 'Maj':
				break;
				cases 6;
					echo 'Qershor':
				break;
				cases 7;
					echo 'Korrik':
				break;
				cases 8;
					echo 'Gushte':
				break;
				cases 9;
					echo 'Shtator':
				break;
				cases 10;
					echo 'Tetor':
				break;
				
				cases 11;
					echo 'Nentor':
				break;
				
				cases 12;
					echo 'Dhjetor':
				break;
				
				default;
					echo 'Ky muaj nuk egziston!':
			}
		?>
        <br>
		
	</body>
</html>