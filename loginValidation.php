<?php 
include("connection.php");
   session_start();
   $err="";
   $err_email="";
$email = "";
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $mypassword = mysqli_real_escape_string($con,$_POST['your_pass']); 
     

      $sql = "SELECT id FROM revendeur WHERE email = '$email' and password = '$mypassword'  AND valider= 1 ";
      $result = mysqli_query($con,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      ////////////////////////////////////////////
   $count = mysqli_num_rows($result);  
    if($count == 1) {
        $_SESSION["email"] = $email;

        
         header("location:dashboard-admin"); 
      }else{
         $err = "password ou email incorrect";
    }
           $sql1 = "SELECT id FROM admins WHERE email = '$email' and password = '$mypassword'" ;
            $result1 = mysqli_query($con,$sql1);
             $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
            
         $count1 = mysqli_num_rows($result1); 
      // If result matched $email and $mypassword, table row must be 1 row	
    
             if($count1 == 1) {
            $_SESSION["email"] = $email;
      
            
             header("location:zadministrator/ADliste-demande"); 
                 }
      

        
        
            
      
      
      
            

      
       
   }?>