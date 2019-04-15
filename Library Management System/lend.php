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
				echo "<div style ='font-size:30px;color:#ffffff'>Sorry, the user ID or book ISBN are incorrect.</div>";
			  }
			  
			  else
			  {
				echo "<div style ='font-size:30px;color:#ffffff'>1 Book has been lent.</div>";
			  }
			mysqli_close($con);
			?>

	
			<a class="button" href="librarian.php">Back</a>
		</div>
	</body>
</html>
