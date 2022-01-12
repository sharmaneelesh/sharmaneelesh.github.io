<?php
//UDPATE PROFILE PAGE
	session_start();
	
	if (array_key_exists("ID", $_SESSION) AND $_SESSION["ID"]) {							//If session id exists AND has a real value, it must means that they're logged in.
		
		require("../../connection/connection.php");
		
	} else {														//If not logged in, then do this:
		
		header("Location: ../../index.php");								//send back to login or the sign-up page;
		
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

		<title>Dashboard | The Model UN Network</title>
		
		<link rel="stylesheet" href="/css/dashboard.css">
		
	</head>
	
	<body>
	
		<nav class="navbar navbar-dark bg-dark">
			
				<a class="navbar-brand">
					<img src="/media/logo-small-2.png" width="200px">
					<div id="verticalhr"></div>
					<div id="slogan">
						<div>Where intellectuals</div>
						<div>meet.</div>
					</div>
				</a>
				
				<form class="form-inline">
					<a href='/index.php?Logout=1'><button type="button" class="btn btn-dark">Sign out</button></a>
				</form>
			
		</nav>

		<div id="mainbody">
		
			<div id="leftbar">
			
				<div style=" margin-top: -15px; height: 55px; background-color: grey; padding-top: 15px; margin-bottom: 40px">
					<img src="/media/globe.png" height="65px" width="65px" style="margin-bottom: 20px">
				</div>
				<h6 style="margin-bottom: 0px">The Liberation MUN</h6>
				<small>2-3 November, 2019</small>
				<hr>
				<a href="/dashboard/p"><h6>Edit Profile</h6></a>
				<div id="dashboardoptions">
					<a href="/dashboard/" id="options">Dashboard</a><br>
					<a href="/dashboard/c" id="options">Committees</a><br>
					<a href="" id="options">Delegates</a><br>
					<a href="" id="options">Webmail</a><br>
					<a href="" id="options">Send updates</a><br>
				</div>
	
			</div>
			
			<div id="mainbar">
			
				<div id="updateProfile">
					<h3 style="margin-bottom: 40px;  text-align: center;">Update Profile</h3>
					
					<form method="POST"	>
						
						<div class="input-group flex-nowrap col-md-11" style="margin-bottom: 10px">
							<div class="input-group-prepend">
								<div class="input-group-text" style="width: 70px">Name</div>
							</div>
							<input type="text" class="form-control" value="Enter Name" name="name" required>
						</div>
						
						<div class="input-group flex-nowrap col-md-11" style="margin-bottom: 10px">
							<div class="input-group-prepend">
								<div class="input-group-text" style="width: 70px">Date</div>
							</div>
							<input type="date" class="form-control" value="01-01-2020" name="date" required>
						</div>
						
						<div class="input-group flex-nowrap col-md-11" style="margin-bottom: 10px">
							<div class="input-group-prepend">
								<div class="input-group-text">Location</div>
							</div>
							<input type="location" class="form-control" value="" name="location" required>
						</div>
						
						<div class="input-group flex-nowrap col-md-11" style="margin-bottom: 10px">
							<div class="input-group-prepend">
								<div class="input-group-text">Email</div>
							</div>
							<input type="email" class="form-control" value="" name="email" required>
						</div>
							
						<div class="input-group flex-nowrap col-md-11" style="margin-bottom: 10px">
							<div class="input-group-prepend">
								<div class="input-group-text">Phone Number</div>
							</div>
							<input type="number" class="form-control" value="" name="phone" required>
						</div>
						
						<button type="submit" class="btn btn-success" style="float: right; margin-right: 10%;	">Save</button>
						
					</form>
					
				</div>
				
			</div>
		 	
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="/dashboard/global.js" type="text/javascript"></script>
		
	</body>
  
</html>