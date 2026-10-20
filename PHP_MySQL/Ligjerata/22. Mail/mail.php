<?php
$to = "arianit.fshk@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: arianittershnjaku@.com" . "\r\n" .
"CC: arianittershnjaku@gmail.com";

mail($to,$subject,$txt,$headers);
?>