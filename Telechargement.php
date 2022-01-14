<?php
include("connection.php");
$name = $email = $phone = $adresse = $service =    "";

$errname = $erremail = $errphone = $erradresse = $errservice =    "";

$t = 1;
$f = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //variables
    $name = test_input($_POST["name-id"]);
    $email = test_input($_POST["email-id"]);
    $adresse = test_input($_POST["adresse-id"]);
    $phone = test_input($_POST["tel-id"]);
    $service = test_input($_POST["service-id"]);
}
//fucntion data testing
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//after validation we insert DATA to our DATABASE
$today = date("Y-m-d H:i:s");

$query = "INSERT INTO client (fullname,email,service_comercial,tel,adresse,block,valider_par,validation,afficher_dans_la_table)VALUE('$name','$email','$service','$phone','$adresse','$f','','$f','$t')";
if (mysqli_query($con, $query)) {
    echo " insert data seccesfuly";
    header("location:continue-success");
}
