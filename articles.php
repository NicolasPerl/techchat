<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		article
	</title>

	<link href="/articles.css" rel="stylesheet" title="basic style" type="text/css" media="all"/>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Arvo|Lato|Open+Sans:800|Vollkorn" rel="stylesheet">

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
  		js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10';
  		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">
	<div class="row">
			<?php

				echo '<a href="/index.php"><button class="back">Home</button></a>';
				echo '<div class="fb-follow" data-href="https://www.facebook.com/techchatt?ref=aymt_homepage_panel" data-layout="button" data-size="large" data-show-faces="true"></div>';
				echo '<img src="/Images/logo.png" class="logo"></img>';

				
				$imageID = intval($_GET["image"]);
				//$tag = intval($_GET["tag"]);
				
				include "mysqli_connection.php";

				
				$query = "SELECT id, headline, story, media, tag FROM articles WHERE id = '$imageID'";
				$tag = "SELECT tag FROM articles WHERE id = '$imageID'";
				
					
				
				$result = $con->query($query);
				$result_tag = $con->query($tag);



				if ($row = $result_tag->fetch_assoc()) {
				   	$tag_int = $row['tag'];
				   	$query_related = "SELECT id, headline, media, article_date, time_to_read, tag FROM articles WHERE tag = '$tag_int' AND id != '$imageID' ORDER BY id DESC LIMIT 4";
				   	$result_related = $con->query($query_related);
				}

				//print_f $result_tag;
				//var_dump("tag :",$result_tag);
				//var_dump("tag :",$query_related);
				
				echo '<div class="col-xs-3 related">';
				echo '<h3 class="related-stories">Related Stories</h3>';

				if ($result_related->num_rows > 0) {
					while ($fetch_related = $result_related->fetch_assoc()) {
							//click on article and it takes you to id in database. Convert image to binary code you can use
							echo '<div class = "related-headline">';
								echo '<a href="articles.php?image=' . $fetch_related['id'] .'">' . $fetch_related['headline'] . '</a>';
								echo nl2br("\n");
							echo '</div>';	
							echo '<a href="articles.php?image=' . $fetch_related['id'] .'"><img src="/media/'.$fetch_related['media'].'" class="article img-responsive center-block" /></a>';
							echo '<h5 class="pull-left time_to_read">'. $fetch_related["time_to_read"]. '</h5>'.'<h5 class="pull-right article_date">'. $fetch_related["article_date"]. '</h5>';
							echo nl2br("\n");	
					}
				}
				echo '</div>';						
			?>	
			<?php	
				if ($result->num_rows > 0) {
					while ($fetch=$result->fetch_assoc()) {
						//var_dump($fetch);
						
						//echo '<input type="button" class="back-button" value="Home" onclick="history.back()"></input>';
						//echo '<a href="www.techchat.co" class="btn btn-default">Home</a>';
						echo '<div class="col-xs-9">';
							echo '<h1 style= class="headline">'.$fetch['headline'].'</h1>';
							echo "<br>";
							echo '<img src="/media/'.$fetch['media'].'" class="article-pic img-rounded center-block img-responsive" />';
							echo "<br>";
							echo nl2br('<p class="story">'.$fetch['story'].'</p>');
							echo '<div class="fb-share-button" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u&amp;src=sdkpreparse">Share</a></div>';
						echo '</div>';


						//echo '<div class="container">';
						//echo '<div class="fb-like" data-href="https://www.facebook.com/techchatt/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>';
						//echo '<div class="fb-comments"  data-href="http://localhost:8000/articles.php?image=2" data-numposts="5"></div>';
						//echo '</div>';
						
					}
					
				}

				//close the connection
				$con->close();
			?>
	</div>
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

