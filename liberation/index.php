<?php
	$minage = 16;		//local variable
	$arr = array("India", "Russia", "China");			//array
	
	#AGE VALIDATION

	if($_POST) {
		$agebool = $_POST['age']>$minage;		//boolean variable
		$name = $_POST['name'];			//string variable
	}
	else
		$agebool = NULL;		//null variable
	$doub = 100.9999999999999999;	//double variable
 
	#COUNTRY VALIDATION

	if($_POST) {
		$countrybool = FALSE;
		foreach($arr as $value) {
			if(strcmp($value, $_POST['country'])==0) {
				$countrybool = TRUE;
				break;
			}	
		}
	}


?>

<!doctype html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>The Liberation MUN | Dehradun</title>
		<link rel="stylesheet" type="text/css" href="global.css">
		<link rel="shortcut icon" href="media/conflogo.png" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">

	</head>

	<body>
		
		<div id="navigation"></div>
		<div id="navigationcontents" class = "mobile-only">
			<span id="clickme">✕</span><br><br>
			<a href="index.php" class="navigation">HOME</a><br><br>
			<a href="about-us.html" class="navigation">About Us</a><br><br>
			<a href="the-secretariat.html" class="navigation">The Secretariat</a><br><br>
			<a href="https://docs.google.com/forms/d/e/1FAIpQLSdKowZeOvTnOBs6Vn3kRHTlyXts0BR3v8AuRVSpRuqE1ebwaw/viewform" class="navigation">Register</a><br><br>
			<a href="https://drive.google.com/open?id=18efhTmvsPheAM_EPuGzwBs1LJEq5SFKj" class="navigation">Marksheets</a>
		</div>
	
		<div id="mainbody">
			
			<img src="media/conflogo.png" id="conflogo">
			
			<div id="header" class="container-fluid">
			<div id="headerdata">
			
				<span id="conftitle">THE LIBERATION MUN 2.0</span><br>(Powered by Doon International School Riverside Campus, Dehradun)
				<div id="hr"></div>
				<img src="media/conflogo.png" id="conflogoforphone">
				
				<nav class="navbar navbar-expand-sm p-0 navbar-dark" style="background-color: black;" id="mainnav">
					
					<button id="button" class="navbar-toggler p-0 my-2" type="button" data-toggle="collapse" data-target="navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
						
						<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						
						<li class="nav-item active">
							<a href="index.php" class="mr-5 nav-link p-0 ml-auto"  style="color: white">HOME</a>
						</li>
						<li class="nav-item active">
							<a href="about-us.html" class="mr-5 nav-link p-0 ml-2"  style="color: white">About Us</a>
						</li>
						<li class="nav-item active">
							<a href="the-secretariat.html" class="mr-5 nav-link p-0 ml-2"  style="color: white">The Secretariat</a>
						</li>
						<li class="nav-item active">
							<a href="agendas.html" class="mr-5 nav-link p-0 ml-2"  style="color: white">Agendas</a>
						</li>
						<li class="nav-item active">
							<a href="eb.html" class="mr-5 nav-link p-0 ml-2"  style="color: white">Executive Board</a>
						</li>
						<li class="nav-item active">
							<a href="csc552b.html" class="mr-5 nav-link p-0 ml-2"  style="color: white">CSC552B</a>
						</li>
						<li class="nav-item active">
							<a href="https://docs.google.com/forms/d/e/1FAIpQLSdKowZeOvTnOBs6Vn3kRHTlyXts0BR3v8AuRVSpRuqE1ebwaw/viewform" class="mr-5 nav-link p-0 ml-2"  style="color: white">Register</a>
						</li>
						<li class="nav-item active">
							<a href="marksheets.html" class="mr-0 nav-link p-0 ml-2"  style="color: white">Marksheets</a>
						</li>
						
						</ul>
					</div>
					
				</nav>
				
				<div id="socialicons">
					<a href="http://www.facebook.com/theliberationmun" class="socialicons"><img src="media/facebook.webp"></a>
					<a href="http://instagram.com/teamliberationofficial" class="ml-2 socialicons"><img src="media/instagram.webp"></a>
				</div>
				
			</div>
			</div>
			
			<div id="blank"></div>
			
			<div id="index-first-section">
					
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-4" id = "div1contleft">
						</div>
						<div class="col-sm-8" id="div1contright">
							<br>
							<video width="80%" controls autoplay>
								<source src="media/csoon.mp4" type="video/mp4">
							</video>
							<br><br>
							<form method="POST" id="signup" enctype="multipart/form-data">
	  
								<input type="text" id="name" aria-describedby="name" name="name" placeholder="Your name">
								&nbsp;&nbsp;
								<input type="number" id="age" aria-describedby="emailHelp" name="age" placeholder="Your Age" min="10" max="55">
								&nbsp;&nbsp;

								<select id="country" name="country">
									<option value="USA">USA</option>
									<option value="India">India</option>
									<option value="China">China</option>
									<option value="Russia">Russia</option>
									<option value="France">France</option>
								</select>
								&nbsp;&nbsp;
								<input type="hidden" name="Sign-Up" value="0">
								<button type="submit" class="btn btn-primary">Register</button><br><br>
							</form>

							<?php
								if($_POST) {
									if($agebool && $countrybool) {
										echo "<span id='welcomemessage'>Hi ".$name.", you're eligible for participating in The Liberation MUN 2022.</span><br>";
					
									}
										else
										echo "<span id='welcomemessage'>Hi ".$name.", you're not eligible for participating in The Liberation MUN 2022 yet. Only delegates from India, Russia and China above age of 16 are eligible to participate.</span>";
								}
							?>

						</div>
					</div>
				</div>
					
			</div>
			
			<div id="index-second-section" class="container-fluid">
			
				<div class="row">
				
					<div class="col-md-4">
						
						<span id="index-headtext">OUR MISSION<br></span>
						
						<p id="index-themission">Liberation, as the name suggests, defines our guiding mission. We are committed to liberating minds, liberating ideas and liberating our society. After being on the sidelines watching this discourse turn into a business, Liberation was finally founded to bring a change; because reforms correct mistakes, but initiatives correct conscience.</p>
						
					</div>
					
					<div id="index-vertical-line"> </div>
					
					<div class="container col-md-7">
						
						<div class="row" id="index-socials">
							<div class="col-md">
								<div id="index-getintouch">GET IN TOUCH<br></div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md">
								<p id="index-liberation">We'd love to hear from you</p>
							</div>
						</div>
						<br>
						<div class="row">
							
							<div class="col-md-4 index-center bree">
								<img src="media/mail.png" id="index-mail">
								<div><a href="mailto:theliberationmun@outlook" style="color:white">theliberationmun@outlook.com</a></div>
							</div>
							
							<div class="col-md-3 index-center bree">
								<img src="media/phone.png" id="index-phone"><br>
								<div><a href="tel:+918954462114" style="color:white">+91 8954462114</a></div>
							</div>
							
							<div class="col-md-5 index-center bree">
								<a href="http://www.facebook.com/theliberationmun"><img src="media/fb.png" class="index-social"></a> &nbsp;
								<a href="http://instagram.com/teamliberationofficial"><img src="media/insta.png" class="index-social"></a>
								<div>Find us on Facebook/Instagram.</div>
							</div>
							
						</div>
						
					</div>
					
			
			</div>
			
			
		</div>

			<div id="last-section">
					Copyright &copy; 2019 The Liberation MUN. All rights reserved.
			</div>


		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script type="text/javascript" src="global.js"></script>
	
	</body>

</html>