<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav">
				      <li class="nav-item">
				        <a class="nav-link" href="index.php">Home</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link collapse-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Sifarnici
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="grupeproizvoda/gp.php">Grupe proizvoda</a>
				          <a class="dropdown-item" href="brendovi/br.php">Brendovi</a>
				        </div>
				      </li>
				       <li class="nav-item">
				        <a class="nav-link" href="proizvodi/pr.php">Proizvodi</a>
				      </li>
				    </ul>
			  	</div>
			</div>
		</nav>
	</header>	

        <?php require_once 'db/process.php'; ?>

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
			$result = $mysqli->query("SELECT * FROM data");
		?>

		<div class="card">
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Location</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
				<?php 
				while ($row = $result->fetch_assoc()): 
				?>		
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['location']; ?></td>
						<td>
							<a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">
							Edit
							</a>
							<a href="db/process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">
							Delete
							</a>
						</td>
					</tr>
				<?php endwhile; ?>

				</table>
		

				<div class="row justify-content-center">
					<form action="db/process.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<div class="form-group">			
							<label>Name</label>
							<input type="text" name="name" class="form-control" 
							value="<?php echo $name; ?>" placeholder="Enter your name">
						</div>
						<div class="form-group">
							<label>Location</label>
							<input type="text" name="location" class="form-control" 
							value="<?php echo $location; ?>" placeholder="Enter your location">
						</div>
						<div class="form-group">
					<?php
						if ($update == true):
					?>
							<button type="submit" class="btn btn-info" name="update">Update</button>
					<?php else: ?>
							<button type="submit" class="btn btn-primary" name="save">Save</button>
					<?php endif; ?>
						</div>
					</form>
				</div>
			</div><!--.card-body-->
		</div><!--.card-->
	</div><!--.container-->

	
	
<?php include 'templates/footer.php'; ?>