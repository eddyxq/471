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
				$Name = $_POST["Name"];
				$ID = $_POST["ID"];
				$Location = $_POST["Location"];
				$result = mysqli_query($con,"update publisher set 
				Name='".$Name. "', 
				Location='".$Location. "' 
				where ID=". $ID);
			}
		} 
		if(isset($_GET['job'])){
			if ($_GET['job'] == "delete"){
			$ID = $_GET["ID"];
			$result = mysqli_query($con,"Delete from publisher where ID=". $ID );

			}
		}

		$result = mysqli_query($con,"SELECT * FROM publisher");

		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';

		echo "<table border='1' BORDERCOLOR='#0000FF'>
		<tr style='background-color:#008FFF'>
		<th>ID</th>
		<th>Name</th>
		<th>Location</th>
		<th colspan='2'>Modify</th>
		</tr>";

		while($row = mysqli_fetch_array($result)){
			echo '<tr style="background-color:#ffff99">';
			echo "<td>" . $row['ID'] . "</td>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Location'] . "</td>";
			echo "<td><a href='libUpdatePublisher.php?&amp;ID= " . $row['ID'] . "'>Update</a></td>";
			echo "<td><a onClick= \"return confirm('Do you want to delete this publisher?')\" href='libViewPublisher.php?job=delete&amp;ID= " . $row['ID'] . "'>Delete</a></td>";
			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($con);
		?>
		<a class="button" href="librarian.php">Return</a>
	</body>
</html>


