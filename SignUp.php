

<?php

	

	//https://websitebeaver.com/prepared-statements-in-php-mysqli-to-prevent-sql-injection
	//Connection
	require("db.php");
	

	// Fetching The Data From Client Side

	$name = $_POST["fullName"]; 
	$phoneNumber = $_POST["phoneNumber"];
	$gender = $_POST["gender"];
	$emailId = $_POST["emailId"];
	$userName = $_POST["userName"];
	$passWord = $_POST["passWord"];
	$dob = $_POST["datePicker"];

	//Checking if user already exists

	$stmt = $conn-> prepare("SELECT Name, Contact_Number, Email_Id, User_Name FROM profile WHERE User_Name = ? OR Contact_Number = ? OR Email_Id = ?");
	$stmt->bind_param("sss", $userName, $phoneNumber, $emailId);
	$stmt->execute();
	$stmt -> store_result();

	$stmt->bind_result($n, $c, $e, $un);

	$stmt -> fetch();


	//Checking if they are null
	$nNull = is_null($n);
	$cNull= is_null($c);
	$eNull = is_null($e);

	if (($nNull && $cNull && $eNull) || (!$nNull && $cNull &&$eNull))		//No record found
		{
			if (strcasecmp($un, $userName) == 0)
			{
				echo "UserNameExists";
			}
			else
			{
				//Query for insertion
				$stmt = $conn->prepare("INSERT INTO profile (Name,Contact_Number,Email_Id,Gender, DOB, User_Name,Pass_Word) VALUES (?, ?, ?, ?, ?, ?, ?)");

				//Insert
				$stmt->bind_param("sssssss", $name, $phoneNumber, $emailId , $gender, $dob, $userName, $passWord);

				if (!$stmt->execute()) 
				{   //Execute and check for errors
				    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
				}
				else
				{
					echo "Signed";
				}
			}
	}

	else if (!$cNull && !$eNull) 
	{
		# code...
		echo "CandE";
	}

	else if (!$cNull && $eNull) 
	{
		# code...
		echo "C";
	}
	else if ($cNull && !$eNull) 
	{
		# code...
		echo "E";
	}
	else if (!$nNull && !$cNull && !$eNull) 
	{
		# code...
		echo "UserExists";
	}
	

	//Closing
	$stmt->close();
	$conn->close();
	
?>