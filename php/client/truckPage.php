<?php
require "header_client.php";
require '../functions.php';

$truckId = $_GET['truckId'];
echo $truckId;
echo " test ";

$db = connectDB();
$stmt = $db->query('SELECT * FROM truck WHERE id='.$truckId);
$stmt -> execute();
$rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row){
    echo "hello : " .$row['id'];
}

echo "HEY";
?>