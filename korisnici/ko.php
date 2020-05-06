<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/korisnici.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav">
				      <li class="nav-item">
				        <a class="nav-link" href="#">?</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link collapse-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          ?
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="#">?</a>
				          <a class="dropdown-item" href="#">?</a>
				        </div>
				      </li>
				       <li class="nav-item">
				        <a class="nav-link" href="#">?</a>
				      </li>
				    </ul>
			  	</div>
			</div>
		</nav>
	</header>

	<?php include '../db/actionko.php'; ?>

	<?php 
	if (isset($_SESSION['message'])):
	?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>

	<?php endif ?>

    <div class="container card-header">Korisnici
    	<th>
    	</th>
	</div> 

	<div class="container border pt-2">
		<?php
			$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
			$result = $mysqli->query($select);
			
		?>



		<div>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Email</th>
						<th>Adresa</th>
						<th>Grad</th>
						<th>Broj telefona</th>
						<th>Pol</th>
						<th>User_grupa</th>
						<th>Status</th>
						<th>Akcije</th>
					</tr>
				</thead>
				<?php 
				while ($row = $result->fetch_assoc()): 
				?>		
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['surname']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['city']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['user_group']; ?></td>
						<td><?php echo $row['activeuser']; ?></td>
						<td class="btn">
							<a href="nko.php?editid=<?php echo $row['id']; ?>" class="btn">
							<i class="far fa-edit"></i>
							</a>
							<a href="../db/actionko.php?deleteid=<?php echo $row['id']; ?>" class="btn">
							<i class="far fa-trash-alt"></i>
							</a>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
		</div><!--.table-->
	</div><!--.container-->


<ul class="pagination container pt-2">
	<?php if($page > 1) { ?>
		<li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?>">&laquo;</a></li>
	<?php } ?>

	<?php for($i = 1; $i <= $total_pages; $i++) { ?>
		<li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	<?php } ?>

	<?php if($page != $total_pages) { ?>
		<li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>">&raquo;</a></li>
	<?php } ?>
</ul>
	
	

<?php include '../templates/footer.php'; ?>