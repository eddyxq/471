<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	
	<body>
		<?php
		$Room_Number = $_GET["Room_Number"];
		$Capacity = $_GET["Capacity"];
		$Lib_Name = "TFDL";
		
		// Create connection
		$con=mysqli_connect("localhost","root","","lms");

		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		 
					
		$sql = "INSERT INTO study_rooms (Room_Number, Capacity, Lib_Name) VALUES ('". $Room_Number ."', '". $Capacity."','". $Lib_Name ."')";
		 
		$sql2 = "INSERT INTO `available`(Room_Number)". "VALUES('". $Room_Number ."')";
		
		
		if (!mysqli_query($con,$sql)){
			echo "<div style ='font-size:30px;color:#ffffff'>Sorry, this room number is taken.</div>";
		}
		
		else if (!mysqli_query($con,$sql2)){
			echo "<div style ='font-size:30px;color:#ffffff'>Sorry, this room number is taken.</div>";
		}
		
		else
		{
			echo "<div style ='font-size:30px;color:#ffffff'> New Studyroom Added.</div>";
		}

		mysqli_close($con);
		?>
		
		<a class="button" href="admin.php">Back</a>
	</body>
</html>