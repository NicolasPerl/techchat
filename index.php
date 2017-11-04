<?php
	include "mysqli_connection.php";
	
	$query = "SELECT COUNT(id) FROM articles";
	$result = $con->query($query);
	$row = mysqli_fetch_row($result);
	
	//Here we have the total row count
	$rows = $row[0];
	//this is the number of results we want displayed per page
	$page_rows = 10;
	// this is the number of videos displayed per page
	//$vid_per_page = $page_rows / 2;
	$vid_per_page = 11;
	//this tells us the page number of our last page
	$last = ceil($rows/$page_rows);
	//this makes sure $last can't be less than 1
	if ($last < 1) {
		$last = 1;
	}
	// establish the $pagenum variable
	$pagenum = 1;
	$dummy = $_GET['pn'];
	//get pagenum from URL vars if it is present, else it is = 1
	if (isset($_GET['pn'])) {
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	// this makes sure the page number isn't below 1, or more than our $last page
	if ($pagenum < 1) {
		$pagenum = 1;
	}
	else if ($pagenum > $last) {
		$pagenum = $last;
	}
	// sets the range of rows to query for the chosen $pagenum
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' . $page_rows;
	//vidID $limit per page
	$limitvidID = 'LIMIT ' .($pagenum - 1) * $vid_per_page .',' . $vid_per_page;
	
	//query just 1 page worth of rows by applying $limit
	//$query = "SELECT id, headline, media, time_stamp, tag FROM articles ORDER BY id DESC $limit";
	//$result = $con->query($query);
	
	//shows the user what page they are on and the total number of pages
	$textline1 = "Dummy (<b>$rows</b>)";
	$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
	//establish $pagination on Crtls variable
	$paginationCtrls = '';
	//if there is more then 1 page worth of results
	if ($last != 1) {
		// first we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.
		if ($pagenum > 1) {
			$previous = $pagenum - 1;
			//$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a>';
			$paginationCtrls .= '<a href="index.php?pn='.$previous.'">Previous</a>';
			//render clickable number links that should appear on the left of the target page number
			for ($i = $pagenum-4; $i<$pagenum; $i++) {
				if ($i > 0) {
					//$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> ';
					$paginationCtrls .= '<a href="index.php?pn='.$i.'">'.$i.'</a> ';
				}
				
			}
		}
		// render the target page number without it being a link. Dead link.
		$paginationCtrls .= ''.$pagenum;
		//render clickable number links that would appear on the right
		for ($i = $pagenum+1; $i <=$last; $i++) {
			//$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>';
			$paginationCtrls .= '<a href="index.php?pn='.$i.'">'.$i.'</a>';
			if ($i >= $pagenum+4) {
				break;
			}
		}
		// shows the word next
		if ($pagenum != $last) {
			$next = $pagenum + 1;
			/*
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
			*/
			$paginationCtrls .= '<a href="index.php?pn='.$next.'">Next</a> ';
			
		}
	}
	//close the connection
	$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	    
	<title>TechChat News</title>
	    
	<!-- Custom CSS -->
	<!--<link href="style.php" rel="stylesheet" title="index style" type="text/css" media="all" />-->
	<link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!-- Bootstrap Core CSS -->
	<link href="/styles/bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all"/>

	<script src="lib/typed.min.js" type="text/javascript"></script>

	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Arvo|Lato|Open+Sans:800|Vollkorn" rel="stylesheet">

	<!--<link rel="stylesheet" type="text/css" href= "style.php"/>-->

	<!--Favicon Icon on for tabs -->
	    
	<!--[if lt IE 9]>
	        
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>	    
	<![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    
    <script>
    function foo(){ console.log("Callback"); }
	function SetCookie(c_name,value,expiredays)
	{
	    var exdate=new Date()
	    exdate.setDate(exdate.getDate()+expiredays)
	    document.cookie=c_name+ "=" +escape(value)+
	    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
	}
	</script>

</head>

<body>

<!-- Loader 
<div id="overlay">
	<div class="flex-container">
	  <div class="unit">
	    <div class="heart">
	      <div class="heart-piece-0"></div>
	      <div class="heart-piece-1"></div>
	      <div class="heart-piece-2"></div>
	      <div class="heart-piece-3"></div>
	      <div class="heart-piece-4"></div>
	      <div class="heart-piece-5"></div>
	      <div class="heart-piece-6"></div>
	      <div class="heart-piece-7"></div>
	      <div class="heart-piece-8"></div>
	    </div>
	    <p>~loading media from<br> around the world~</p>
	  </div>

	</div>
</div>-->


<!--Facebook API integration-->
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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-90907253-1', 'auto');
	  ga('send', 'pageview');
	</script>
	<!--Connect to facebook -->
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
    <!-- Navigation -->
	<!-- Page Content -->
	<!--<div class="jumbotron">-->
		
		    <div class="container">
			    <div class="nav-container2">
			    	<div class="row">
			    		<div class="col-xs-4 col-md-3">
			    			<img src="/Images/TechChatLogo.png" alt="logo" class="tc_logo"/>
			    		</div>
			    		<div class="col-xs-8 col-md-5 test">
							<!-- typed.js injection -->
			                <div class="type-wrap">
			                    <div id="typed-strings">
			                        <h1>lets get to the <strong>point</strong></h1>
			                        <h1><em>we</em> get to the <strong>point</strong>.</h1>
			                    </div>
			                    <span id="typed"></span>
			                </div>
			                <!-- typed.js ends here -->
			                <!-- typed.js script -->
			                <script>
			                    var typed = new Typed('#typed', {
			                    stringsElement: '#typed-strings',
			                    typeSpeed: 40,
			                    loop: true,
			                    backDelay: 800,
			                    startDelay: 3000,
			                    showCursor: true,
			                    backSpeed: 20,
			                    });
			                </script>
			                <!--typed.js ends here -->

						</div>
						<!--
						<div class="col-xs-12 col-md-4 test2">
			    			<form action="./email.php" method="post" class="form-inline email_signup">
							    <input type="Email" name="email-list" placeholder="Input your email to..."/>
							  	<button name="submit" type="submit" class="btn btn-default">Be enlightend!</button>
							</form>
			    		</div>-->
					</div>      
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<?php 
						ini_set('display_errors',1); ini_set('display_startup_errors',1); 
						error_reporting(-1);
						include "mysqli_connection.php";
						$query = "SELECT vidID FROM videos ORDER BY id DESC limit 1";
						//query the result and assign in to $result
						$result = $con->query($query);
						//if the row is not empty
						if ($result->num_rows > 0) {
							while ($fetch=$result->fetch_assoc()) {
								//convert array to string
								$string_version = implode(',', $fetch);
							}
						}
						//close the connection
						$con->close();
						?>
						<!--Jumbotron-->
						<div class="video-container">
							<iframe id="videoDay" width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $string_version; ?>?rel=0&showinfo=0&autohide=1&autoplay=0" frameborder="0" allowfullscreen volume="0"></iframe>		
						</div>
					</div>
				</div>
			</div>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<div class="post">
			<div class="container">
				<div class="row">
					
			



			

<!--below has been copied-->

				<div class="col-md-8">
					<h1 id="stories"> Short Stories </h1>
					<div class="row">
						<div class="col-md-6">
<!--article news card snippet-->
							<!--<div class="container">-->
							  <!-- Normal Demo
							  <div class="column">-->
							    <!-- Post-->
							    <?php
							include "mysqli_connection.php";
							$query = "SELECT id, headline, media, article_date, time_to_read, description, category FROM articles WHERE id % 2 = 0 ORDER BY id DESC $limit";
							$query_odd = "SELECT id, headline, media, article_date, time_to_read, description, category FROM articles WHERE id % 2 = 1 ORDER BY id DESC $limit";
							//query the result and assign in to $result
							$result = $con->query($query);
							$result_odd = $con->query($query_odd);
							//var_dump("Result Even :",$result);
							//var_dump("Result ODD : ", $result_odd);
							
							//if the row is not empty
							
							if ($result->num_rows > 0) {
								while ($fetch=$result->fetch_assoc()) {
									echo '<div class="col-lg-12">';
										echo '<div class="post-module">';
							      //Thumbnail
							      			echo '<div class="thumbnail"> ';
										        echo '<div class="date">';
										          	echo '<div class="day">'. $fetch["article_date"]. '</div>';
										        echo '</div>';
										          	//echo '<div class="month">Mar</div>';
										        echo '<a href="articles.php?image=' . $fetch['id'] .'"><img src="/media/'.$fetch['media'].'" class="article img-responsive center-block" /></a>';
										      	
										      // Post Content
										      echo '<div class="post-content">';
										        echo '<div class="category">'. $fetch["category"]. '</div>';
										        echo '<a href="articles.php?image=' . $fetch['id'] .'"><h1 class="title">'. $fetch['headline']. '</h1></a>';
										        echo '<p class="description">'. $fetch["description"]. '</p>';
										        echo '<div class="post-meta"><span class="timestamp">'.$fetch["time_to_read"]. '</div>';
										      echo '</div>';
							      			echo '</div>';
							    		echo '</div>';
							    	echo '</div>';


										//click on article and it takes you to id in database.
								}	
							}
							
							?>

<!--article news card snippet above-->	
						</div>

						<div class="col-md-6">
							<?php
								if ($result_odd->num_rows > 0) {
										while ($fetch_odd=$result_odd->fetch_assoc()) {
											echo '<div class="col-lg-12">';
												echo '<div class="post-module">';
									      //Thumbnail
									      			echo '<div class="thumbnail">';
												        echo '<div class="date">';
												          	echo '<div class="day">'. $fetch_odd["article_date"]. '</div>';
												          	//echo '<div class="month">Mar</div>';
												        echo '</div>';
												        	echo '<a href="articles.php?image=' . $fetch_odd['id'] .'"><img src="/media/'.$fetch_odd['media'].'" class="article img-responsive center-block" /></a>';
												      	
												      // Post Content
												      echo '<div class="post-content">';
												        echo '<div class="category">'. $fetch_odd["category"]. '</div>';
												        echo '<a href="articles.php?image=' . $fetch_odd['id'] .'"><h1 class="title">'. $fetch_odd['headline']. '</h1></a>';
												        echo '<p class="description">'. $fetch_odd["description"]. '</p>';
												        echo '<div class="post-meta"><span class="timestamp">'.$fetch_odd["time_to_read"]. '</div>';
												      echo '</div>';
									      			echo '</div>';
									    		echo '</div>';
									    	echo '</div>';
												//click on article and it takes you to id in database. Convert image to binary code you can use
												
										}	
									}
							//close the connection
							$con->close();
							?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h1 id="videos"> Videos </h1>
					<?php
					include "mysqli_connection.php";				
					//vidID queries must be alone
					$query = "SELECT vidID FROM videos WHERE id != (SELECT MAX(id) FROM videos) ORDER BY id DESC $limitvidID";
					$secondQuery = "SELECT headline FROM videos WHERE id != (SELECT MAX(id) FROM videos) ORDER BY id DESC $limitvidID";
					$videoDeets = "SELECT video_date, time_to_watch FROM videos WHERE id != (SELECT MAX(id) FROM videos) ORDER BY id DESC $limitvidID";
					//query the result and assign in to $result
					$result = $con->query($query);
					$result2 = $con->query($secondQuery);
					$resultDeets = $con->query($videoDeets);
					//if the row is not empty
					if ($result->num_rows > 0) {
						while ($fetch=$result->fetch_assoc()) {
							// fetch video details
							$fetchDeets=$resultDeets->fetch_assoc();
							echo '<div class="col-md-12">';
								//convert array to string
								$string_version = implode(',', $fetch);
								echo '<h5 class="pull-left time_to_watch">'. $fetchDeets["time_to_watch"]. '</h5>'.'<h5 class="pull-right video_date">'. $fetchDeets["video_date"]. '</h5>';
								//youtube link  
								echo '<iframe id="videoList" width="320" height="180" src="https://www.youtube.com/embed/'. $fetch["vidID"].'?rel=0&showinfo=0&autohide=1&autoplay=0" frameborder="0" allowfullscreen volume="0"></iframe>';
								echo nl2br("\n");
								// fetch headline
								$fetchH = $result2->fetch_assoc();
								$string_versionH = implode(',', $fetchH);
								echo '<div class = "headline">';
									echo $string_versionH;
								echo '</div>';
								echo nl2br("\n");
							echo '</div>';
						}
					}
					//close the connection
					$con->close();
					?>						
				</div>
				</div>


			    	<div id = "pagination_controls"><?php echo $paginationCtrls; ?></div>
				</div>
			</div><!--container div-->
		</div><!--post div-->
			<!--
			<footer>
		        <div class="row">
		            <div class="col-md-4">
		                <center><p id="usingCoilFooter"> using coil</p>
		                <div class="footerLinks">
		                    <a href="/product.php"> product </a><br>
		                    <a href="/proof.php"> inspiration </a>
		                </div></center>
		            </div>
		            <div class="col-md-4">
		                <center><span id="coilFooter" aria-hidden="true">techchat</span> 
		                <div class="footerLinks">
		                   
		                    <a href="mailto:support@coilapp.com?Subject=Hi%20again!" target="_top">contact us</a>
		                </div></center>
		            </div>
		            <div class="col-md-4">
		                <center><p id="handyLinksFooter">handy links</p>
		                <div class="footerLinks">
		                    <a id="facebook" href="https://www.facebook.com/techchatt/?ref=aymt_homepage_panel"> facebook</a><br>
		                    <a id="instagram" href="https://www.instagram.com/techchat/?hl=en">instagram</a><br>
		                    <a id="twitter" href="https://twitter.com/TechChatTX">twitter</a><br>
		                    <a id="youtube" href="https://www.youtube.com/channel/UCYgRAEfnB-OlpiBJBTduziQ">youtube</a><br>
		                </div></center>
		            </div>
		        </div>
		    </footer>-->
			
				<div class="footer">
					<div class="row">
						<div class="col-lg-12">
							<footer>
							<div class="nav-container2">
						    <ul class="social-media-list">
						        <li>
						            <a class="socialEffect" href="https://www.instagram.com/techchat/?hl=en" target="_blank"><img src="/Images/instagram.png" alt="instagram" /></a>
						        </li>
						        <li>
						            <a class="socialEffect" href="https://www.facebook.com/techchatt/?ref=aymt_homepage_panel" target="_blank"><img src="/Images/facebook.png" alt="facebook" /></a>
						        </li>
						        <li> 
						            <a href="https://twitter.com/TechChatTX" target="_blank"><img src="/Images/twitter.png" alt="twitter" /></a>
						        </li>
						    </ul>
						</div>
								<ul style="list-style-type: none">
									<li class="about"><a href="./contacts.html">Contact Us</a></li>
								</ul>
								<p>Copyright &#169 TechChat Network Inc. All rights reserved</p>						
							</footer>
						</div>
					</div>
				</div>
				
		

	<!-- /.container -->

	    
	<!-- jQuery -->
	    
	<script src="js/jquery.js"></script>

	    
	<!-- Bootstrap Core JavaScript -->
	    
	<script src="js/bootstrap.min.js"></script>

</body>

</html>