<!--Një cookie shpesh përdoret për të identifikuar një përdorues. Cookie është një skedar i vogël që serveri vendos në kompjuterin e përdoruesit. Sa herë që i njëjti kompjuter kërkon një faqe me një shfletues, ai do të dërgojë edhe cookie. Me PHP, të dy mund të krijoni dhe të merrni vlerat e cookie-t.
Me pak fjalë, cookie mund të krijohet, dërgohet dhe merret në fund të serverit.
Cookies duhet të përdoret para etiketës <html>.
Për të modifikuar një cookie,setcookie()funksionin
setcookie() Funksioni duhet të paraqiten para <html> tag
-->

<?php
	$cookie_name = "User";
	$cookie_value = "Admin Admin1";
	//setcookie(name, value, expire, path, domain, secure, httponly);
	//Kërkohet vetëm parametri i emrit . Të gjithë parametrat e tjerë janë opsionale.
	setcookie($cookie_name, $cookie_value, time() + 10, "/"); // 86400 = 1 dite
	//Nëse vendosni datën e skadimit në të kaluarën, cookie do të fshihet.
	//setcookie($cookie_name, "", time()-10);
?>
<html>
	<head>
	</head>
	<body>

		<?php
		//$_COOKIE->eshte variabel super globale qe ne kete rast perdoret per te marr cookie
			if(!isset($_COOKIE[$cookie_name]))//isset()funksionin për të zbuluar nëse cookie është vendosur
				{
					echo "Cookie '" . $cookie_name . "' is not set!";//e verejme kur do te bejme refresh faqen
				} 
				else 
				{
				echo "Cookie '" . $cookie_name . "' is set!<br>";
				echo "Value is: " . $_COOKIE[$cookie_name];
				}
		?>
</body>
</html>