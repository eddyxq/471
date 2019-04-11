<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<center>
			<?php

			$Item_ID = $_POST["Item_ID"];
			$Item_Type = $_POST["Item_Type"];
			$Item_Location = $_POST["Item_Location"];

			echo $Item_ID. "<br>". $Item_Type. "<br>". $Item_Location. "<br>";

			// Create connection
			$con=mysqli_connect("localhost","root","","lms");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			  
			  $sql = "INSERT INTO inventory (Item_ID, Item_Type, Item_Location) VALUES ('". $Item_ID."','". $Item_Type ."','". $Item_Location ."')";
			 
			 if (!mysqli_query($con,$sql))
			  {
			  die('Error: ' . mysqli_error($con));
			  }
			  
			echo "1 record added";

			mysqli_close($con);
			?>
			
			<form action="librarian.php" method="post">
				<input type="submit" value="back">
			</form>
		</center>
	</body>
</html>