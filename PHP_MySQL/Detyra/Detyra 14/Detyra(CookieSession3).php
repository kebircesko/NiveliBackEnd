<?php
  session_start();
  echo "The content of sess_var 	is ".$_SESSION['sess_var']."<br>";
  session_destroy();
  ?>
<html>
	<head>
	</head>
	<body>

		
</body>
</html>