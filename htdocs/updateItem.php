<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<center><?php

			$Item_ID = $_GET["Item_ID"];

			// Create connection
			$con=mysqli_connect("localhost","root","","lms");

			// Check connection
			if (mysqli_connect_errno($con)){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			  
			$result = mysqli_query($con,"SELECT * FROM inventory where Item_ID=".$Item_ID);

			while($row = mysqli_fetch_array($result)){
			 
			 ?>
			 
				<form action="viewInventory.php?job=update" method="post">
					<input name="Item_ID" type="hidden" value=<?php echo $row['Item_ID'];?>>
					Item_Type: <input type="text" name="Item_Type" value='<?php echo $row['Item_Type'];?>'><br>
					Item_Location: <input type="text" name="Item_Location" value='<?php echo $row['Item_Location'];?>'><br>
					<input type="submit" value="Update">
				</form>

				<form action="viewInventory.php" method="post">
					<input type="submit" value="back">
				</form>
			  
			<?php
			}

			mysqli_close($con);

			?>
			</form>
		</center>
	</body>
</html>
