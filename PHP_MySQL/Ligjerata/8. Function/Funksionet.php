<html>
	<head>
	</head>
	<body>
		<?php
			//Krijmi i nje funksioni
			function x() //metoda per funksionet
			{
				echo "Shkolla Digjitale Prizren 2026"; //Vendosja e "echo" brenda funksionit.
			}
			x(); //Thirrja e nje funksioni,si dhe x eshte emri i funksionit
		?>
		<br>
		<?php
			function text($emri)//Funksioni me parametra
			{
				echo "$emri.<br>";
			}
			text("Shkolla");//Thirrja e funksionit me argumente(parametra).
			text("Shkolla");
			text("Shkolla");
			// text1("Art"," Gashi",16);//A funksionon ?
			function text1($emri1,$mbiemri,$mosha)//Funksioni me parametra
			{
				echo $emri1." ".$mbiemri." ".$mosha."<br>";
			}
			text1("Kebir"," Çesko",29);//Thirrja e funksionit me argumente(parametra).
		?>
		<br>
		<?php
			//Krijmi i nje funksioni
			function vlera($x,$y)
			{	
				echo $x + $y; //Vendosja e "echo" brenda funksionit.
				echo $x * $y; //Pyetje? Qfare rezultati na jep?
			}
			vlera(5,5); //Thirrja e nje funksioni
        	echo "<br>";
            vlera(10,10);
		?>
		<br>
		<?php
			//Tek versioni i fundit PHP7 duhet te i tregohet edhe tipi i te dhenave te parametrave
			//function string(string $a, string $b)
			function number(int $a, int $b)//Nese i tregojme edhe tipin e te dhenave atehere kur deshirojme te mbledhim tipin number me string na raporton error.
			{
			return $a + $b;//Return perdoret per te na kthyer nje rezultat nga kodi i funksionit
			//return $a . $b;
			}
			//echo number(5, "1days"); //e merr te stringu shkronjen dmth numrin e pare dhe e mbledh
			echo number(5,1);
			echo "<br>";
		?>
		<br> 
		<?php
			function test1($a,$b)//Edhe pa tipin e te dhenave funksionon.
			{
				return $a * $b;//Return gjithashtu perdoret edhe per ta ndaluar se ekzekutuar funksionin.
			}
			echo test1(5,5);//e merr te stringu shkronjen dmth numrin e pare dhe e mbledh
		?>
		<br>
		<br>
		<?php
			
			function numri()
			{
				$x1 = "6"; //deklarimi i variablave ne menyre lokale.Mund te i caktojme edhe variabla brenda funksionit,dhe nuk e kqyr tipin per me +,-,*,/
				$y = 6;
				return $x1 + $y;
			}
			echo numri();
            //echo $y;//nuk funksionon dmth me thirre variablen pse ?
		?>
		<br>
		<br>
		<?php 
			$x = 10; //deklarimi i variablave ne menyr globale
			$y = 10;
			function mbledh()
			{
				global $x;//menyra se si me tregu qe jane variablat globale sepse nuk punon nese nuk e vendosim metoden global per variablat qe i kemi kriju
				global $y;
				return $x + $y;
			}
			echo mbledh();
			echo '<br>';
			echo $x;
		?>
		<br>
		<br>
		<?php
				echo $x;
				echo '<br>';
				//echo $x1; //nuk thirret sepse eshte local variable
				echo '<br>';
		?>
		<?php
			function fiks ($x = 20,$y = 30) //Parametrave mund te ju caktojme edhe vlera fikse.
			{
				echo "<b>Vlera eshte:</b> x=".$x. " dhe y=" .$y;
			}
			fiks();
		?>
		<br>
		<br>
		<?php
		//Nese deshirojme te caktojme parametra me te dhena "float" por si rez. te nxjerrim "int".
			function mePresje(float $a, float  $b)
			{
				return (int)($a + $b);
			}
			echo mePresje(1.6, 3.3);
		?>
		<br>
		<br>
		<?php 
		//Nese e shenojme keshtu atehere si rezultat na nxjerr numer me presje(float).
			function mePres($a, $b) 
			{
				//return ($a + $b);
				return round($a + $b); //per me i rumbullaksu vleren
			}
			echo mePres(1.4, 3.3);
		?>	
		<br>
		<br>
		<?php 
		//Nese e shenojme keshtu atehere si rezultat na nxjerr numer me presje(float).
			function mePres1($a, $b) 
			{
				return round($a + $b); //per me i rumbullaksu vleren
			}
			echo mePres1(1.5, 3.3);
		?>
		<br><br>
		<?php

			//echo number();
			echo mbledh();
		?>
	</body>
</html>