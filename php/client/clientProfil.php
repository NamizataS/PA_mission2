<?php
require 'header_client.php';
require '../functions.php';
?>

<?php
$db = connectDB();
$query = $db->query( "SELECT * FROM client WHERE email='".$_SESSION['mail']."'");
while ($smtm = $query->fetch(PDO::FETCH_ASSOC )){
    echo '<img src="data:image/png;base64,'.base64_encode( $smtm['barcode'] ).'"/>';
}

$userId = $_SESSION['id'];
echo $_SESSION['mail'];

$user = getUserByEmail( $_SESSION['mail']);

echo "id : " . $user['id'];
echo " & postcode : " . $user['postcode'];

echo " test : " . $_SESSION['userPostcode'];
?>

<script src="../../js/store.js"></script>

<?php
require 'footer_client.php';


