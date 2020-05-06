<?php

	session_start();

	$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

	$id = 0;
	$update = false;
	$name = '';
	$slug = '';
	
	
	
//insert
	if(isset($_POST['sacuvaj'])) {
    	$name = $_POST['name'];
    	$slug = $_POST['slug'];
    
    $status = "0";
    if(isset($_POST['status'])){
      
    	$status = $_POST['status'];
      	
    }

    if($name == '') {

    	$_SESSION['message'] = "Ime ne moze biti prazno";

    	header('location: ../grupeproizvoda/ngk.php');
    } else {
    
    if($result->num_rows) {
			$row = $result->fetch_array();
			$id = $row['id'];
			$name = $row['name'];
			$slug = $row['slug'];
			$status = $row['status'];
		}

   		$mysqli->query("INSERT INTO user_groups (name, slug, status) VALUES ('$name', '$slug', '$status')") or die($mysqli->error);

   		$_SESSION['message'] = "Stavka uspesno sacuvana!";
		

   		header('location: ../grupekorisnika/gk.php');
   	}
	}

	
	//delete
	if(isset($_GET['deleteid'])) {
		$id = $_GET['deleteid'];

		$mysqli->query("DELETE FROM user_groups WHERE id=$id") or die($mysqli->error());

		$_SESSION['message'] = "Stavka uspesno obrisana!";

		
		header('location: ../grupekorisnika/gk.php');

	}
	
	//edit
	if(isset($_GET['editid'])) {
		$id = $_GET['editid'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM user_groups WHERE id=$id") or die($mysqli->error());
		 if($result->num_rows) {
			$row = $result->fetch_array();
			$name = $row['name'];
			$slug = $row['slug'];
			$status = $row['status'];
		}
	}
	
		
		if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = $_POST['slug'];
    
   
	    $status = "0";
	    if(isset($_POST['status'])){
	      
    	$status = $_POST['status'];
	}

		if($name == '') {

    	$_SESSION['message'] = "Ime ne moze biti prazno";

    	header('location: ../grupekorisnika/ngk.php?editid='.$id);
    
    	

    } else {
		$mysqli->query("UPDATE user_groups SET name='$name', slug='$slug', status='$status' WHERE id=$id") or die($mysqli->error);

		$_SESSION['message'] = "Uspesno izmenjeno!";
		$_SESSION['msg_type'] = "warning";

		header('location: ../grupekorisnika/gk.php');
	}
	}

	if(isset($_POST['odustani'])) {
		$odustani = $_POST['odustani'];
		header('location: ../grupekorisnika/gk.php');
	}


	?>
