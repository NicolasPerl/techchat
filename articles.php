<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		article
	</title>

	<link href="articles.css" rel="stylesheet" title="basic style" type="text/css" media="all"/>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">
	<?php
		
		$imageID = intval( $_GET['image']);
		
		// make the connection to the local server
		//$con = mysqli_connect('127.0.0.1',"root","","techchat");
		$servername = "us-cdbr-iron-east-04.cleardb.net";
		$username = "b4c5e18a9ad6fa";
		$password = "047e8b9d";
		$dbname = "heroku_d3e06c073a5cf59";
		$con = mysqli_connect($servername,$username,$password,$dbname);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to mysql: " . mysqli_connect_error();
		}

		$query = "SELECT id, headline, media, story FROM news WHERE id = '$imageID'";
		$result = $con->query($query);

		if ($result->num_rows > 0) {


			while ($fetch=$result->fetch_assoc()) {
				//var_dump($fetch);
				echo '<h1>'.$fetch['headline'].'</h1>';
				echo "<br>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $fetch['media'] ).'" class="article-pic img-rounded center-block img-responsive" />';
				echo "<br>";
				echo '<p>'.$fetch['story'].'</p>';

				
		}
			
		}

		//close the connection
		$con->close();
	?>

<br>
<br>
<div class="container">
	<div class="fb-like" data-href="https://www.facebook.com/techchatt/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
	<div class="fb-comments"  data-href="http://localhost:8000/articles.php?image=2" data-numposts="5"></div>
</div>

</div>
</body>
</html>

