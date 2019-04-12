
<?php

$UserID = $_POST["UserID"];
$Room_Number = $_POST["Room_Number"];
$Date_Booked = $_POST["Date_Booked"];
$Time_Booked = $_POST["Time_Booked"];
$Booking_Duration = $_POST["Booking_Duration"];

echo $Room_Number. "<br>". $Date_Booked. "<br>" .$Time_Booked. "<br>". $Booking_Duration. "<br>";


// Create connection
$con=mysqli_connect("localhost","root","","lms");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql = "INSERT INTO booked (Room_Number, Date_Booked, Time_Booked, Booking_Duration) 
  VALUES ('". $Room_Number."','". $Date_Booked ."','". $Time_Booked ."','". $Booking_Duration ."')";
  
  $sql2 = "INSERT INTO reserves (UserID, Room_Number) VALUES ('". $UserID."','". $Room_Number ."')";
  mysqli_query($con, $sql2);
  

 if (!mysqli_query($con,$sql))
  {
   echo('Sorry, this room is already booked.');
  }
  else {
    echo "Reservation successful";
	}

mysqli_close($con);
?>
<html>
	<body>
		<div>
			<form action="member.php" method="post">
				<input type="submit" value="Back">
			</form>
		</div>
	</body>
</html>