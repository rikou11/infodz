<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include("interdit.php");
include("../connection.php");
include("php/tableau-revendeur.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/dashboardadmin.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- jquerry -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  <title>infodz</title>
</head>

<body>
  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php while ($row = $result->fetch_assoc()) :   ?>
      &nbsp; <a class="navbar-brand" href="ADliste-demande"><?php echo "  <i class='fas fa-home'></i> Bienvenue <span class='text-primary'> " . $row["username"] . "</span>";   ?> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <a onClick="window.location.reload();" class="nav-link waves-effect waves-light"><i class="fas fa-sync-alt"></i>Actualliser
            <span class="sr-only">(current)</span>
          </a>
          </li>
          <li class="nav-item">
            <a href="ADliste-demande" class="nav-link waves-effect waves-light"><i class="fas fa-list"></i> les demandes d'inscription</a>
          </li>
          <li class="nav-item">
            <a href="ADliste-validation" class="nav-link waves-effect waves-light"><i class="fas fa-user-check"></i> validation</a>
          </li>
          <li class="nav-item">
            <a href="ADliste-block" class="nav-link waves-effect waves-light"><i class="fas fa-exclamation-triangle"></i> bloque liste</a>
          </li>
          <li class="nav-item">
            <a href="ADliste-revendeur" class="nav-link waves-effect waves-light"><i class="fas fa-user"></i> liste revendeur</a>
          </li>
        </ul>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-inline my-2 my-lg-0">

          <button type="submit" name="logout" class="btn btn-outline-danger"> <i class="fas fa-sign-out-alt"></i> deconnecter</button>
        </form>
      </div>
    <?php endwhile; ?>

  </nav>
  <!-- end nav -->
  <!-- dubut table des demandes de Telechargement -->


  <div class="container ">
    <h2 style="margin-top: 50px; color : blue;"><i class="fas fa-list"></i> Liste revendeur</h1>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <table class="table table-striped table-hover" id="myTable" data-order='[[ 1, "desc" ]]' data-page-length='25'>
          <thead>

            <tr>
              <th scope="col">id</th>
              <th scope="col">nom et prenom:</th>
              <th scope="col">tel:</th>
              <th scope="col">email :</th>
              <th scope="col">adresse :</th>

              <th scope="col">Action</th>
              <th scope="col">Validation</th>
              <th scope="col">X</th>
            </tr>
          </thead>

          <?php
          while ($row = $ResultQuerySelectAll->fetch_assoc()) :
          ?>

            <tr>



              <td>#<?php echo $row["id"] ?></td>
              <td><?php echo $row["fullname"] ?></td>
              <td>0<?php echo $row["tel"] ?></td>
              <td><?php echo $row["email"] ?></td>

              <td><?php echo $row["adresse"] ?></td>

              <td>



                <div class="dropdown">
                  <button class="btn-sm 
<?php
            if ($row["action"] == 1) {
              echo 'btn-primary';
            } else {
              echo 'btn-secondary';
            }
?> dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    autoriser
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                    <a href="ADliste-revendeur.php?autoriser=<?php echo $row["id"]; ?>" class="dropdown-item"> On</a>


                    <a href="ADliste-revendeur.php?deautoriser=<?php echo $row["id"]; ?>" class="dropdown-item"> Off</a>
                  </div>
                </div>

              </td>


              <td>
                <div class="dropdown">
                  <button class="btn-sm 
<?php
            if ($row["valider"] == 1) {
              echo 'btn-success';
            } else {
              echo 'btn-secondary';
            }
?> dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    valider
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                    <a href="ADliste-revendeur.php?valider=<?php echo $row["id"]; ?>" onclick="clic()" class="dropdown-item"> On</a>


                    <a href="ADliste-revendeur.php?devalider=<?php echo $row["id"]; ?>" onclick="clic()" class="dropdown-item"> off </a>
                  </div>
                </div>

              </td>
              <td>


                <?php

                echo '
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#' . $row["id"] . 'supp">
    <i class="fas fa-trash-alt"></i>
    </button>
    <div class="modal fade" id="' . $row["id"] . 'supp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         vous etes sur sepprimer ' . $row["fullname"] . ' ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     <a href="ADliste-revendeur.php?delete=' . $row["id"] . ' "class="btn btn-danger btn" "> supprimer client</a>
     
        </div>
      </div>
    </div>
    </div>
    </div>
    
    ';

                ?>
              </td>
            </tr>
          <?php endwhile; ?>

        </table>
      </form>
  </div>




  <!-- fin table des demandes de Telechargement -->


  <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
      }

    )

    ;
  </script>

</body>

</html>