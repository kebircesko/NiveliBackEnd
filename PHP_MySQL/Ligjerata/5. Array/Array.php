<html>
	<head>
	</head>
	<body>
	<h2>Arrays</h2>
		<?php 
		//Indexed Arrays -jane array me indeksa numerik
		//Krijimi i nje Array
			$x = array("Shkolla","Digjitale","Prizren");
			// echo ($x);
			//Menyra se si mund te ju qasemi elementeve te Array, permes Index.
			echo $x[0]."<br>".$x[1]."<br>".$x[2].'<br>';
            // //echo $x;
            print_r($x);
            echo "<br>";
            var_dump($x);
		?>
		<br>
		<?php
			//Count(), kjo metod na mundeson te gjejme gjatesin e array.
			$x = array("Shkolla","Digjitale","Prizren");
			echo count($x);
		?>
		<br>
		<?php
		//Associative Arrays - jane array me emra te qelsave
		//I pari eshte qelesi ndersa e dyta vlera,p.sh "Kebir" eshte qelesi, ndersa "24" eshte vlera
			$mosha = array("Kebir"=>29, "Arianit"=>31, "Fation"=>26);
			echo "Kebiri eshte " . $mosha['Kebir'] . " vjeq.";
		?>
		<h2>Sorting Arrays</h2>
		<h3>sort()</h3>
		<?php 
		//Array mund te renditen ne menyre alfabetike ose numerike nga fillimi apo nga fundi.
			//sort(), kjo metod na mundeson qe ta renditim elementet e nje Array, nga numeri me i vogel.
			$x = array(3,54,2,12,3,4,9,8,5);
			sort($x);
			print_r($x);
            echo "<br>";
            //echo $x;
			//per ti nxjerr vetem si vlera nga array e perdorim for loop.
			$y = count($x);
			for ($z = 0; $z < $y; $z++)
			{
				echo $x[$z];
				echo "<br>";
			}
		?>
		<br>
		<?php
		//Per renditjen e tekstit
			//$text = array("Shkolla","Digjitale","Prizren");
			$text = array("Shkolla","Digjitale","Prizren", "kebir");
            sort($text);
            $x = count($text);
        
			for($y=0; $y<$x; $y++)
			{
				echo $text[$y];
				echo "<br>";
			}
		?>
		<h3>rsort()</h3>
		<?php
			$x = array(2,43,65,4,7,2,12,3,9,8);
			rsort($x);
        
			$y = count($x);
        
			for($z=0;$z<$y;$z++)
			{
				echo $x[$z];
				echo "<br>";
			}
            
        //Vazhdim...
		?>
		<h3>asort()</h3>
		<?php
		//Associative Arrays - mund te renditen edhe nga fillimi edhe nga fundi.
		//asort()-mundeson renditjen e elementeve ne baze te vleres.
            $mosha = array("Kebir"=>"29", "Arianit"=>"31", "Fation"=>"25");
			asort($mosha);
			foreach($mosha as $x => $x_value)
			{
				echo $x ." - ". $x_value;
				echo "<br>";
			}
		?>
		<h3>ksort()</h3>
		<?php
		//ksort()-mundeson renditjen e ementeve ne baze te qelesit. 
			$mosha = array("Kebir"=>"24", "Arianit"=>"26", "Fatjona"=>"26");
			ksort($mosha);
			$mosha1 = array("Kebir"=>"24", "Arianit"=>"26", "Fatjona"=>"26");
        
			foreach($mosha as $x => $x_value)
			{
				echo $x ." ". $x_value;
				echo "<br>";
			}
		?>
		<h3>arsort()</h3>
		<?php
		//Associative Arrays - mund te renditen edhe nga fillimi edhe nga fundi.
		//arsort()-mundeson renditjen e ementeve ne baze te vleres nga fundi ne fillim.
			$mosha = array("Kebir"=>"24", "Arianit"=>"26", "Fatjona"=>"26");
			arsort($mosha);
			foreach($mosha as $x => $x_value)
			{
				echo $x ." ". $x_value;
				echo "<br>";
			}
		?>
		<h3>krsort()</h3>
		<?php
		//Associative Arrays - mund te renditen edhe nga fillimi edhe nga fundi.
		//krsort()-mundeson renditjen e ementeve ne baze te qelesit nga fundi ne fillim. 
			$mosha = array("Kebir"=>"24", "Arianit"=>"26", "Fatjona"=>"26");
			krsort($mosha);
			foreach($mosha as $x => $x_value)
			{
				echo $x ." ". $x_value;
				echo "<br>";
			}
		?>
        <h3>Multidimensional Array</h3>
        <?php  
            //Multidimensional Array
            //Array multidimensional ne PHP njihet gjithashtu si grup i array. 
            //Kjo ju lejon të ruani të dhëna tabelore në një grup. 
            //Array multidimensional ne PHP mund të paraqitet në formën e matricës e cila përfaqësohet nga kolona dhe rresht.
            $arr = array(  
                    array(4,"Prizren",20000),  //row 1 04 -00
                    array(1,"Prishtine",10000),//row 2
                    array(7,"Gjakove",50000)   //row 3
                    );  
  
            for ($row = 0; $row < 3; $row++) {  
                for ($col = 0; $col < 3; $col++) {  
                    echo $arr[$row][$col]."  ";  
                }  
                echo "<br>";  
            }  
        ?>
		<h3>pop()</h3>
		<?php
		//pop()fshin nje elementet nga fundi i array.
			$text = array("Shkolla","Digjitale","Prizren");
			array_pop($text);
			print_r($text);
		?>
		<h3>push()</h3>
		<?php
		//push()shton nje elementet nga fundi i array.
			$text = array("Shkolla","Digjitale","Prizren");
			array_push($text,"Prishtine");
			print_r($text);
		?>
		<h3>shift()</h3>
		<?php
		//shift()fshin nje elementet nga fillmi i array.
			$text = array("Shkolla","Digjitale","Prizren");
			array_shift($text);
			print_r($text);
		?>
		<h3>unshft()</h3>
		<?php
		//unshift()shton nje elementet ne fillim te array.
			$text = array("Shkolla","Digjitale","Prizren");
			array_unshift($text,"Prishtine");
			print_r($text);
		?>
		<h3>splice()</h3>
		<?php
		//splice()na mundeson qe njekosisht te shtojem dhe te fshijme elementet brenda array.
			$text = array("Shkolla","Digjitale","Prizren");
			array_splice($text, 1, 1, "Prishtine");
			print_r($text);
		?>	
</body>
</html>