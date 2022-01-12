<?
//VERIFY PAGE

	include("../connection/connection.php");
	
	$vkey = $_GET['vkey'];
	
	$query = 	"SELECT `emailVerificationStatus`, `emailVerKey` 
					 FROM `Conferences` 
					WHERE `emailVerificationStatus` = 0 AND `emailVerKey` = '$vkey' 
					LIMIT 1";
					
	$result = mysqli_query($link, $query);
	
	if(mysqli_num_rows($result) == 1) {
		
		$query= "UPDATE `Conferences` 
					  SET `emailVerificationStatus` = 1 
					  WHERE `emailVerKey` = '$vkey' 
					  LIMIT 1";
		$update = mysqli_query($link, $query);
		
		if($update) {
			echo "Account verified successfully";
		} else {
			echo "Account invalid or already verified.";
		}
		
	} else {
		$query = 	"SELECT `emailVerificationStatus`, `emailVerKey` 
						 FROM `Delegates` 
						 WHERE `emailVerificationStatus` = 0 AND `emailVerKey` = '$vkey' 
						 LIMIT 1";
						
		$result = mysqli_query($link, $query);
		
		if(mysqli_num_rows($result) == 1) {
			
			$query= "UPDATE `Delegates` 
						  SET `emailVerificationStatus` = 1 
						  WHERE `emailVerKey` = '$vkey' 
						  LIMIT 1";
			$update = mysqli_query($link, $query);
			
			if($update) {
				echo "Account verified successfully";
			} else {
				echo "Account invalid or already verified.";
			}
			
		} else {
			echo "Account invalid or already verified.";
		}
	
	}
	
?>