<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	
	<body>
		<?php
		$UserID = $_GET["UserID"];
		$first_name = $_GET["first_name"];
		$middle_name = $_GET["middle_name"];
		$last_name = $_GET["last_name"];
		$street_name = $_GET["street_name"];
		$city = $_GET["city"];
		$country = $_GET["country"];
		$phone_number = $_GET["phone_number"];
		$formUserType = $_GET["formUserType"];
		$password = $_GET["password"];
		$Date_Registered = $_GET["Date_Registered"];
		
		// Create connection
		$con=mysqli_connect("localhost","root","","lms");

		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		 
					
		$sql = "INSERT INTO user (UserID, first_name, middle_name, last_name, street_name, city, country, phone_number) VALUES ('". $UserID ."', '". $first_name."','". $middle_name ."','". $last_name ."','". $street_name ."','". $city ."','". $country ."','". $phone_number ."')";
		 
		if (strcmp($formUserType, "Member") == 0)
		{
		$sql2 = "INSERT INTO `member`(`UserID`, `Num_Of_Books_Borrowed`, Password)\n"
    . "VALUES('". $UserID ."', 0, '". $password ."')";
		}
		
		else if (strcmp($formUserType, "Librarian") == 0)
		{
			$sql2 = "INSERT INTO `librarian`(`UserID`, Date_Hired, Password)\n"
    . "VALUES('". $UserID ."', '". $Date_Registered. "', '". $password ."')";
		}
		
		if (!mysqli_query($con,$sql)){
			echo "<div style ='font-size:30px;color:#ffffff'>Sorry, this user ID is taken.</div>";
		}
		
		else if (!mysqli_query($con,$sql2)){
			echo "<div style ='font-size:30px;color:#ffffff'> Sorry, this user ID is taken.</div>";
		}
		
		else
		{
			echo "<div style ='font-size:30px;color:#ffffff'> New User Added.</div>";
		}

		mysqli_close($con);
		?>
		
		<a class="button" href="admin.php">Back</a>
	</body>
</html>