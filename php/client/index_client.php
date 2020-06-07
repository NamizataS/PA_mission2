<?php
session_start();
require '../functions.php';
?>

<?php
$db = connectDB();
$query = $db->query( "SELECT * FROM client WHERE email='".$_SESSION['mail']."'");
while ($smtm = $query->fetch(PDO::FETCH_ASSOC )){
    echo '<img src="data:image/png;base64,'.base64_encode( $smtm['barcode'] ).'"/>'; 
}
?>

<?php
require '../footer_homepage.php';


