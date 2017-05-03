<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 9</title>
</head>

<body>

	<table border = "1">
	<?php
	$firstname = $_POST["first_name"];
	$lastname = $_POST["last_name"];
	$email = $_POST["email"];
	//
	$membership = $_POST["membership"];
	
	print("<tr><td>");
	
	if(IsSet($firstname) && strlen($firstname)>0 && IsSet($lastname) && strlen($lastname)>0 && IsSet($email) && strlen($email)>0 && IsSet($membership))
	{
		$con = mysql_connect("mscs-mysql.uwstout.edu", "web16", "Spring16!");
		
		if(!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db("myflixstreaming", $con);
		
		$insert = "INSERT INTO user (firstName, lastName, eMail, level, stoutid)
			VALUES ('$firstname', '$lastname', '$email', '$membership', 'yangw');";
		$results = mysql_query($insert);
		
		if(!$results)
		{
			die("SQL error during query: " . mysql_error());
		}
		
		print ("<p>Welcome to MyFlix Streaming $first $last.<br/>");
		print ("<p>You are registered as a $membership club member.<br/>");
		print ("<p>Use your email, $email to log into the site on future visits.");
	}
	else
	{
		print ("<p>Error: Return to your form to<br/>");
		print ("complete the data and make sure to<br/>");
		print ("select a membership type.<br/><br/>");
		print ("<a href='http://mscs-php.uwstout.edu/2017SP/cs/248/001/yangw7372/MyFlix.html'>Click here to go back</a></p>");	
	}
	
	print("</tr></td>");
	
	?>
    </table>

</body>
</html>