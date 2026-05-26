<?php
date_default_timezone_set('Europe/Tirane');
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Detyra - PHP Date & Time</title>
</head>
<body>

<!-- ===================== DETYRA 1 ===================== -->
<h1>Detyra 1 - Shfaq Datën në Format të Plotë</h1>
<p>
Krijo një script që shfaq datën e sotme në këtë format:
<br>
<strong>E hënë, 12 Shkurt 2026</strong>
</p>

<?php
// Zgjidhja
echo "<strong>Zgjidhja:</strong><br>";
echo date("l, d F Y");
?>

<hr>

<!-- ===================== DETYRA 2 ===================== -->
<h1>Detyra 2 - Kontrollo nëse Viti është i Brishtë</h1>
<p>
Shfaq vitin aktual dhe kontrollo nëse është vit i brishtë.
Nëse po, shfaq mesazhin: "Ky vit është i brishtë".
Nëse jo: "Ky vit nuk është i brishtë".
</p>

<?php
// Zgjidhja
echo "<strong>Zgjidhja:</strong><br>";
$year = date("Y");

echo "Viti aktual: " . $year . "<br>";

if(date("L") == 1){
    echo "Ky vit është i brishtë.";
}else{
    echo "Ky vit nuk është i brishtë.";
}
?>

<hr>

<!-- ===================== DETYRA 3 ===================== -->
<h1>Detyra 3 - Sa Ditë Kanë Mbetur Deri në Vitin e Ri</h1>
<p>
Llogarit sa ditë kanë mbetur deri më 1 Janar të vitit të ardhshëm.
</p>

<?php
// Zgjidhja
echo "<strong>Zgjidhja:</strong><br>";

$today = time();
$newYear = strtotime("1 January next year");

$diff = $newYear - $today;
$days = floor($diff / (60*60*24));

echo "Kanë mbetur edhe $days ditë deri në Vitin e Ri.";
?>

<hr>

<!-- ===================== DETYRA 4 ===================== -->
<h1>Detyra 4 - Krijo Datëlindjen dhe Llogarit Moshën</h1>
<p>
Vendos një datëlindje me mktime() dhe llogarit sa vjeç është personi sot.
</p>

<?php
// Zgjidhja
echo "<strong>Zgjidhja:</strong><br>";

// Datëlindja: 4 Shkurt 1996
$birthDate = mktime(0,0,0,2,4,1996);
$currentDate = time();

$age = floor(($currentDate - $birthDate) / (60*60*24*365));

echo "Personi është rreth $age vjeç.";
?>

<hr>

<!-- ===================== DETYRA 5 ===================== -->
<h1>Detyra 5 - Formate të Ndryshme të Orës</h1>
<p>
Shfaq orën aktuale në:
<br>
- Format 24 orësh  
- Format 12 orësh me AM/PM  
- Format ISO 8601  
</p>

<?php
// Zgjidhja
echo "<strong>Zgjidhja:</strong><br>";

echo "24 orë: " . date("H:i:s") . "<br>";
echo "12 orë: " . date("h:i:s A") . "<br>";
echo "ISO 8601: " . date("c") . "<br>";
?>

<hr>

</body>
</html>
