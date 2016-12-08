<?php
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
THANKS;
    $servername = "fall-2016.cs.utexas.edu";
    $username = "nicolasp";
    $password = "kn2tw0~GuW";
    $dbname = "cs329e_nicolasp";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // View all student records
    $sql = "SELECT headline, commentbody FROM comments ORDER BY TRIM(headline) ASC
       , TRIM(commentbody) ASC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<h2> All Comments </h2><table border=1 width=60%>
        <tr><th> Headline </th><th> Comment </th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo ltrim("<tr><td>".$row["headline"]."</td><td>".$row["commentbody"]."</td></tr>");
        }
        echo "</table>";
    } else {
        echo "<h5> No results </h5>";
    }          
    echo "</div></body></html>"
?>
