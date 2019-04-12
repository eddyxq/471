<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<style>
	input[type=number], select {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}
	
	div {
	  border-radius: 50px;
	  padding: 50px 1000px 300px 50px;
	}
	</style>
	<body>
		<div>
			<form action="searchReservation.php" method="post">
			   <font size="4" color="#ffffff">UserID</font><input type="number" name ="UserID"><br>
			   <input type="submit" value="Search My Reservations">
			</form>
			
			<form action="member.php" method="post">
				<input type="submit" value="Back">
			</form>
		</div>
	</body>
</html>