<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	
	<body>
		<?php
		$Name = $_GET["Name"];
		$ID = $_GET["ID"];
		$Location = $_GET["Location"];
	
		// Create connection
		$con=mysqli_connect("localhost","root","","lms");

		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		 
		
		$sql = "INSERT INTO publisher (Name, ID, Location) VALUES ('". $Name ."','". $ID ."','". $Location ."')";
		 
		
		if (!mysqli_query($con,$sql)){
			echo "<div style ='font-size:30px;color:#ffffff'>Sorry, this publisher ID is taken or incorrect.</div>";
		}
		
		else
		{
			echo "<div style ='font-size:30px;color:#ffffff'> New Publisher Added.</div>";
		}

		mysqli_close($con);
		?>
		
		<a class="button" href="librarian.php">Return</a>
	</body>
</html>