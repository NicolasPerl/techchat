<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		article
	</title>

	<link href="/styles/articles.css" rel="stylesheet" title="basic style" type="text/css" media="all"/>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-90907253-1', 'auto');
	  ga('send', 'pageview');

	</script>

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
		
		$imageID = intval($_GET["image"]);
		
		include "mysqli_connection.php";

		$query = "SELECT id, headline, story, media, tag FROM articles WHERE id = '$imageID'";

		$result = $con->query($query);
		

		
		if ($result->num_rows > 0) {
	
			while ($fetch=$result->fetch_assoc()) {
				//var_dump($fetch);
				echo '<h1>'.$fetch['headline'].'</h1>';
				echo "<br>";
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $fetch['media'] ).'" class="article-pic img-rounded center-block img-responsive" />';
				echo "<br>";
				echo nl2br('<p>'.$fetch['story'].'</p>');
				//echo '<div class="container">';
				//echo '<div class="fb-like" data-href="https://www.facebook.com/techchatt/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>';
				//echo '<div class="fb-comments"  data-href="http://localhost:8000/articles.php?image=2" data-numposts="5"></div>';
				//echo '</div>';


				
		}
			
		}

		//close the connection
		$con->close();
	?>
		<div id="vc-feelback-main" data-access-token="e19b6dd7c6280593df3d12c7d068ca87" data-display-type="4"></div> 

		<script> 
		(function() { 
		var v = document.createElement('script'); v.async = true; 
		v.src = "http://assets-prod.vicomi.com/vicomi.js"; 
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(v, s); 
		})(); 
		</script>
<br>
<br>


</div>
</body>
</html>

