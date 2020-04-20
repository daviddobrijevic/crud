<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/brendovi.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
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
				          <a class="dropdown-item" href="../grupeproizvoda/gp.php">Grupe proizvoda</a>
				          <a class="dropdown-item" href="br.php">Brendovi</a>
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

	<?php require_once '../db/actionbr.php'; ?>

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
			$result = $mysqli->query("SELECT * FROM brendovi");
		?>
		<div class="card">
		 <div class="card-header">Brendovi
	    	<th>
	    		<a href="nbr.php" class="btn btn-primary btn-sm float-right">Kreiraj</a>
	    	</th>
		</div> 
		    
		    <div class="card-body">
			
				<table class="table table-bordered table-striped">
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
								<a href="nbr.php?editid=<?php echo $row['id']; ?>" class="btn">
								<i class="far fa-edit"></i>
								</a>
								<a href="../db/actionbr.php?deleteid=<?php echo $row['id']; ?>" class="btn">
								<i class="far fa-trash-alt"></i>
								</a>
							</td>
						</tr>
					<?php endwhile; ?>
				</table>

			</div><!--card-body-->
		</div><!--.card-->
	</div><!--.container-->

	
	
<?php include '../templates/footer.php'; ?>