<html>
	<head>
	</head>
	<body>
		<?php   //XML 
        // print dhe echo na mundesojne shfaqjen e rezultatit
            print "<h1>Shkolla Digjitale</h1>";
            echo 'Shkolla Digjitale12';
       
        ?>
        
        <?php
        // echo duhet te shenohet brenda thonjezave, mirepo mund te shenohet edhe brenda kllapave
            echo ("<h2>Shkolla Digjitale</h2>");
		    echo "<br>";
            echo "Prizren ","Kosova";// me (.),(,) na mundeson me bo lidh(concat) nje element me nje element tjeter
            echo "<br>";
			echo 201+1;
    
            print "<h4>Shkolla \"Digjitale\"</h4><br>";
        ?>
        <?php
        // Nese vlerat number i shenojme brenda thonjezave na paraqet ashtu si jane 
			echo "5+6<br>";
        // Nese nuk shenohet brenda thonjezave atehere vlerat mbledhen
            echo "5"+"6";
            echo "<br>";
            echo 5+5;
        //  echo 5+6; edhe kjo menyre funksionon 
			echo "<br>"; 
		//Variablat shenohen me shenjen e dollarit "$"
			//var name = 'Kebir'; nuk funksionon kjo metoda
            $first_name = "Kebir";
            $Name = "Kebir";
		//Rezultati mund te paraqitet ne dy menyrat e ndryshme
			//document.write("my name is:"+name)
            echo "My name is: $first_name<br>";
        //  echo 'My name is: $first_name<br>'; kjo metoda te kthen krejt si string dmth me thojza njefishta ' '
		//Nese rezultatin e shenojme me thonjeza te njefishta atehere rezultati paraqitet ashtu siq eshte i shenuar	
            echo 'My name is:',$first_name,'!','<br>';
        
			$x = 3;
            $X = 10;
			$y = 5;
            $f= $x+$y;
            
            $z = 2;
            $a = 3;
		
        //Nese e shenojme pa thonjeza rezultati na mblidhet		
            echo $x + $y."<br>";	
			echo "$x + $y <br>";
            echo $x . $y;
            echo "<br>";
            echo $x , $X;
            echo "<br>";
            echo "3+5=$f";
            echo "<br>";
            //echo "3+5=".$f;
            //ECHO $z . $a;  
            //PRINT $x . $z; 
		?> 
	</body>
</html>