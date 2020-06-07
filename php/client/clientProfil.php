<?php
require "header_client.php";
require "../functions.php";

session_start();
$userId = $_SESSION['id'];
echo $_SESSION['mail'];

$user = getUserByEmail( $_SESSION['mail']);

echo "id : " . $user['id'];
echo " & postcode : " . $user['postcode'];

echo " test : " . $_SESSION['userPostcode'];