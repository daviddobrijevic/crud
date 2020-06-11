<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$limitstart = '';
$name = '';
$surname = '';
$email = '';
$address = '';
$city = '';
$phone = '';
$gender = '';
$activeuser = "0";

$user_groups = $mysqli->query("SELECT * FROM user_groups");
//insert
if(isset($_POST['sacuvaj'])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	
	if(isset($_POST['email'])) {
		$email = $_POST['email'];
	}

	if(isset($_POST['address'])) {
		$address = $_POST['address'];

	}

	if(isset($_POST['city'])) {
		$city = $_POST['city'];
		
	}

	
	if(isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	}

	
	if(isset($_POST['gender'])) {

		$gender = $_POST['gender'];
		
	}

	if(isset($_POST['password'])) {

		$pass = $_POST['password'];
		$password = MD5($pass);
	}

	$activeuser = "0";
	if(isset($_POST['activeuser'])){
		
		$activeuser = $_POST['activeuser'];
	} 

	if(isset($_POST['user_group'])) {

		$user_group = $_POST['user_group'];
		
	}

	
	if($name == '') {

		$_SESSION['message'] = "Morate popuniti ovo polje";

		header('location: ../korisnici/nko.php');
	}
	
$mysqli->query("INSERT INTO users (name, surname, email, address, city, phone, gender, password, user_group, actiuveuser) VALUES ('$name', '$surname', '$email', '$address','$city', '$phone', '$gender', '$password', '$user_group', '$activeuser')") or die($mysqli->error);


$_SESSION['message'] = "Stavka uspesno sacuvana!";

header('location: ../korisnici/ko.php');
}  	






	// delete
if(isset($_GET['deleteid'])) {
	$id = $_GET['deleteid'];

	$mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Stavka uspesno obrisana!";

	
	header('location: ../korisnici/ko.php');

}

	// edit
if(isset($_GET['editid'])) {
	$id = $_GET['editid'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM users WHERE id=$id") or die($mysqli->error());
	if($result->num_rows) {
		$row = $result->fetch_array();
		$name = $row['name'];
		$surname = $row['surname'];
		$email = $row['email'];
		$address = $row['address'];
		$city = $row['city'];
		$phone = $row['phone'];
		$gender= $row['gender'];
		$user_group = $row['user_group'];
		$activeuser = $row['activeuser'];
		$password = $row['password'];
	}
}


if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$user_group = $_POST['usergroup'];

	if(isset($_POST['email'])) {
		$email = $_POST['email'];
	}

	if(isset($_POST['address'])) {
		$address = $_POST['address'];

	}

	if(isset($_POST['city'])) {
		$city = $_POST['city'];
		
	}

	if(isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	}

	if(isset($_POST['gender'])) {

		$gender = $_POST['gender'];
		
	}

	if(isset($_POST['password'])) {

		$pass = $_POST['password'];
		$password = MD5($pass);
	}

	$activeuser = "0";
	if(isset($_POST['activeuser'])) {
		
		$activeuser = $_POST['activeuser'];
	} 

	

	if($name == '') {

		$_SESSION['message'] = "Morate popuniti ovo polje";

		header('location: ../korisnici/nko.php?editid='.$id);
	} 


$mysqli->query("UPDATE users SET name='$name', surname='$surname', email='$email', address='$address', city='$city', phone='$phone', gender='$gender', password='$password', user_group='$user_group', activeuser='$activeuser' WHERE id=$id") or die($mysqli->error);

$_SESSION['message'] = "Uspesno izmenjeno!";
$_SESSION['msg_type'] = "warning";

header('location: ../korisnici/ko.php');
}


if(isset($_POST['odustani'])) {
	$odustani = $_POST['odustani'];
	header('location: ../korisnici/ko.php');
}


	$select = "SELECT * from users";

	$t = mysqli_query($mysqli, $select);
	$total = mysqli_num_rows($t);
	$start = 0; 
	$limit = 20; // broj redova po stranici

	if(isset($_GET['page'])) {

		$page = $_GET['page'];
		$start = ($page - 1) * $limit;

	} else {

		$page = 1;

	}

	$total_pages = ceil($total / $limit);

	$limitstart = " LIMIT $start, $limit";

	$select .= $limitstart;





    
?>


