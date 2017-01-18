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
				<div class="row">
					<div class="col-lg-12">
						<div class="wrap">
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
						
						/*$servername = "us-cdbr-iron-east-04.cleardb.net";
						$username = "b4c5e18a9ad6fa";
						$password = "047e8b9d";
						$dbname = "heroku_d3e06c073a5cf59";*/
						$con = mysqli_connect('127.0.0.1',"root","","techchat");
						//$con = mysqli_connect($servername,$username,$password,$dbname);
						if (mysqli_connect_errno()) {
							echo "Failed to connect to mysql: " . mysqli_connect_error();
						}

						// retrieve jumbotron
						$query = 'SELECT picture FROM jumbotron';
						$result = $con->query($query);
						$fetch=$result->fetch_assoc();
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $fetch['picture'] ).'"/>';


						$con->close();
						?>
										      
	    				</div>      
					</div>      
				</div>
			</div>
	<!--</div>-->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<div class="post">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php

						// make the connection to the local server
						$con = mysqli_connect('127.0.0.1',"root","","techchat");
						/*$servername = "us-cdbr-iron-east-04.cleardb.net";
						$username = "b4c5e18a9ad6fa";
						$password = "047e8b9d";
						$dbname = "heroku_d3e06c073a5cf59";*/
						//$con = mysqli_connect($servername,$username,$password,$dbname);
						if (mysqli_connect_errno()) {
							echo "Failed to connect to mysql: " . mysqli_connect_error();
						}

						$query = "SELECT id, headline, media FROM news ORDER BY id DESC";
						//query the result and assign in to $result
						$result = $con->query($query);
						//if the row is not empty
						if ($result->num_rows > 0) {
							while ($fetch=$result->fetch_assoc()) {
								//click on article and it takes you to id in database. Convert image to binary code you can use
								echo '<a href="articles.php?image=' . $fetch['id'] .'"><img src="data:image/jpeg;base64,'.base64_encode( $fetch['media'] ).'" class="imgHover" /></a>';
								//new line
								echo nl2br("\n");
								echo $fetch['headline'];	
								echo nl2br("\n");
								echo '<div class="fb-like"';
										echo 'data-share="true"';
										echo 'data-width="450"';
										echo 'data-show-faces="true">';
								echo '</div>';
							}
						}
						
						//close the connection
						$con->close();
						?>
						

						
			    		
					</div>

					<div class="fix">
						<div class="col-md-4">
							<?php

							$con = mysqli_connect('127.0.0.1',"root","","techchat");
							/*$servername = "us-cdbr-iron-east-04.cleardb.net";
							$username = "b4c5e18a9ad6fa";
							$password = "047e8b9d";
							$dbname = "heroku_d3e06c073a5cf59";
							$con = mysqli_connect($servername,$username,$password,$dbname);*/
							if (mysqli_connect_errno()) {
								echo "Failed to connect to mysql: " . mysqli_connect_error();
							}

							$query = "SELECT vidID FROM videos ORDER BY id ASC";
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

							<iframe id="videoDay" width="400" height="200" src="https://www.youtube.com/embed/<?php echo $string_version; ?>?rel=0&showinfo=0&autohide=1&autoplay=0" frameborder="0" allowfullscreen volume="0"></iframe>
							<div
								class="fb-like"
								data-share="true"
								data-width="450"
								data-show-faces="true">
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
				<div class="footer">
					<div class="row">
						<div class="col-lg-12">
							<footer>
								<ul style="list-style-type: none">
									<li class="about"><a href="./contacts.html">Contact Us</a></li>
									<li class="about"><a href="#">Work With Us</a></li>
									<li class="about"><a href="#">Tech Tips</a></li>
									<!--<li class="about"><a href="#">Advertise With Us</a></li>-->
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
