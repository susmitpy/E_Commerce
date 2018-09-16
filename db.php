<?php
//						server       username  password     db name
$conn = mysqli_connect('localhost', 'susmit', '135792846', 'users');
if (mysqli_connect_errno()){    //execute ? true : error
	echo "Failed to connect". mysqli_connect_errno();
}

?>