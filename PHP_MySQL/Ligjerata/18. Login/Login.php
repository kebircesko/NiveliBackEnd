<?php
    echo include('Login1.php');//përfshin dhe vlerëson skedarin e specifikuar.
?>
<html>
	<head>
		<title>Login</title>
		
        <link rel="stylesheet" href="" media="all">
        <!--Atributi media specifikon se për çfarë media / pajisje është optimizuar burimi i synuar.
            Kjo atribut përdoret më së shumti me fletët e stilit CSS për të specifikuar stile të ndryshme për lloje të ndryshme mediash.
        all--Default. Used for all media type devices(Përdoret për të gjitha pajisjet e tipit mediatik)-->
	</head>
    <body>
        <form method="post" action="Login.php"><!--action->specifikon se ku të dërgohen të dhënat e formularit kur një formë të dorëzohet.-->
            Username: <input type="text" name="Username"><br><br>
            Password: <input type="password" name="Password"><br><br>
            <input type="submit" name="login" value="Log in">
            <input type="reset" name="cancel" value="Cancel">
        </form>
    </body>
</html>