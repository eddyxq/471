<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<div>
			<?php

			$UserID = $_POST["UserID"];
			$ISBN = $_POST["ISBN"];
			$Date_Borrowed = $_POST["Date_Borrowed"];
			$Date_Returned = $_POST["Date_Returned"];
			$Borrow_Duration = $_POST["Borrow_Duration"];

			// Create connection
			$con=mysqli_connect("localhost","root","","lms");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			  
			  $sql = "INSERT INTO borrows (UserID, ISBN, Date_Borrowed, Date_Returned, Borrow_Duration) VALUES ('". $UserID."','". $ISBN ."','". $Date_Borrowed ."','". $Date_Returned ."','". $Borrow_Duration ."')";
			 
			 if (!mysqli_query($con,$sql))
			  {
			  die('Error: ' . mysqli_error($con));
			  }
			  
			mysqli_close($con);
			?>

			<h1><p><font size="7" color="#ffffff">1 Book has been lent</font></p></h1>
			<a class="button" href="librarian.php">Back</a>
		</div>
	</body>
</html>
