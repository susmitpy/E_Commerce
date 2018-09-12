<?php
	require("db.php");	//For Connection

	if ($_REQUEST)
	{
		$un = $_REQUEST["un"];	//Getting the username
	}

	$query = "SELECT Name From profile WHERE User_Name = ?";	//Query for selecting the full name
	$stmt = $conn->prepare($query);						//Preparing The query
	$stmt->bind_param("s", $un);						//Setting Paramenters
	$stmt->execute();									//Executing
	$stmt->store_result();								//Results
	$stmt->bind_result($name);
	$stmt->fetch();										//Fetching the values

	$fname = explode(" ", $name)[0];					//We need only the first name
	echo $fname;										//Sending back to the client


?>