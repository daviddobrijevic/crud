<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/proizvodi.css">
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

	<?php include '../db/actionpr.php'; ?>

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

    <div class="container card-header">Proizvodi
    	<th>
    		<a href="npr.php" class="btn btn-primary btn-sm float-right">Kreiraj</a>
    	</th>
	</div> 

	<div class="container border pt-2">
		<?php
			$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
			$result = $mysqli->query($select);
			
		?>
		<div class="row pl-3 pb-1">
		<h6 class="pl-1">Pretraga</h6>
	    </div>
		<div class="card">
		
		
			<form action="" method="POST">	

				<div class="card-body">

					<div class="row pb-1 ">

						<div class="col-sm-2">       
				          <label>Ident</label>
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
				        </div><!--.col-sm-2-->

				        <div class="col-sm-2">
				          <label>Naziv</label>
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
				        </div><!--.col-sm-2-->

				        <div class="col-sm-3">
				          <label>Grupa proizvoda</label>
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
				          <label>Brendovi</label>
				          <select class="form-control" name="idbrend">
				              <option value="">Izaberite vrednost</oion>
				            <?php 
				            while ($row = $brendovi->fetch_assoc()):  //ovde izvrtis da se ispisu u combobox-u
				            ?>
				              <option value="<?php echo $row['id']; ?>"<?php if($row['id'] == $idbrend) echo 'selected="selected"'; ?>><?php echo $row['naziv']; ?></option>
				            <?php endwhile; ?>
				          </select>
				        </div>

				      	<div class="col-sm-2 pt-4">
				       		<button type="submit" class="btn btn-info mt-2 float-left" name="pretraga" value="Search">Pretraga</button>
				       		<button type="submit" class="btn btn-danger mt-2 float-right" name="reset">Reset</button>
				       	</div>
				   
				    </div><!--.row-->
				</div><!--.card-body-->
			</form>

		</div><!--.card-->
		<br>



		<div>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Slika</th>
						<th>Ident</th>
						<th>Naziv</th>
						<th>Grupa</th>
						<th>Brend</th>
						<th>JM</th>
						<th>PDV</th>
						<th>Cena</th>
						<th>Napomena</th>
						<th>Status</th>
						<th>Zalihe</th>
						<th>Akcije</th>
					</tr>
				</thead>
				<?php 
				while ($row = $result->fetch_assoc()): 
				?>		
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td>
							<?php if($image == $row['image']): ?>
							<img src="../db/slikeproizvoda/noimg.jpg ?>" width="60" height="60">
							<?php else: ?>
							<img src="../db/<?php echo $row['image']; ?>" width="60" height="60" class="rotate90">
							<?php endif ?>
						</td>
						<td><?php echo $row['ident']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['nazivgrupe']; ?></td>
						<td><?php echo $row['nazivbrenda']; ?></td>
						<td><?php echo $row['um']; ?></td>
						<td><?php echo $row['vat']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><?php echo $row['note']; ?></td>
						<td><?php if ($row['status'] == 1) { echo "Aktivan"; } else {
							echo "Neaktivan";	
						} ?>
						</td>
						
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