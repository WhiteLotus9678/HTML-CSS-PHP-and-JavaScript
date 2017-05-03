<!doctype html>

<?php 
	$Month = 2592000 + time(); //this adds 30 days to the current time 
	setcookie('AboutVisit', date("F jS - g:i a"), $Month);
?>

<html>
<head>
<meta charset="utf-8">
<title>Assignment6</title>
</head>

<body>
    
    <table border = 1>
    <?php
	$firstname = $_POST["first_name"];
	$lastname = $_POST["last_name"];
	//
	$items = $_POST["masks"]; //for the array of checkbox items
	$numItems = count($items);
	$flatShipping = 4.99;
	$total = 0;
	//
	$street = $_POST["street"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$payment1 = $_POST["payment_type_mastercard"];
	$payment2 = $_POST["payment_type_visa"];
	$payment3 = $_POST["payment_type_american_express"];
	$zipcode = $_POST["zip"];
	
	print("<tr><td>");

	if(IsSet($firstname) && strlen($firstname)>0 && IsSet($lastname) && strlen($lastname)>0 && IsSet($street) && strlen($street)>0 && IsSet($city) && strlen($city)>0 && IsSet($state) && strlen($state)>0  && IsSet($zipcode) && strlen($zipcode)==5 && IsSet($items) && (IsSet($payment1) || IsSet($payment2) || IsSet($payment3))) //$items not working
	{
		//Check for a cookie
		if(isset($_COOKIE['AboutVisit']))
		{ 
			$last = $_COOKIE['AboutVisit']; 
			//print("<p>Welcome back $firstname $lastname <br>. You last visited on $last.</p>");
			echo "Welcome back $firstname $lastname.<br> You last visited on  " . $last; //period for concatenation
		} 
		else 
		{ 
			//print("<p>Welcome to our site $firstname $lastname!</p>");
    		echo "Welcome to our site $firstname $lastname!"; 
		}
		//End check
		
		print("<p> Thank you for placing an order.<br />");
		print("$street <br />");
		print("$city, $state $zipcode </p>");
		//print("$numItems");
		for($i = 0; $i < $numItems; $i++)
		{
			$item = $items[$i];
			$dollarAt = strpos($item, "$")+1;
			$itemName = substr($item, 0, $dollarAt-1); //takes away the item's money value away from its name
			print "<tr>\n";
			print "<td>$itemName</td>";
			//print "index $i item is $item <br />\n";
			
			$price = substr($item, $dollarAt);
			$total = $total + $price;
			print "<td> \$$price </td>";
			//Get price out of item
			if($i == $numItems - 1)
			{
				print "<tr>\n";
				print "<td>Total</td>";
				print "<td>\$$total </td>";
				print "<tr>\n";
				print "<td>Flat Shipping Rate</td>";
				print "<td>\$$flatShipping </td>";
				$total += $flatShipping;
				print "<tr>\n";
				print "<td>Total with Shipping</td>";
				print "<td>\$$total </td>";
			}
			print "</tr>";
		}
		
	}
	else
	{
		//Check for a cookie
		if(isset($_COOKIE['AboutVisit']))
		{ 
			$last = $_COOKIE['AboutVisit']; 
			//print("<p>Welcome back $firstname $lastname <br>. You last visited on $last.</p>");
			echo "Welcome back!<br> You last visited on  " . $last; //period for concatenation
		} 
		else 
		{ 
			//print("<p>Welcome to our site $firstname $lastname!</p>");
    		echo "Welcome to our site $firstname $lastname!"; 
		}
		//End check
		
		print ("<p>Error: Return to your form to<br/>");
		print ("complete the data and check that<br/>");
		print ("that your zipcode has 5 digits.<br/><br/>");
		print ("Also make sure to select a mask<br/>");
		print ("and choose your payment type.<br/><br/>");
		print ("<a href='http://mscs-php.uwstout.edu/2017SP/cs/248/001/yangw7372/Webpage.html'>Click here to go back</a></p>");	
	}
	
	print("</tr></td>");
	
	?>
    </table>
    
</body>
</html>