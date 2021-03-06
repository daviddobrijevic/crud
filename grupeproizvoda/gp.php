<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<link rel="stylesheet" type="text/css" href="../css/grupeproizvoda.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
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
				        <a class="nav-link" href="../index.php">Home</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link collapse-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Sifarnici
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="gp.php">Grupe proizvoda</a>
				          <a class="dropdown-item" href="../brendovi/br.php">Brendovi</a>
				        </div>
				      </li>
				       <li class="nav-item">
				        <a class="nav-link" href="../proizvodi/pr.php">Proizvodi</a>
				      </li>
				    </ul>
			  	</div>
			</div>
		</nav>
	</header>

	<?php require_once '../db/actiongp.php'; ?>

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


	<div class="container">
		<?php
			$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM grupeproizvoda");
		?>
		<div class="card">
			<div class="card-header">Grupe proizvoda
		    	<th>
		    		<a href="ngp.php" class="btn btn-primary btn-sm float-right">Kreiraj</a>
					<input class="form-control-sm mr-1 col-sm-3 float-right" id="search" type="text" placeholder="Pretraga.." aria-label="Search">	
		    	</th>
			</div><!--.card-header-->
			<div class="card-body">
				
				<table class="table table-bordered table-striped" id="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Naziv</th>
							<th>Status</th>
							<th>Akcije</th>
						</tr>
					</thead>
					<?php 
					while ($row = $result->fetch_assoc()): 
					?>		
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['naziv']; ?></td>
							<td><?php if ($row['status'] == 1) { echo "Aktivan"; } else {
								echo "Neaktivan";	
							} ?>
							</td>
							<td>
								<a href="ngp.php?editid=<?php echo $row['id']; ?>" class="btn">
								<i class="far fa-edit"></i>
								</a>
								<a href="../db/actiongp.php?deleteid=<?php echo $row['id']; ?>" class="btn">
								<i class="far fa-trash-alt"></i>
								</a>
							</td>
						</tr>
					<?php endwhile; ?>
				</table>
			</div><!--.card-body-->
		</div><!--.card-->
	</div><!--.container-->


<script src="../js/search.js"></script>
<?php include '../templates/footer.php'; ?>