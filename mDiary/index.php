<?php

	session_start();								//starting session
	
	if (array_key_exists("Logout", $_GET)) {			//if user logged out through our logged in page / dashboard:
		unset($_SESSION);							//remove session id so logged in page can't be accessed.
		session_destroy();
	}
	
	else if(array_key_exists("ID", $_SESSION) && $_SESSION['ID']) {			//if session key already exists, AND has a real value, that is, the user is already logged in, then:
		header("Location: loggedinpage.php");		//redirect to loggedin page.
	}

	$link = mysqli_connect("shareddb-t.hosting.stackcp.net", "SecretDiary-313331f595", "l4rldsqunh", "SecretDiary-313331f595");	//connecting database
	
	if (mysqli_connect_error()) {					//error if couldn't connect to database
		
	    die("Error connecting database.");
		
	}
	
	if ($_POST) {									//If form data exists.
        
        if ($_POST["Sign-Up"] == "0" AND !$_POST["Name"]) {		//skip name verification if logging in.
            
            $error .= "The name is required.<br>";
            
        }
        
        
        if (!$_POST["Email"]) {
            
            $error .= "An email address is required.<br>";
            
        }
        if (!$_POST["Password"]) {
            
            $error .= "The password is required.<br>";
            
        }
        
        if ($_POST['Email'] && filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL === false)) {
            
            $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were following error(s) in your form:</p>' . $error . '</div>';
            
        } 
		
		else {										// that is, if there are no errors;
			
			if($_POST["Sign-Up"] == "0") {			//if we're signing up.
			    
    			$query = "SELECT `Email` FROM `SecretDiary` WHERE `Email` = '".mysqli_real_escape_string($link, $_POST[Email])."'";		//selecting emails in our database that match the user entered email.
    			
    			$results = mysqli_query($link, $query);
    			
    			if (mysqli_num_rows($results)>0) {		//checking if the user entered email already exists in our database.
    				
    				echo "User already exists. Try logging in?<br>";
    				
    			} else {								//if new account created.
    			
					$hash = password_hash($_POST[Password], PASSWORD_DEFAULT);		//creating hash of the user entered password before storing it in our server.
					
					$query = "INSERT INTO `SecretDiary` (`Name`, `Email`, `Password`) VALUES ('".mysqli_real_escape_string($link, $_POST[Name])."', '".mysqli_real_escape_string($link, $_POST[Email])."', '".mysqli_real_escape_string($link, $hash)."')";		//storing user's name, email and hashed password in our database server.
				
					if(!mysqli_query($link, $query)){		//if it was not saved for a reason other than email already existing.
					
						echo "Sign up failed. Please try again later.<br>";		//fatal error which needs to be addressed on the server side.
						
					} else {							//if user signed up without any errors.
						
						$_SESSION["ID"] = mysqli_insert_id($link);		//attach the user's unique id on our server to the session id to mark it as logged in.
					
						header("Location: loggedinpage.php");		//since sign up is successful, redirect user to logged in page, which ideally would be a dashboard.
						
					}
				}
			} else if($_POST["Login"] == "1") {				//if we're logging in.
				
				$query = "SELECT * FROM `SecretDiary` WHERE Email = '".mysqli_real_escape_string($link, $_POST["Email"])."'";	//selecting the row with the email that matches the user entered email.
				
				$results = mysqli_query($link, $query);
				
				$myData = mysqli_fetch_array($results);		//saving the selected row's data in an array to allow us to operate.
				
				if (mysqli_num_rows($results)==1 AND password_verify($_POST["Password"], $myData[Password])) {		//checking if there is exactly one row having the email same as the one user entered, then verifying the password. 
					
					$_SESSION["ID"] = $myData[ID];		//attach the user's unique id on our server to the session id to mark it as logged in.
					
					header("Location: loggedinpage.php");		//since sign up is successful, redirect user to logged in page, which ideally would be a dashboard.
					
				} else {
					echo "Please enter a valid email id/password.<br>";
				}
				
			}
        }
    }

?>


<!doctype html>

<html lang="en">									<!-- forms	-->

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="global.css">

		<title>Contact</title>
		
	</head>
	
	<body>
		
		<div class="container">
		
			<h2>Secret Diary Project</h2>
			
			<div id="error"><? echo $error.$successMessage; ?></div>
			
			<form method="post" id="signup">
	  
				<div class="form-group">
				<input type="text" class="form-control" id="name" aria-describedby="name" name="Name" placeholder="Your name">
				</div>

				<div class="form-group">
				<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="Email" placeholder="Your email">
				</div>

				<div class="form-group">
				<input type="password" class="form-control" id="password" name="Password" placeholder="Your password">
				</div>
				
				<input type="hidden" name="Sign-Up" value="0">
				<button type="submit" class="btn btn-primary">Submit</button><br>
				<a class="toggle">Login instead?</a>
			  
			</form>
			
			<form method="post" id="login">
	  
				<div class="form-group">
				<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="Email" placeholder="Your email">
				</div>

				<div class="form-group">
				<input type="password" class="form-control" id="password" name="Password" placeholder="Your password">
				</div>

				<input type="hidden" name="Login" value="1">
				<button type="submit" class="btn btn-primary">Login</button>
			  
			</form>

		</div>
	
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
	</body>
	
</html>