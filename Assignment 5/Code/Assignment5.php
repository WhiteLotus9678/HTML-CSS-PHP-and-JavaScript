<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment5</title>
</head>

<body>
    
    <table border = 1>
    <?php
	$street = $_GET["street"];
	$city = $_GET["city"];
	$state = $_GET["state"];
	$zipcode = $_GET["zip"];
	
	print("<tr><td>");
	
	if(IsSet($street) && strlen($street)>0 && IsSet($city) && strlen($city)>0 && IsSet($state) && strlen($state)>0  && IsSet($zipcode) && strlen($zipcode)==5)
	{
		print("<p>$street<br />");
		print("$city, $state $zipcode </p>");
	}
	else
	{
		print ("<p>Error: Return to your form to<br/>");
		print ("complete the data and make sure<br/>");
		print ("that your zipcode has 5 digits.<br/>");
		print ("<a href='http://mscs-php.uwstout.edu/2017SP/cs/248/001/yangw7372/Web5AddressForm.html'>Click here to go back</a></p>");	
	}
	
	print("</tr></td>");
	
	?>
    </table>
    
</body>
</html>