<?php

require 'functions.php';

if ( isset($_GET['lat']) && isset($_GET['lng']) ){
    $lat = $_GET['lat'];
    $lon = $_GET['lng'];
}
$query = ''.$lat.','.$lon;
$geocoder = new \OpenCage\Geocoder\Geocoder('0a056a691dd14afc9a3ef1cbcbfedec1');
try {
    $result = $geocoder->geocode($query);
} catch (Exception $e) {
    echo 'fail';
}
if( isset($_POST['checkLogin'])) {
    if ( $_POST['mail'] == NULL && $_POST['password'] == NULL ){
        echo 'Mauvais identifiant ou mot de passe !';
    }
    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        echo 'Email invalide';
    }

    $user = getUserByEmail( $_POST['mail']);
    if ($user && $user['password'] === cryptPassword($_POST['password'])) {
        $_SESSION['mail'] = $user['email'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['firstname'] = $user['firstname'];
        //$_SESSION['userPostcode'] = $user['postcode'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['language'] = "fr";

        $postcode = intval($result['results'][0]['components']['postcode']/1000);
        $_SESSION['postcode'] = $postcode;

        header( "Location: ./client/availableTruck.php?lang=fr");
    }
    else {
        session_destroy();
        echo 'Identifiants invalides';
    }

}
