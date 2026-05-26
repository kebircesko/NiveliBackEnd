<hmtl>
    <head>
    </head>
    <body>
        <p>Detyra 1</p>
        <?php
			
			$qytetet = array("Prizren"=>"04", "Prishtinë"=>"01", "Pejë"=>"03","Mitrovicë"=>"02","Gjakovë"=>"07");
			
            array_push($qytetet);
            array_shift($qytetet);
			print_r ($qytetet);
            echo "<br>";
            var_dump($qytetet);
		?>
        
        
        <p>Detyra 2</p>
        <?php
           $x = array(
                    array(1,1,1,1),
                    array(2,2,2,2),
                    array(3,3,3,3),
                    array(4,4,4,4)
                );
        
            for($row = 0;$row < 4; $row++){
                for($col = 0;$col < 4;$col++){
                    echo $x[$row][$col];
                    echo" ";
                }
                echo"<br>";
            }
        ?>
        
        
        <p>Detyra 3</p>
        <?php
            $arr = array("id1"=>"001", "id2"=>"002", "id3"=>"003");
			
            krsort($arr);
			
            foreach($arr as $x => $x_value){
                
				echo $x." ".$x_value;
				echo "<br>";
			}
        ?>
    </body>
</hmtl>