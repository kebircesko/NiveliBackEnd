<html>
	<head>
	</head>
	<body>
        <h1>Operatoret</h1>
        <h3>Operatoret Aritmetik</h3>
        
        <?php
			$x = 10;
			$y = 20;
			
			echo $x + $y;
            echo "<br>";
            echo $x - $y;
            echo "<br>";
            echo $x * $y;
            echo "<br>";
            echo $x / $y;
            echo "<br>";
            echo $x % $y;   //modulo(per me e nxjerr mbetjen)
                            //10 / 20 = 0 
		                    // 0
                            // 10
        ?> 
        <h3>Operatoret Percaktues</h3>
        
        <?php
			$x = 10;
			$y = 20;
			
			//echo $x = $y;  // x = y (x ja japim vleren e y)
            echo "<br>";
            echo $x += $y;  // x += y; x = x+y
            echo "<br>";
            echo $x -= $y;
            echo "<br>";
            echo $x *= $y;
            echo "<br>";
            echo $x /= $y;
            echo "<br>";
            echo $x %= $y;
		?>
        
        <h3>Operatoret Krahasues</h3>
        
        <?php
			$x = 10;
			$y = 20;
			
			echo $x == $y;   //a jan te barabarte
            var_dump($x==$y);
            echo "<br>";
            echo $x === $y; //e kontrollon a jane te barabart si dhe e kqyr llojin e tipit te te dhenave
            var_dump($x===$y);
            echo "<br>";
            echo $x != $y;  // e kontrollon a nuk jane te barabart
            var_dump($x!=$y);
            echo "<br>";
            echo $x <> $y;  // e kontrollon a nuk jane te barabart(eshte njesoj sikurse !=)
            echo "<br>";
            echo $x > $y;
            echo "<br>";
            echo $x < $y;
            echo "<br>";
            echo $x >= $y;
            echo "<br>";  
            echo $x <= $y;
            echo "<br>";
		?>
        
        <h3>Operatoret Logjik</h3>
        
		<?php
			$x = 11;
			$y = 20;
			
            //AND
			$z = ($x > 5 and $y < 30); //rezultati true(duhen me qene te dyjat me plotesu kushtin True True atehere del rezultati True,nese njona eshte False atehere del rezultati False-Sikurse te gjykimet)  
            // echo $z;
            echo "<br>";
			var_dump($z);
			
            //OR
            echo "<br>";
			$a = ($x > 15 or $y < 30);//Nese te dy kushtet jane te sakta rezultati del i sakte po ktu edhe nese njera del qe vetem njeri i sakt prap del i sakt True
			var_dump($a);
            
            //NOT
            echo "<br>";
			$a = !($x > 10 or $y < 30);//E bene te kunderten nese eshte True del False nese eshte False del True
			var_dump($a);
        
            // // XOR
            // echo "<br>";
			// $a = ($x > 10 xor $y < 30);//0->0=0; 0->1=1; 1->0=1; 1->1=0;(ka edhe shembull per XOR ne google)
			// var_dump($a);
            
		?>
        
        <h3>Operatoret String</h3>
        
		<?php
			$x = "10";
			$y = "20";
			echo $x.$y;//bashkim i elementeve me . dhe me ,
            echo "<br>";    
        
            $name = "kebir";
            $age = "29";
			echo $name,$age;//bashkim i elementeve me . dhe me ,
            echo "<br>";
            echo $x .= $y;
		?>

        <h3>Increment Decrement Operatoret</h3>
        
		<?php
			$x = 10;
			$y = 20;
			

            echo $x++; //rrit per nje
            echo "<br>";
            echo $x;
            echo "<br>";
            echo ++$x;
            
            echo "<br>";
            echo "<br>";
            
            echo $y--;  //minuson per nje
            echo "<br>";
            echo $y;
            echo "<br>";
            echo --$y;
            echo "<br>";
            echo "<br>";
		?>
        <?php 
            $gjat = 7; 
            $gjer = 5; 
            echo "Siperfaqja e paralelogramit eshte: " .  ($gjat * $gjer ) . " cm2"; 
            echo "<br>";
            echo "Perimetri i paralelogramit eshte : " . ($gjat + $gjer ) . " cm";
        ?>
	</body>
</html>