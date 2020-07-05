<?php
require 'conf.inc.php';
$_SESSION['language'] = "fr";
function connectDB(){
    $options= [
        'host='.DB_HOST,
        'port='.DB_PORT,
        'dbname='.DB_NAME

    ];
    try{
        $pdo = new PDO( DB_DRIVER . ':' .join( ';', $options ), DB_USER, DB_PASSWORD );

    }catch(Exception $e){
        die("Erreur SQL : ".$e->getMessage());
    }

    return $pdo;
}

function getUserByEmail( $email ) {
    $db = connectDB();
    $response = $db->query('SELECT * FROM client WHERE email ="'.$email.'"');
    while ( $user = $response->fetch(PDO::FETCH_ASSOC)){
        return $user;
    }
}

function cryptPassword( $password ){
    $salt = 'nvir5T$!dfoz';
    $crypt = $password.$salt;
    $crypt1 = hash('sha512',$crypt);
    return hash('sha1',$crypt1);
}
