<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<?php
		$UserID = $_POST["UserID"];
		$first_name = $_POST["first_name"];
		$middle_name = $_POST["middle_name"];
		$last_name = $_POST["last_name"];
		$street_name = $_POST["street_name"];
		$city = $_POST["city"];
		$country = $_POST["country"];
		$phone_number = $_POST["phone_number"];
		$formUserType = $_POST["formUserType"];
		
		/*
		echo $first_name. "<br>".
		$middle_name. "<br>".
		$last_name. "<br>".
		$street_name. "<br>".
		$city. "<br>".
		$country. "<br>".
		$phone_number. "<br>";
		*/
		// Create connection
		$con=mysqli_connect("localhost","root","","lms");

		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		 
					
		$sql = "INSERT INTO user (UserID, first_name, middle_name, last_name, street_name, city, country, phone_number) VALUES ('". $UserID ."', '". $first_name."','". $middle_name ."','". $last_name ."','". $street_name ."','". $city ."','". $country ."','". $phone_number ."')";
		 
		//if (strcmp($formUserType, "Member") == 0)
		
		//$sql2 = "INSERT INTO member (UserID, Num_Of_Books_Borrowed) VALUES('". $UserID ."')";
		$sql2 = "INSERT INTO `member`(`UserID`, `Num_Of_Books_Borrowed`)\n"
    . "VALUES('". $UserID ."', 0)";
	
		
		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		
		if (!mysqli_query($con,$sql2)){
			die('Error: ' . mysqli_error($con));
		}

		mysqli_close($con);
		?>
	
		<h1><p><font size="7" color="#ffffff">New User Added</font></p></h1>
		<a class="button" href="admin.php">Back</a>
	</body>
</html>