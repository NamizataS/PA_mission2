<?php
session_start();
require '../functions.php';
require 'header_client.php';

$db = connectDB();
$query = $db->prepare("INSERT INTO purchase(ID,amount, date, client_id) VALUES (NULL,:amount, :date, :client_id)");
$query->execute( [
        "amount"=>$_GET['total'],
        "date"=>date("Y-m-d"),
        "client_id"=>$_SESSION['id']
]);
?>


<script>
    localStorage.clear();
</script>
<div>
    <?php
       // echo $text_successful_payment;
    ?>
</div>
