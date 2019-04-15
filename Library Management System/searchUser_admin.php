	
<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<?php
		
			$UserID = $_POST["UserID"];

			// Create connection
			$con=mysqli_connect("localhost","root","","lms");

			// Check connection
			if (mysqli_connect_errno($con)){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($con, "SELECT\n"
									. "    member.UserID,\n"
									. "    user.First_Name,\n"
									. "    user.Middle_Name,\n"
									. "    user.Last_Name,\n"
									. "    user.Street_Name,\n"
									. "    user.City, \n"
									. "    user.Country, \n"
									. "    user.Phone_Number, \n"
									. "    COUNT(*) AS Numb_Of_Books_Borrowed\n"
									. "FROM\n"
									. "    `user`,\n"
									. "    `member`,\n"
									. "    `borrows`\n"
									. "WHERE\n"
									. "    member.UserID = '".$UserID."' AND member.UserID = user.UserID  AND member.UserID = borrows.UserID AND(borrows.Date_Returned = 00-00-0000 OR borrows.Date_Returned IS NULL)\n"
									. "GROUP BY\n"
									. "    UserID\n"
									. "HAVING\n"
									. "    Numb_Of_Books_Borrowed > 0");

		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';
		
		echo "<table border='1' BORDERCOLOR='#0000FF'>
		<tr style='background-color:#008FFF'>
		<th>User ID</th>
		<th>First_Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Street Name</th>
		<th>City</th>
		<th>Country</th>
		<th>Phone Number</th>
		<th>Number of Books Borrowed</th>
		</tr>";

		while($row = mysqli_fetch_array($result)){
			echo '<tr style="background-color:#ffff99">';
			echo "<td>" . $row['UserID'] . "</td>";
			echo "<td>" . $row['First_Name'] . "</td>";
			echo "<td>" . $row['Middle_Name'] . "</td>";
			echo "<td>" . $row['Last_Name'] . "</td>";
			echo "<td>" . $row['Street_Name'] . "</td>";
			echo "<td>" . $row['City'] . "</td>";
			echo "<td>" . $row['Country'] . "</td>";
			echo "<td>" . $row['Phone_Number'] . "</td>";
			echo "<td>" . $row['Numb_Of_Books_Borrowed'] . "</td>";
			//echo "<td><a href='adminUpdateUser.php?UserID= " . $row['UserID'] . "'>Update</a></td>";
			//echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='adminViewUser.php?job=delete&amp;UserID= " . $row['UserID'] . "'>DELETE</a></td>";
			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($con);
		?>
		<a class="button" href="admin.php">Back</a>
	</body>
</html>