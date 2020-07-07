<!DOCTYPE html>

<?php
session_start();
if ( isset($_SESSION['language'] ) ){
    if($_SESSION['language'] == "fr"){
        require "./language/french.php";

    } else if($_SESSION['language'] == "en") {
        require "./language/english.php";
    }
} else {
    $_SESSION['language'] = "fr";
    require "./language/french.php";
}



?>
<html lang="fr">

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Driv'N Cook</title>

    <!-- BOOTSTRAP -->
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/new-age.min.css">
    <script src="../js/geolocationLogin.js"></script>
</head>

<body id="page-top" class="d-flex flex-column">

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="../img/logo2.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Driv'N Cook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active mx-5">
                    <a class="nav-link" href="register.php"> <?php echo $text_register; ?><span class="sr-only">(current)</span> </a>
                </li>
                <li class="nav-item active mx-5">
                    <a class="nav-link" onclick="getLocationLogin()" > <?php echo $text_login; ?> <span class="sr-only">(current)</span> </a>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $text_lang; ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="./language/changeLanguage.php?lang=fr" style="color: #E36F65"><?php echo $text_french_btn ?></a>
                            <a class="dropdown-item" href="./language/changeLanguage.php?lang=en" style="color: #E36F65"><?php echo $text_english_btn ?></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


