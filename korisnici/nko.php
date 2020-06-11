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
                <a class="nav-link" href="">?</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link collapse-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ?
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="">?</a>
                  <a class="dropdown-item" href="">?</a>
                </div>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="">?</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>
  </header>


<?php include '../db/actionko.php'; ?>
  
 
<form class="container" action="../db/actionko.php" method="POST">
    <div class="card">
        <div class="card-header">
          Izmena korisnika
        </div><!--.card-header-->
   
        <div class="card-body">

          <div class="form-row">
            <div class="col-4 form-group">
              <label>Ime</label>   
                <input type="text" class="form-control" name="name" placeholder="" value="<?php if($id){ echo $name; } ?>">

                <?php 
                  if(isset($_SESSION['message'])): 
                ?>
                  <p class="redcolor">*
                <?php echo $_SESSION['message'];
                        unset($_SESSION['message']);
                ?>
                  </p>
                <?php endif ?>

            </div> 
            <div class="col-4 form-group">
              <label>Prezime</label>
                <input type="text" class="form-control" name="surname" placeholder="" value="<?php if($id){ echo $surname; } ?>">
            </div>
          </div> 

          <div class="form-row">
            <div class="col-4 form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" placeholder="" value="<?php if($id){ echo $email; } ?>">
            </div> 

            <div class="col-4 form-group">
              <label>Adresa</label>
              <input type="text" class="form-control" name="address" placeholder="" value="<?php if($id){ echo $address; } ?>">
            </div> 
          </div>

          <div class="form-row">
            <div class="col-4 form-group">
              <label>Grad</label>
              <input type="text" class="form-control" name="city" placeholder="" value="<?php if($id){ echo $city; } ?>">
            </div>

            <div class="col-4 form-group">
              <label>Broj telefona</label>
              <input type="text" class="form-control" name="phone" placeholder="" value="<?php if($id){ echo $phone; } ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="col-4 pt-1 form-group">
              <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="Male" <?php if ($gender == 'M') echo "checked"; ?>>
                  <span class="form-check-label">M</span>
              </label>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Female" <?php if ($gender== 'F') echo "checked"; ?>>
                  <span class="form-check-label">Z</span>
              </label>
            </div> 
          </div>

          <div class="form-row">
            <div class="col-4 form-group">
              <label>Lozinka</label>   
                <input type="password" class="form-control" name="password" placeholder="" autocomplete="new-password" value="<?php if($id){ echo $password; } ?>">
            </div>
            <div class="col-4 form-group">
              <label>Potvrda lozinke</label>   
                <input type="password" class="form-control" name="password" placeholder="" value="<?php if($id){ echo $password; } ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="col-4">
              <label>Grupa korisnika</label>
              <select class="form-control" name="user_group">
                  <option value="">Izaberite vrednost</option>
                <?php 
                while ($row = $user_groups->fetch_assoc()):  //ovde izvrtis da se ispisu u combobox-u
                ?>
                <option value="<?php echo $row['id']; ?>"<?php if ($row['id'] == $user_group) echo 'selected="selected"'; ?>><?php echo $row['name'] ?></option>
                <?php endwhile; ?>
              </select>
            </div>
          </div> 

          <div class="form-row pt-3">
            <div class="col-3 form-group">
              <div class="form-check">
              <input class="form-check-input" type="checkbox" id="activeuser" name="activeuser" value="1" <?php if($id && $activeuser == 1){ echo 'checked';  }   ?>>
              <label class="form-check-label" for="activeuser">Status</label>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="col-3 form-group">
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
        </div><!--card-body-->


        <input type="hidden" name="user_group" value="user">

    

  </div><!--.card-->
</form> 



<?php include '../templates/footer.php'; ?>