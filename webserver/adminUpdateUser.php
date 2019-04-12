<?php

$UserID = $_GET["UserID"];

// Create connection
$con=mysqli_connect("localhost","root","","lms");

// Check connection
if (mysqli_connect_errno($con)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  
$result = mysqli_query($con,"SELECT * FROM user where UserID=".$UserID);

while($row = mysqli_fetch_array($result)){
 
 ?>
 
	<form action="adminViewUser.php?job=update" method="post">
		<input name="UserID" type="hUserIDden" value=<?php echo $row['UserID'];?>>
		First Name: <input type="text" name="First_Name" value='<?php echo $row['First_Name'];?>'><br>
		Middle_Name: <input type="text" name="Middle_Name" value='<?php echo $row['Middle_Name'];?>'><br>
		Last_Name: <input type="text" name="Last_Name" value='<?php echo $row['Last_Name'];?>'><br>
		Street_Name: <input type="text" name="Street_Name" value='<?php echo $row['Street_Name'];?>'><br>
		City: <input type="text" name="City" value='<?php echo $row['City'];?>'><br>
		Country: <input type="text" name="Country" value='<?php echo $row['Country'];?>'><br>
		Phone_Number: <input type="text" name="Phone_Number" value='<?php echo $row['Phone_Number'];?>'><br>
		<input type="submit" value="Update">
	</form>

	<form action="admminViewUser.php" method="post">
		<input type="submit" value="back">
	</form>
  
<?php
}

mysqli_close($con);

?>

