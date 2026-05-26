<hmtl>
    <head>
    </head>
    <body>
        <p>Detyra 1</p>
        <?php
			
			$emri='Shkolla Digjitale Prizren'.'<br>';
        
			$ndrroje= str_replace('Prizren','Prishtine',$emri);
			
			echo $emri;
			echo $ndrroje;
		?>
        
        
        <p>Detyra 2</p>
        <?php
            $name  = "Arianit Tershnjaku";
            
            echo strlen($name);
            echo "<br>";
            echo str_word_count($name);
        ?>
        
        
        <p>Detyra 3</p>
        <?php
            $txt = "Prizren Prishtinë Ferizaj Gjakovë Pejë";
            
            echo strpos($txt,"Gjakovë");
        ?>
    </body>
</hmtl>