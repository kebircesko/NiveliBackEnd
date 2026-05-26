<html>
	<head>
	</head>
	<body>
        <p>Detyra 1</p>
		<?php
			$y = 16;
			
			if($y <= 10)
			{
				echo '$y eshte me i vogel se 10';
			}
			else if($y >= 20)
			{
				echo '$y eshte me i madh ose i barabart me 20';
			}
			else
			{
				echo '$y eshte ne mes te 10 dhe 20';
			}
		?>
        
        
        <p>Detyra 2</p>
        <?php
        
			$piket = 50;
    
			if ($piket < 49){
				echo "5";
				}
			elseif($piket >= 50 and $piket < 60) { 
				echo "6";
				}
			elseif($piket >= 60 && $piket < 70) { 
				echo "7";
				}
			elseif($piket >= 70 && $piket < 80) { 
				echo "8";
				}
			elseif($piket >= 80 && $piket < 90)	{
				echo "9";
			}
			elseif($piket >= 90 && $piket <= 100){
				echo "10";
			}
			else{
				echo "Nuk kalon!";
				}

		?>
        
        
        <p>Detyra 3</p>
		<?php
        
			$y = 10;
			
			if($y % 2 == 0)
			{
				echo "Vlera e variablës është qift";
			}
			else
			{
				echo "Vlera e variablës është tek";
			}
		?>
        
        
        <p>Detyra 4</p>
		<?php 
            
			$z = 15;
			
			switch($z)
			{
				case 1:
					echo 'Janar';
				break;
				case 2:
					echo 'Shkurt';
				break;
				case 3:
					echo 'Mars';
				break;
				case 4:
					echo 'Prill';
				break;
				case 5:
					echo 'Maj';
				break;
				case 6:
					echo 'Qershor';
				break;
				case 7:
					echo 'Korrik';
				break;
				case 8:
					echo 'Gushte';
				break;
				case 9:
					echo 'Shtator';
				break;
				case 10:
					echo 'Tetor';
				break;
				
				case 11:
					echo 'Nentor';
				break;
				
				case 12:
					echo 'Dhjetor';
				break;
				
				default:
					echo 'Ky muaj nuk egziston!';
			}
		?>
        
        
        <p>Detyra 5</p>
		<?php
            
			$ditet = 'E Hene';
			
			switch($ditet)
			{
				case 'E Hene':
					echo 'E Hene eshte dita e pare e javes';
				break;
				
				case 'E Marte':
					echo 'E Marte eshte dita e dyte e javes';
				break;
				
				case 'E Merkure':
					echo 'E Merkure eshte dita e tret e javes';
				break;
				
				case 'E Enjte':
					echo 'E Enjte eshte dita e katert e javes';
				break;
				
				case 'E Premte':
					echo 'E Premte eshte dita e peste e javes';
				break;
				
				case 'E Shtune':
					echo 'E Shtune eshte dita e gjashte e javes';
				break;
				
				case 'E Diel':
					echo 'E Diel eshte dita e shtate e javes';
				break;
				
				default:
					echo 'Kjo dite nuk egziston';
			}
		?>

	
	</body>
</html>