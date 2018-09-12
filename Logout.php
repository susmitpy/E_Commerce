<?php

	require ("db.php");			//For Connection

	if ($_REQUEST)
	{
		$un = $_REQUEST["un"];	//Getting The Username
	}	

	//Updating the record

	$ip = "";				
	$logged = "F";
	$query = "UPDATE profile SET Logged_In = ?, Ip_Address = ? WHERE User_Name = ?";
	$stmt = $conn -> prepare($query);	//Preparing the query
	$stmt -> bind_param("sss", $logged, $ip, $un);		//Setting the parameters

	if ($stmt->execute())	
	{
		echo "Success";				//Successful Execution
	}		
	else
	{
		echo "Logging Out Failed: (" . $stmt->errno . ") " . $stmt->error;	//Error
	}

	//Closing
	
	$stmt -> close();
	$conn -> close();

?>