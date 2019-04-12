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
		 
		if(isset($_POST['admin_login'])){
			header('location: underconstruction.php');
		}

		$result = mysqli_query($con,"SELECT * FROM user");

		echo '<style type="text/css">'.file_get_contents('main.css').'</style>';

		mysqli_close($con);
		?>

	</body>
</html>


