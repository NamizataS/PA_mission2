<?php
    session_start();

    if(isset($_GET['lang'])){
        $_SESSION['language'] = $_GET['lang'];
    } else {
        $_SESSION['language'] = "fr";
    }

    header('Location: ../index.php');
