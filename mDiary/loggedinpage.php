<?php

	session_start();
	
	if (array_key_exists("ID", $_SESSION) AND $_SESSION["ID"]) {							//If session id exists AND has a real value, it must means that they're logged in.
		
		echo "Logged in successfully! <a href='index.php?Logout=1'>Logout</a><br>";
		
	} else {														//If not logged in, then do this:
		
		header("Location: index.php");								//send back to login or the sign-up page;
		
	}

?>