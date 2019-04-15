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
				$Room_Number = $_POST["Room_Number"];
				$Capacity = $_POST["Capacity"];
				$Lib_Name = $_POST["Lib_Name"];
				$result = mysqli_query($con,"update study_rooms set 
				Capacity='".$Capacity. "', 
				Lib_Name = '".$Lib_Name. "'
				where Room_Number=". $Room_Number);
			}
		} 
		if(isset($_GET['job'])){
			if ($_GET['job'] == "delete"){
			$Room_Number = $_GET["Room_Number"];
			$result = mysqli_query($con,"Delete from study_rooms where Room_Number=". $Room_Number);

			}
		}

		$result = mysqli_query($con,"SELECT * FROM study_rooms");

		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';

		echo "<table border='1' BORDERCOLOR='#0000FF'>
		<tr style='background-color:#008FFF'>
		<th>Room Number</th>
		<th>Capacity</th>
		<th colspan='2'>Modify</th>
		</tr>";

		while($row = mysqli_fetch_array($result)){
			echo '<tr style="background-color:#ffff99">';
			echo "<td>" . $row['Room_Number'] . "</td>";
			echo "<td>" . $row['Capacity'] . "</td>";
			echo "<td><a href='adminUpdateStudyroom.php?&amp;Room_Number= " . $row['Room_Number'] . "'>Update</a></td>";
			echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='adminViewStudyroom.php?job=delete&amp;Room_Number= " . $row['Room_Number'] . "'>Delete</a></td>";
			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($con);
		?>
		<a class="button" href="admin.php">Back</a>
	</body>
</html>


