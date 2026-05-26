<?php
 session_start();
 if (!isset($_SESSION['sess_var'])) 
 {
 		$_SESSION['sess_var'] = "Hello world!";
 } 
 else 
 {
		echo "The content of sess_var ". $_SESSION['sess_var']."<br>";
 }
 ?>
  
<html>
	<head>
	</head>
	<body>
		 <a href="Detyra(CookieSession2).php">next page</a>

</body>
</html>