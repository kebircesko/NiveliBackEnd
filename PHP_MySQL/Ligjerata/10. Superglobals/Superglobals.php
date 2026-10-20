<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<!--Disa nga variablat e paracaktuaranë PHP janë "superglobalet", që do të thotë që janë gjithmonë të aksesueshme nga çdo funksion, klasë ose file(skedar).	
		Variablat superglobale PHP janë:
			->$GLOBALS
			->$_SERVER
			->$_REQUEST
			->$_POST
			->$_GET
			->$_FILES
			->$_ENV
			->$_COOKIE
			->$_SESSION-->
		<p>$GLOBALS</p>
		<?php
			$a = 10;
			$b = 20;
		?>
		<?php
			/* $ GLOBALS është një variabël super globale PHP e cila përdoret për të hyrë në variabla globale nga kudo në skriptin PHP (gjithashtu nga brenda funksioneve ose metodave). PHP ruan të gjitha variablat globale në një matricë të quajtur $GLOBALS[index]. Fjala index ruan të gjithë emrat e variablave psh variabla x*/
			$x = 75;
			$y = 25;
			
			function vlere()
			{	
			//$z = $x + $y; kjo metod nuk funksionon.
			$GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
            //Variabla $GLOBALS a funksionon edhe jashte Sciptes PHP.
			}
			vlere();
			echo $z;
		
		?>
		<p>$_SERVER</p>
		<?php
			//$ _SERVER është një variabël super globale PHP, e cila mban informacione në lidhje me headers, paths dhe vendodhjet e script-ave.
			//Shembulli më poshtë tregon se si të përdorni disa nga elementët në $_SERVER:
			
			echo $_SERVER['PHP_SELF']; //tregon vendodhjen e file qe jemi.
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
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"><!--echo $_SERVER['PHP_SELF']->tregon vendodhjen e file qe jemi.-->
			Name: <input type="text" name="fname">
			<input type="submit">
		</form>
		<?php
			/*PHP $ _REQUEST përdoret për të mbledhur të dhëna pasi të paraqisni një formë HTML.
			Shembulli më poshtë tregon një formë me një fushë hyrëse dhe një buton dorëzimi. 
			Kur një përdorues paraqet të dhënat duke klikuar në "Paraqit", të dhënat e formularit i dërgohen skedarit të specifikuar në atributin e veprimit të etiketës <form>. Në këtë shembull, ne i tregojmë këtij skedari vetë për përpunimin e të dhënave të formularit. Nëse dëshironi të përdorni një skedar tjetër PHP për të përpunuar të dhënat e formularit, zëvendësoni atë me emrin e zgjedhjes suaj. 
			Pastaj, mund të përdorim variablen super global $ _REQUEST për të mbledhur vlerën e fushës së hyrjes*/
			

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// collect value of input field(mbledhja e të dhënave nga fushat input)
				$name = $_REQUEST['fname'];//$_REQUEST->mbledhjen e të dhënave pas dërgimit të dhënave të një kontakt forme.
				if (empty($name)) {
					echo "Name is empty";
				} else {
					echo $name;
				}
				}
		?>
		<p>$_POST</p>
		<?php
			/*Informacioni i dërguar nga një formë me metodën POST është i padukshëm për të tjerët(të gjithë emrat / vlerat janë ngulitur në trupin e kërkesës HTTP) dhe nuk kanë kufij në 
			sasinë e informacionit që duhet të dërgoni.Për më tepër, POST mbështet funksionim të avancuar siç është mbështetja për hyrje binare me shumë pjesë ndërsa ngarkoni skedarët në server.Sidoqoftë, për shkak se variablat nuk shfaqen në URL, nuk është e mundur të shënohet faqja.
			Developerat preferojnë POST-in për dërgimin e të dhënave të form.
			$ _POST përdoret gjerësisht për të mbledhur të dhëna të formularit pas paraqitjes së një forme HTML me metodën = "post". $ _POST përdoret gjithashtu gjerësisht për të kaluar variablat.
			Shembulli më poshtë tregon një formë me një fushë hyrëse dhe një buton dorëzimi. 
			Kur një përdorues paraqet të dhënat duke klikuar në "Paraqit", të dhënat e formularit i dërgohen skedarit të specifikuar në atributin e veprimit të etiketës <form>. 
			Në këtë shembull, ne tregojmë vetë skedarin për përpunimin e të dhënave të formularit. Nëse dëshironi të përdorni një skedar tjetër PHP për të përpunuar të dhënat e formularit, 
			zëvendësoni atë me emrin e zgjedhjes suaj.Pastaj, mund të përdorim variablen super global $ _POST për të mbledhur vlerën e fushës së hyrjes*/
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				// collect value of input field(mbledhja e të dhënave nga fushat input)
				$name = $_POST['fname'];//$_POST->mbledhjen e të dhënave pas dërgimit të një forme HTML
				if (empty($name)) 
				{
					echo "Name is empty";
				} 
				else 
				{
					echo $name;
				}
			}	
		
		
		?>
		<p>$_GET</p>
		<?php
			/*Informacioni i dërguar nga një formë me metodën GET është i dukshëm për të gjithë 
			(të gjithë emrat dhe vlerat e variablave shfaqen në URL). 
			GET gjithashtu ka kufizime në sasinë e informacionit për të dërguar. 
			Kufizimi është rreth 2000 karaktere. 
			Sidoqoftë, për shkak se variablat janë shfaqur në URL, është e mundur që të shënoni faqen. 
			Kjo mund të jetë e dobishme në disa raste.
			GET mund të përdoret për dërgimin e të dhënave jo sensitive.
			GET nuk duhet te përdoret për dërgimin e fjalëkalimeve ose informacione të tjera të ndjeshme!*/	
		?>

		<a href="login1.php?subject=ShkollaDigjitalePrizren&web=Shkolladigjitale.com "> Provo $ GET </a>
		
		<p>$_GET_input</p>
		
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
					/* PHP program to pop an alert 
					// message box on the screen 
					  
					// Display the alert box 
					$shtyp="Hello"; 
					echo "<script>alert('$shtyp $z');</script>";;
					//echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
					*/ 
				}
			}			
		?>
	</body>
	<!--The following table lists the most important elements that can go inside $_SERVER:

		Element/Code:					Description:
		$_SERVER['PHP_SELF']			Returns the filename of the currently executing script
		$_SERVER['GATEWAY_INTERFACE']	Returns the version of the Common Gateway Interface (CGI) the server is using
		$_SERVER['SERVER_ADDR']			Returns the IP address of the host server
		$_SERVER['SERVER_NAME']			Returns the name of the host server (such as www.w3schools.com)
		$_SERVER['SERVER_SOFTWARE']		Returns the server identification string (such as Apache/2.2.24)
		$_SERVER['SERVER_PROTOCOL']		Returns the name and revision of the information protocol (such as HTTP/1.1)
		$_SERVER['REQUEST_METHOD']		Returns the request method used to access the page (such as POST)
		$_SERVER['REQUEST_TIME']		Returns the timestamp of the start of the request (such as 1377687496)
		$_SERVER['QUERY_STRING']		Returns the query string if the page is accessed via a query string
		$_SERVER['HTTP_ACCEPT']			Returns the Accept header from the current request
		$_SERVER['HTTP_ACCEPT_CHARSET']	Returns the Accept_Charset header from the current request (such as utf-8,ISO-8859-1)
		$_SERVER['HTTP_HOST']			Returns the Host header from the current request
		$_SERVER['HTTP_REFERER']		Returns the complete URL of the current page (not reliable because not all user-agents support it)
		$_SERVER['HTTPS']				Is the script queried through a secure HTTP protocol
		$_SERVER['REMOTE_ADDR']			Returns the IP address from where the user is viewing the current page
		$_SERVER['REMOTE_HOST']			Returns the Host name from where the user is viewing the current page
		$_SERVER['REMOTE_PORT']			Returns the port being used on the user's machine to communicate with the web server
		$_SERVER['SCRIPT_FILENAME']		Returns the absolute pathname of the currently executing script
		$_SERVER['SERVER_ADMIN']		Returns the value given to the SERVER_ADMIN directive in the web server configuration file (if your script runs on a virtual host, it will be the value 
										defined for that virtual host) (such as someone@w3schools.com)
		$_SERVER['SERVER_PORT']			Returns the port on the server machine being used by the web server for communication (such as 80)
		$_SERVER['SERVER_SIGNATURE']	Returns the server version and virtual host name which are added to server-generated pages
		$_SERVER['PATH_TRANSLATED']		Returns the file system based path to the current script
		$_SERVER['SCRIPT_NAME']			Returns the path of the current script
		$_SERVER['SCRIPT_URI']			Returns the URI of the current page-->
</html>