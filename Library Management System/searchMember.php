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
			<center>
			<?php

			$UserID = $_POST["UserID"];

			echo $UserID. "<br>";

			// Create connection
			$con=mysqli_connect("localhost","root","","lms");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			  
			$result = mysqli_query($con, "SELECT * from user where UserID=". $UserID);
			 
	
			  
			echo '<style type="text/css">'.file_get_contents('main.css').'</style>';

			echo "<table border='1'>
			<tr>
			<th>User ID</th>
			<th>Number of books borrowed</th>
			</tr>";
				
			echo "<tr>";
			echo "<td>" . $UserID . "</td>";
			echo "<td>" . 'Num_Of_Books_Borrowed' . "</td>";
			  
			echo "1 record found";

			mysqli_close($con);
			?>
			
			<form action="librarian.php" method="post">
				<input type="submit" value="back">
			</form>
		</center>
	</body>
</html>
</html>