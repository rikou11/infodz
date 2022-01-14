<?php
/* variable   */
$a =mysqli_real_escape_string($con,$_SESSION['email']);
//logout
if(isset($_POST['logout'])){

    unset($_POST['email']);
    session_destroy();
    $_SESSION = array();
header("location:../loginadmin");
}
/* select from admin table */
$QuerrySelectFromAdmineUsername = "SELECT * FROM admins WHERE `email` ='".$a."'  ";
$result = $con->query($QuerrySelectFromAdmineUsername);
/////////////////////////////////////

/* select */
$QuerySelectAllValidation = " SELECT * FROM client WHERE `validation`= true AND `block` <> true   " ;
$ResultQuerySelectAll = $con->query($QuerySelectAllValidation);

  /*delete */
  if (isset( $_GET["delete"]))
  {     
 $id= $_GET["delete"];
 $del=  mysqli_query ($con,"DELETE FROM `client` WHERE `client`.`id` = $id ");
 header("location:ADliste-validation");

};
 /* block */
 if (isset( $_GET["block"]) || isset($_GET["tel"])|| isset($_GET["email"])|| isset($_GET["service_comercial"])|| isset($_GET["adresse"]))
 {  
   /* data */   
 $id= $_GET["block"];
 $fullname=$_GET["fullname"];
 $service_comercial=$_GET["service_comercial"];
 $email= $_GET["email"];
 $tel= $_GET["tel"];
 $adresse= $_GET["adresse"];
/* queries */
 $del=  mysqli_query ($con," UPDATE `client` SET `afficher_dans_la_table` = '0', `block` = '1'  WHERE id = $id  ");
 $query = "INSERT INTO `block_liste` (`id`, `fullname`, `adresse`, `tel`, `email`, `service_comercial`, `date_block`, `blocker_par`) VALUES ('".$id."', '$fullname', '$adresse', '$tel', '$email', '$service_comercial', CURRENT_TIMESTAMP, '".$a."')";
 
 
 if(mysqli_query($con,$query)){
 echo" insert data seccesfuly";  
   header("location:ADliste-validation");
 }

 }
 
?>