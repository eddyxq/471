<html>
	<link rel="stylesheet" type="text/css" href="main.css">
		<style>
	input[type=text], select {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}
	input[type=date], select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}
	input[type=submit] {
	 width: 500px;
		display: inline-block;
		text-align: center;
		vertical-align: middle;
		padding: 40px 80px;
		border: 1px solid #225594;
		border-radius: 21px;
		background: #40a0ff;
		background: -webkit-gradient(linear, left top, left bottom, from(#40a0ff), to(#225594));
		background: -moz-linear-gradient(top, #40a0ff, #225594);
		background: linear-gradient(to bottom, #40a0ff, #225594);
		-webkit-box-shadow: #4dc0ff 0px 0px 40px 0px;
		-moz-box-shadow: #4dc0ff 0px 0px 40px 0px;
		box-shadow: #4dc0ff 0px 0px 40px 0px;
		text-shadow: #143257 1px 1px 1px;
		font: normal normal bold 20px arial;
		color: #ffffff;
		text-decoration: none;
	}
	input[type=submit]:hover,
	input[type=submit]:focus {
		border: 1px solid ##a48d88;
		background: #ffdcd4;
		background: -webkit-gradient(linear, left top, left bottom, from(#ffdcd4), to(#9d8883));
		background: -moz-linear-gradient(top, #ffdcd4, #9d8883);
		background: linear-gradient(to bottom, #ffdcd4, #9d8883);
		color: #ffffff;
		text-decoration: none;
	}
	input[type=submit]:active {
		background: #225594;
		background: -webkit-gradient(linear, left top, left bottom, from(#225594), to(#225594));
		background: -moz-linear-gradient(top, #225594, #225594);
		background: linear-gradient(to bottom, #225594, #225594);
	}

	div {
	  border-radius: 50px;
	  padding: 50px 1000px 300px 50px;
	}
	</style>
	<body>
		<div><?php

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
					<font size="4" color="#ffffff">Item_Type: <input type="text" name="Item_Type" value='<?php echo $row['Item_Type'];?>'><br>
					<font size="4" color="#ffffff">Item_Location: <input type="text" name="Item_Location" value='<?php echo $row['Item_Location'];?>'><br>
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
		</div>
	</body>
</html>
