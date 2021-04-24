<?php
include '../dbconnect/dbconn.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$user_id = strtoupper($_POST['userid']);
	$password = $_POST['pswd'];
	$hashed_pass = password_hash($password, PASSWORD_DEFAULT);
	$first_name = $_POST['fname'];
	$middle_name = $_POST['mname'];
	$last_name = $_POST['lname'];
	$date_of_birth = $_POST['dob'];
	$email = $_POST['email'];
	$mobile_no = $_POST['phone'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$house = $_POST['house'];
	$street = $_POST['street'];
	$locality = $_POST['locality'];
	$pincode = $_POST['pincode'];
	$city = $_POST['city'];
	$address = $house.', '.$street.', '.$locality.', '.$city.', '.$pincode;
}
$query1 = "INSERT INTO `login_details` (`user_id`, `password`) VALUES ('$user_id', '$hashed_pass')";
$query2 = "INSERT INTO `user_details` (`user_id`, `first_name`, `middle_name`, `last_name`, 
		`date_of_birth`, `email`, `mobile_no`, `country`, `state`, `address`) 
		VALUES ('$user_id', '$first_name', '$middle_name', '$last_name', '$date_of_birth', 
		'$email', '$mobile_no', '$country', '$state', '$address')";
$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
if($result1 && $result2)
{
	echo "<h1>Succefully Registered!</h1>";
	echo "<h2>You can login to our site by clicking <a href='../login/loginform.html'>here</a></h2>";
}
else
{
	echo "<h1>User already exists!</h1>";
	echo "<h2>Click <a href='regform.html'>here</a> again to register</h2>";
}
?>
