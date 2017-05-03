<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Movie Details</title>
  <link rel="stylesheet" type="text/css" href="myFlix.css" />
</head>

<body>

<table border = "1" class = "details">
<?php 
	
	if(isset($_GET['movie'] ) )
	{
		$movie = $_GET['movie'];
		//print "Movie name is $movie\n";
		
		//Connect to the database here
		$con = mysql_connect("mscs-mysql.uwstout.edu:3306", "spring10", "cookie1");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		//Select the database to connect to.
		mysql_select_db("myflix", $con);
		
		//Query the database for the specific movie and store the results in PHP variables
		$query = "SELECT movie_name, genre, image, description, release_year, rating FROM movie WHERE movie_name = '$movie';";
		$result = mysql_query($query);

		//table here
		
		//Process the table of data 
		
		$counter = 0;		
		//Loop to process all rows of the table. Each $row is a row of table results.
		while($row = mysql_fetch_array($result))
		{  
		$movie = $row["movie_name"];
		$genre = $row["genre"]; 
		$image = $row["image"];
		$desc = $row["description"];
		$year = $row["release_year"];
		$rate = $row["rating"];
		}
		
		
		//Use the data to build a detailed movie description page. Add some formatting.
?>
        <tr>
        	<td>
            	<h1 id = "title"><?php echo "$movie" ?></h1>
                <p>
            		<h3>Genre: <?php echo "$genre" ?> </h3>
            		<h3>Rating: <?php echo "$rate" ?></h3>
            		<h3>Release Year: <?php echo "$year" ?></h3>
                </p>
            </td>
        	<td>
            	<img src="http://mscs-php.uwstout.edu/web/images/<?php echo "$image" ?>" class="image" ></img>
        	</td> 
        </tr>
        
        <tr>
        	<td colspan = "2" width = "50%" id = "desc">
            	<p>
            		<?php echo "$desc" ?>
                </p>
            </td>
        <tr>
        
        <tr>
        	<td colspan = "2">
        		<a href="http://mscs-php.uwstout.edu/2017SP/cs/248/001/yangw7372/mySQL.php">Browse more movies</a>
            </td>
        </tr>
	
		
<?php		
		//Close the connection to the database to share resources
		mysql_close($con);
		
	}//end of if statement to check movie
		
?>
</table>

</body>
</html>
