<?php
include("connection.php");

//debut
$fname = $email = $adresse = $phone = $password  = "";
$err_fname  = $err_email = $err_adresse = $err_phone = $err_password = "";



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} //fin

//test de validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //variables
    $fname = test_input($_POST["fname"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $password = test_input($_POST["pass"]);
    $adresse =  test_input($_POST["adresse"]);
    //? email

    //* full name
    if (empty($_POST["fname"])) {
        $err_fname = "Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $err_fname = "Only letters and white space allowed";
        }
    }


    //* fin
    // ?  adresse
    if (empty($_POST["adresse"])) {
        $err_adresse = "adresse is required";
    } else {
        $adresse = test_input($_POST["adresse"]);
    }
    //* telephone
    if (empty($_POST["phone"])) {
        $err_phone = "phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
    }



    //password 
    if (empty(trim($_POST["pass"]))) {
        $err_password = "Please enter a password.";
    } elseif (strlen(trim($_POST["pass"])) < 6) {
        $err_password = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["pass"]);
    }




    if (empty($_POST["email"])) {
        $err_email = "Email is required";
    } else {

        $select = mysqli_query($con, "SELECT id FROM revendeur WHERE email ='" . $_POST['email'] . "'")
            or exit(mysqli_error($con));
        if (mysqli_num_rows($select) > 0) {
            $err_email = 'This email is already being used';
            /*       exit('This email address is already used!'); */
        } else {
            $sql = "INSERT INTO `revendeur` (`fullname`,`tel`,`password`,`email`,`adresse`) VALUES ('$fname','$phone','$password','$email','$adresse')";
            if (mysqli_query($con, $sql)) {
                header("location:continue");
            } else {
                echo "no data inserted";
            }
        }
    }  // ? fin  
}


//fucntion
