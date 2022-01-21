<?php
include("connection.php");
$name = $email = $phone = $adresse = $service =    "";

$errname = $erremail = $errtel = $erradresse = $errservice =    "";
$err_warningtel = 0;

$err_warningemail = 0;

$err_success = 0;
$t = 1;
$f = 0;
$today = date("Y-m-d H:i:s");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //variables
    $name = test_input($_POST["name-id"]);
    $email = test_input($_POST["email-id"]);
    $adresse = test_input($_POST["adresse-id"]);
    $phone = test_input($_POST["tel-id"]);
    $service = test_input($_POST["service-id"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    //!!!!!!!phone validation IMPORTANT !!!!!!
    if (empty($_POST["tel-id"])) {
        $errtel = "tel is required";
    } else {

        $select1 = mysqli_query($con, "SELECT id FROM block_liste WHERE tel ='" . $_POST['tel-id'] . "'  ")
            or exit(mysqli_error($con));
        if (mysqli_num_rows($select1) > 0) {
            $errtel = 'votre tel ete bloquer';
            $err_warningtel = 1;
        }
    }  // fin !!!!!!!!!!!  

    //!!!!!!!email validation IMPORTANT !!!!!!
    if (empty($_POST["email-id"])) {
        $erremail = "Email is required";
    } else {

        $select = mysqli_query($con, "SELECT id FROM block_liste WHERE email ='" . $_POST['email-id'] . "'  ")
            or exit(mysqli_error($con));
        if (mysqli_num_rows($select) > 0) {
            $erremail = 'votre email ete bloquer';
            $err_warningemail = 1;
        } else {
            if (empty($_POST["tel-id"])) {
                $errtel = "tel is required";
            } else {

                $select1 = mysqli_query($con, "SELECT id FROM block_liste WHERE tel ='" . $_POST['tel-id'] . "'  ")
                    or exit(mysqli_error($con));
                if (mysqli_num_rows($select1) > 0) {
                    $errtel = 'votre tel ete bloquer';
                } else {

                    if ($erremail <> 'This email is block' || $errtel <> 'This tel is block') {
                        $query = "INSERT INTO client (fullname,email,service_comercial,tel,adresse,block,valider_par,validation,afficher_dans_la_table)VALUE('$name','$email','$service','$phone','$adresse','$f','','$f','$t')";
                        if (mysqli_query($con, $query)) {
                            $err_success = 1;
                            header("location:continue-success.php");
                        }
                    } else {
                        if ($erremail == 'This email is already being used') {
                            $err_warningemail = 1;
                        } else {
                            $err_warningtel = 1;
                        }
                    }
                }
            }
        }
    }  // fin !!!!!!!!!!!  

    //after validation we insert DATA to our DATABASE

    /*  if ($erremail <> 'This email is block' || $errtel <> 'This tel is block') {
        $query = "INSERT INTO client (fullname,email,service_comercial,tel,adresse,block,valider_par,validation,afficher_dans_la_table)VALUE('$name','$email','$service','$phone','$adresse','$f','','$f','$t')";
        if (mysqli_query($con, $query)) {
            $err_success = 1;
            header("location:continue-success.php");
        }
    } else {
        if ($erremail == 'This email is already being used') {
            $err_warningemail = 1;
        } else {
            $err_warningtel = 1;
        }
    } */
}
