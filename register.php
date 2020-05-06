<!DOCTYPE html>
<html>
<head>
	<title>Registracija</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
</head>
<body>

	<?php include 'db/actionreg.php'; ?>

<div class="container">
  <div class="row justify-content-center">
 
	<div class="card">
			<div class="card-header">
				<h4 class="card-title mt-2">Registracija</h4>
			</div>

		<form class="card-body" action="register.php" method="POST">
			<div class="form-row">
				<div class="col form-group">
					<label>Ime *</label>   
				  	<input type="text" class="form-control" name="name" placeholder="">
				  	
				</div> 
				<div class="col form-group">
					<label>Prezime *</label>
				  	<input type="text" class="form-control" name="surname" placeholder="">
				</div>
			</div> 

				<div class="form-group">
				 	<label>Ulica</label>
					<input type="text" class="form-control" name="address" placeholder="">
				</div> 

				<div class="form-group">
					<label>Grad</label>
					<input type="text" class="form-control" name="city" placeholder="">
				</div> 

				<div class="form-group">
					<label>Broj telefona</label>
					<input type="text" class="form-control" name="phone" placeholder="">
				</div>


			<div class="form-group">
				<label class="form-check form-check-inline">
				    <input class="form-check-input" type="radio" name="gender" value="male">
				    <span class="form-check-label">M</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="gender" value="female">
				    <span class="form-check-label">Z</span>
				</label>
			</div> 

			<div class="form-group">
				<label>E-mail *</label>
				<input type="email" class="form-control" name="email" placeholder="">
			</div> 

			<div class="form-group">
				<label>Lozinka *</label>
			    <input class="form-control" name="password" type="password" autocomplete="new-password">
			</div>

			<div class="form-group">
				<label>Potvrda lozinke *</label>
			    <input class="form-control" name="password" type="password" autocomplete="new-password">
			</div> 

			<input type="hidden" name="user_group" value="user">
			<input type="hidden" name="activeuser" value="">

		    <div class="form-group">
		        <button type="submit" class="btn btn-primary btn-block" name="register">
		        Registruj se
		    	</button>
		    </div>                                            
		</form>
	</div><!--.card-->
  </div><!--.row justify-content-center-->
</div><!--.container-->

</body>
</html>