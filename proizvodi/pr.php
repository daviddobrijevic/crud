<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<link rel="stylesheet" type="text/css" href="../css/proizvodi.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
				          <a class="dropdown-item" href="../brendovi/br.php">Brendovi</a>
				        </div>
				      </li>
				       <li class="nav-item">
				        <a class="nav-link" href="pr.php">Proizvodi</a>
				      </li>
				    </ul>
			  	</div>
			</div>
		</nav>
	</header>

	<?php require_once '../db/actionpr.php'; ?>

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
			$result = $mysqli->query("SELECT * FROM proizvodi");
		?>

		<div class="card">
		<div class="card-header">Proizvodi:</div> 
		
			<div class="card-body">

				<div class="row">
					<div class="col-sm-2">       
			          <label>Ident</label><br>
			          <input class="form-control" type="text" id="" name="ident" placeholder="Ident"  value="<?php if($id){ echo $ident; } ?>">

			          <?php 
			          if(isset($_SESSION['messageident'])): 
			          ?>
			          <p class="redcolor">*
			            <?php echo $_SESSION['messageident'];
			                  unset($_SESSION['messageident']);
			            ?>
			          </p>
			          <?php endif ?>
			        </div><!--.col-sm-3-->

			        <div class="col-sm-2">
			          <label>Naziv</label><br>
			          <input type="text" class="form-control" id="name" name="name" placeholder="Naziv" value="<?php if($id){ echo $name; } ?>">
			         
			          <?php 
			          if(isset($_SESSION['message'])): 
			          ?>
			          
			          <p class="redcolor">*
			            <?php echo $_SESSION['message'];
			                  unset($_SESSION['message']);
			            ?>
			          </p>
			          <?php endif ?>
			        </div><!--.col-sm-3-->

			        <div class="col-sm-3">
			          <label>Grupa proizvoda</label><br>
			          <select class="form-control" name="idgroup">
			              <option value="">Izaberite vrednost</option>
			            <?php 
			            while ($row = $grupeproizvoda->fetch_assoc()):  //ovde izvrtis da se ispisu u combobox-u
			            ?>
			              <option value="<?php echo $row['id']; ?>"<?php if ($row['id'] == $idgroup) echo 'selected="selected"'; ?>><?php echo $row['naziv'] ?></option>
			            <?php endwhile; ?>
			          </select>
			        </div>

			        <div class="col-sm-3">
			          <label>Brendovi</label><br>
			          <select class="form-control" name="idbrend">
			              <option value="">Izaberite vrednost</option>
			            <?php 
			            while ($row = $brendovi->fetch_assoc()):  //ovde izvrtis da se ispisu u combobox-u
			            ?>
			              <option value="<?php echo $row['id']; ?>"<?php if($row['id'] == $idbrend) echo 'selected="selected"'; ?>><?php echo $row['naziv']; ?></option>
			            <?php endwhile; ?>
			          </select>
			        </div>

			       	<div class="col-sm-1">
			       		<button type="submit" class="btn btn-primary" name="pretraga">Pretraga</button><br>
			       		<button type="submit" class="btn btn-danger" name="reset">Reset</button>
			       	</div>

				</div><!--.row-->
			</div><!--.card-body-->
		</div><!--.card-->
		<br>



		<div class="row justify-content-center">
		
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Ident</th>
						<th>Idgroup</th>
						<th>Idbrend</th>
						<th>Price</th>
						<th>Um</th>
						<th>Vat</th>
						<th>Note</th>
						<th>Status</th>
						<th>Image</th>
						<th>Stock</th>
						<th><a href="npr.php" class="btn btn-primary">Kreiraj</a></th>
					</tr>
				</thead>
				<?php 
				while ($row = $result->fetch_assoc()): 
				?>		
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['ident']; ?></td>
						<td><?php echo $row['idgroup']; ?></td>
						<td><?php echo $row['idbrend']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><?php echo $row['um']; ?></td>
						<td><?php echo $row['vat']; ?></td>
						<td><?php echo $row['note']; ?></td>
						<td><?php if ($row['status'] == 1) { echo "Aktivan"; } else {
							echo "Neaktivan";	
						} ?>
						</td>
						<td><?php echo $row['image']; ?></td>
						<td><?php echo $row['stock']; ?></td>
						<td>
							<a href="npr.php?editid=<?php echo $row['id']; ?>" class="btn">
							<i class="far fa-edit"></i>
							</a>
							<a href="../db/actionpr.php?deleteid=<?php echo $row['id']; ?>" class="btn">
							<i class="far fa-trash-alt"></i>
							</a>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
		</div>
	</div>

	
	
<?php include '../templates/footer.php'; ?>