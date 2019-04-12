	
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
		
		$result = mysqli_query($con, "SELECT * FROM `book`");

		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';
		
		echo "<table border='1' BORDERCOLOR='#0000FF'>
		<tr style='background-color:#008FFF'>
		<th>ISBN</th>
		<th>Item_ID</th>
		<th>Title</th>
		<th>Edition</th>
		<th>Language</th>
		<th>Publisher_Name</th>
		<th>Publisher_ID</th>
		<th>Publish_Date</th>
		<th>Lendable</th>
		</tr>";

		while($row = mysqli_fetch_array($result)){
			echo '<tr style="background-color:#ffff99">';
			echo "<td>" . $row['ISBN'] . "</td>";
			echo "<td>" . $row['Item_ID'] . "</td>";
			echo "<td>" . $row['Title'] . "</td>";
			echo "<td>" . $row['Edition'] . "</td>";
			echo "<td>" . $row['Language'] . "</td>";
			echo "<td>" . $row['Publisher_Name'] . "</td>";
			echo "<td>" . $row['Publisher_ID'] . "</td>";
			echo "<td>" . $row['Publish_Date'] . "</td>";
			echo "<td>" . $row['Lendable'] . "</td>";
			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($con);
		?>
		<a class="button" href="librarian.php">Back</a>
	</body>
</html>