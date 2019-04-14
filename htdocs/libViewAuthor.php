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
				$First_Name = $_POST["First_Name"];
				$Middle_Name = $_POST["Middle_Name"];
				$Last_Name = $_POST["Last_Name"];
				$Date_Died = $_POST["Date_Died"];
				$Origin_Country = $_POST["Origin_Country"];
				$Writing_Style = $_POST["Writing_Style"];
				$result = mysqli_query($con,"update author set 
				First_Name='".$First_Name."', 
				Middle_Name='".$Middle_Name."', 
				Last_Name='".$Last_Name."', 
				Date_Died='".$Date_Died."', 
				Origin_Country='".$Origin_Country."',  
				Writing_Style='".$Writing_Style."' 
				where First_Name='".$First_Name."' AND Middle_Name='".$Middle_Name."' AND Last_Name='".$Last_Name."'");
			}
		} 
		if(isset($_GET['job'])){
			if ($_GET['job'] == "delete"){
			$First_Name = $_GET["First_Name"];
			$Middle_Name = $_GET["Middle_Name"];
			$Last_Name = $_GET["Last_Name"];
			$result = mysqli_query($con,"Delete from author where First_Name='".$First_Name."' AND Middle_Name ='".$Middle_Name."' AND Last_Name ='".$Last_Name."'");
			}	
		}

		$result = mysqli_query($con,"SELECT * FROM author");
		
		
		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';
		echo "<div style ='font-size:30px;color:#ffffff'> Authors </div>";
		echo "<table border='1' BORDERCOLOR='#0000FF'>
		<tr style='background-color:#008FFF'>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Date of Death</th>
		<th>Country of Origin</th>
		<th>Writing_Style</th>
		<th colspan='2'>Modify</th>
		</tr>";

		while($row = mysqli_fetch_array($result)){
			echo '<tr style="background-color:#ffff99">';
			echo "<td>" . $row['First_Name'] . "</td>";
			echo "<td>" . $row['Middle_Name'] . "</td>";
			echo "<td>" . $row['Last_Name'] . "</td>";
			echo "<td>" . $row['Date_Died'] . "</td>";
			echo "<td>" . $row['Origin_Country'] . "</td>"; 
			echo "<td>" . $row['Writing_Style'] . "</td>";
			echo "<td><a href='libUpdateAuthor.php?&amp;First_Name=".$row['First_Name']."&amp;Middle_Name=".$row['Middle_Name']."&amp;Last_Name=".$row['Last_Name']."'>Update</a></td>";
			echo "<td><a onClick= \"return confirm('Do you want to delete this user?')\" href='libViewAuthor.php?job=delete&amp;First_Name=".$row['First_Name']."&amp;Middle_Name=".$row['Middle_Name']."&amp;Last_Name=".$row['Last_Name']."'>Delete</a></td>";
			echo "</tr>";
		}

		echo "</table>";
		
		mysqli_close($con);
		?>
		<a class="button" href="librarian.php">Back</a>
	</body>
</html>


