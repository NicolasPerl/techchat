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
	    
	<link href="logo-nav.css" rel="stylesheet" title="basic style" type="text/css" media="all" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!-- Bootstrap Core CSS -->
	<link href="bootstrap.min.css" rel="stylesheet" title="basic style" type="text/css" media="all">

	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	    
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

    </script>

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
			                    
					<li><a href="#">Home</a></li>
			                    
			                    
					<li><a href="./contacts.html">Contact</a></li>
			                
				</ul>
			            
			</div>
			            
			<!-- /.navbar-collapse -->
			        
			</div>
	        
		<!-- /.container -->
	    
	</nav>

	    
	<!-- Page Content -->
	<!--<div class="jumbotron">-->
		        
			<div class="row">
		            
				<div class="col-lg-12">

					<img id="jumbotronPic" src="http://scp-wiki.wdfiles.com/local--files/scp-2100/site_entrance.jpg">
					<div class="wrap">
						<div class="type-wrap">
					        <div id="typed-strings">
					            <span>Stay <strong>updated</strong> on modern tech</span>
					            <p>30 second <em>short</em> stories for everyone</p>
					            <p>Enjoy</p>
					        </div>
					        <span id="typed" style="white-space:pre; font-family: 'Lato',sans-serif; position: absolute; bottom: 430px; font-size: 300%; color: white; font-weight: bold; padding: 0 20px; width: 40%; line-height: 150%; left: 150px;"></span>
					    </div>
					</div>
									      
    			</div>      
			</div>      
		
	<!--</div>-->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<a href="#" class="thumbnail">
						<img src="https://i.guim.co.uk/img/media/7eb07e8ef2b97243ef48a132418a69c262aaaabf/0_2_1121_673/master/1121.jpg?w=620&q=55&auto=format&usm=12&fit=max&s=1a24aa5a73cd743eb3c1a34983ea0dd3" alt="Female wearing Snapchat Sunglasses">
					</a>
					<p>
					Snapchat👻 is releasing camcorder sunglasses this fall calling them Spectacles <br>
					</p>
					<script>
		    		function SetCookie(c_name,value,expiredays)
		        	{
		            var exdate=new Date()
		            exdate.setDate(exdate.getDate()+expiredays)
		            document.cookie=c_name+ "=" +escape(value)+
		            ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
		        	}
		    		</script>
		    		<!--
					<div class= "dropdown">
						<button id="myButton" onclick="myFunction(this.id);SetCookie('story1','read','30')" class="dropbtn">keep reading</button>
							<div id="myDropdown" class="dropdown-content">
									News article content here 
								<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art1" alt="art1" value="Related Links"/></form>
							</div> 
					<?php
							if(isset($_COOKIE['story1'])){
		  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
							}
							else{
		    					echo '';
							}
					?>
					
					</div>
					-->
				</div>
				<div class="col-md-4">
				<br>
				<br>
					<a href="#" class="thumbnail">
						<img src="http://a57.foxnews.com/images.foxnews.com/content/fox-news/tech/2016/09/08/iphone-7-has-no-headphone-jack-so-these-are-your-options/_jcr_content/par/featured-media/media-0.img.jpg/876/493/1473343937810.jpg?ve=1&tl=1" alt="iPhone 7 with headphones">
					</a>
					<p>
					Here is everything you need to know about the new iPhone 7 📱😮<br/>
					</p>
						<!--
						<button id="myButton2" onclick="myFunction(this.id);SetCookie('story2','read','30')" class="dropbtn">keep reading</button>
							<div id="myDropdownNext" class="dropdown-content">
								
								News article content here 


								<form action = "./related.php" method = "post">
								<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art2" alt="art2" value="Related Links"/></form>
							</div>
					<?php
							if(isset($_COOKIE['story2'])){
		  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
							}
							else{
		    					echo '';
							}	
					?> -->
					</div>
				<div class="col-md-4">
				<br>
				<br>
					<a href="#" class="thumbnail">
					 <iframe id ="youtube1" width="100%" height="400" src="https://www.youtube.com/embed/5t21_e7_-cQ" frameborder="0" ></iframe>
					</a>
					<p>
						Here is what you didn't know about the Apple Watch⌚️ brand and the Apple Watch Series 2<br/>
					</p>
					<!--
					<div class="dropdown">
						<button id="myButton3" onclick="myFunction(this.id);SetCookie('story3','read','30')" class="dropbtn">keep reading</button>
						<div id="myDropdown3" class="dropdown-content">
							
							 News article content here 

						<form action = "./related.php" method = "post">
							<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art3" alt="art3" value="Related Links"/></form>
						</div>
					<?php
							if(isset($_COOKIE['story3'])){
		  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
							}
							else{
		    					echo '';
							}	
					?>
					</div> 
					-->
				</div> 
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
				<br>
				<br>
					<a href="#" class="thumbnail">
						<img src="http://i.dailymail.co.uk/i/pix/2015/10/21/18/2DA278AD00000578-3283193-image-a-9_1445447181771.jpg" alt="Nike Self Lacing Shoe">
					</a>
					<p>
					Nike just released their brand new Nike Mags👟, the self-lacing shoe inspired by Back to the Future!<br/>
					</p>
					<!--
					<div class="dropdown">
						<button id="myButton4" onclick="myFunction(this.id);SetCookie('story4','read','30')" class="dropbtn">keep reading</button>
						<div id="myDropdown4" class="dropdown-content">

							 News article content here

							<form action = "./related.php" method = "post">
								<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art4" alt="art4" value="Related Links"/></form>
						</div>
					<?php
							if(isset($_COOKIE['story4'])){
		  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
							}
							else{
		    					echo '';
							}
					?>
					</div>
					-->
				</div>
				<div class="col-md-4">
				<br>
				<br>
					<a href="#" class="thumbnail">
						<iframe width="100%" height="400" src="https://www.youtube.com/embed/_M6G0gsTtmY" frameborder="0" allowfullscreen></iframe>
					</a>
					<p>
						A revolutionary noise canceling device🔇 is claiming to provide you with your very own personal space wherever you are<br/>
					</p>
					<!--
					<div class="dropdown">
						<button id="myButton5" onclick="myFunction(this.id);SetCookie('story5','read','30')" class="dropbtn">keep reading</button>
						<div id="myDropdown5" class="dropdown-content">

							 News article content here 

							<form action = "./related.php" method = "post">
								<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art5" alt="art5" value="Related Links"/></form>
						</div>
					<?php
							if(isset($_COOKIE['story5'])){
		  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
							}
							else{
		    					echo '';
							}	
					?>
					</div>
					-->
				</div>
				<div class="col-md-4">
				<br>
				<br>
					<a href="#" class="thumbnail">
					 <img src="https://cdn0.vox-cdn.com/thumbor/7n3Ztrvg3xQPJjF8dsc-Nrcue18=/0x38:738x453/1600x900/cdn0.vox-cdn.com/uploads/chorus_image/image/50150125/mercedes_self_driving_bus.0.0.jpg" alt="Mercedes Bus">
					</a>
					<p>
						The Mercedes self driving bus🚍 reaches a milestone in innovation by completing a 12.4 mile trip in the Netherlands.<br/>
					</p>
					<!--
					<div class="dropdown">
						<button id="myButton6" onclick="myFunction(this.id);SetCookie('story6','read','30')" class="dropbtn">keep reading</button>
						<div id="myDropdown6" class="dropdown-content">

							News article content here

							<form action = "./related.php" method = "post">
								<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art6" alt="art6" value="Related Links"/></form>
						</div>
					<?php
							if(isset($_COOKIE['story6'])){
		  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
							}
							else{
		    					echo '';
							}	
					?>
					</div>
					-->
				</div> 
			</div>
		</div>
		<div class="container">
			<div class="row">
			<div class="col-md-4">
			<br>
			<br>
				<a href="#" class="thumbnail">
					<img src="https://d.fastcompany.net/multisite_files/fastcompany/imagecache/1280/poster/2014/04/3029477-poster-p-2-3-ways-burberrys-ceo-will-impact-apples-new-spaceship-style-headquarters.jpg">
				</a>
				<p>
					CRIBS EDITION🏤: TechChat is taking you inside Apple's new headquarters, where much of the design is coming from Jonathen Ive… also designer of the iPhone📱, iPod, and Apple Watch⌚️<br/>
				</p>
				<!--
				<div class="dropdown">
					<button id="myButton7" onclick="myFunction(this.id);SetCookie('story7','read','30')" class="dropbtn">keep reading</button>
					<div id="myDropdown7" class="dropdown-content">

						News article content here 

						<form action = "./related.php" method = "post">
							<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art7" alt="art7" value="Related Links"/></form>
					</div>
				<?php
						if(isset($_COOKIE['story7'])){
	  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
						}
						else{
	    					echo '';
						}
				?>
				</div>
				-->
			</div> 
			<div class="col-md-4">
			<br>
			<br>
				<a href="#" class="thumbnail">
					<img src="https://fortunedotcom.files.wordpress.com/2016/05/tes-06-01-16-tesla-model-x-4.jpg" alt="Tesla Interior img." >
				</a>
				<p>
					Tesla's CEO, Elon Musk, has released Tesla's🚗 plans for the next decade… you can only imagine how ambitious it is when his side job is trying to colonize Mars👽🖖🚀<br/>
				</p>
				<!--
				<div class="dropdown">
					<button id="myButton8" onclick="myFunction(this.id);SetCookie('story8','read','30')" class="dropbtn"> keep reading</button>
					<div id="myDropdown8" class="dropdown-content">

						 News article content here 

						<form action = "./related.php" method = "post">
							<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art8" alt="art8" value="Related Links"/></form>
					</div>
				<?php
						if(isset($_COOKIE['story8'])){
	  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
						}
						else{
	    					echo '';
						}		
				?>
				</div>
				-->
			</div> 
			<div class="col-md-4">
			<br>
			<br>
				<a href="#" class="thumbnail">
				 <iframe width="100%" height="400" src="https://www.youtube.com/embed/PHjvySrshVI" frameborder="0" allowfullscreen></iframe>
				</a>
				<p>
					Daniel Hashimoto, a Dreamworks Animation vis-dev artist🎨, is famous for adding some of the coolest effects to his son's videos📹<br/>
				</p>
				<!--
				<div class="dropdown">
					<button id="myButton9" onclick="myFunction(this.id);SetCookie('story9','read','30')" class="dropbtn">keep reading</button>
					<div id="myDropdown9" class="dropdown-content">

						 News article content here 

						<form action = "./related.php" method = "post">
							<input class="btn btn-info btn-xs" style="float: right; margin: 4px;" type="submit" name="art9" alt="art9" value="Related Links"/></form>
					</div>
				<?php
						if(isset($_COOKIE['story9'])){
	  						echo '<img src="./check.jpeg" style="width:25px;height:25px;>';
						}
						else{
	    					echo '';
						}		
				?>
				</div>
				-->
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
