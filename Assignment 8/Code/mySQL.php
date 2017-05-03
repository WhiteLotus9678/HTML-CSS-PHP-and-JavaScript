<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>Browse Our Movies</title>
    <link rel="stylesheet" type="text/css" href="myFlix.css" />
  </head>

<body>
<h2>School Project</h2>

<?php
// establish the database connection for your user
$con = mysql_connect("mscs-mysql.uwstout.edu:3306", "spring10", "cookie1");

if (!$con)
{
   die('Could not connect: ' . mysql_error());
}

//Select the database to connect to.
mysql_select_db("myflix", $con);

// do a database query to get the information for each movie 
$query = "SELECT movie_name, genre, image, rating FROM movie;";
$result = mysql_query($query);
?>

<!-- Create the table  -->

<table class="browse" border="1">

<?php
//Process the table of data 

$counter = 0;		
//Loop to process all rows of the table. Each $row is a row of table results.
while($row = mysql_fetch_array($result))
{
	if($counter%4 == 0)
	{
    	print "  <tr>";
   }   
    $movie = $row["movie_name"];
    $genre = $row["genre"]; 
    $image = $row["image"];
    $rating = $row["rating"];
		print "\n";
?>
	
		<td>
    	 	<a href="http://mscs-php.uwstout.edu/2017SP/cs/248/001/yangw7372/MovieDetails.php?movie=<?php echo $movie ?>" > 
        	<h4><?php echo "$movie" ?></h4>
        	<img src="http://mscs-php.uwstout.edu/web/images/<?php echo "$image" ?>" class="image" ></img>
        </a>
        <p>
					<?php echo "$genre" ?><br /> 
      		<?php echo "$rating" ?>
        </p>
    </td>

<?php      
    if(($counter+1)%4 == 0)
        echo "</tr>";

    $counter++;
}//end of while loop
 
mysql_close($con);
?>
	</tr>
</table>
</body>
</html>
