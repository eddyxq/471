<html>
	<link rel="stylesheet" type="text/css" href="main.css">
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
					$Item_ID = $_POST["Item_ID"];
					$Item_Type = $_POST["Item_Type"];
					$Item_Location = $_POST["Item_Location"];
					$result = mysqli_query($con,"update inventory set Item_Type='".$Item_Type. "', Item_Location='". $Item_Location. "' where Item_ID=". $Item_ID);
				}
			} 
			if(isset($_GET['job'])){
				if ($_GET['job'] == "delete"){
				$Item_ID = $_GET["Item_ID"];
				$result = mysqli_query($con,"Delete from inventory where Item_ID=". $Item_ID );

				}
			}

			$result = mysqli_query($con,"SELECT * FROM inventory");

			echo "<table border='1'>
			<tr>
			<th>Item ID</th>
			<th>Item Type</th>
			<th>Item Location</th>
			</tr>";

			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['Item_ID'] . "</td>";
				echo "<td>" . $row['Item_Type'] . "</td>";
				echo "<td>" . $row['Item_Location'] . "</td>";
				echo "<td><a href='updateItem.php?Item_ID= " . $row['Item_ID'] . "'>Update</a></td>";
				echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='viewInventory.php?job=delete&amp;Item_ID= " . $row['Item_ID'] . "'>DELETE</a></td>";

				echo "</tr>";
			}

			echo "</table>";

			mysqli_close($con);
			?>

			<form action="librarian.php" method="post">
				<input type="submit" value="back">
			</form>
		
		</body>
</html>
