<?php

	include "mysqli_connection.php";
	
	$query = "SELECT COUNT(id) FROM articles";
	$result = $con->query($query);
	$row = mysqli_fetch_row($result);
	
	//Here we have the total row count
	$rows = $row[0];
	//this is the number of results we want displayed per page
	$page_rows = 8;
	// this is the number of videos displayed per page
	$vid_per_page = $page_rows / 2;
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
	<link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all"/>

	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href= "style.php"/>
	    
	<!--[if lt IE 9]>
	        
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    
	<![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script>
    $(function(){

        $("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

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
	<link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all"/>

	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href= "style.php"/>
	    
	<!--[if lt IE 9]>
	        
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    
	<![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script>
    $(function(){

        $("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

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
		<!--
		    <div class="container">
		    <div class="nav-container2">
			    <ul class="social-media-list">
			        <li>
			            <a class="socialEffect" href="https://www.instagram.com/techchat/?hl=en" target="_blank"><img src="./instagram.png" alt="instagram" /></a>
			        </li>
			        <li>
			            <a class="socialEffect" href="https://www.facebook.com/techchatt/?ref=aymt_homepage_panel" target="_blank"><img src="./facebook.png" alt="facebook" /></a>
			        </li>
			        <li> 
			            <a href="https://twitter.com/TechChatTX" target="_blank"><img src="./twitter.png" alt="twitter" /></a>
			        </li>
			    </ul>
			</div>
				<div class="row">
					<div class="col-lg-12">
						<!--<div class="wrap">-->
							<!--<div class="type-wrap">
						        <div id="typed-strings">
						            <span>Stay <strong>updated</strong> on modern tech</span>
						            <p>30 second <em>short</em> stories for everyone</p>
						            <p>Enjoy</p>
						        </div>
						        <span id="typed" style="white-space:pre; font-family: 'Lato',sans-serif; position: absolute; bottom: 430px; font-size: 300%; color: white; font-weight: bold; padding: 0 20px; width: 40%; line-height: 150%; left: 150px;"></span>
						    </div>
						</div>-->
						<?php 
						ini_set('display_errors',1); ini_set('display_startup_errors',1); 
						error_reporting(-1);
						
						include "mysqli_connection.php";

						$query = "SELECT vidID FROM videoday ORDER BY id DESC";
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
						

							<iframe id="videoDay" width="100%" height="700" src="https://www.youtube.com/embed/<?php echo $string_version; ?>?rel=0&showinfo=0&autohide=1&autoplay=0" frameborder="0" allowfullscreen volume="0"></iframe>
			
										      
	    				<!--</div>-->      
					</div>      
				</div>
			</div>

	<!--</div>-->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<div class="post">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 id="stories"> Short Stories </h1>
						<?php

						include "mysqli_connection.php";

						$query = "SELECT id, headline, media FROM articles ORDER BY id DESC $limit";
						//query the result and assign in to $result
						$result = $con->query($query);
						
						//if the row is not empty
						if ($result->num_rows > 0) {
							while ($fetch=$result->fetch_assoc()) {
								echo '<div class="col-md-6">';
									//click on article and it takes you to id in database. Convert image to binary code you can use
									/* echo '<h5 class="pull-left">'. $fetch["time_stamp"]. '</h5>'.'<h5 class="pull-right">'. $fetch["tag"]. '</h5>'; */
									echo '<a href="articles.php?image=' . $fetch['id'] .'"><img src="data:image/jpeg;base64,'.base64_encode( $fetch['media'] ).'" class="imgHover img-responsive center-block" /></a>';
									//new line
									echo nl2br("\n");
									echo '<div class = "headline">';
										echo $fetch['headline'];
									echo '</div>';	
									echo nl2br("\n");
									
								echo '</div>';
							}
						}
						
						
						//close the connection
						$con->close();
						?>	
					</div>
				
				

				
					<div class="col-md-4">
						<h1 id="videos"> Videos </h1>
						<?php

						include "mysqli_connection.php";

						
						$query = "SELECT vidID FROM videos ORDER BY id DESC $limitvidID";
						$secondQuery = "SELECT headline FROM videos ORDER BY id DESC $limitvidID";

						//query the result and assign in to $result
						$result = $con->query($query);
						$result2 = $con->query($secondQuery);

						//if the row is not empty

						if ($result->num_rows > 0) {
							while ($fetch=$result->fetch_assoc()) {
								//convert array to string
								$string_version = implode(',', $fetch);
								echo '<iframe id="videoList" width="300" height="300" src="https://www.youtube.com/embed/'. $string_version. '?rel=0&showinfo=0&autohide=1&autoplay=0" frameborder="0" allowfullscreen volume="0"></iframe>';
								echo nl2br("\n");
								$fetchH = $result2->fetch_assoc();
								$string_versionH = implode(',', $fetchH);
								echo $string_versionH;
								echo nl2br("\n");
							}
						}
	
						//close the connection
						$con->close();
						?>
						

						
						

						
						
					</div>
				</div>
			</div>
			<div>
			    <div id = "pagination_controls"><?php echo $paginationCtrls; ?></div>
			</div>
				<div class="footer">
					<div class="row">
						<div class="col-lg-12">
							<footer>
							<div class="nav-container2">
						    <ul class="social-media-list">
						        <li>
						            <a class="socialEffect" href="https://www.instagram.com/techchat/?hl=en" target="_blank"><img src="./instagram.png" alt="instagram" /></a>
						        </li>
						        <li>
						            <a class="socialEffect" href="https://www.facebook.com/techchatt/?ref=aymt_homepage_panel" target="_blank"><img src="./facebook.png" alt="facebook" /></a>
						        </li>
						        <li> 
						            <a href="https://twitter.com/TechChatTX" target="_blank"><img src="./twitter.png" alt="twitter" /></a>
						        </li>
						    </ul>
						</div>
								<ul style="list-style-type: none">
									<li class="about"><a href="./contacts.html">Contact Us</a></li>
									<!--<li class="about"><a href="#">Work With Us</a></li>
									<li class="about"><a href="#">Tech Tips</a></li>
									<li class="about"><a href="#">Advertise With Us</a></li>-->
								</ul>

								<p>Copyright &#169 TechChat Network Inc. All rights reserved</p>
							</footer>
						</div>
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
