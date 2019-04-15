<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	
	<body>
		<?php
		$First_Name = $_GET["first_name"];
		$Middle_Name = $_GET["middle_name"];
		$Last_Name = $_GET["last_name"];
		$Date_Died = $_GET["date_died"];
		$Origin_Country = $_GET["origin_country"];
		$Writing_Style = $_GET["writing_style"];
		
		// Create connection
		$con=mysqli_connect("localhost","root","","lms");

		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		 
					
		$sql = "INSERT INTO author (First_Name, Middle_Name, Last_Name, Date_Died, Origin_Country, Writing_Style) VALUES ('". $First_Name ."', '". $Middle_Name."','". $Last_Name ."','". $Date_Died ."','". $Origin_Country ."','". $Writing_Style ."')";
		 
		//$sql3 = "INSERT INTO `fees`(`UserID`, Type, Amount) VALUES('". $UserID ."', '". $FeeType ."', 0)";
		
		
		if (!mysqli_query($con,$sql)){
			echo "<div style ='font-size:30px;color:#ffffff'>Sorry, this user ID is taken.</div>";
		}
		
		else
		{
			echo "<div style ='font-size:30px;color:#ffffff'> New Author Added.</div>";
		}

		mysqli_close($con);
		?>
		
		<a class="button" href="librarian.php">Back</a>
	</body>
</html>