<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Detyra – PHP Loops</title>
</head>
<body>

    <!-- ===================== DETYRA 1 ===================== -->
    <h1>Detyra 1 – While Loop</h1>
    <p>
        Përdor <strong>while loop</strong> për të shfaqur numrat nga 1 deri në 20.
        Numrat duhet të rriten nga <strong>2</strong>.
    </p>

    <?php
        $x = 1;
        while ($x <= 20) {
            echo $x . "<br>";
            $x += 2;
        }
    ?>

    <hr>

    <!-- ===================== DETYRA 2 ===================== -->
    <h1>Detyra 2 – Do While Loop</h1>
    <p>
        Përdor <strong>do while loop</strong> për të shfaqur numrat nga 10 deri në 1.
        Cikli duhet të ekzekutohet të paktën një herë.
    </p>

    <?php
        $y = 10;
        do {
            echo $y . "<br>";
            $y--;
        } while ($y >= 1);
    ?>

    <hr>

    <!-- ===================== DETYRA 3 ===================== -->
    <h1>Detyra 3 – For Loop</h1>
    <p>
        Përdor <strong>for loop</strong> për të shfaqur numrat nga 1 deri në 10.
        Kur numri të bëhet më i madh se 7, cikli duhet të ndërpritet.
    </p>

    <?php
        for ($i = 1; $i <= 10; $i++) {
            if ($i > 7) {
                break;
            }
            echo "Numri është: $i <br>";
        }
    ?>

    <hr>

    <!-- ===================== DETYRA 4 ===================== -->
    <h1>Detyra 4 – Foreach Loop</h1>
    <p>
        Krijo një <strong>array</strong> me emra nxënësish dhe përdor <strong>foreach</strong>
        për t’i shfaqur të gjithë emrat një nga një.
    </p>

    <?php
        $nxenesit = array("Ardi", "Elona", "Besnik", "Sara", "Luan");

        foreach ($nxenesit as $emri) {
            echo $emri . "<br>";
        }
    ?>

    <hr>

    <!-- ===================== DETYRA 5 ===================== -->
    <h1>Detyra 5 – Array + For Loop</h1>
    <p>
        Krijo një array me numra, renditi nga më i vogli tek më i madhi dhe shfaqi
        duke përdorur <strong>for loop</strong>.
    </p>

    <?php
        $numrat = array(12, 5, 9, 1, 20, 3);
        sort($numrat);

        $gjatesia = count($numrat);
        for ($i = 0; $i < $gjatesia; $i++) {
            echo $numrat[$i] . "<br>";
        }
    ?>

</body>
</html>
