<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<div>
			<form action="reserveStudyRoom.php" method="post">	
			   <font size="4" color="#ffffff">Room_Number</font><input type="text" name ="Room_Number"><br>
			   <font size="4" color="#ffffff">Date_Booked</font><input type="date" name="Date_Booked"><br>
			   <font size="4" color="#ffffff">Time_Booked</font><input type="time" name="Time_Booked"><br>
			   <font size="4" color="#ffffff">Booking_Duration (In hours)</font><input type="number" name="Booking_Duration"><br>
			   <input type="submit" value="Reserve">
			</form>
			
			<form action="member.php" method="post">
				<input type="submit" value="Return">
			</form>
		</div>
	</body>
</html>