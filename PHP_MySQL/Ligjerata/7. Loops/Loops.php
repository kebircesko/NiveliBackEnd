<html>
	<head>
	</head>
	<body>
		<!--Loops(cikli,perseritjet):Shpesh kur shkruani kod, dëshironi që të ekzekutoni një bllok kodi disa herë. Për këtë përdoren ciklet(loops).-->
		<p>While loops</p>
        
		<?php
        
			$x = 1;
			
			while($x <= 10)//while(derisa)->Struktura while bën përsëritjen e një blloku derisa vlen një kusht. Në momentin që kushti nuk plotësohet (kthen vlerën FALSE), cikli ndërpritet.(ekzekuton një bllok kodi për sa kohë një bllok kodi është i vërtetë.)
			{
				
				echo $x."<br>";
				$x++;
				// Pyetje? Si mund te i rrisim nga dy vlera, ose me shume.
				//1.->$x+=2;-->
			}
        
		?>
        <p>Do while loops</p>
        <!--Sintaksa:
			do { kodi që do të ekzekutohet; } 
				while (kushti është i vërtetë);
		Kushti në ciklin do while do të ekzekutohet pasi blloku i kodit të jetë ekzekutuar njëherë. Kjo do të thotë që cikli do while do të ekzekutohet të paktën njëherë edhe pse kushti mund të mos jetë i vërtetë.-->
        
		<?php
        
			$y = 1;
			do{//Cikli do...while(beje-perderisa) gjithmonë do të ekzekutojë kodin njëherë, më pas kontrollon kushtin, dhe më pas përsërit ciklin për sa kohë kushti i specifikuar është i vërtetë.
				echo $y . '<br>';
				$y++;
				if($y==6)//mundesh edhe disa kushte me perdor psh me if
				{
					break; //e nderpret loop edhe nese nuk ka perfundue ende.
				}
			}
			while($y <= 10)
		?> 
		<br>
		<?php 
			$x = 4;
			do {
		 		 echo "Numri eshte: $x <br>";
		 		 $x++;
				} 
				while ($x <= 5);//while do të ekzekutojë deklaratat e tij të paktën një herë, edhe nëse kushti është i gabuar.
		?>
		<p>For loops</p>
        <!---Sintaksa
			for (vlera fillestare; kushti; rrit vlerën fillestare) 
			{ kodi që do të ekzekutohet; }
		Parametrat:
		1. Vlera fillestare: Inicializimi i ciklit
		2. Kushti : Kontrollohet për çdo cikël. Nëse është i vërtetë, cikli vazhdon. Nëse nuk është i vërtetë cikli mbaron.
		3. Vlera rritjes: Rrit vlerën e numëruesit të ciklit.-->

		<?php
			
			for($z=1;$z<=10;$z++)//for(per)->Formon strukturë ciklike, gjegjësisht iteracione. Kjo mundëson përsëritjen e ekzekutimit të një blloku të kodit.(Struktura ciklike for përdoret kur na nevojitet përsëritja e një blloku për një numër fiks të herave)
			{
				echo 'Numeri eshte: ' . $z . '<br>';
				if($z>=6)
				{
					break; //e nderpret loop edhe nese nuk ka perfundue ende.
				}
			}
		?>    
		<p>Foreach Loops</p>
		<!--Cikli foreach punon vetëm në matrica, dhe përdoret për të kaluar në secilin element të matricës.
		Sintaksa
		foreach ($matrica $vlera) 
		{ kodi që do të ekzekutohet; }-->
		
        <?php
		//foreach vlen vetem per array.
			$txt = array(1,2,3,4,5,6,7);

			foreach($txt as $x)
			{
				echo " $x <br>";
			}
		?>
    
		<br>
        
		<?php
            $text = array(2,3,5,22,11,6,3,5);
            sort($text);
		
            $txt = count($text);    
                for($x=0; $x<$txt; $x++)
                {
				    echo $text[$x].'<br>';  
                }
		?>
        
        
        
        
        
        





	</body>
</html>
