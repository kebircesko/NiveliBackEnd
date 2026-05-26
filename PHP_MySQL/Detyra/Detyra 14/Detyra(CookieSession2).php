<?php
 session_start();
 echo "The content of sess_var is "
      .$_SESSION['sess_var']."<br>";
 unset($_SESSION['sess_var']);
?>
  
  
<html>
	<head>
	</head>
	<body>
		 <a href="Detyra(CookieSession3).php">next page</a>
</body>
</html>