<!--Sesioni PHP përdoret për të ruajtur dhe kaluar informacione nga një faqe në tjetrën përkohësisht (derisa përdoruesi të mbyllë faqen e internetit).
Ndryshe nga një cookie, informacioni nuk ruhet në kompjuterin e përdoruesve.
Sesioni PHP krijon ID unike të përdoruesit për secilin shfletues për të njohur përdoruesin dhe për të shmangur konfliktin midis shfletuesve të shumtë.-->

<?php
	//Session duhet te shenohet ne fillim te file php.
	//Funksioni PHP session_start () përdoret për të filluar sesionin. Fillon një sesion të ri ose rifillon sesionin ekzistues. Kthen sesionin ekzistues nëse sesioni është krijuar tashmë. Nëse sesioni nuk është i disponueshëm, ai krijon dhe kthen sesionin e ri.
	session_start();
?>
<html>
	<head>
	</head>
	<body>

		<?php
			$_SESSION['emri']='Admin';//PHP $ _SESSION(variabel superglobale) është një grup shoqërues që përmban të gjitha ndryshoret e sesionit. Përdoret për të vendosur dhe marrë vlera të ndryshueshme të sesionit.
			$_SESSION['mbiemri']='Admin1';
			echo 'Session set';
			echo '<br>';
			print_r($_SESSION); //Na mundeson nxjerrjen e te gjitha sessioneve qe gjendent tek variabla globale $_SESSION.
		?>
		<?php 	
			if (!isset($_SESSION['count'])) 
			{
				$_SESSION['count'] = 1;
			} 
			else 
			{
				$_SESSION['count']++;
			} 
				echo $_SESSION['count']; ?>  
		<?php
			//I fshin te gjitha variablat e session.
			//session_unset(); 
			//E fshin(shkaterron,prish) kete session.
			//session_destroy();//do te verehet me mire ne db
		?>
		<a href='Sessions1.php'>next</a>
</body>
</html>