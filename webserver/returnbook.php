
<html>
	<body>
			<?php

// Create connection
$con=mysqli_connect("localhost","root","","lms");

// Check connection
if (mysqli_connect_errno($con)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
if(isset($_GET['job'])){
	if (($_GET['job']) == "update"){
		$UserID = $_POST["UserID"];
		$ISBN = $_POST["ISBN"];
		$Date_Borrowed = $_POST["Date_Borrowed"];
		$Date_Returned = $_POST["Date_Returned"];
		$Borrow_Duration = $_POST["Borrow_Duration"];
		$result = mysqli_query($con,"update borrows set 
		UserID='".$UserID. "', 
		ISBN='".$ISBN. "', 
		Date_Borrowed='".$Date_Borrowed. "', 
		Date_Returned='".$Date_Returned. "', 
		Borrow_Duration='".$Borrow_Duration. "' 
		where UserID=".$UserID);
	}
} 
if(isset($_GET['job'])){
	if ($_GET['job'] == "delete"){
		$UserID = $_GET["UserID"];
		$ISBN = $_GET["ISBN"];
		$Date_Borrowed = $_GET["Date_Borrowed"];
		$Date_Returned = $_GET["Date_Returned"];
		$Borrow_Duration = $_GET["Borrow_Duration"];
		$result = mysqli_query($con,"Delete from borrows where 
		UserID='".$UserID. "' AND 
		ISBN='". $ISBN. "'AND 
		Date_Borrowed='".$Date_Borrowed. "' AND 
		Date_Returned='".$Date_Returned. "' AND 
		Borrow_Duration='".$Borrow_Duration);

	}
}

$result = mysqli_query($con,"SELECT * FROM borrows");

echo "<table border='1'>
<tr>
<th>UserID</th>
<th>ISBN</th>
<th>Date_Borrowed</th>
<th>Date_Returned</th>
<th>Borrow_Duration</th>
</tr>";

while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row['UserID'] . "</td>";
	echo "<td>" . $row['ISBN'] . "</td>";
	echo "<td>" . $row['Date_Borrowed'] . "</td>";
	echo "<td>" . $row['Date_Returned'] . "</td>";
	echo "<td>" . $row['Borrow_Duration'] . "</td>";
	echo "<td><a href='update_borrows.php?ID= " . $row['UserID'] . "'>Return Book</a></td>";
	echo "<td><a onClick= \"return confirm('Do you want to delete this entry?')\" href='returnbook.php?job=delete&amp;UserID= " . $row['UserID'] . "'>Delete</a></td>";

	echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>

			<form action="librarian.php" method="post">
				<input type="submit" value="Back">
			</form>
		
	</body>
</html>