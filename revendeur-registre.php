<?php
include('revendeurValidation.php');  ?>

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
    <div class="container"><a href="index.php"><i style=" color:black;  font-size: 50px;
" class=" fas fa-home"></i></a>
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
              <label><i class="fas fa-envelope"></i></label>
              <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
              <span class="error">* <?php echo $err_email; ?></span>

            </div>
            <div class="form-group">
              <label><i class="fas fa-phone-square"></i></label>
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
          <figure><img src="signup.svg" alt="sing up image"></figure>

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