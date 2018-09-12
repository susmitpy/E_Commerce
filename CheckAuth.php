<?php

	require ("db.php");		//Connection

	$un = $_REQUEST["un"];  //Getting the data from AJAX

	$query = "SELECT Logged_In FROM profile where User_Name = ?";	//Query

	$stmt = $conn -> prepare($query);
	$stmt -> bind_param("s", $un);
	$stmt -> execute();
	$stmt -> store_result();
	$stmt -> bind_result($logged);
	$stmt -> fetch();

	if ($logged == "T") //Is the user logged in?
	{
		echo "1";
	}
	else
	{
		echo "0";
	}

	//Closing
	$stmt -> close();
	$conn -> close();



?>