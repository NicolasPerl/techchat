<?php
	if (isset($_POST['art1'])) {
	if (isset($_COOKIE["logged_in"])) {
		article1();
	} else {
		login_form();
	}
    }
    elseif (isset($_POST['art2'])) {
	if (isset($_COOKIE["logged_in"])) {
		article2();
	} else {
		login_form();
	}
    }
    elseif (isset($_POST['art3'])) {
	if (isset($_COOKIE["logged_in"])) {
		article3();
	} else {
		login_form();
	}
    }
    elseif (isset($_POST['art4'])) {
	if (isset($_COOKIE["logged_in"])) {
		article4();
	} else {
		login_form();
	}
    }
    elseif (isset($_POST['art5'])) {
	if (isset($_COOKIE["logged_in"])) {
		article5();
	} else {
		login_form();
	}
    } 
    elseif (isset($_POST['art6'])) {
	if (isset($_COOKIE["logged_in"])) {
		article6();
	} else {
		login_form();
	}
    } 
    elseif (isset($_POST['art7'])) {
	if (isset($_COOKIE["logged_in"])) {
		article7();
	} else {
		login_form();
	}
    } 
    elseif (isset($_POST['art8'])) {
	if (isset($_COOKIE["logged_in"])) {
		article8();
	} else {
		login_form();
	}
    } 
    elseif (isset($_POST['art9'])) {
	if (isset($_COOKIE["logged_in"])) {
		article9();
	} else {
		login_form();
	}
    } 
    else {
	if( exec('grep '.escapeshellarg(($_POST["username"].":".$_POST["password"])).'passwd.txt') && (!empty($_POST["username"])) && (!empty($_POST["password"]))) {
		setcookie("logged_in", "true", time()+2087*3600);
		session_start();
	} elseif ((!empty($_POST["username"])) && (!empty($_POST["password"]))) {
		setcookie("logged_in", "true", time()+2087*3600);
		session_start();
		file_put_contents("passwd.txt",  "\n".$_POST["username"].":".$_POST["password"], FILE_APPEND);
	} else {
	    login_form();
	    exit();
	}
    	header('Location: http://zweb.cs.utexas.edu/users/cs329e-fa16/nicolasp/CS329_Project_Final/CS329_Project_V/CS329_Project/index.php');
    }
function login_form()
 {
  $script = $_SERVER['PHP_SELF'];
  print <<<PAGE
  <?xml version = "1.0" ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
   "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <title> Registration Page </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type = "text/javascript"> 
    var xhr; 
    if (window.ActiveXObject) { 
        xhr = new ActiveXObject ("Microsoft.XMLHTTP"); 
    } 
    else if (window.XMLHttpRequest) { 
        xhr = new XMLHttpRequest (); 
    } 
    function callServer()
    {
    // get username from textfield
    var user = document.getElementById("user").value;
    // Build the URL to connect to
    var url = "http://zweb.cs.utexas.edu/users/cs329e-fa16/nicolasp/CS329_Project_Final/CS329_Project_V/CS329_Project/hwk16script1.php?user="+escape(user);
    // Open a connection to the server
    xhr.open("GET", url, true);
    // Setup a function for the server to run when it is done
    xhr.onreadystatechange = updatePage;
    // Send the request
    xhr.send(null);
    }
   // check if username already exists & create alert box if so
   function updatePage()
   {
      if ((xhr.readyState == 4) && (xhr.status == 200))
      {
	  var response = xhr.responseText;
	  console.log(response);
	  if (response == "taken")
	  {
	  alert("Sorry, username already taken.");
	  } 
      }
   }
    // disable the submit button until all fields have been filled
    $(document).ready(function (){
        validate();
        $("#user,#pass").on("propertychange change keyup paste input", function(){
            validate();
        });
    }); 
    function validate(){
    	var response = xhr.responseText;
        if ($("#user").val().length > 0 && $("#pass").val().length > 0 && response=="available"){
            $("input[type=submit]").prop("disabled", false);
        }
        else {
            $("input[type=submit]").prop("disabled", true);
        }
    };
  </script>

  </head>
  <body>
  <div class="jumbotron text-center">
  <h2> Registration Page </h2>
  <p> Please register to continue </p>
  </div>
  <table align="center">
  <form action = "$script" method = "post">
  <div class="form-group">
  <tr>
  <td align = right> Username: </td> 
  <td><input type = "text" name = "username" id="user" size = "30"
  onchange = "callServer();"/></td>
  </tr>
  <tr>
  <td align = right> Password: </td> 
  <td><input type = "text" name = "password" id="pass" size = "30"/></td>
  </tr>
  </div>
  <tr align = left>
  <td></td>
  <td><input type = "submit" value = "Register"/>
  <input type = "reset" value = "Clear"/></td>
  </tr>
  </form>
  </table>
  </body>
  </html>
PAGE;
 }
function article1()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			             
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://www.spectacles.com"> Official Snapchat Spectacles Website <a/><br>
	<a href = "http://www.businessinsider.com/how-to-buy-or-try-snapchat-spectacles-2016-11">
	 Business Insider Review of Spectacles <a/><br>
	</p>
  </body>
  </html>
PAGE;
 }
function article2()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://www.apple.com/iphone-7"> Official Apple iPhone 7 Webpage <a/><br>
	<a href = "http://www.cnet.com/products/apple-iphone-7/review"> CNET iPhone 7 Review <a/><br>
	</p>
  </body>
  </html>
PAGE;
 }
 function article3()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://www.apple.com/apple-watch-series-2"> 
	Official Apple Watch Series 2 Webpage <a/><br>
	<a href = "http://www.techradar.com/reviews/wearables/apple-watch-2-1323213/review"> TechRadar Apple Watch Series 2 Review <a/><br>
	</p>
  </body>
  </html>
PAGE;
 }
 function article9()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://www.youtube.com/user/theActionMovieKid"> The Action Movie Kid Official YouTube Page <a/><br>
	<a href = "http://www.imdb.com/name/nm1885366/"> Daniel Hashimoto Bio on IMDB <a/><br>
	</p>
  </body>
  </html>
PAGE;
 } 
 function article4()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://news.nike.com/nike-mag"> Offical Nike Mag Webpage <a/><br>
	<a href = "http://www.highsnobiety.com/2016/10/04/nike-mag-2016-release-date"> Nike Mag Release Date Information <a/><br>
	</p>
  </body>
  </html>
PAGE;
 }
 function article5()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://www.facebook.com/getMuzo"> Muzo Official Facebook <a/><br>
	<a href = "http://www.kickstarter.com/projects/1280803647/muzo-your-personal-zone-creator-with-noise-blockin"> Muzo Official Kickstarter <a/><br>
	</p>
  </body>
  </html>
PAGE;
 }
 function article6()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://www.forbes.com/sites/dougnewcomb/2016/07/29/mercedes-benz-demonstrates-self-driving-bus/#1ce06dd3498b"> Forbes Article on Mercedes Self-Driving Bus <a/><br>
	<a href = "http://www.dezeen.com/2016/07/19/mercedes-benz-self-driving-future-bus-autonomous-vehicle"> Dezeen.com Article on Self-Driving Bus <a/><br>
	</p>
  </body>
  </html>
PAGE;
 }
 function article7()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://www.cbsnews.com/pictures/apple-headquarters-cupertino-spaceship-campus"> CBS News Article on Apple Campus 2 <a/><br>
	<a href = "http://en.wikipedia.org/wiki/Apple_Campus_2"> Apple Campus 2 Wikipedia Page <a/><br>
	</p>
  </body>
  </html>
PAGE;
 }
 function article8()
 {
  print <<<PAGE
  <html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
  <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title> Related Links </title>
  </head>
  <body>

    <!-- Navigation -->
    
	<nav class="navbar navbar-inverse navbar-fixed-top" id="entireNav" role="navigation">
	        
		<div class="container">
	            
			<!-- Brand and toggle get grouped for better mobile display -->
	            
			<div class="navbar-header">
	                
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					 <span class="sr-only">Toggle navigation</span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
					                    
					<span class="icon-bar"></span>
	                
				</button>
	                
				<a class="navbar-brand" href="#">
	                    
					<img src="TechChatLogo.png" alt="">
	                
				</a>
	            
			</div>
	            
	<!-- Collect the nav links, forms, and other content for toggling -->
	            
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
				<ul class="nav navbar-nav">
			                    
					<li><a href="./index.php">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>
	<h3> &nbsp; Related Links </h3>
	<p>
	<a href = "http://www.tesla.com"> Official Tesla Motors Website <a/><br>
	<a href = "http://www.bloomberg.com/news/articles/2016-07-21/elon-musk-reveals-how-he-forecasts-tesla-s-future"> Bloomberg Article on Future of Tesla Motors <a/><br>
	</p>
  </body>
  </html>
PAGE;
 }
?>
