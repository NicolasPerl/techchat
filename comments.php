<?php
    // get the incoming information
    extract($_POST);
    $name = $_POST["name"];
    $email = $_POST["email"];
    $headline = $_POST["headline"];
    $review = htmlspecialchars($_POST["comment"]);
    $test_review = strtolower( $review );
    $time = date("r");
    // add comment to database
    insert_entry($name,$email,$headline,$time,$review);
    // write a thank you note for commenting
    print <<< THANKS
    <html>
        <head>
        <link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
            <title> Thank You! </title>
        </head>
        <body>
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
                    
  <li>
  <a href="./index.php">Home</a></li>
                
  </ul>
            
  </div>
            
  <!-- /.navbar-collapse -->
        
  </div>
        
  <!-- /.container -->
    
  </nav>
    <div class="container">
            <h2> Thank you for your valuable feedback. </h2>
            <a href = "./all_comments.php"> View All Comments <a/>
    </div>
        </body>
    </html>
THANKS;

    function insert_entry($name, $email, $headline, $time, $review)
    {
    $servername = "fall-2016.cs.utexas.edu";
    $username = "nicolasp";
    $password = "kn2tw0~GuW";
    $dbname = "cs329e_nicolasp";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Insert new row
    $sql = "INSERT INTO comments VALUES ('$name','$email','$headline','$time','$review')";
    mysqli_query($conn, $sql);    
    // Close connection
    mysqli_close($conn);
    }
?>
