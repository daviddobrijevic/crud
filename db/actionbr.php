<?php

	session_start();

	$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

	$id = 0;
	$update = false;
	$name = '';
	$location = '';
	
	
//insert
	if(isset($_POST['sacuvaj'])) {
    	$naziv = $_POST['naziv'];
    
    
    $status = "0";
    if(isset($_POST['status'])){
      
    	$status = $_POST['status'];
      	
    }

    if($naziv == '') {

    	$_SESSION['message'] = "Naziv ne moze biti prazan";

    	header('location: ../brendovi/nbr.php');
    } else {
    
    if($result->num_rows) {
			$row = $result->fetch_array();
			$id = $row['id'];
			$naziv = $row['naziv'];
			$status = $row['status'];
		}

   		$mysqli->query("INSERT INTO brendovi (naziv, status) VALUES ('$naziv', '$status')") or die($mysqli->error);

   		$_SESSION['message'] = "Stavka uspesno sacuvana!";
		

   		header('location: ../brendovi/br.php');
   	}
	}

	
	//delete
	if(isset($_GET['deleteid'])) {
		$id = $_GET['deleteid'];

		$mysqli->query("DELETE FROM brendovi WHERE id=$id") or die($mysqli->error());

		$_SESSION['message'] = "Stavka uspesno obrisana!";

		
		header('location: ../brendovi/br.php');

	}
	
	//edit
	if(isset($_GET['editid'])) {
		$id = $_GET['editid'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM brendovi WHERE id=$id") or die($mysqli->error());
		 if($result->num_rows) {
			$row = $result->fetch_array();
			$naziv = $row['naziv'];
			$status = $row['status'];
		}
	}
	
		
		if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$naziv = $_POST['naziv'];
    
   
	    $status = "0";
	    if(isset($_POST['status'])){
	      
    	$status = $_POST['status'];
	}

		if($naziv == '') {

    	$_SESSION['message'] = "Naziv ne moze biti prazan";

    	header('location: ../brendovi/nbr.php?editid='.$id);
    
    	

    } else {
		$mysqli->query("UPDATE brendovi SET naziv='$naziv', status='$status' WHERE id=$id") or die($mysqli->error);

		$_SESSION['message'] = "Uspesno izmenjeno!";
		$_SESSION['msg_type'] = "warning";

		header('location: ../brendovi/br.php');
	}
	}

	if(isset($_POST['odustani'])) {
		$odustani = $_POST['odustani'];
		header('location: ../brendovi/br.php');
	}


	?>
