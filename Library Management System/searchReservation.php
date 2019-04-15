	
<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<?php
		
		$UserID = $_POST["UserID"];
		// Create connection
		$con=mysqli_connect("localhost","root","","lms");

		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$result = mysqli_query($con, "SELECT\n"
									. "    *\n"
									. "FROM\n"
									. "    `user`,\n"
									. "    `booked`,\n"
									. "    `reserves`\n"
									. "WHERE\n"
									. "    reserves.UserID = ".$UserID." AND user.UserID = reserves.UserID AND booked.Room_Number = reserves.Room_Number");

		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';

		echo "<table border='1' BORDERCOLOR='#0000FF'>
		<tr style='background-color:#008FFF'>
		<th>Room_Number</th>
		<th>Date_Booked</th>
		<th>Time_Booked</th>
		<th>Booking_Duration</th>
		</tr>";

		while($row = mysqli_fetch_array($result)){
			echo '<tr style="background-color:#ffff99">';
			echo "<td>" . $row['Room_Number'] . "</td>";
			echo "<td>" . $row['Date_Booked'] . "</td>";
			echo "<td>" . $row['Time_Booked'] . "</td>";
			echo "<td>" . $row['Booking_Duration'] . "</td>";
			//echo "<td><a href='adminUpdateUser.php?UserID= " . $row['UserID'] . "'>Update</a></td>";
			//echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='adminViewUser.php?job=delete&amp;UserID= " . $row['UserID'] . "'>DELETE</a></td>";
			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($con);
		?>
		<a class="button" href="member.php">Back</a>
	</body>
</html>