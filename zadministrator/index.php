<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include("interdit.php");
include("../connection.php");
include("php/tableau-liste-demande.php");
?>

<!doctype html>
<html lang="en">

<head>
	<title>Sidebar 05</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">


	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="../css/dashboardadmin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



	<script>
		$(document).ready(function() {
				$('#myTable').DataTable();
			}

		)

		;
	</script>
</head>

<body>

	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4">
				<h1><a href="index.html" class="logo">Portfolic <span>Portfolio Agency</span></a></h1>
				<ul class="list-unstyled components mb-5">
					<li class="active">
						<a href="#"><span class="fa fa-home mr-3"></span> Home</a>
					</li>
					<li>
						<a href="#"><span class="fa fa-user mr-3"></span> About</a>
					</li>
					<li>
						<a href="#"><span class="fa fa-briefcase mr-3"></span> Works</a>
					</li>
					<li>
						<a href="#"><span class="fa fa-sticky-note mr-3"></span> Blog</a>
					</li>
					<li>
						<a href="#"><span class="fa fa-suitcase mr-3"></span> Gallery</a>
					</li>
					<li>
						<a href="#"><span class="fa fa-cogs mr-3"></span> Services</a>
					</li>
					<li>
						<a href="#"><span class="fa fa-paper-plane mr-3"></span> Contacts</a>
					</li>
				</ul>

				<div class="mb-5">
					<h3 class="h6 mb-3">Subscribe for newsletter</h3>
					<form action="#" class="subscribe-form">
						<div class="form-group d-flex">
							<div class="icon"><span class="icon-paper-plane"></span></div>
							<input type="text" class="form-control" placeholder="Enter Email Address">
						</div>
					</form>
				</div>

				<div class="footer">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template
						is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>

			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">

			<div class="container ">
				<h2 style="margin-top: 50px; color : blue;"><i class="fas fa-list"></i> les demandes d'inscription</h1>

					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
						<table class="table table-striped table-hover" id="myTable" data-order='[[ 1, "desc" ]]' data-page-length='25'>
							<thead>

								<tr>
									<th scope="col">id</th>
									<th scope="col">date d'inscription</th>
									<th scope="col">Nom & Prenom</th>
									<th scope="col">tel:</th>
									<th scope="col">adresse :</th>
									<th scope="col">Email</th>
									<th scope="col">Activite comercial</th>
									<th scope="col">Validation</th>
									<th scope="col">action </th>
								</tr>
							</thead>

							<?php
							while ($row = $ResultQuerySelectAll->fetch_assoc()) :
							?>
								<tr>

									<td>#<?php echo $row["id"] ?></td>
									<td><?php echo $row["date_demande"] ?></td>
									<td><?php echo $row["fullname"] ?></td>
									<td>0<?php echo $row["tel"] ?></td>
									<td><?php echo $row["adresse"] ?></td>

									<td><?php echo $row["email"] ?></td>
									<td><?php echo $row["service_comercial"] ?></td>




									<td>
										<?php






										echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#' . $row["id"] . '">
<i class="fas fa-check" ></i>  
</button>
<div class="modal fade" id="' . $row["id"] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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


<a href="ADliste-demande.php?valider=' . $row["id"] . ' "class="btn btn-primary btn" ">  valider</a>

</div>
</div>
</div>
</div>
</div>
';
										/* <a href="ADliste-demande.php?valider=<?php echo $row["id"]; ?> " class="btn btn-success btn-sm" onclick="clic()"> valider</a> */        ?>
									</td>




									<td class="col-md-5 ">
										<?php

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
   <a href="ADliste-demande.php?block=' . $row["id"] . '&fullname=' . $row["fullname"] .
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
 <a href="ADliste-demande.php?delete=' . $row["id"] . ' "class="btn btn-primary btn" "> supprimer client</a>
 
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

		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>



	<script>
		function clic() {
			return confirm('Are you sure you want to valid user ?')

		}
	</script>
</body>

</html>