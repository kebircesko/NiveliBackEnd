<html>
    <head>
    </head>
    <body>
        <p>Detyra 1</p>
        <?php  
             
            function x($a,$b,$c){
                if($a > $b and $a > $c){
                    echo "Variabla A eshte me e madhe se variabla B dhe C";
                }
                else if($b > $a and $b > $c){
                    echo "Variabla B eshte me e madhe se variabla A dhe C";
                }
                else if($c > $a and $c > $b){
                    echo "Variabla C eshte me e madhe se variabla A dhe B";
                }
                else{
                    echo "Variablat jane te barabarta";
                }
            }
        x(27,7,2);
        ?>
        <p>Detyra 2</p>
        <?php  
            $num = 4;  
            $factorial = 1;  
            for ($x=1; $x<=$num; $x++)   
            {  
                $factorial = $factorial * $x;  
            }  
            echo "Faktorieli i $num eshte $factorial";  
        ?>
        </body>
  