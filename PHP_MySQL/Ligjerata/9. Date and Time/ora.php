<?php
    date_default_timezone_set('Europe/Istanbul'); // Ndrysho sipas zonës tënde kohore
    $time = date('H:i:s');
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ora Live</title>
</head>
<body>
    <div id="clock"><?php echo $time; ?></div>
        <br>
    <div id="clock1"></div>
    
    <script>
        function updateClock() {
            const now = new Date();
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            let seconds = now.getSeconds().toString().padStart(2, '0');
            
            document.getElementById('clock1').textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        window.onload = updateClock;
    </script>
</body>
</html>