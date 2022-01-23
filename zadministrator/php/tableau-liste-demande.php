<?php
/* variable   */
$a = mysqli_real_escape_string($con, $_SESSION['email']);

//logout
if (isset($_POST['logout'])) {

  unset($_POST['email']);
  session_destroy();
  $_SESSION = array();
  header("location: ../loginadmin.php");
}
/* select from revendeur table */
$QuerrySelectFromAdmineUsername = "SELECT * FROM admins WHERE `email` ='" . $a . "'  ";
$result = $con->query($QuerrySelectFromAdmineUsername);
/////////////////////////////////////

/*select for table  */
$QuerySelectAll = " SELECT * FROM client WHERE `afficher_dans_la_table`= true AND  `block` <> true ";
$ResultQuerySelectAll = $con->query($QuerySelectAll);


/*delete */
if (isset($_GET["delete"])) {
  $id = $_GET["delete"];
  $del =  mysqli_query($con, "DELETE FROM `client` WHERE `client`.`id` = $id ");
  header("location:ADliste-demande.php");
};

/* date function */
/* echo $today = date("Y-m-d H:i:s");
 */

$startTime = date("Y-m-d H:i:s");

//display the starting time
/* echo 'Starting Time: ' . $startTime;
 */
//add 1 hour to time
$today = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($startTime)));

//display the converted time
/* echo 'Converted Time (added 1 hour): ' . $today; */


/* valider */
if (isset($_GET["valider"])) {
  $id = $_GET["valider"];
  $del =  mysqli_query($con, " UPDATE `client` SET `afficher_dans_la_table` = '0', `validation` = '1',date_validation='" . $today . "' ,`valider_par` = '" . $a . "'    WHERE id = $id   ");

  header("location:ADliste-demande.php");
}
/* block */
if (isset($_GET["block"]) || isset($_GET["tel"]) || isset($_GET["email"]) || isset($_GET["service_comercial"]) || isset($_GET["adresse"])) {
  /* data */
  $id = $_GET["block"];
  $fullname = $_GET["fullname"];
  $service_comercial = $_GET["service_comercial"];
  $email = $_GET["email"];
  $tel = $_GET["tel"];
  $adresse = $_GET["adresse"];

  /* queries */
  $del =  mysqli_query($con, " UPDATE `client` SET `afficher_dans_la_table` = '0', `block` = '1'  WHERE id = $id  ");
  $query = "INSERT INTO `block_liste` (`id`, `fullname`, `adresse`, `tel`, `email`, `service_comercial`, `date_block`, `blocker_par`) VALUES ('" . $id . "', '$fullname', '$adresse', '$tel', '$email', '$service_comercial', CURRENT_TIMESTAMP, '" . $a . "')";


  if (mysqli_query($con, $query)) {
    echo " insert data seccesfuly";
    header("location:ADliste-demande");
  }
}
