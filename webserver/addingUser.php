
<?php

$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$last_name = $_POST["last_name"];
$street_name = $_POST["street_name"];
$city = $_POST["city"];
$country = $_POST["country"];
$phone_number = $_POST["phone_number"];

echo $first_name. "<br>".
$middle_name. "<br>".
$last_name. "<br>".
$street_name. "<br>".
$city. "<br>".
$country. "<br>".
$phone_number. "<br>";

// Create connection
$con=mysqli_connect("localhost","root","","lms");

// Check connection
if (mysqli_connect_errno($con)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  
  $sql = "INSERT INTO user (first_name, middle_name, last_name, street_name, city, country, phone_number) VALUES ('". $first_name."','". $middle_name ."','". $last_name ."','". $street_name ."','". $city ."','". $country ."','". $phone_number ."')";
 
if (!mysqli_query($con,$sql)){
	die('Error: ' . mysqli_error($con));
}
  
echo "1 record added";

mysqli_close($con);
?>

