<html>
<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<?php

		$UserID = $_POST["UserID"];
		$Room_Number = $_POST["Room_Number"];
		$Date_Booked = $_POST["Date_Booked"];
		$Time_Booked = $_POST["Time_Booked"];
		$Booking_Duration = $_POST["Booking_Duration"];

		// Create connection
		$con=mysqli_connect("localhost","root","","lms");

		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql = "INSERT INTO booked (Room_Number, Date_Booked, Time_Booked, Booking_Duration) 
		VALUES ('".$Room_Number."','".$Date_Booked."','".$Time_Booked."','".$Booking_Duration."')";

		$sql2 = "INSERT INTO reserves (UserID, Room_Number) VALUES ('". $UserID."','". $Room_Number ."')";
		mysqli_query($con, $sql2);

		if (!mysqli_query($con,$sql)){
			echo '<div style="font-size:3.25em;color:white">Sorry, this room is already booked.</div>';
		}
		else {
			echo '<div style="font-size:3.25em;color:white">Reservation successful.</div>';
		}

		mysqli_close($con);
		?>
		
		<a class="button" href="reserveRoom.php">Return</a>
	</body>
</html>