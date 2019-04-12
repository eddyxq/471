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
		<div>
			<form action="addingUser.php" method="GET">
				<font size="4" color="#ffffff">User ID</font><input type="text" name="UserID"><br>
				<font size="4" color="#ffffff">Password</font><input type="text" name="password"><br>
				<font size="4" color="#ffffff">First Name</font><input type="text" name="first_name"><br>
				<font size="4" color="#ffffff">Middle Name</font><input type="text" name="middle_name"><br>
				<font size="4" color="#ffffff">Last Name</font><input type="text" name="last_name"><br>
				<font size="4" color="#ffffff">Street Name</font><input type="text" name="street_name"><br>
				<font size="4" color="#ffffff">City</font><input type="text" name="city"><br>
				<font size="4" color="#ffffff">Country</font><input type="text" name="country"><br>
				<font size="4" color="#ffffff">Phone Number</font><input type="text" name="phone_number"><br>
				<font size="4" color="#ffffff">Date_Registered</font><input type="date" name="Date_Registered"><br>
			   
				<p>
				<font size = "4" color = "#ffffff">User Type: </font>
				<select name="formUserType">
				<option value="">Select...</option>
				<option value="Member">Member</option>
				<option value="Librarian">Librarian</option>
				</select>
				</p>
				
				<input type="submit" value="Add">
			</form>
			
			<form action="admin.php">
				<input type="submit" value="Return">
			</form>
		</div>
	</body>
</html>