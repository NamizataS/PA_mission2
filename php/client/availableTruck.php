<?php
require "header_client.php";
require "../functions.php";
$user = getUserByEmail( $_SESSION['mail']);

$truckAvailable = 0;

$county = intval($user['postcode']);
$county = $county / 1000;
$county = intval($county);




?>
<div class="hero-wrap hero-wrap-big">
    <br/>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <?php
$db = connectDB();
$query = $db->query("SELECT * FROM truck");

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo "<br/>";
    $postcode = intval($row['postcode']);
    $postcode = $postcode / 1000;
    $postcode = intval($postcode);
    if($postcode == $county && $row['franchise_id'] != NULL) {
        ?>
    <div class="card" style="width: 18rem;">
        <img src="../../img/foodtruck.jpg" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?></h5>
            <a href="truckPage.php?franchiseid=<?php echo $row['franchise_id']?>"><input type="submit" name="seeMore" class="btn btn-primary" value="See more"/></a>

        </div>
    </div>

        <?php
        $truckAvailable++;
    }
}

if($truckAvailable == 0){
    echo "<br/> Sorry we don't have any truck selling food in your area :(";
} ?>
        </div>
    </div>
</div>

<script src="../../js/store.js"></script>




