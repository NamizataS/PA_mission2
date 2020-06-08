<?php
require "header_client.php";
require '../functions.php';

$truckId = $_GET['truckId'];

$db = connectDB();
$stmt = $db->query('SELECT * FROM recipe WHERE franchiseid='.$truckId);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="card" style="width: 18rem">
        <img src ="<?php echo $row['image_des'];?>" class="card-img-top"/>
        <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['name']; ?></h5>
            <h6 class="card-body"> <?php echo $row['description'] ?></h6>
            <h6 class="card-body"> <?php echo $row['price']."€"; ?></h6>
        </div>
    </div>
<?php

}

