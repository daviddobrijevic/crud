<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$location = '';
$idgroup = '';
$idbrend = '';
$image = '';
$limitstart = '';	



	//ovde uzimas vrednosti za foreach u combobox-u

$grupeproizvoda = $mysqli->query("SELECT * FROM grupeproizvoda");
$brendovi = $mysqli->query("SELECT * FROM brendovi");

//insert
if(isset($_POST['sacuvaj'])) {

	$name = $_POST['name'];
	$ident = $_POST['ident'];

	$status = "0";
	if(isset($_POST['status'])){
		
		$status = $_POST['status'];
		
	}

	$grupaproizvoda = '';
	$brend = '';
	if(isset($_POST['idgroup'])){
		
		$grupaproizvoda=$_POST['idgroup'];
		
	}
	if(isset($_POST['idbrend'])){
		
		$brend=$_POST['idbrend'];
		
	}

	if(isset($_POST['price'])) {
		$price = $_POST['price'];

	}

	if(isset($_POST['um'])) {
		$um = $_POST['um'];
		
	}

	if(isset($_POST['vat'])) {
		$vat = $_POST['vat'];
	}

	if(isset($_POST['note'])) {

		$note = $_POST['note'];
		
	}

	if(isset($_POST['stock'])) {

		$stock = $_POST['stock'];
		
	}


	if($name == '') {

		$_SESSION['message'] = "Naziv ne moze biti prazan";

		header('location: ../proizvodi/npr.php');
	}
	if($ident==''){
		
		
		$_SESSION['messageident'] = "Ident ne moze biti prazan";

		header('location: ../proizvodi/npr.php');
		
	}
	elseif($name != '' && $ident !=''){




		$imgFile=$_FILES['image']['name'];
		$tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];


		$imagepath="";

		if(!empty($imgFile))
		{

$upload_dir = 'slikeproizvoda/'; // upload directory		
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension	

// valid image extensions
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

// rename uploading image
$coverpic = $ident.".".$imgExt;
//echo $coverpic;

// allow valid image file formats
if(in_array($imgExt, $valid_extensions))
{
// Check file size '5MB'
	if($imgSize < 5000000)
	{	
	if (!is_dir('slikeproizvoda/')) { // ako folder ne postoji kreiraj
		
		mkdir('slikeproizvoda/'); 
		
	}	
 if (move_uploaded_file($tmp_dir,$upload_dir.$coverpic)) {  // $upload_dir.$coverpic-to je putanja slike
      // file was successfully uploaded
 	echo "uploading Done";	
 }	
}
else{
	$errMSG = "Sorry, your file is too large.";
}	
}
else{
	$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}


$imagepath = $upload_dir.$coverpic;
}	
$mysqli->query("INSERT INTO proizvodi (name, status, ident, image, idgroup, idbrend, price, um, vat, note, stock) VALUES ('$name', '$status', '$ident','$imagepath','$grupaproizvoda','$brend', '$price', '$um', '$vat', '$note', '$stock')") or die($mysqli->error);


$_SESSION['message'] = "Stavka uspesno sacuvana!";

header('location: ../proizvodi/pr.php');
}  	




}

	// delete
if(isset($_GET['deleteid'])) {
	$id = $_GET['deleteid'];

	$mysqli->query("DELETE FROM proizvodi WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Stavka uspesno obrisana!";

	
	header('location: ../proizvodi/pr.php');

}

	// edit
if(isset($_GET['editid'])) {
	$id = $_GET['editid'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM proizvodi WHERE id=$id") or die($mysqli->error());
	if($result->num_rows) {
		$row = $result->fetch_array();
		$name = $row['name'];
		$status = $row['status'];
		$ident = $row['ident'];
		$idgroup = $row['idgroup'];
		$idbrend = $row['idbrend'];
		$price = $row['price'];
		$um = $row['um'];
		$vat = $row['vat'];
		$note = $row['note'];
		$image = $row['image'];
		$stock = $row['stock'];
	}
}


if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$ident = $_POST['ident'];
	$imageputanja = $_POST['imagepath'];
	
	$imagepath = "";
	if($imageputanja!=''){
		
		$imagepath=$imageputanja;
	}

	
	
	$status = "0";
	if(isset($_POST['status'])){
		
		$status = $_POST['status'];
	}

	$grupaproizvoda='';
	$brend='';

	if(isset($_POST['idgroup'])){
		
		$grupaproizvoda=$_POST['idgroup'];
		
	}
	if(isset($_POST['idbrend'])){
		
		$brend=$_POST['idbrend'];
		
	}

	if(isset($_POST['price'])) {
		$price = $_POST['price'];

	}

	if(isset($_POST['um'])) {
		$um = $_POST['um'];
		
	}

	if(isset($_POST['vat'])) {
		$vat = $_POST['vat'];
	}

	if(isset($_POST['note'])) {

		$note = $_POST['note'];
		
	}

	if(isset($_POST['stock'])) {

		$stock = $_POST['stock'];
		
	}

	if($name == '') {

		$_SESSION['message'] = "Naziv ne moze biti prazan";

		header('location: ../proizvodi/npr.php?editid='.$id);
		
		

	}   if($ident == '') {

		$_SESSION['messageident'] = "Ident ne moze biti prazan";

		header('location: ../proizvodi/npr.php?editid='.$id);
	}


	elseif($name != '' && $ident !=''){




		$imgFile=$_FILES['image']['name'];
		$tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
		


		if(!empty($imgFile))
		{

$upload_dir = 'slikeproizvoda/'; // upload directory		
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension	

// valid image extensions
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

// rename uploading image
$coverpic = $ident.".".$imgExt;
//echo $coverpic;

// allow valid image file formats
if(in_array($imgExt, $valid_extensions))
{
// Check file size '5MB'
	if($imgSize < 5000000)
	{	
	if (!is_dir('slikeproizvoda/')) { //ako folder ne postoji kreiraj
		
		mkdir('slikeproizvoda/'); 
		
	}	
 if (move_uploaded_file($tmp_dir,$upload_dir.$coverpic)) {  //$upload_dir.$coverpic-to je putanja slike
      //file was successfully uploaded
 	echo "uploading Done";	
 }	
}
else{
	$errMSG = "Sorry, your file is too large.";
}	
}
else{
	$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}


$imagepath=$upload_dir.$coverpic;
}	





$mysqli->query("UPDATE proizvodi SET name='$name', status='$status', ident='$ident', idgroup='$grupaproizvoda', idbrend='$brend', price='$price', um='$um', vat='$vat', note='$note', image='$imagepath', stock='$stock' WHERE id=$id") or die($mysqli->error);

$_SESSION['message'] = "Uspesno izmenjeno!";
$_SESSION['msg_type'] = "warning";

header('location: ../proizvodi/pr.php');
}
}

if(isset($_POST['odustani'])) {
	$odustani = $_POST['odustani'];
	header('location: ../proizvodi/pr.php');
}



$whereproizvodi = "";
if(isset($_POST['pretraga'])) {
	if(!empty($_POST['ident'])) {
		$ident = $_POST['ident'];
		
		$whereproizvodi .= " and p.ident LIKE '%".$ident."%'";
	}

	if(!empty($_POST['name'])) {
		$name = $_POST['name'];
		
		$whereproizvodi .= " and p.name LIKE '%".$name."%'";

	}

	if(!empty($_POST['idgroup'])) {
		$idgroup = $_POST['idgroup'];

		$whereproizvodi .= " and p.idgroup = ".$idgroup."";

	}

	if(!empty($_POST['idbrend'])) {
		$idbrend = $_POST['idbrend'];

		$whereproizvodi .= " and p.idbrend = ".$idbrend."";

	}

}


	if(isset($_POST['reset'])) {

		$whereproizvodi = "";
	}	


	$select = "SELECT p.*,b.naziv as nazivbrenda,gp.naziv as nazivgrupe
			   from proizvodi p 
			   left join grupeproizvoda gp on p.idgroup = gp.id 
			   left join brendovi b on p.idbrend = b.id where 1=1".$whereproizvodi;



	$t = mysqli_query($mysqli, $select);
	$total = mysqli_num_rows($t);
	$start = 0; 

	$limit = 20; // broj redova po stranici

	$limit = 5; // broj redova po stranici


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


