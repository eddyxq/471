<?php

$UserID = $_GET["UserID"];
$ISBN = $_GET["ISBN"];
$Date_Borrowed = $_GET["Date_Borrowed"];
$Date_Returned = $_GET["Date_Returned"];
$Borrow_Duration = $_GET["Borrow_Duration"];

// Create connection
$con=mysqli_connect("localhost","root","","lms");

// Check connection
if (mysqli_connect_errno($con)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  
$result = mysqli_query($con,"SELECT * FROM borrows where UserID=".$UserID);

while($row = mysqli_fetch_array($result)){
 
 ?>
 
	<form action="returnbook.php?job=update" method="post">
		<input name="UserID" type="hidden" value=<?php echo $row['UserID'];?>>
		ISBN: <input type="text" name="ISBN" value='<?php echo $row['ISBN'];?>'><br>
		Date_Borrowed: <input type="date" name="Date_Borrowed" value='<?php echo $row['Date_Borrowed'];?>'><br>
		Date_Returned: <input type="date" name="Date_Returned" value='<?php echo $row['Date_Returned'];?>'><br>
		Borrow_Duration: <input type="text" name="Borrow_Duration" value='<?php echo $row['Borrow_Duration'];?>'><br>
		<input type="submit" value="Update">
	</form>

	<form action="returnbook.php" method="post">
		<input type="submit" value="back">
	</form>
  
<?php
}

mysqli_close($con);

?>

