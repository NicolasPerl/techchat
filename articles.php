<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		article
	</title>
</head>
<body>

<?php
	
	$imageID = intval( $_GET['image']);
	
	// make the connection to the local server
	$con = mysqli_connect('127.0.0.1',"root","","techchat");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to mysql: " . mysqli_connect_error();
	}

	$query = "SELECT id, headline, media, story FROM news WHERE id = '$imageID'";
	$result = $con->query($query);

	if ($result->num_rows > 0) {

		while ($fetch=$result->fetch_assoc()) {
			//var_dump($fetch);
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $fetch['media'] ).'"/>';
			echo "<br>";
			echo $fetch['headline'];
			echo "<br>";
			echo $fetch['story'];
			
		}
		
	}

	//close the connection
	$con->close();
?>
	<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>

</body>
</html>

