<html>  
<body>  
    <p>Detyra 2</p>
<form method="post">  
    Enter a number:  
    <input type="number" name="number">  
    <input type="submit" value="Submit">  
</form>  
    <p>Detyra 3</p>
</body>  
</html>  
<?php   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){  
        $number = $_POST['number'];   
        
        if(($number % 2) == 0){  
            echo "$number is an Even number";  
        }else{  
            echo "$number is Odd number";  
        }  
    }  
?>

<?php   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){  
        $number = $_POST['number'];   
        
        if(($number % 2) == 0){  
            echo "$number is an Even number";  
        }else{  
            echo "$number is Odd number";  
        }  
    }  
?>
<?php  
            $num = 4;  
            $factorial = 1;  
            for ($x=1; $x<=$num; $x++)   
            {  
                $factorial = $factorial * $x;  
            }  
            echo "Faktorieli i $num eshte $factorial";  
        ?>