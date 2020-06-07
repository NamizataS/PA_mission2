<?php
require "header_client.php";
require "../functions.php";

session_start();
$user = getUserByEmail( $_SESSION['mail']);

$truckAvailable = 0;

$county = intval($user['postcode']);
$county = $county / 1000;
$county = intval($county);


$_SESSION['userPostcode'] = $county;
echo "county : " . $county;

$db = connectDB();
$query = $db->query("SELECT * FROM truck");

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo "<br/>";
    $postcode = intval($row['postcode']);
    $postcode = $postcode / 1000;
    $postcode = intval($postcode);
    if($postcode == $county && $row['franchise_id'] != NULL) {
        echo "success & truck id : " . $row['id'] . " & postcode : " . $postcode;
        ?>
        <a href="truckPage.php?truckId=<?php echo $row['id']?>"><input type="submit" name="seeMore" class="btn btn-primary" value="See more"/></a>
        <?php
        $truckAvailable++;
    } else {
        echo "fail & truck id : " . $row['id'] . " & postcode : " . $postcode;

    }

}

if($truckAvailable == 0){
    echo "<br/> Sorry we don't have any truck selling food in your area :(";
}