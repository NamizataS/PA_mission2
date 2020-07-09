<?php
require '../functions.php';
require 'header_client.php';

$db = connectDB();
if ( isset($_SESSION['ID'])) {
    $query = $db->prepare("INSERT INTO purchase(ID, amount, date, clientid) VALUES (NULL, :amount, :date, :clientid)");
    $query->execute( [
        "amount"=>$_GET['total'],
        "date"=>date("Y-m-d H:i:s"),
        "clientid"=>$_SESSION['ID']
    ]);
}

?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto">
                <h3 class="section-heading text-center"><?php echo $text_successful_payment; ?></h3>
            </div>
        </div>
    </div>
</header>
<script>
    localStorage.clear();
</script>

