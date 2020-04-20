<!DOCTYPE html>
<html>
<head>
  <title>PHP CRUD</title>
  <link rel="stylesheet" type="text/css" href="../css/grupeproizvoda.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
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

<?php require_once '../db/actiongp.php';  //dodal ?>  


<form class="container" action="../db/actiongp.php" method="POST">
    <div class="card">

        <div class="card-header">
          <?php if($id): ?>
          Izmena proizvoda
          <?php else: ?>
          Novi proizvod
          <?php endif ?>
        </div><!--.card-header-->
        
        <div class="card-body">

            <div class="row pt-2">
              <div class="col-sm-3">
                <input type="text" class="form-control" id="naziv" name="naziv" placeholder="Naziv"   value="<?php if($id){ echo $naziv; } ?>">
                <?php 
                if(isset($_SESSION['message'])): 
                ?>
                
                <p class="redcolor">*
                  <?php echo $_SESSION['message'];
                        unset($_SESSION['message']);
                  ?>
                </p>
                
                <?php endif ?>
              </div><!--col-sm-3-->
            </div><!--.row-->

            <div class="row">
              <div class="col-sm-3 pt-3">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" <?php if($id && $status==1){ echo 'checked';  }   ?>>
                <label class="form-check-label" for="status">Status</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-3 pt-3">
                <input type="hidden" name="id" value="<?php if($id){ echo $id;  }?>">
                  <?php
                  if ($update == true):
                  ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                  <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="sacuvaj">Sacuvaj</button>
                  <?php endif; ?>
                     <button type="submit" class="btn btn-outline-secondary" name="odustani">Odustani</button>
              </div>
            </div>

        </div><!--.card-body-->

    </div><!--.card-->          
</form>



<?php include '../templates/footer.php'; ?>



