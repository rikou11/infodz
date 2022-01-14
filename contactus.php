<?php
include("connection.php");

$name = $email = $sujet = $message = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //variables
  $name = test_input($_POST["name-id-contact"]);
  $email = test_input($_POST["email-id-contact"]);
  $sujet = test_input($_POST["subject-id-contact"]);
  $message = test_input($_POST["message-contact"]);
}
//fucntion data testing
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} //fin



//after validation we insert DATA to our DATABASE
$query = "INSERT INTO messages (fullname,email,message_client,sujet_du_mesaage)VALUE('$name','$email','$message','$sujet' )";
if (mysqli_query($con, $query)) {
  echo " insert data seccesfuly";
  header("location:index");
}
