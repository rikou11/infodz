<?php
include("loginValidation.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Main css -->
    <link rel="stylesheet" href="Doctor form/css/stylelogin.css">

    <script type="text/javascript">
        window.history.forward();

        function noBack() {
            window.history.forward();
        }
    </script>
</head>

<body>

    <div class="main">


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-form" style="display:flex; margin-top:50px">
                        <figure><img src="imgs/undraw_authentication_fsn5.svg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Connecter vous</h2>
                        <form method="POST" class="register-form" id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="your_name"><i class="fad fa-envelope"></i></label>
                                <input type="email" name="email" placeholder="email" required value=<?php echo $email; ?>>
                                <span style="color: red;">*<?php echo $err_email; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fad fa-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Mot de pass" required />
                                <span style="color: red;">*<?php echo $err;  ?></span>



                            </div>

                            <input type="submit" name="signin" id="signin" class="form-submit" value="Connexion" />
                            <a href='revendeur-registre'>register un revendeur</a>
                    </div>


                    </form>

                </div>
            </div>
    </div>
    </section>

    </div>

    <!-- JS -->

    <script src="Doctor form/vendor/jquery/jquery.min.js"></script>
    <script src="Doctor form/js/main.js"></script>
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