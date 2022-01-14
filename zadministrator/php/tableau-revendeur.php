<?php 
/* variable   */
$a =mysqli_real_escape_string($con,$_SESSION['email']);

//logout
if(isset($_POST['logout'])){

    unset($_POST['email']);
    session_destroy();
    $_SESSION = array();
header("location: ../loginadmin.php");
}
/* select from revendeur table */
$QuerrySelectFromAdmineUsername = "SELECT * FROM admins WHERE `email` ='".$a."'  ";
$result = $con->query($QuerrySelectFromAdmineUsername);
/////////////////////////////////////

  /*select for table  */
 $QuerySelectAll = " SELECT * FROM revendeur " ;
  $ResultQuerySelectAll = $con->query($QuerySelectAll);
 

  /*delete */
  if (isset( $_GET["delete"]))
  {     
 $id= $_GET["delete"];
 $del=  mysqli_query ($con,"DELETE FROM `revendeur` WHERE `revendeur`.`id` = $id ");
 header("location:ADliste-revendeur.php");

};

  /* valider */
  if (isset( $_GET["valider"]))
  {     
  $id= $_GET["valider"];
  $del=  mysqli_query ($con," UPDATE `revendeur` SET `valider` = '1'    WHERE id = $id   ");
  
  header("location:ADliste-revendeur.php");

}
  /* devalider */
  if (isset( $_GET["devalider"]))
  {     
  $id= $_GET["devalider"];
  $del=  mysqli_query ($con," UPDATE `revendeur` SET `valider` = '0'    WHERE id = $id   ");
  
  header("location:ADliste-revendeur.php");

}

/* autoriser */

 
if (isset( $_GET["autoriser"]))
{     
$id= $_GET["autoriser"];
$del=  mysqli_query ($con," UPDATE `revendeur` SET  `action` = '1'     WHERE id = $id   ");

header("location:ADliste-revendeur.php");

}

/* dé-autoriser */

 
if (isset( $_GET["deautoriser"]))
{     
$id= $_GET["deautoriser"];
$del=  mysqli_query ($con," UPDATE `revendeur` SET `action` = '0'     WHERE id = $id   ");

header("location:ADliste-revendeur.php");

}


 


/*  */
  
 ?>

