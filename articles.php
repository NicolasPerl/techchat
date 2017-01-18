<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		article
	</title>

	<link href="articles.css" rel="stylesheet" title="basic style" type="text/css" media="all"/>
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '224533154659650',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="headline">
	<?php
		
		$imageID = intval( $_GET['image']);
		
		// make the connection to the local server
		$con = mysqli_connect('127.0.0.1',"root","","techchat");
		/*$servername = "us-cdbr-iron-east-04.cleardb.net";
		$username = "b4c5e18a9ad6fa";
		$password = "047e8b9d";
		$dbname = "heroku_d3e06c073a5cf59";
		$con = mysqli_connect($servername,$username,$password,$dbname);*/
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
</div>
</body>
</html>

