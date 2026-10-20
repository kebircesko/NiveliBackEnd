<html>
	<head>
	</head>
	<body>
		<!--$_GET është një matricë variablash që i kalon skriptit aktual parametrat URL.
			$_POST është një matricë variablash që i kalon skriptit aktual nëpërmjet metodës HTTP POST.
			Kur mund të përdoret GET?
			-Informacioni I dërguar nëpërmjet metodës GET është I dukshëm tek çdokush (të gjithë emrat dhe vlerat e variablave shfaqen në URL).
			 GET ka gjithashtu limite në sasinë e informacionit që do të dërgohet.Limitimi është rreth 2000 karaktere. 
			 Megjithatë, mëqënëse variablat shfaqen në URL, është e mundur bërja bookmark e faqes. Kjo mund të jetë e dobishme në disa raste.
			 GET NUK duhet të përdoret asnjëherë për dërgimin e password-eve ose të dhënave të tjera delikate!
			 Kur mund të përdoret POST?
			-Informacioni i dërguar nga metoda POST nuk është i dukshëm tek të tjerët (të gjitha emrat/vlerat janë të ndërfutura në trupin e kërkesës HTTP) dhe nuk  kanë limite në sasinë e informacionit që dërgohen.
			 Megjithatë, mëqënëse variablat nuk janë të dukshme në URL, nuk është e mundur bërja bookmark e faqes.
		-->
		<?php
		// define variables and set to empty values
		$name = $lastName = $email = $password = $confirmPassword =$gender= $birthday="" ;
        
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		//// mbledhja e të dhënave nga fusha input
		//$_SERVER është një variabël super globale e cila mban informacion rreth headers, patheve, dhe vendodhjeve të skriptit.
		//$_REQUEST përdoret për mbledhjen e të dhënave pas dërgimit të dhënave të një kontakt forme.
		//REQUEST_METHOD->Kthen metodën e kërkesës së përdorur për të hyrë në faqe(siç është POST)
		//$_POST përdoret gjerësisht për mbledhjen e të dhënave pas dërgimit të një forme HTML, gjithashtu method="post". 
		//$_POST përdoret gjerësisht për kalimin e variablave.
		{
			$name =$_POST['name'];
			$lastName =$_POST['lastName'];
			$email =$_POST['email'];
			$password =$_POST['password'];	
			$confirmPassword =$_POST['confirmPassword'];	
			$gender =$_POST['gender'];	
			$birthday =$_POST['birthday'];	
		}
		?>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"><!--$_SERVER['PHP_SELF']->tregon vendodhjen e file qe jemi.-->
			Name: <input type="text" name="name">
			<br><br>
			Last Name: <input type="text" name="lastName">
			<br><br>
			Email: <input type="text" name="email">
			<br><br>
			Password: <input type="password" name="password">
			<br><br>
			Confirm Password: <input type="password" name="confirmPassword">
			<br><br>
			Gender:<input type="radio" name="gender" 
			<?php if (isset($gender) && $gender=="Femer") echo "checked";?> 
			value="Femer">F
			<input type="radio" name="gender" 
			<?php if (isset($gender) && $gender=="Mashkull") echo "checked";//isset->Verifikon nëse ekziston një variabël?>
			value="Mashkull">M
			<br><br>
			Birthday: <input type="date" name="birthday">
			<br><br>
			<input type="submit" value="Log in">
			<input type="reset" value="Cancel">
		</form>
		<?php 
			echo "<h2>Rezultati:</h2>";
			echo $name.'<br>';
		 	echo $lastName.'<br>';
		 	echo $email.'<br>';
			echo $password.'<br>';
			echo $confirmPassword.'<br>';
			echo $gender.'<br>';
			echo $birthday.'<br>';
		?>
	</body>
</html>