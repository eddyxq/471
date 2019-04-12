
<?php

$UserID = $_POST["UserID"];
$ISBN = $_POST["ISBN"];
$Date_Borrowed = $_POST["Date_Borrowed"];
$Date_Returned = $_POST["Date_Returned"];
$Borrow_Duration = $_POST["Borrow_Duration"];

echo $UserID. "<br>". $ISBN. "<br>". $Date_Borrowed. "<br>". $Date_Returned. "<br>". $Borrow_Duration. "<br>";

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
  
echo "1 book has been lent";

mysqli_close($con);
?>

<html>
	<body>
		<div>
			<form action="librarian.php" method="post">
				<input type="submit" value="Back">
			</form>
		</div>
	</body>
</html>
