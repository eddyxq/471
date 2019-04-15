	
<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<?php
		
			$ISBN = $_POST["ISBN"];

			// Create connection
			$con=mysqli_connect("localhost","root","","lms");

			// Check connection
			if (mysqli_connect_errno($con)){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		
		if(isset($_GET['job'])){
			if (($_GET['job']) == "update"){
				$ISBN = $_POST["ISBN"];
				$Item_ID = $_POST["Item_ID"];
				$Title = $_POST["Title"];
				$Edition = $_POST["Edition"];
				$Language = $_POST["Language"];
				$Publisher_Name = $_POST["Publisher_Name"];
				$Publisher_ID = $_POST["Publisher_ID"];
				$Publish_Date = $_POST["Publish_Date"];
				$Lendable = $_POST["Lendable"];
				$result = mysqli_query($con,"update book set 
				Item_ID='".$Item_ID. "',
				Title='".$Title. "', 
				Edition='".$Edition. "', 
				Language='".$Language. "', 
				Publisher_Name='".$Publisher_Name. "', 
				Publisher_ID='".$Publisher_ID. "', 
				Publish_Date='".$Publish_Date. "', 
				Lendable='".$Lendable. "' 
				where ISBN=". $ISBN);
			}
		} 

		$result = mysqli_query($con, "SELECT * FROM `book` WHERE ISBN = '".$ISBN."' ");

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
		<th colspan='2'>Modify</th>
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
			echo "<td><a href='libUpdateBook.php?&amp;ISBN= " . $row['ISBN'] . "'>Update</a></td>";
			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($con);
		?>
		<a class="button" href="librarian.php">Back</a>
	</body>
</html>