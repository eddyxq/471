
<?php

//$Username = $_POST["Username"];
//$Password = $_POST["Password"];

// Create connection
$con=mysqli_connect("localhost","root","","lms");

// Check connection
if (mysqli_connect_errno($con)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  
$sql = mysqli_query($con, "SELECT UserID, Password from user");

if (mysqli_query($con,$sql)){
	//go to member.php	
	 echo "valid";
}
else {
	//go back to member_login.php
	echo "invalid";
}

mysqli_close($con);
?>
