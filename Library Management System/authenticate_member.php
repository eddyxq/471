
<?php

	$UserID = $_POST["UserID"];
	$Password = $_POST["Password"];

	// Create connection
	$con=mysqli_connect("localhost","root","","lms");

	// Check connection
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	  
$sql = "SELECT\n"
    . "    COUNT(*) AS Instances\n"
    . "FROM\n"
    . "    `member`\n"
    . "WHERE\n"
    . "    UserID = '$UserID' AND Password = '$Password'\n"
    . "GROUP BY\n"
    . "    UserID";

	$result = mysqli_query($con,$sql);
	if ($result == 1){
		//go to member.php	
		 header('Location: member.php');
	}
	else {
		//go back to member_login.php
		header('Location: member_login.php');
	}

	mysqli_close($con);
?>
