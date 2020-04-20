<!DOCTYPE html>
<html>
<head>
  <title>PHP CRUD</title>
  <link rel="stylesheet" type="text/css" href="../css/proizvodi.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
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
  
 
<form class="container" action="../db/actionpr.php" method="POST" enctype="multipart/form-data">
  <div class="card">

    <div class="card-header">
      <?php  if($id): ?>
      Izmena proizvoda
      <?php else: ?>
      Novi proizvod
      <?php endif ?>
    </div><!--.card-header-->
   
    <div class="card-body">

    <div class="row pt-2">
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
     
        <div class="col-sm-4">
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
        </div><!--.col-sm-4-->

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
    </div><!--.row pt-2-->

    <div class="row pt-2">
        <div class="col-sm-3">
          <label>JM</label><br>
          <input class="form-control" type="text" id="um" name="um" placeholder="JM" value="<?php if($id){ echo $um; } ?>">
        </div>
        <div class="col-sm-3">
          <label>PDV</label><br>
          <input class="form-control" type="text" id="vat" name="vat" placeholder="PDV" value="<?php if($id){ echo $vat; } ?>">
        </div>
        <div class="col-sm-3">
          <label>Cena</label><br>
          <input class="form-control" type="text" id="price" name="price" placeholder="Cena" value="<?php if($id){ echo $price; } ?>">
        </div>
        <div class="col-sm-3">
          <label>Zalihe</label><br>
          <input class="form-control" type="text" id="" name="stock" placeholder="Zalihe" value="<?php if($id){ echo $stock; } ?>">
        </div>
    </div><!--.row-->

    <div class="row">

        <input type="hidden" name="imagepath" value="<?php if($image){ echo $image; }?>">
        <?php if($image): ?>
        <div class="col-sm-3 pt-5">
        <img src="../db/<?php echo $image; ?>" alt="" width="200px" height="200px" class="rotate90">
          <button class="btn btn-default" class="close">
            <i class="fas fa-times-circle fa-sm"></i>
          </button>
        </div>
        <?php else: ?>
        <div class="col-sm-3 pt-5 pl-4">
        <img src="../db/slikeproizvoda/noimg.png" alt="" width="200px" height="200px">
        </div>
        <?php endif ?>
        <div class="col-sm-9 pt-2"> 
          <label>Napomena</label><br>
          <textarea class="form-control" type="text" id="" name="note" placeholder="Napomena" rows="8"><?php if($id){ echo $note; } ?></textarea>
        </div>
    </div><!--.row-->

    <div class="row">
        <div class="col-sm-3 pt-2">
        <input class="mt-2" type="file" name="image">
        </div>
        <div class="col-sm-3">
          <div class="form-check pt-3">
                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" <?php if($id && $status==1){ echo 'checked';  }   ?>>
                <label class="form-check-label" for="status">Status</label>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-5">
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


<script src="script.js"></script>
<?php include '../templates/footer.php'; ?>