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
				$UserID = $_POST["UserID"];
				$password = $_POST["Password"];
				$First_Name = $_POST["First_Name"];
				$Middle_Name = $_POST["Middle_Name"];
				$Last_Name = $_POST["Last_Name"];
				$Street_Name = $_POST["Street_Name"];
				$City = $_POST["City"];
				$Country = $_POST["Country"];
				$Phone_Number = $_POST["Phone_Number"];
				$result = mysqli_query($con,"update user set 
				First_Name='".$First_Name. "', 
				Middle_Name='".$Middle_Name. "', 
				Last_Name='".$Last_Name. "', 
				Street_Name='".$Street_Name. "', 
				City='".$City. "', 
				Country='".$Country. "', 
				Phone_Number='".$Phone_Number. "' 
				where UserID=". $UserID);
			}
		} 
		if(isset($_GET['job'])){
			if ($_GET['job'] == "delete"){
			$UserID = $_GET["UserID"];
			
			$result = mysqli_query($con,"Delete from fees where UserID=". $UserID);
			$result = mysqli_query($con,"Delete from librarian where UserID=". $UserID);
			$result = mysqli_query($con,"Delete from user where UserID=". $UserID);
			}	
		}

		$result = mysqli_query($con,"SELECT * FROM USER, member WHERE member.UserID = USER.UserID");
		
		$result2 = mysqli_query($con,"SELECT * FROM user, librarian WHERE librarian.UserID = USER.UserID");


		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';
		echo "<div style ='font-size:30px;color:#ffffff'> Members </div>";
		echo "<table border='1' BORDERCOLOR='#0000FF'>
		<tr style='background-color:#008FFF'>
		<th>User ID</th>
		<th>Password</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Street Name</th>
		<th>City</th>
		<th>Country</th>
		<th>Phone Number</th>
		<th colspan='2'>Modify</th>
		</tr>";

		while($row = mysqli_fetch_array($result)){
			echo '<tr style="background-color:#ffff99">';
			echo "<td>" . $row['UserID'] . "</td>";
			echo "<td>" . $row['Password'] . "</td>";
			echo "<td>" . $row['First_Name'] . "</td>";
			echo "<td>" . $row['Middle_Name'] . "</td>";
			echo "<td>" . $row['Last_Name'] . "</td>";
			echo "<td>" . $row['Street_Name'] . "</td>";
			echo "<td>" . $row['City'] . "</td>";
			echo "<td>" . $row['Country'] . "</td>";
			echo "<td>" . $row['Phone_Number'] . "</td>";
			echo "<td><a href='adminUpdateUser.php?&amp;UserID= " . $row['UserID'] . "'>Update</a></td>";
			echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='adminViewUser.php?job=delete&amp;UserID=".$row['UserID']."'>Delete</a></td>";
			echo "</tr>";
		}

		echo "</table>";
		
		
		
		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';
		echo "<div style ='font-size:30px;color:#ffffff'> Librarians </div>";
		echo "<table border='1' BORDERCOLOR='#0000FF'>
		<tr style='background-color:#008FFF'>
		<th>User ID</th>
		<th>Password</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Street Name</th>
		<th>City</th>
		<th>Country</th>
		<th>Phone Number</th>
		<th colspan='2'>Modify</th>
		</tr>";

		while($row = mysqli_fetch_array($result2)){
			echo '<tr style="background-color:#ffff99">';
			echo "<td>" . $row['UserID'] . "</td>";
			echo "<td>" . $row['Password'] . "</td>";
			echo "<td>" . $row['First_Name'] . "</td>";
			echo "<td>" . $row['Middle_Name'] . "</td>";
			echo "<td>" . $row['Last_Name'] . "</td>";
			echo "<td>" . $row['Street_Name'] . "</td>";
			echo "<td>" . $row['City'] . "</td>";
			echo "<td>" . $row['Country'] . "</td>";
			echo "<td>" . $row['Phone_Number'] . "</td>";
			echo "<td><a href='adminUpdateLib.php?&amp;UserID= " . $row['UserID'] . "'>Update</a></td>";
			echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='adminViewUser.php?job=delete&amp;UserID=".$row['UserID']."'>Delete</a></td>";
			echo "</tr>";
		}

		echo "</table>";
	
		mysqli_close($con);
		?>
		<a class="button" href="admin.php">Back</a>
	</body>
</html>


