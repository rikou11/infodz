<?php
include("connection.php");

//debut
$fname = $email = $adresse = $phone = $password  = "";
$err_fname  = $err_email = $err_adresse = $err_phone = $err_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //variables
  $fname = test_input($_POST["fname"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $password = test_input($_POST["pass"]);
  $adresse =  test_input($_POST["adresse"]);
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} //fin

//test de validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  //? email
  if (empty($_POST["email"])) {
    $err_email = "Email is required";
  } else {
    $adresse = test_input($_POST["adresse"]);
    $select = mysqli_query($con, "SELECT id FROM revendeur WHERE email ='" . $_POST['email'] . "'") or exit(mysqli_error($con));
    if (mysqli_num_rows($select)) {
      $err_email = 'This email is already being used';
    }
  }  // ? fin  
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

  $sql = "INSERT INTO `revendeur` (`fullname`,`tel`,`password`,`email`,`adresse`) VALUES ('$fname','$phone','$password','$email','$adresse')";
  if (mysqli_query($con, $sql)) {
    header("location:continue");
  } else {
    echo "no data inserted";
  }
}


//fucntion

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up </title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Main css -->
  <link rel="stylesheet" href="User form/css/stylev.css">
  <style>
    .error {
      color: red;
      font-size: smaller;

    }
  </style>

  <script type="text/javascript">
    window.history.forward();

    function noBack() {
      window.history.forward();
    }
  </script>
</head>

<body>



  <!-- Sign up form -->
  <section class="signup">
    <div class="container">
      <div class="signup-content">
        <div class="signup-form">
          <h2 class="form-title">espace comercial</h2>

          <form method="POST" class="register-form" id="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name"><i class="fas fa-user"></i></label>
              <input type="text" name="fname" id="fname" placeholder="Nom" value="<?php echo $fname; ?>" />
              <span class="error">* <?php echo $err_fname; ?></span>
            </div>
            <div class="form-group">
              <label for="email"><i class="fas fa-envelope"></i></label>
              <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
              <span class="error">* <?php echo $err_email; ?></span>

            </div>
            <div class="form-group">
              <label for="email"><i class="fas fa-phone-square"></i></label>
              <input type="tel" name="phone" id="phone" placeholder="Téléphone" maxlength='10' value="<?php echo $phone; ?>" />
              <span class="error">* <?php echo $err_phone; ?></span>

            </div>
            <div class="form-group">
              <label for="mail"><i class="fas fa-search-location"></i></label>
              <input type="text" name="adresse" id="adresse" placeholder="Adresse" value="<?php echo $adresse; ?>" />
              <span class="error">* <?php echo $err_adresse; ?></span>

            </div>

            <div class="form-group">
              <label for="pass"><i class="fas fa-lock"></i></label>
              <input type="password" name="pass" id="myInput" placeholder="mot de pass" />
              <span class="error">* <?php echo $err_password; ?></span>

            </div>



            <div class="form-group" style="  margin-bottom : 5px; ">
              <input type="checkbox" class="agree-term" id="password" onclick="myFunction()" />
              <label class="label-agree-term">Show password</label>



            </div>

            <div class="form-group">

              <h4> <a href="loginadmin.php">Connecter ici</a></h4>

            </div>
            <div class="form-group form-button">
              <input type="submit" name="signup" id="signup" class="form-submit" value="Inscrire" />
            </div>

          </form>
        </div>
        <div class="signup-image hidden-xs">
          <figure><img src="imgs/undraw_next_tasks_re_5eyy.svg" alt="sing up image"></figure>

        </div>
      </div>
    </div>
  </section>


  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>

  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</body>

</html>