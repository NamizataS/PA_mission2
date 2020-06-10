<?php
session_start();
$token = $_POST['stripeToken'];
$name = $_POST['name'];
$mail = $_SESSION['mail'];
//need to recup amount of bill to add it in $charge

if (filter_var($mail,FILTER_VALIDATE_EMAIL)
    && !empty($name)
    && !empty($token )) {

    require('Stripe.php');

    $stripe = new Stripe('sk_test_51GrTSyGkPfKmwVQISAo4zL8RqXmRacj1dBXGTKtKr1SJlpcnDeio72oqbcNmos1RahEb4PL5oo9mo3d0aZWyujqw00VDDQdeB3');
    $customer =  $stripe->api('customers', [
        'source' => $token,
        'description' => $name,
        'email' => $mail
    ]);

    // amount in cents
    $charge = $stripe->api('charges', [
        'amount' => 1000,
        'currency' => 'eur',
        'customer' => $customer->id
    ]);

    //var_dump($charge);
    header( "Location: successfulPayment.php");
}