<?php

	session_start();

	$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

	$name = $surname = $address = $city = $phone = $gender = $email = $password = $user_group = '';


if(isset($_POST['register'])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$phone = $_POST['phone'];

	if(isset($_POST['gender'])){
	$gender = $_POST['gender'];
	}

	$email = $_POST['email'];
	$pass = $_POST['password'];
	$password = MD5($pass);
	$user_group = $_POST['user_group'];
	$activeuser = $_POST['activeuser'];
		
	$mysqli->query("INSERT INTO users (name, surname, address, city, phone, gender, email, password, user_group, activeuser) 
					VALUES ('$name', '$surname', '$address', '$city', '$phone', '$gender', '$email', '$password', '$user_group', '$activeuser')") or die($mysqli->error);

}

	

?>

		