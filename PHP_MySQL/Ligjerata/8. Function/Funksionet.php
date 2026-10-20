<html>
	<head>
	</head>
	<body>
		<!--Fuqia reale e PHP vjen nga funksionet e tij; ka më shumë se 1000 funksione të para-ndërtuara.
		Pavarsisht funksioneve të paracktuara PHP, ne mund të krijojmë funksione sipas nevojës.
		Një funksion është një bllok i cili përdoret në mënyrë të përsëritur në program.
		Kur ngarkohet një faqe, funksionet nuk ekzekutohen menjëherë.
		Një funksion do të ekzekutohet kur funksioni thërritet.
		Një funksion i përcaktuar nga përdoruesi fillojnë deklarimin me fjalën kyçe “function”
		Sintaksa:function EmriFunksioni() { kodi që do të ekzekutohet; }
		Një emër funksioni mund të fillojë me shkonjë ose një underscore (-) jo numbër.
		Emërtoji funksionet me emra që identifikojnë rolin e tyre. 
		Funksionet e emrave NUK jane case-sensitive.-->
		<?php
			//Krijmi i nje funksioni
			function x() //metoda per funksionet
			{
				echo "Shkolla Digjitale Prizren"; //Vendosja e "echo" brenda funksionit.
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
	
			function text1($emri1,$mbiemri)//Funksioni me parametra
			{
				echo $emri1.$mbiemri."<br>";
			}
			text1("Shkolla","Digjitale");//Thirrja e funksionit me argumente(parametra).
			text1("Shkolla","Digjitale");
			text1("Shkolla","Digjitale");
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
			echo number(5, "1days"); //e merr te stringu shkronjen dmth numrin e pare dhe e mbledh
		?>
		<br> 
		<?php
			function test1($a,$b)//Edhe pa tipin e te dhenave funksionon.
			{
				return $a * $b;//Return gjithashtu perdoret edhe per ta ndaluar se ekzekutuar funksionin.
			}
			echo test1(5,"5days");//e merr te stringu shkronjen dmth numrin e pare dhe e mbledh
		?>
		<br>
		<br>
		<?php
			function numri()
			{
				$x = "6"; //deklarimi i variablave ne menyre lokale.Mund te i caktojme edhe variabla brenda funksionit,dhe nuk e kqyr tipin per me +,-,*,/
				$y = 6;
				return $x * $y;
				
			}
			echo numri();
            //echo $y;//nuk funksionon dmth me thirre variablen
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
		?>
		<br>
		<br>
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
			echo mePresje(1.5, 3.3);
		?>
		<br>
		<br>
		<?php 
		//Nese e shenojme keshtu atehere si rezultat na nxjerr numer me presje(float).
			function mePres($a, $b) 
			{
				return ($a + $b);
				//return round($a + $b); //per me i rumbullaksu vleren
			}
			echo mePres(1.5, 3.3);
		
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

			echo number(5, "1days");

		?>
	</body>
</html>