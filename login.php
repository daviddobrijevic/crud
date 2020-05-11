<!DOCTYPE html>
<html>
<head>
	<title>Prijava</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
</head>
<body>

<?php include 'db/actionlog.php'; ?>

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
  <div class="row justify-content-center pt-5">
 
	<div class="card">
		<div class="card-header">
			<h4 class="card-title mt-2">Prijava</h4>
		</div>

	<form class="card-body" action="db/actionlog.php" method="POST">
		
		<div class="form-group">
			<label>E-mail</label>
			<input type="email" class="form-control" name="email" placeholder="E-mail">
		</div> 
		
		<div class="form-group">
			<label>Lozinka</label>
		    <input type="text" class="form-control" name="password" placeholder="Password">
		</div>

			<?php 
	          if(isset($_SESSION['messagePolja'])): 
	        ?>
	          <p class="redcolor">*
	        <?php echo $_SESSION['messagePolja'];
	              unset($_SESSION['messagePolja']);
	        ?>
	          </p>
	   		<?php endif ?>
	   		
	   		<?php 
	          if(isset($_SESSION['messagePL'])): 
	        ?>
	          <p class="redcolor">*
	        <?php echo $_SESSION['messagePL'];
	              unset($_SESSION['messagePL']);
	        ?>
	          </p>
	   		<?php endif ?>

	   		<?php 
	          if(isset($_SESSION['messagePP'])): 
	        ?>
	          <p class="redcolor">*
	        <?php echo $_SESSION['messagePP'];
	              unset($_SESSION['messagePP']);
	        ?>
	          </p>
	   		<?php endif ?>

		<div class="form-group">
			<button type="submit" class="btn btn-primary" name="login">Prijavi se</button>
		</div>
	
  		<!-- <div class="form-check">
	    	<input type="checkbox" class="form-check-input" id="zapamti" name="zapamti">
	    	<label class="form-check-label" for="zapamti">Zapamti me</label>
	  	</div> -->
 
	</form>

	<br>
	<br>
	<hr>

	<div class="col form-group">
		Nemate nalog?
		<a href="register.php" class="btn btn-outline-primary">Registrujte se</a> 
	</div>

	</div><!--.card-->
  </div><!--.row justify-content-center-->
</div><!--.container-->


</body>
</html>