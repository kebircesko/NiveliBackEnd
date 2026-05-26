<html>
	<head>
	</head>
	<body>
		<h3>String</h3>
		<?php
		 // Tipi i te dhenave String.
			$x = "Shkolla Digjitale";
			$y = 'Prizren';
            
            echo $x . $y;
		?>
		<h3>Integer</h3>
		<?php
		 // Tipi i te dhenave Integer.
		 //Me Integer mund te shenojme te dhena number, mirepo vetem numra te plot.
		 //Rangu i numrave qe i perfshin integer eshte nga -2^31 deri ne 2^31.
            $x = 2323;
            echo $x; 
            echo "<br>";
			var_dump($x); //Perveq qe na tregon vleren, na tregon edhe qe eshte integer, pra tipin e te dhenave.
		?>
		<br>
		<?php  
            $x=123;  
			$y='abc';
			$z=4.4;
			
            echo is_int($x); //Nese eshte 'Integer' kthen si rezultat 1. 
            echo "<br>";
			echo is_int($y); //Nese nuk eshte atehere del 0, por nuk na shfaqet ne browser	
			var_dump(is_int($x));
			echo "<br>";
			var_dump(is_int($y));
			echo is_string($x);
			echo "<br>";
			var_dump(is_float($z));
        ?>  
		<br>
        <?php   
            // Numrat Decimal   baze 10
            $deci1 = 40;    
            $deci2 = 500;    
            // Numrat Oktal     baze 8       
				$octal1 = 07;    
			
            // Numrat HeksaDecimal   baze 16
				$heksa = 0x10;    
				$add = $deci1 + $deci2;   
				echo $add."<br>";   
				echo $octal1."<br>";
				echo $heksa."<br>";
			?>  

		<h3>Float</h3>
			<?php
			//Me Float mund te shenojme prap te dhena number, mirepo mund te shenojme te dhena edhe me presje dhjetore.
			
				$x = 10.365;
                echo $x;
                echo "<br>";
				var_dump($x); //Per te na treguar tipin e te dhenave
			?>
		<h3>Boolean</h3>

			<?php
			//Boolean na nxjerr vetem dy vlera 'true' ose 'false'.
                
                $x = true;
				$y = false;
				
				echo $x.'<br>'; //Kur eshte true na kthen si rezultat 1
                var_dump($x);
				echo $y . '<br>'; //Ndersa kur eshte false nuk na kthen si rezultat asgje.
                var_dump($y);
				?>
        <h3>Array</h3>
			<?php
			     //var array = [10,10,10];

				$arr = array(10,20,30);
				$text = array('shkolla','Digjitale','Prizren','PZ ');
				//echo $arr; //Tek Array nuk na funksionon as echo as print.
				//print $arr;
				print_r($arr); //Na nxjerr rezultatin dhe na tregon secili element ne cilin indeks ndodhet.
				echo '<br>';
                echo '<br>';
				var_dump($arr);
				echo '<br>';
				var_dump($text);//Perveq tipit e tregon edhe gjatesin e stringut.	
			?>
		<h3>Object</h3><!--Eshte me nje dit tjeter-->
		<h3>NULL</h3>
			<?php   
			//Një variabel e tipit Null është një variabel pa asnjë të dhënë. 
			//Në PHP, null nuk është një vlerë, dhe ne mund ta konsiderojmë atë si një variabël null bazuar në 3 kushte.
			//Nëse variabla nuk është e vendosur me ndonjë vlerë.
			//Nëse variabla është e vendosur me një vlerë null.
			//Nëse vlera e variables është e paqartë.
				$emp=null;  
				echo $emp; //Nuk nxjerr asgje pasi qe eshte null.
				var_dump($emp);  //Tregon tipin qe eshte Null.
			?> 
			<br><br>

			<?php 
				$a1 = " "; // kushti1 
				var_dump($a1); //Tregon qe eshte string dhe eshte bosh.
				echo "<br>";  
				$a2 = null;  //kushti2
				var_dump($a2); 
				echo "<br>";
				$x = NULL; //kushti3 
				var_dump($x);  
				echo "<br>";  
			?> 
			<br>
            <br>
			<?php  
				$x = NULL;  
				var_dump($x);  
				echo "<br>";  
				$y = "Hello PHP!";  
				$y = NULL;  
				var_dump($y);  
			?>  
		<h3>Resource</h3>
			<?php 
			/* 
			//Ky tip i te dhenave eshte per lidhje nga jashte.
			//P.sh kur do ta bejme lidhje e databazes me file tone.
              $conn = ftp_connect("127.0.0.1") or die("Could not connect");  
				echo get_resource_type($conn);

			?>	
			<?php  
				$conn= ftp_connect("172.0.0.1") or die("could not connect");  
				echo $conn;
            */
			?>  	
	</body>
</html>