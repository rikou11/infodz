<?php 
/* variable   */
$a =mysqli_real_escape_string($con,$_SESSION['email']);
//logout
if(isset($_POST['logout'])){

    unset($_POST['email']);
    session_destroy();
    $_SESSION = array();
header("location: loginadmin");
}


/* select from block liste table */
$QuerrySelectFromAdmineUsername = "SELECT * FROM revendeur WHERE `email` ='".$a."'  ";
$result = $con->query($QuerrySelectFromAdmineUsername);
/////////////////////////////////////

  /*select for table  */
  $QuerySelectAll = " SELECT * FROM block_liste WHERE `blocker_par` ='".$a."' ";
  $ResultQuerySelectAll = $con->query($QuerySelectAll);

  
 /* deblocker */


   if (isset( $_GET["deblocker"]))
   {     
   $id= $_GET["deblocker"];
   
   $del=  mysqli_query ($con," UPDATE `client` SET `afficher_dans_la_table` = '1',validation='0', `block` = '0'  WHERE id = $id  ");
   $query=  mysqli_query ($con,"DELETE FROM `block_liste` WHERE `id` = '".$id."' ");
 
   header("location:dashboard-blocklist");
  
   }