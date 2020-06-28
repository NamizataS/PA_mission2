<!DOCTYPE html>

<?php
session_start();
if($_SESSION['language'] == "fr"){
    require "../language/french.php";

} else if($_SESSION['language'] == "en") {
    require "../language/english.php";
}


?>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Driv'N Cook</title>

    <!-- BOOTSTRAP -->
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    <script src="https://kit.fontawesome.com/ea8eff44b6.js" crossorigin="anonymous"></script>

    <style>
        .add-cart {
            text-align: center;
            opacity: 0;
            background-color: gray;
            cursor: pointer;
        }

        .item:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .item:hover .add-cart {
            bottom: 50px;
            opacity: 1;
            padding: 10px;
        }


        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .table {
            margin-top: 0px;
        }

        .products {
            align-items: center;
        }

        .basketTotalContainer{
            display: flex;
            justify-content: flex-end;
            width: 100%;
            padding: 10px 0;
        }

        .basketTotalTitle{
            width: 30%;
        }

        .basketTotal {
            width: 10%;
        }


    </style>
</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFE5A8">
    <div class="container">
        <a class="navbar-brand" href="index_client.php" style="color: #E36F65">
            <img src="../../img/logo2.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Driv'N Cook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active mx-5">
                    <a class="nav-link" href="availableTruck.php" style="color: #E36F65"> <?php echo "Liste des truck à proximité"; ?></a>
                </li>
                <li class="nav-item active mx-5">
                    <a class="nav-link" href="clientProfil.php" style="color: #E36F65"> <?php echo "Profil"; ?> </a>
                </li>
                <li class="nav-item active mx-5 cart" id="cart" style="margin-top: 1%">
                    <span style="margin-left: 5px">0</span>
                    <a href="cart.php">
                        <i class="fas fa-cart-plus"></i>
                    </a>
                </li>

                <li class="nav-item active mx-5 logout" style="margin-top: 2%">
                    <a href="logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown languageBtn">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #E36F65">
                            <?php echo $text_lang; ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="../language/changeLanguage.php?lang=fr" style="color: #E36F65"><?php echo $text_french_btn ?></a>
                            <a class="dropdown-item" href="../language/changeLanguage.php?lang=en" style="color: #E36F65"><?php echo $text_english_btn ?></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>



