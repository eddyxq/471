<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	
	<body>
		<?php
		$ISBN = $_GET["ISBN"];
		$Item_ID = $_GET["Item_ID"];
		$Title = $_GET["Title"];
		$Edition = $_GET["Edition"];
		$Language = $_GET["Language"];
		$Publisher_Name = $_GET["Publisher_Name"];
		$Publisher_ID = $_GET["Publisher_ID"];
		$Publish_Date = $_GET["Publish_Date"];
		$Lendable = $_GET["Lendable"];

		
		// Create connection
		$con=mysqli_connect("localhost","root","","lms");

		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		 
					
		$sql = "INSERT INTO book (ISBN, Item_ID, Title, Edition, Language, Publisher_Name, Publisher_ID, Publish_Date, Lendable) VALUES ('". $ISBN ."', '". $Item_ID."','". $Title ."','". $Edition ."','". $Language ."','". $Publisher_Name ."','". $Publisher_ID ."','". $Publish_Date ."','". $Lendable ."')";
		 

		
		if (!mysqli_query($con,$sql)){
			echo "<div style ='font-size:30px;color:#ffffff'>Sorry, this item ID is taken.</div>";
		}
		
		else
		{
			echo "<div style ='font-size:30px;color:#ffffff'> Book Added.</div>";
		}

		mysqli_close($con);
		?>
		
		<a class="button" href="librarian.php">Back</a>
	</body>
</html>