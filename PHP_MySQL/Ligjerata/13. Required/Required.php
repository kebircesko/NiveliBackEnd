<!DOCTYPE HTML>  
<html>
	<head>
		<style>
			.empty {color: red;}
		</style>
	</head>
	<body>
		<!--Tregon mënyrën e bërjes së fushave të kërkuara dhe krijimin e mesazheve të gabimit nëse është e nevojshme.-->
		<?php
			$empUsername = "";	//Duhet te krijohen qe te mund te ju qasemi permes formes.
			$empPassword = "";
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$username =secure($_POST['Username']);
			$password =secure($_POST['Password']);
			if(empty($username)||empty($password))
				/*	and	-> And	$x and $y	True if both $x and $y are true
					or	-> Or	$x or $y	True if either $x or $y is true
					xor	-> Xor	$x xor $y	True if either $x or $y is true, but not both
					&&	-> And	$x && $y	True if both $x and $y are true
					||	-> Or	$x || $y	True if either $x or $y is true
					!	-> Not	!$x	True if $x is not true */
			{
				$empUsername ="Username is required";
				$empPassword ="Password is required";
			}
			else if($username === 'admin' && $password === 'admin123')
			{
				//echo 'Correct! <br> You are welcome!';
				echo '<script>alert("You are welcome!")</script>';
			}
			else
			{
				//echo 'Username and Password is incorrect!';
				echo '<script>alert("Username or Password is incorrect!")</script>';
			}
		}
		function secure($x) {
			$x = htmlspecialchars($x); //Ky funksion mundeson qe karakteret speciale te i konverton ne karaktere te HTML
			$x = trim($x);	//Ky funksion largon karakteret e panevojshme si (extra space, tab, newline etj), nga te dhenat hyrse te perdoruesit.
			$x = stripslashes($x);	//Ky funksion largon karakterin "\"(backslash) dhe te mundeson me perdor me \.
			return $x;
		}
		?>
		<h1>PHP Form Required Example</h1>
		<p><span class="empty">* Required</span></p>
		<form method="post"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			Username: <input type="text" name="Username">
			<span class="empty">*<?php echo $empUsername;?></span><br><br>
			Password: <input type="password" name="Password">
			<span class="empty">*<?php echo $empPassword;?></span><br><br>
			<input type="submit" value="Log in" >
			<input type="reset" value="Cancel">
		</form>
		
	</body>
	<!--Function sor String:			Description:
		addcslashes()					Returns a string with backslashes in front of the specified characters
		addslashes()					Returns a string with backslashes in front of predefined characters
		bin2hex()						Converts a string of ASCII characters to hexadecimal values
		chop()							Removes whitespace or other characters from the right end of a string
		chr()							Returns a character from a specified ASCII value
		chunk_split()					Splits a string into a series of smaller parts
		convert_cyr_string()			Converts a string from one Cyrillic character-set to another
		convert_uudecode()				Decodes a uuencoded string
		convert_uuencode()				Encodes a string using the uuencode algorithm
		count_chars()					Returns information about characters used in a string
		crc32()							Calculates a 32-bit CRC for a string
		crypt()							One-way string hashing
		echo()							Outputs one or more strings
		explode()						Breaks a string into an array
		fprintf()						Writes a formatted string to a specified output stream
		get_html_translation_table()	Returns the translation table used by htmlspecialchars() and htmlentities()
		hebrev()						Converts Hebrew text to visual text
		hebrevc()						Converts Hebrew text to visual text and new lines (\n) into <br>
		hex2bin()						Converts a string of hexadecimal values to ASCII characters
		html_entity_decode()			Converts HTML entities to characters
		htmlentities()					Converts characters to HTML entities
		htmlspecialchars_decode()		Converts some predefined HTML entities to characters
		htmlspecialchars()				Converts some predefined characters to HTML entities
		implode()						Returns a string from the elements of an array
		join()							Alias of implode()
		lcfirst()						Converts the first character of a string to lowercase
		levenshtein()					Returns the Levenshtein distance between two strings
		localeconv()					Returns locale numeric and monetary formatting information
		ltrim()							Removes whitespace or other characters from the left side of a string
		md5()							Calculates the MD5 hash of a string
		md5_file()						Calculates the MD5 hash of a file
		metaphone()						Calculates the metaphone key of a string
		money_format()					Returns a string formatted as a currency string
		nl_langinfo()					Returns specific local information
		nl2br()							Inserts HTML line breaks in front of each newline in a string
		number_format()					Formats a number with grouped thousands
		ord()							Returns the ASCII value of the first character of a string
		parse_str()						Parses a query string into variables
		print()							Outputs one or more strings
		printf()						Outputs a formatted string
		quoted_printable_decode()		Converts a quoted-printable string to an 8-bit string
		quoted_printable_encode()		Converts an 8-bit string to a quoted printable string
		quotemeta()						Quotes meta characters
		rtrim()							Removes whitespace or other characters from the right side of a string
		setlocale()						Sets locale information
		sha1()							Calculates the SHA-1 hash of a string
		sha1_file()						Calculates the SHA-1 hash of a file
		similar_text()					Calculates the similarity between two strings
		soundex()						Calculates the soundex key of a string
		sprintf()						Writes a formatted string to a variable
		sscanf()						Parses input from a string according to a format
		str_getcsv()					Parses a CSV string into an array
		str_ireplace()					Replaces some characters in a string (case-insensitive)
		str_pad()						Pads a string to a new length
		str_repeat()					Repeats a string a specified number of times
		str_replace()					Replaces some characters in a string (case-sensitive)
		str_rot13()						Performs the ROT13 encoding on a string
		str_shuffle()					Randomly shuffles all characters in a string
		str_split()						Splits a string into an array
		str_word_count()				Count the number of words in a string
		strcasecmp()					Compares two strings (case-insensitive)
		strchr()						Finds the first occurrence of a string inside another string (alias of strstr())
		strcmp()						Compares two strings (case-sensitive)
		strcoll()						Compares two strings (locale based string comparison)
		strcspn()						Returns the number of characters found in a string before any part of some specified characters are found
		strip_tags()					Strips HTML and PHP tags from a string
		stripcslashes()					Unquotes a string quoted with addcslashes()
		stripslashes()					Unquotes a string quoted with addslashes()
		stripos()						Returns the position of the first occurrence of a string inside another string (case-insensitive)
		stristr()						Finds the first occurrence of a string inside another string (case-insensitive)
		strlen()						Returns the length of a string
		strnatcasecmp()					Compares two strings using a "natural order" algorithm (case-insensitive)
		strnatcmp()						Compares two strings using a "natural order" algorithm (case-sensitive)
		strncasecmp()					String comparison of the first n characters (case-insensitive)
		strncmp()						String comparison of the first n characters (case-sensitive)
		strpbrk()						Searches a string for any of a set of characters
		strpos()						Returns the position of the first occurrence of a string inside another string (case-sensitive)
		strrchr()						Finds the last occurrence of a string inside another string
		strrev()						Reverses a string
		strripos()						Finds the position of the last occurrence of a string inside another string (case-insensitive)
		strrpos()						Finds the position of the last occurrence of a string inside another string (case-sensitive)
		strspn()						Returns the number of characters found in a string that contains only characters from a specified charlist
		strstr()						Finds the first occurrence of a string inside another string (case-sensitive)
		strtok()						Splits a string into smaller strings
		strtolower()					Converts a string to lowercase letters
		strtoupper()					Converts a string to uppercase letters
		strtr()							Translates certain characters in a string
		substr()						Returns a part of a string
		substr_compare()				Compares two strings from a specified start position (binary safe and optionally case-sensitive)
		substr_count()					Counts the number of times a substring occurs in a string
		substr_replace()				Replaces a part of a string with another string
		trim()							Removes whitespace or other characters from both sides of a string
		ucfirst()						Converts the first character of a string to uppercase
		ucwords()						Converts the first character of each word in a string to uppercase
		vfprintf()						Writes a formatted string to a specified output stream
		vprintf()						Outputs a formatted string
		vsprintf()						Writes a formatted string to a variable
		wordwrap()						Wraps a string to a given number of characters-->
</html>