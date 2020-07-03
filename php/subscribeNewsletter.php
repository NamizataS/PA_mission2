<?php
require 'functions.php';
require 'newsletter/newsletter.php';

if ( isset($_POST["name"]) && isset( $_POST["email"] ) ){
    $db = connectDB();
    $query = $db->prepare("INSERT INTO newsletter(email,name,date) VALUES (:email,:name,:date)");
    $query->execute([
        "email"=>$_POST["email"],
        "name"=>$_POST["name"],
        "date"=>date("Y-m-d")
    ]);
    //sendNewsletter($_POST["email"]);
    ob_start();
    header('Location: index.php');
    ?>
    <center>
        <b>
            <?php
            echo $text_success_add;
            ?>
        </b>
    </center>

    <?php
}



