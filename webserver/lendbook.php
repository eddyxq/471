<html>
	<link rel="stylesheet" type="text/css" href="main.css">
	<body>
		<center>
			<form action="lend.php" method="post">
			   <font size="4" color="#ffffff">UserID</font><input type="number" name ="UserID"><br>
			   <font size="4" color="#ffffff">ISBN</font><input type="text" name="ISBN"><br>
			   <font size="4" color="#ffffff">Date Borrowed</font><input type="date" name="Date_Borrowed"><br>
			   <font size="4" color="#ffffff">Date_Returned</font><input type="date" name="Date_Returned"><br>
			   <font size="4" color="#ffffff">Borrow_Duration (In Days)</font><input type="Number" name="Borrow_Duration"><br>
			   <input type="submit" value="Lend">
			</form>
			
			<form action="librarian.php" method="post">
				<input type="submit" value="Back">
			</form>
		</center>
	</body>
</html>