<?php
require '../functions.php';


function sendNewsletter( $email ){
    $db = connectDB();
    $query = $db->query( "SELECT * FROM newsletter WHERE $email='.$email.'" );
    while ( $row = $query->fetch(PDO::FETCH_ASSOC ) ){
        $dest = $row["email"];
        $name = $row["name"];
        $subject = "Nouvelle newsletter";

        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'From: root@drivncook.fr'."\r\n";

        $content = "Bonjour! <br/>".$name.'<br/>';
        $content.="Voici la dernière newsletter::";
        $content.="Au revoir <br/><br/>";

        mail($dest, $subject, $content, $headers );
    }
}

