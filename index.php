<?php
include("connection.php");
$name = $email = $phone = $adresse = $service =    "";

$errname = $erremail = $errtel = $erradresse = $errservice =    "";
$err_warningtel = 0;

$err_warningemail = 0;

$err_success = 0;
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

        $select = mysqli_query($con, "SELECT id FROM block_liste WHERE tel ='" . $_POST['tel-id'] . "'  ")
            or exit(mysqli_error($con));
        if (mysqli_num_rows($select)) {
            $errtel = 'This tel is already being used';
        }
    }  // fin !!!!!!!!!!!  

    //!!!!!!!email validation IMPORTANT !!!!!!
    if (empty($_POST["email-id"])) {
        $erremail = "Email is required";
    } else {

        $select = mysqli_query($con, "SELECT id FROM block_liste WHERE email ='" . $_POST['email-id'] . "'  ")
            or exit(mysqli_error($con));
        if (mysqli_num_rows($select)) {
            $erremail = 'This email is already being used';
        }
    }  // fin !!!!!!!!!!!  

    //after validation we insert DATA to our DATABASE
    $today = date("Y-m-d H:i:s");
    if ($erremail != 'This email is already being used' && $errtel != 'This tel is already being used') {
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





?>


<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> 
<![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> 
<![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <title>Compass Responsive Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="templatemo">

    <meta charset="UTF-8">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <!-- CSS Bootstrap & Custom -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/templatemo.css">
    <link rel="stylesheet" href="css/templatemo-misc.css">
    <link rel="stylesheet" href="css/animate.css">


    <!-- Favicons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <!-- scroll barstyle  -->
    <!-- recaptcha -->


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>




    <!-- JavaScripts -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/modernizr.js"></script>
    <!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
        </div>
    <![endif]-->
</head>

<body>
    <?php

    if ($err_warningtel == 1) {

        echo "<div class='alert' text-light role='alert'  style='background:#dc3045 ' >
   votre tel a ete bloque  <a href='#telechargement' >voir plus  </a>

   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
   <span aria-hidden='true'>&times;</span>
 </button>
  </div>";
    }
    if ($err_warningemail == 1) {

        echo "<div class='alert text-light' role='alert'  style='background:#dc3045'>
   votre email a ete bloque  <a href='#telechargement' >voir plus  </a>
  </div>";
    }
    if ($err_success == 1) {

        echo "<div class='alert alert-success' role='alert'>
congratulations 
  </div>";
    }


    ?>




    <div id="home">
        <!-- ***** Preloader Start ***** -->
        <div id="js-preloader" class="js-preloader">
            <div class="preloader-inner">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- ***** Preloader End ***** -->

        <div class="site-header">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="left-header">
                                <span><i class="fa fa-phone"></i>0770 601 199</span>
                                <span><i class="fad fa-envelope-square"></i>infodz@contact.com</span>
                            </div> <!-- /.left-header -->
                        </div> <!-- /.col-md-6 -->
                        <div class="col-md-6 col-sm-6">
                            <div class="right-header text-right">
                                <ul class="social-icons">
                                    <li><a href="#" class="fab fa-facebook-f"></a></li>

                                    <li><a href="#" class="fab fa-youtube"></a></li>
                                </ul>
                            </div> <!-- /.left-header -->
                        </div> <!-- /.col-md-6 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.top-header -->
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <!--      <div class="">
                            <div class="logo">
                                <h1> </h1>
                            </div>
                        </div> -->
                        <div class=" ">
                            <div class="menu text-right hidden-sm hidden-xs">
                                <ul>
                                    <li><a href="#home">Accueil</a></li>
                                    <li><a href="#services">Services</a></li>
                                    <li><a href="#portfolio">Portfolio</a></li>

                                    <li><a href="#telechargement">telechargement</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                    <li><a href="loginadmin" class="external">revendeur ?</a></li>
                                </ul>
                            </div> <!-- /.menu -->
                        </div> <!-- /.col-md-8 -->

                    </div> <!-- /.row -->

                    <div class="responsive-menu text-right visible-xs visible-sm">
                        <a href="#" class="toggle-menu fa fa-bars " style="padding-top: 15px ;"></a>
                        <div class="menu">
                            <ul>
                                <li><a href="#home">Accueil</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#portfolio">Portfolio</a></li>
                                <li><a href="loginadmin" class="external">revendeur ?</a></li>
                                <li><a href="#telechargement">telechargement</a></li>
                                <li><a href="#contact">Contact</a></li>


                            </ul>
                        </div> <!-- /.menu -->
                    </div> <!-- /.responsive-menu -->
                </div> <!-- /.container -->
                <div class="header">

                    <div class="progress-container">
                        <div class="progress-bar" id="myBar"></div>
                    </div>
                </div>

            </div> <!-- /.header -->
        </div> <!-- /.site-header -->
    </div> <!-- /#home -->

    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="images/banner01.jpg" alt="">
                <div class="flex-caption">
                    <h2 style="font-size: 35px; line-height: 40px;">SOLUTION POINTS DE VENTES<br> MATÉRIEL ET LOGICIEL
                        POINT DE VENTE</h2>
                    <span></span>
                    <p>Société infodz avec plus de 10 ans d'expérience dans le
                        Développement web et développement de logiciels,<br> nous vous accompagnons dans la mise en œuvre de vos projets
                    </p>
                </div>
            </li>
            <li>
                <img src="images/banner02.jpg" alt="">
                <div class="flex-caption">
                    <h2 style="font-size: 35px; line-height: 40px;">SOLUTION POINTS DE VENTES
                        <br> MATÉRIEL ET LOGICIEL POINT DE VENTE
                    </h2>
                    <span></span>
                    <p>Vous avez un projet ? Une idée de développement informatique ? Nous sommes experts en solutions de développement</p>
                </div>
            </li>
        </ul>
    </div>

    <div id="services" class="section-cotent">
        <div class="container">
            <div class="title-section text-center">
                <h2>Notre Services</h2>
                <span></span>
            </div> <!-- /.title-section -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="service-header">
                            <i class="fad fa-vial"></i>
                            <h3>TRAVAIL SIMPLIFIÉ</h3>
                        </div>
                        <div class="service-description">
                            Votre travail devient véritablement collaboratif.<br> La gestion de votre contenu devient efficace grâce à notre CMS
                        </div>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="service-header">
                            <i class="fad fa-desktop"></i>
                            <h3>PERFORMANCE</h3>
                        </div>
                        <div class="service-description">
                            Suivez quotidiennement et en tous lieux votre activité pour ne rien laisser au hasard.
                        </div>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="service-header">
                            <i class="fad fa-cogs"></i>
                            <h3>PERSONNALISATION</h3>
                        </div>
                        <div class="service-description">
                            Suivez quotidiennement et en tous lieux votre activité pour ne rien laisser au hasard.
                        </div>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="service-header">
                            <i class="fad fa-heart"></i>
                            <h3>MULTI-SUPPORT</h3>
                        </div>
                        <div class="service-description">
                            S'adapte à tout type de support dans un but accessibilité continue.
                        </div>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->

        <div class="container">

            <div class="row" style="margin-top :80px;  ">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="service-header">
                            <i class="fab fa-css3-alt"></i>
                            <h3>CRÉATION DE SITE WEB</h3>
                        </div>
                        <div class="service-description">
                            Ellipsis dispose du savoir-faire et de l'expérience indispensables à la conception et à la création de sites web intelligents, répondant à l'ensemble des normes actuelles. </div>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="service-header">
                            <i class="fad fa-mobile"></i>

                            <h3>APPLICATIONS MOBILES</h3>
                        </div>
                        <div class="service-description">
                            L'avenir est mobile! Chaque jour, de nouvelles applications innovantes font leur apparition. Ellipsis vous propose de développer vos applications mobiles sur mesure afin que, vous aussi, vous profitiez de ce marché en pleine expansion. </div>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="service-header">
                            <i class="fad fa-database"></i>
                            <h3>SOLUTIONS ERP</h3>
                        </div>
                        <div class="service-description">
                            Vous désiriez améliorer la gestion de votre entreprise et de ses activités. Nous avons conçu pour vous une solution de gestion qui répond aux besoins spécifiques de tous les départements de votre entreprise conformément à la loi tunisienne. </div>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="service-header">
                            <i class="fad fa-cloud"></i>
                            <h3>CLOUD</h3>
                        </div>
                        <div class="service-description">
                            Le cloud est un modèle qui permet un accès omniprésent, pratique et à la demande à un réseau partagé et à un ensemble de ressources informatiques configurables. Soyez au coeur de l'innovation, nos ingénieurs vous proposent des services cloud à la demandes. </div>
                    </div> <!-- /.service-item -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#services -->

    <div id="portfolio" class="section-content">
        <div class="container">
            <div class="title-section text-center">
                <h2>Notre Portfolio</h2>
                <span></span>
            </div> <!-- /.title-section -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">
                        <img src="images/portfolio/item1.jpg" alt="Portfolio Item 1">
                        <div class="overlay">
                            <div class="inner">
                                <h4><a data-rel="lightbox" style="padding: 100%;  color:#dc304400" href="images/portfolio/item1.jpg">Nulla non enim </a></h4>

                            </div>
                        </div> <!-- /.overlay -->
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">
                        <img src="images/portfolio/item2.jpg" alt="Portfolio Item 2">
                        <div class="overlay">
                            <div class="inner">
                                <h4><a data-rel="lightbox" style="padding: 100%;text-align: center;  color:#dc304400" href="images/portfolio/item2.jpg">Duis nec urna</a></h4>

                            </div>
                        </div> <!-- /.overlay -->
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">
                        <img src="images/portfolio/item3.jpg" alt="Portfolio Item 3">
                        <div class="overlay">
                            <div class="inner">
                                <h4><a data-rel="lightbox" style="padding: 100%;text-align: center;  color:#dc304400" href="images/portfolio/item3.jpg">Etiam magna</a></h4>

                            </div>
                        </div> <!-- /.overlay -->
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">
                        <img src="images/portfolio/item4.jpg" alt="Portfolio Item 4">
                        <div class="overlay">
                            <div class="inner">
                                <h4><a data-rel="lightbox" style="padding: 100%;text-align: center;  color:#dc304400" href="images/portfolio/item4.jpg">Vivamus dignissim</a></h4>

                            </div>
                        </div> <!-- /.overlay -->
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">
                        <img src="images/portfolio/item5.jpg" alt="Portfolio Item 5">
                        <div class="overlay">
                            <div class="inner">
                                <h4><a data-rel="lightbox" style="padding: 100%;text-align: center;  color:#dc304400" href="images/portfolio/item5.jpg">Fusce semper</a></h4>

                            </div>
                        </div> <!-- /.overlay -->
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">
                        <img src="images/portfolio/item6.jpg" alt="Portfolio Item 6">
                        <div class="overlay">
                            <div class="inner">
                                <h4><a data-rel="lightbox" style="padding: 100%;text-align: center;  color:#dc304400" href="images/portfolio/item6.jpg">Nunc ultrices</a></h4>

                            </div>
                        </div> <!-- /.overlay -->
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">
                        <img src="images/portfolio/item7.jpg" alt="Portfolio Item 7">
                        <div class="overlay">
                            <div class="inner">
                                <h4><a data-rel="lightbox" style="padding: 100%;text-align: center;  color:#dc304400" href="images/portfolio/item7.jpg">Fusce vehicula</a></h4>

                            </div>
                        </div> <!-- /.overlay -->
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="portfolio-thumb">
                        <img src="images/portfolio/item8.jpg" alt="Portfolio Item 8">
                        <div class="overlay">
                            <div class="inner">
                                <h4><a data-rel="lightbox" style="padding: 100%;text-align: center;  color:#dc304400" href="images/portfolio/item8.jpg">Vivamus elementum</a></h4>
                                <!-- <span>Mobile</span> -->
                            </div>
                        </div> <!-- /.overlay -->
                    </div> <!-- /.portfolio-thumb -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#portfolio -->

    <div id="about" style="margin-bottom :40px;" class="section-content">
        <div class="container">
            <!-- <div class="title-section text-center">
                <h2>About Us</h2>
                <span></span>
            </div>  -->
            <!-- /.title-section -->
            <!--  <div class="row">
                <div class="col-md-9">

                    <p class="widget-title" style="font-size: 30px;  line-height: 40px;
                        color: #e3722e; text-align: center; margin-left: 30%;">Société infodz
                        avec plus de 10 ans
                        d'expérience
                        dans le
                        Développement web et développement de logiciels, nous vous accompagnons dans la mise en œuvre de
                        vos projets
                        Vous avez un projet ? Une idée de développement informatique ? Nous sommes experts en solutions
                        de développement
                        .</p>
                </div> <!-- /.col-md-3 

            </div> <!-- /.row -->
            <div class="row">
                <div class="our-team">
                    <div class="col-md-4 col-sm-6">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="images/team/member-1.jpg" alt="Tracy">
                                <!-- /.overlay -->
                            </div>
                            <div class="inner-content">
                                <h5>Tracy One</h5>
                                <span>Product Developer</span>
                                <p>Mauris vel lorem non odio accumsan scelerisque. Nullam id augue vel nibh soll.</p>
                            </div>
                        </div> <!-- /.team-member -->
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="images/team/member-2.jpg" alt="Mary">

                            </div>
                            <div class="inner-content">
                                <h5>Mary Two</h5>
                                <span>Product Designer</span>
                                <p>Mauris vel lorem non odio accumsan scelerisque. Nullam id augue vel nibh soll.</p>
                            </div>
                        </div> <!-- /.team-member -->
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="images/team/member-3.jpg" alt="Julia">
                                <!-- /.overlay -->
                            </div>
                            <div class="inner-content">
                                <h5>Julia Three</h5>
                                <span>Product Manager</span>
                                <p>Mauris vel lorem non odio accumsan scelerisque. Nullam id augue vel nibh soll.</p>
                            </div>
                        </div> <!-- /.team-member -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.our-team -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#about -->

    <!-- /.title-section -->


    <div class="telechargemenet" style="height: 700px;  background-image: url(picc2.svg);   background-repeat: no-repeat;
  
  background-position: 950px 250px ;
  background-size : 30%;
  background-color:#dc3045;
  ">
        <form class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="POST" autocomplete="on">
            <div>
                <div class="title-section text-center">
                    <h2 style="color: white;" id="telechargement">Telechargement</h2>
                    <span style="color: #fff;"></span>
                </div> <!-- /.title-section -->
                <h4 class="widget-title" style="color: white;">Pour avoir une version gratuite remplire se formulaire
                </h4>

                <div class="">

                    <div class="row">
                        <div class="col-md-3 ">
                            <label for="email-id" style="color: white;">Nom et prenom :</label>

                            <input required type="text" autocomplete="on" id="name-id" name="name-id" class="form-control" placeholder="">

                            <label style="color: white;" for="subject-id">Telephone :</label> <span class="error" style="color : white;">*<?php echo $errtel; ?></span>
                            <input required type="tel" autocomplete="on" maxlength=10 id="subject-id" name="tel-id" class="form-control" placeholder="">


                            <div class=""> <label style="color: white;" for="message">Activité comercial :</label>
                                <input required id="subject-id" name="service-id" placeholder="ex : fastfood , decoration ," class="form-control">
                                <input class="btn-lg btn-success" style="margin: 20px 0 20px ;  padding-left : 30px;padding-right : 30px; " type="submit" name="" value="Valider">

                                <div class="g-recaptcha" data-sitekey="6Lc1KTIbAAAAAGJtWiZBodd0QD4qZG_RhAOLB-N6"></div>

                            </div>

                        </div>

                        <div class="col-md-4">
                            <label style="color: white;" for="email-id">Email:</label><span class="error" style="color : white;">*<?php echo $erremail; ?></span>

                            <input required type="email" autocomplete="on" id="email-id" name="email-id" class="form-control" placeholder="exemple@exemple.com">



                            <label style="color: white;" for="subject-id">Adresse :</label>
                            <input required type="text" autocomplete="on" id="subject-id" name="adresse-id" class="form-control" placeholder="">


                        </div>
                        <!--    <div class="col-md-4">



                        </div>
                        <div class="col-md-5">



                        </div> -->
                    </div>


                </div>

                <!-- /.col-md-3 -->


            </div> <!-- /.container -->
        </form>
    </div>

    <!-- /Telecharger -->
    <div id="contact" class="section-content">
        <form action="contactus.php" method="POST" autocomplete="on">

            <div class="container">
                <div class="title-section text-center">
                    <h2>Contact Us</h2>
                    <span></span>
                </div> <!-- /.title-section -->
                <div class="row">
                    <div class="col-md-7 col-sm-6">
                        <h4 class="widget-title">laissez nous votre message ou opinion </h4>
                        <div class="contact-form">
                            <p class="full-row">

                                <input required type="text" id="name-contact-id" name="name-id-contact" class="form-control" placeholder="nom et prenom :">
                            </p>
                            <p class="full-row">

                                <input required type="text" id="email-id" name="email-id-contact" class="form-control" placeholder="Email :">


                            </p>
                            <p class="full-row">

                                <input required type="text" id="subject-id" name="subject-id-contact" class="form-control" placeholder="sujet">
                            </p>
                            <p class="full-row">
                                <label for="message">Message:</label>
                                <textarea required name="message-contact" id="message" rows="6" class="form-control" placeholder=""></textarea>
                            </p>
                            <input class="mainBtn" type="submit" name="" value="envoyer " class="form-control">
                        </div>
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-5 col-sm-6">
                        <h4 class="widget-title">Notre localisation</h4>
                        <!--    <div class="map-holder">
                            <div class="google-map-canvas" id="map-canvas" style="height: 250px;">
                            </div>
                        </div> <!-- /.map-holder -->
                        <div class="contact-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, modi, non ducimus
                                nesciunt
                                in commodi similique aliquam omnis ea at!</p>
                            <span><i class="fa fa-home"></i>850 In luctus justo vel nisi, Duis mattis 10440</span>
                            <span><i class="fa fa-phone"></i>077 060 1199</span>
                            <span><i class="fa fa-envelope"></i>infodz@contact.com</span>
                        </div>
                    </div> <!-- /.col-md-3 -->

                </div> <!-- /.row -->
            </div> <!-- /.container -->
    </div> <!-- /#contact -->
    </form>
    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <p>Copyright &copy; 2022 infodz</p>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="go-top">
                        <a href="#" id="go-top">
                            <i class="fa fa-angle-up"></i>
                            Back to Top
                        </a>
                    </div>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/customja.js"></script>
    <script type="text/javascript">
        function initialize() {
            var mapOptions = {
                scrollwheel: false,
                zoom: 15,
                center: new google.maps.LatLng(36.166071, 6.165479)
            };

            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
        }

        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
                'callback=initialize';
            document.body.appendChild(script);
        }

        window.onload = loadScript;
    </script>
    <script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            myFunction()
        };

        function myFunction() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        }
    </script>

</body>

</html>