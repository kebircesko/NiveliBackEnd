<html>
	<head>
	</head>
	<body>
		<p>$GLOBALS</p>
		<?php
			$a = 10;
			$b = 20;
		?>
		<?php
			$x = 75;
			$y = 25;
			
			function vlere()
			{	
			//$z = $x + $y; //kjo metod nuk funksionon.
			$GLOBALS['z'] = $GLOBALS['a'] + $GLOBALS['b'];
            //Variabla $GLOBALS a funksionon edhe jashte Sciptes PHP.
			}
			vlere();
			echo $z;
		
		?>
		<p>$_SERVER</p>
		<?php
			
			echo $_SERVER['PHP_SELF']; //tregon vendndodhjen e file qe jemi.
			echo "<br>";
 			echo $_SERVER['SERVER_NAME']; //tregon emrin e serverit ku gjendet file i yne.
			echo "<br>";
			echo $_SERVER['HTTP_HOST']; //tregon hostin ku ndodhet(ne rastin ton e tregon portin)
			echo "<br>";
			echo $_SERVER['HTTP_REFERER']; //tregon linkun se si te qasemi tek file qe gjendemi.
			echo "<br>";
			echo $_SERVER['SCRIPT_NAME']; //Tregon emrin e scriptes qe jemi duke punuar.
			echo "<br>";
			echo $_SERVER['SERVER_SOFTWARE'];//Tregon me qfare server jeni duke punuar.
			echo "<br>";
			echo $_SERVER['SERVER_PROTOCOL'];//Tregon qfare protokolli ka serveri.
			echo "<br>";
			echo $_SERVER['REQUEST_METHOD']; //Kthen metodën e kërkesës së përdorur për të hyrë në faqe(siç është POST)
			
		?>
		<p>$_REQUEST</p>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Username: <input type="text" name="Username">
			<input type="submit" value="Log in">
		</form>
		<?php
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				// Mbledh apo merr vleren e inputit.
				$x = $_REQUEST['Username'];
				if (empty($x)) {
				echo "Username is empty";
				} else {
			echo $x;
				}
				}
		?>
        
        
		<p>$_POST</p>
		
		<form method="post" action="form.php">
			Email: <input type="text" name="Email">
			<input type="submit" value="Log in">
		</form>
		<?php
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				// Mbledh apo merr vleren e inputit.
				$y = $_POST['Email'];
				if (empty($y)) 
				{
					echo "Email is empty";
				} 
				else 
				{
					echo $y;
				}
			}
		?>
		<p>$_GET</p>
		
		<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Email: <input type="text" name="Email">
			<input type="submit" value="Log in">
		</form>
		<?php
			
			if ($_SERVER["REQUEST_METHOD"] == "GET") 
			{
				// Mbledh apo merr vleren e inputit.
				$z = $_GET['Email'];
				if (empty($z)) 
				{
					echo "Email is empty";
				} 
				else
				{
					echo $z;
				}
			}	
		
		
		?>
		
		
		
		
	</body>
</html>