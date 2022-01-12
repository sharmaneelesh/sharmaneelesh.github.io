<?php
//HOMEPAGE
	session_start();								//starting session
	
	if (array_key_exists("Logout", $_GET)) {			//if user logged out through our logged in page / dashboard:
		unset($_SESSION);							//remove session id so logged in page can't be accessed.
		session_destroy();
	}
	
	else if(array_key_exists("ID", $_SESSION) && $_SESSION['ID']) {			//if session key already exists, AND has a real value, that is, the user is already logged in, then:
		header("Location: dashboard/");		//redirect to loggedin page.
	}

//	require("connection/connection.php");
	
	//Sign Up Settings
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$vkey = password_hash(time().$name, PASSWORD_DEFAULT);
	
	if($_POST && $_POST['Radio']=='conference') {
		
		$query = "INSERT INTO `Conferences`
				  (`confName`, `confEmail`, `confPassword`, `emailVerKey`)
				  VALUES ('$name', '$email', '$password', '$vkey')";
				  
		mysqli_query($link, $query);
		
		$_SESSION['ID'] = session_create_id();
		
		//verification email
			$to = $email;
			$subject = "Email verification";
			$message = "<a href='http://networkplan.practicehost.tech/verify/verify.php?vkey=$vkey'>Register Now </a>";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail($to, $subject, $message, $headers);
		
		header("Location: dashboard/p");
		
	} else if($_POST && $_POST['Radio']=='individual') {
		
		$query = "INSERT INTO `Delegates`
				  (`Name`, `Email`, `Password`, `emailVerKey`)
				  VALUES ('$name', '$email', '$password', '$vkey')";
				  
		mysqli_query($link, $query);
		
		$_SESSION['ID'] = session_create_id();
		
		//verification email
			$to = $email;
			$subject = "Email verification";
			$message = "<a href='http://networkplan.practicehost.tech/verify/verify.php?vkey=$vkey'>Register Now </a>";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail($to, $subject, $message, $headers);
		
		header("Location: dashboard/p");
		
	}
	
	//Sign In Settings
	if($_POST) {	
		$signInID = $_POST['signInID'];
		$signInPassword = $_POST['signInPassword'];
		
		$query = "SELECT `confEmail`, `confPassword` FROM `Conferences` WHERE `confEmail` = '$signInID'";
					
		$results = mysqli_query($link, $query);
		
		$myData = mysqli_fetch_array($results);
		
		if (mysqli_num_rows($results)==1 AND password_verify($_POST["signInPassword"], $myData[confPassword])) {
			
			$_SESSION['ID'] = session_create_id();
			
			header("Location: dashboard/");
			
		}  else {
			$error = "<div class='alert alert-danger' role='alert'>Please enter valid username or password.</div>";
		}
	}
	
	
?>

<!doctype html>

<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

		<title>The Model UN Network | Homepage</title>
		
		<link rel="stylesheet" href="/css/global.css">
		
	</head>
	
	<body>
		
		<div id="mainbody">
		
			<nav class="navbar navbar-light">
			
				<a class="navbar-brand">
					<img src="/media/logo-small-2.png">
					<div id="verticalhr"></div>
					<div id="slogan">
						<div>Where intellectuals</div>
						<div>meet.</div>
					</div>
				</a>
				
				<form class="form-inline">
					<button type="button" class="btn btn-outline-secondary" id="registernow" data-toggle="modal" data-target="#registerModal">Register</button>
					<button type="button" class="btn btn-outline-primary" id="signinnow" data-toggle="modal" data-target="#signinModal">Sign in</button>
				</form>
			
			</nav>
		
			<div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
			
			  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 450px;">
				
				<div class="modal-content">
				
				  <div class="modal-header" style="background-color: #DFDFDF; border-bottom: 1px solid #fff;">
					
					<img src="/media/logo-small-2.png" style="margin-top: 10px">
					<div id="verticalhr" style="margin-right: 10px; height: 60px; background-color: black"></div>
					<div id="slogan" style="color: black">
						<div>Where intellectuals</div>
						<div>meet.</div>
					</div>
					
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  
				  <div class="modal-body" style="color: black; background-color: #DFDFDF;">
				  
					<h4 class="text-center">Join the community now.</h4>
					<form method="POST">
					<div class="form-check-inline regoptions">
					  <input class="form-check-input" type="radio" name="Radio" id="exampleRadios1" value="conference" checked>
					  <label class="form-check-label" for="exampleRadios1">
						Conference/event
					  </label>
					</div>
					<div class="form-check-inline regoptions">
					  <input class="form-check-input" type="radio" name="Radio" id="exampleRadios2" value="individual">
					  <label class="form-check-label" for="exampleRadios2">
						Individual
					  </label>
					</div>
					<div class="input-group flex-nowrap" style="margin-bottom: 6px;">
						<div class="input-group-prepend">
						  <div class="input-group-text"><img src="/media/name.png" height="20px"></div>
						</div>
						<input type="text" class="form-control" placeholder="Enter Name" name="name" required>
					</div>
					<div class="input-group flex-nowrap" style="margin-bottom: 6px;">
						<div class="input-group-prepend">
						  <div class="input-group-text"><img src="/media/email.png" height="20px"></div>
						</div>
					  <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
					</div>
					<div class="input-group flex-nowrap" style="margin-bottom: 6px;">
						<div class="input-group-prepend">
						  <div class="input-group-text"><img src="/media/key.png" height="20px"></div>
						</div>
					  <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
					</div>
					<div style="padding-left: 20px; padding-right: 15px; text-align: center-left;"><small>By clicking Sign up, you agree to our User Agreement, Privacy Policy, and Cookie Policy.</small></div>
					
					
				  </div>
				  
				  <div class="modal-footer" style="background-color: #DFDFDF; border-top: 0px solid #fff;">
					<button type="submit" class="btn btn-primary">Sign up</button></form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#signinModal"><small>Sign in instead?</small></button>
				  </div>
				  
				</div>
				
			  </div>
			</div>
		
			<div class="modal fade" id="signinModal" tabindex="-1" role="dialog">
			  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 450px;">
				
				 <div class="modal-content">
				
				  <div class="modal-header" style="background-color: #DFDFDF; border-bottom: 1px solid #fff;">
					
					<img src="/media/logo-small-2.png" style="margin-top: 10px">
					<div id="verticalhr" style="margin-right: 10px; height: 60px; background-color: black"></div>
					<div id="slogan" style="color: black">
						<div>Where intellectuals</div>
						<div>meet.</div>
					</div>
					
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  
				  <div class="modal-body" style="color: black; background-color: #DFDFDF;">
				  
					<h4 class="text-center">Join the community now.</h4>
					<form method="POST">
					<div class="input-group flex-nowrap" style="margin-bottom: 3px;">
						<div class="input-group-prepend">
						  <div class="input-group-text"><img src="/media/name.png" height="20px"></div>
						</div>
						<input type="text" class="form-control" placeholder="User ID" id="userid" name="signInID" required>
					</div>
					<small style="margin-left: 15px;">Could be your username, email or phone number</small>
					<div class="input-group flex-nowrap" style="margin-bottom: 6px; margin-top: 3px;">
						<div class="input-group-prepend">
						  <div class="input-group-text"><img src="/media/key.png" height="20px"></div>
						</div>
						<input type="password" class="form-control" placeholder="Enter Password" name="signInPassword" required>
					</div>
					<a href="" style="float: right;">Forgot password?</a><br>
					<?php echo $error; ?>
					
				  </div>
				  
				  <div class="modal-footer" style="background-color: #DFDFDF; border-top: 0px solid #fff;">
					<button type="submit" class="btn btn-primary">Sign in</button></form>
					<button type="button" class="btn btn-secondary"  data-dismiss="modal" data-toggle="modal" data-target="#registerModal"><small>Sign up instead?</small></button>
				  </div>
				  
				</div>
				
			  </div>
			</div>
			
			<h1 id="heading">Become a part of the<br>bigger community.</h1>
			
			<div id="homeoptions">
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
				  <label class="btn btn-secondary active">
					<input type="radio" name="options" id="events" checked> Events
				  </label>
				  <label class="btn btn-secondary">
					<input type="radio" name="options" id="people"> People
				  </label>
				  <label class="btn btn-secondary">
					<input type="radio" name="options" id="learn"> Learn more
				  </label>
				</div>
			
				<div id="homeoptions1">
					<div class="input-group mb-2 search">
						<div class="input-group-prepend">
						  <div class="input-group-text"><img src="/media/glass.png"></div>
						</div>
						<input type="text" class="form-control" placeholder="Enter conference/event name...">
					</div>
					
					<div class="input-group mb-2 search">
						<div class="input-group-prepend">
						  <div class="input-group-text"><img src="/media/location.png"></div>
						</div>
						<input type="text" class="form-control" placeholder="Enter location...">
					</div>
					
					<button type="button" class="btn btn-success" id="searchnow">Search</button>
				</div>
				
				<div id="homeoptions2">
					<div class="input-group mb-2 mr-sm-2 search">
						<div class="input-group-prepend">
						  <div class="input-group-text">@</div>
						</div>
						<input type="text" class="form-control" placeholder="Search by username...">
					</div>
					<div class="input-group mb-2 mr-sm-2 search">
						<div class="input-group-prepend">
						  <div class="input-group-text">@</div>
						</div>
						<input type="text" class="form-control" placeholder="Search by email/phone number...">
					</div>
					
					<button type="button" class="btn btn-success" id="searchnow">Search</button>
				</div>
					
				<div id="homeoptions3">
					<ul>
					<li><a href=""><h5>What are MUNs?</h5></a></li>
					<li><a href=""><h5>What are MUNs?</h5></a></li>
					<li><a href=""><h5>What are MUNs?</h5></a></li>
					</ul>
				</div>
			</div>
				
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="/js/global.js" type="text/javascript"></script>
		
	</body>
  
</html>