<?php
require 'header_client.php';
require '../functions.php';
?>

<div>
    <div>
        <h1><?php echo $text_profil?> :</h1>
    </div>
    <div>
    <?php
    $db = connectDB();
    $query = $db->query( "SELECT * FROM client WHERE email='".$_SESSION['mail']."'");
    while ($smtm = $query->fetch(PDO::FETCH_ASSOC )){
        echo '<img src="data:image/png;base64,'.base64_encode( $smtm['barcode'] ).'"/>';
    }

    $userId = $_SESSION['id'];

    $user = getUserByEmail( $_SESSION['mail']);

    echo "<br/>" . $text_lastname . " : " . $user['lastname'] . "<br/>";
    echo $text_firstname . " : " . $user['firstname'] . "<br/>";
    echo $text_birthdate . " : " . $user['birthdate'] . "<br/>";
    echo $text_address . " : " . $user['num'] . " " . $user['street'] . ", " . $user['postcode'] . ", " . $user['city'] . "<br/>";
    ?>
    </div>
</div>
<script src="../../js/store.js"></script>

<?php
require 'footer_client.php';


