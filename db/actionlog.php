<?php

	session_start();

	$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

	if(isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(empty($email) || empty($password)) {
			$_SESSION['messagePolja'] = "Morate popuniti oba polja";
			header('location: ../login.php');

		} else {
			$query = "SELECT * FROM users WHERE email = '$email'";
			$result = mysqli_query($mysqli, $query);

			if($row = mysqli_fetch_assoc($result)) {
				$db_password = $row['password'];

				if(md5($password) == $db_password) {
					header('location: ../index.php');
				} else {
					$_SESSION['messagePL'] = "Uneli ste pogresnu lozinku";
					header('location: ../login.php');
				}
			} else {
				$_SESSION['messagePP'] = "Uneti podaci nisu tacni";
				header('location: ../login.php');
			}
		}
	}
	
?>
