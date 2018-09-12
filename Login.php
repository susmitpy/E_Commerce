<?php
	require ("db.php");	#For Connection

	function LogIn($un)
	{
		require ("db.php");
		$ip = $_SERVER['REMOTE_ADDR'];	// Fetching the ip address
		// Updating the record with Ip address and a value indicating that the user is logged in for further needs
		#Query
		$query = "UPDATE profile SET Ip_Address = ?, Logged_In = ? WHERE User_Name = ?";
		$stmt = $conn->prepare($query);
		$logged = "T";
		$stmt->bind_param("sss", $ip, $logged, $un);


		if ($stmt->execute()) {   //Execute and check for error
	   	    header("Location:Home.html?username=".$un);	//Go to home page and tell which user
		    
		}		//Query Execution
	    
		 else {
		    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
	}
		//Fetching the data from client side
		$un = $_POST["uname"];
		$pw = $_POST["pw"];


		//Query To Fetch The Password For The Given Username
		$stmt = $conn->prepare("SELECT Pass_Word FROM profile WHERE User_Name = ?");
		

		$stmt->bind_param("s", $un);		//Inserting Parameters
		
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($passWord);		//Transferring results
		
		$stmt->	fetch();				//Fetching the values
		

		if (!is_null($passWord)){		//Record Exists
			
			$spw = $passWord;		//Getting The Password Stored
	
			if ($spw === $pw)			//If the password exists
			{
				LogIn($un);				//LogIn
			}

			else 
			{
				echo "Incorrect username or password";		//Does Not Match
			}

		}else{
			echo "No User found for username " . $un . "\n";	//No record exists
			echo '<a href="SignUp.html">Click Here To Sign Up</a>';
		}
		//Closing
		$stmt->close();
		$conn->close();
?>