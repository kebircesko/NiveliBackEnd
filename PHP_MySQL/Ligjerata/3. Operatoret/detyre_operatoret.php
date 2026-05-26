<!DOCTYPE html>
<html>
<head>
    <title>Operatoret ne PHP – Pyetje dhe Zgjidhje</title>
</head>
<body>

<h1>Operatoret ne PHP</h1>


<!-- ================= DETYRA 1 ================= -->
<h3>Detyra 1 – Operatoret Aritmetik</h3>

<p>
<b>Pyetje:</b><br>
Krijo dy variabla <code>$a = 15</code> dhe <code>$b = 4</code>.<br>
Shfaq:
- mbledhjen  
- zbritjen  
- shumezimin  
- pjesetimin  
- mbetjen (modulo)
</p>

<?php
    // Zgjidhja
    $a = 15;
    $b = 4;

    echo "Shuma: " . ($a + $b) . "<br>";
    echo "Zbritja: " . ($a - $b) . "<br>";
    echo "Shumezimi: " . ($a * $b) . "<br>";
    echo "Pjesetimi: " . ($a / $b) . "<br>";
    echo "Modulo (mbetja): " . ($a % $b);
?>

<hr>

<!-- ================= DETYRA 2 ================= -->
<h3>Detyra 2 – Operatoret Percaktues</h3>

<p>
<b>Pyetje:</b><br>
Krijo variablen <code>$num = 20</code>.<br>
Perdore me radhe operatorët:
<code>+=</code>, <code>-=</code>, <code>*=</code>, <code>/=</code>, <code>%=</code><br>
dhe shfaq rezultatin pas secilit veprim.
</p>

<?php
    // // Zgjidhja
    // $num = 20;

    // $num += 10;
    // echo "Pas += 10 = $num <br>";

    // $num -= 5;
    // echo "Pas -= 5 = $num <br>";

    // $num *= 2;
    // echo "Pas *= 2 = $num <br>";

    // $num /= 5;
    // echo "Pas /= 5 = $num <br>";

    // $num %= 3;
    // echo "Pas %= 3 = $num";

    	    $x = 20;
			$y = 30;
			
			//echo $x = $y;  // x = y (x ja japim vleren e y)
            echo "<br>";
            echo $x += $y;  // x += y; x = x+y
            echo "<br>";
            echo $x -= $y;
            echo "<br>";
            echo $x *= $y;
            echo "<br>";
            echo $x /= $y;
            echo "<br>";
            echo $x %= $y;
?>

<hr>

<!-- ================= DETYRA 3 ================= -->
<h3>Detyra 3 – Operatoret Krahasues</h3>

<p>
<b>Pyetje:</b><br>
Krijo variablat <code>$x = 8</code> dhe <code>$y = "8"</code>.<br>
Kontrollo:
<code>==</code>, <code>===</code>, <code>!=</code>, <code>></code>, <code><=</code><br>
Përdor <code>var_dump()</code>.
</p>

<?php
    // Zgjidhja
    $x = 8;
    $y = "8";

    echo "x == y : ";
    var_dump($x == $y);
    echo "<br>";

    echo "x === y : ";
    var_dump($x === $y);
    echo "<br>";

    echo "x != y : ";
    var_dump($x != $y);
    echo "<br>";

    echo "x > y : ";
    var_dump($x > $y);
    echo "<br>";

    echo "x <= y : ";
    var_dump($x <= $y);
?>

<hr>

<!-- ================= DETYRA 4 ================= -->
<h3>Detyra 4 – Operatoret Logjik</h3>

<p>
<b>Pyetje:</b><br>
Krijo variablat <code>$age = 18</code> dhe <code>$hasID = true</code>.<br>
Testo operatorët:
AND, OR, NOT dhe XOR.
</p>

<?php
    // Zgjidhja
    $age = 18;
    $hasID = true;

    echo "AND: ";
    var_dump($age >= 18 AND $hasID);
    echo "<br>";

    echo "OR: ";
    var_dump($age < 18 OR $hasID);
    echo "<br>";

    echo "NOT: ";
    var_dump(!($age >= 18));
    echo "<br>";

    echo "XOR: ";
    var_dump($age >= 18 XOR $hasID);
?>

<hr>

<!-- ================= DETYRA 5 ================= -->
<h3>Detyra 5 – String & Increment</h3>

<p>
<b>Pyetje:</b><br>
1. Bashko dy stringje <code>"Digital"</code> dhe <code>"School"</code>.<br>
2. Krijo variablen <code>$count = 5</code> dhe përdor:
<code>$count++</code> dhe <code>++$count</code>.
</p>

<?php
    // Zgjidhja
    $firstName = "Digital";
    $lastName = "School";

    echo "Emri i plote: " . $firstName . " " . $lastName;
    echo "<br><br>";

    $count = 5;

    echo "Post Increment: " . $count++;
    echo "<br>";

    echo "Vlera aktuale: " . $count;
    echo "<br>";

    echo "Pre Increment: " . ++$count;
?>

<hr>

</body>
</html>
