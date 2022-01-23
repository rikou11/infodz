<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include("interdit.php");
include("connection.php");
include("php/validation-admin.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/dashboardadmin.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- css -->

  <link rel="stylesheet" href="css/dashboardadmin.css">

  <!-- jquerry -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  <title>Admin Dashboard</title>
</head>

<body>
  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php while ($row = $result->fetch_assoc()) :   ?>
      &nbsp; <a class="navbar-brand" href="dashboard-admin.php"><?php echo "  <i class='fas fa-home'></i> Bienvenue <span class='text-primary'> " . $row["fullname"] . "</span>"   ?> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <a onClick="window.location.reload();" class="nav-link waves-effect waves-light"><i class="fas fa-sync-alt"></i> Actualliser
            <span class="sr-only">(current)</span>
          </a>
          </li>
          <li class="nav-item">
            <a href="dashboard-admin" class="nav-link waves-effect waves-light"><i class="fas fa-list"></i> les demandes d'inscription</a>
          </li>
          <li class="nav-item">
            <a href="dashboard-blocklist" class="nav-link waves-effect waves-light"> <i class="fas fa-exclamation-triangle"></i> bloque liste</a>
          </li>
        </ul>


        <?php if ($row["action"] == 1) {
          $Clickbtnaction = 1;
        } else {
          $Clickbtnaction = 0;
        } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-inline my-2 my-lg-0">

          <button type="submit" name="logout" class="btn btn-outline-danger"> <i class="fas fa-sign-out-alt"></i> deconnecter</button>
        </form>
      </div>
    <?php endwhile; ?>

  </nav>





  <!-- end nav -->
  <div class="container">
    <h2 style="margin-top: 50px;  color : green;"><i class="fas fa-user-check"></i> les validations</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <table class="table table-striped table-hover" id="myTable" data-order='[[ 1, "desc" ]]' data-page-length='25'>
        <thead>

          <tr>
            <th scope="col">id</th>
            <th scope="col">date d'inscription</th>
            <th scope="col">date de validation</th>

            <th scope="col">Nom et Prenom :</th>
            <th scope="col">tele:</th>
            <th scope="col">adresse:</th>

            <th scope="col">Email</th>
            <th scope="col">Activite comercial</th>
            <th scope="col">Validation par</th>
            <th scope="col">action</th>
          </tr>
        </thead>

        <?php
        while ($row = $ResultQuerySelectAll->fetch_assoc()) :
        ?>

          <tr>
            <td>#<?php echo $row["id"] ?></td>
            <td><?php echo $row["date_demande"] ?></td>
            <td><?php echo $row["date_validation"] ?></td>

            <td><?php echo $row["fullname"] ?></td>
            <td>0<?php echo $row["tel"] ?></td>
            <td><?php echo $row["adresse"] ?></td>

            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["service_comercial"] ?></td>
            <td><?php echo $row["valider_par"] ?></td>
            <td class="col-md-2">

              <?php
              if ($Clickbtnaction == 1) {


                echo '
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#' . $row["id"] . 'supp">
                  <i class="fas fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#' . $row["id"] . 'bloque">
                          bloque    
                  </button>


<div class="modal fade" id="' . $row["id"] . 'bloque" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
     vous etes sur valider ' . $row["fullname"] . ' ?
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   <a href="dashboard-validation-admin.php?block=' . $row["id"] . '&fullname=' . $row["fullname"] .
                  '&tel=' . $row["tel"] .
                  '&email=' . $row["email"] . '&service_comercial=' . $row["service_comercial"] . '&adresse=' . $row["adresse"] . ' " class="btn btn-danger btn"  >bloque</a>
               
    </div>
  </div>
</div>
</div>
</div>

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
     vous etes sur valider Mr' . $row["fullname"] . ' ?
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <a href="dashboard-validation-admin.php?delete=' . $row["id"] . ' "class="btn btn-primary btn" "> supprimer client</a>
 
    </div>
  </div>
</div>
</div>
</div>

';





                /*   
                echo '<a href="dashboard-validation-admin.php?delete=' . $row["id"] . '"  class="btn btn-danger btn-sm mx-2"     onclick="clic()"><i class="fas fa-trash-alt"></i></a>';

                echo '<a href="dashboard-validation-admin.php?block=' . $row["id"] . '&fullname=' . $row["fullname"] .
                  '&tel=' . $row["tel"] .
                  '&email=' . $row["email"] . '&service_comercial=' . $row["service_comercial"] . '&adresse=' . $row["adresse"] . ' " class="btn btn-danger btn-sm"   >bloque</a>';
       */
              } else {

                echo '<a href="#"  class="btn btn-secondary btn-sm"  ><i class="fas fa-trash-alt"></i></a>';

                echo '<a href="#" class="btn btn-secondary btn-sm" >bloque</a>';
              }


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
    });
  </script>

</body>

</html>