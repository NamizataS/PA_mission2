<?php
require "header_client.php";
require "../functions.php";
$user = getUserByEmail( $_SESSION['mail']);

$truckAvailable = 0;

$county = $_SESSION['postcode'];





?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto">
                <div class="card card-group mx-auto" style="background-color: inherit">
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
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem;background-color: inherit">
                                        <img src="../../img/foodtruck.jpg" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                            <a href="../../php/client/truckPage.php?franchiseid=<?php echo $row['franchise_id']?>"><input type="submit" name="seeMore" class="btn btn-outline btn-xl" value="<?php echo $text_see_more ?>"/></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $truckAvailable++;
                        }
                    }

                    if($truckAvailable == 0){
                        echo "<br/>" . $text_no_truck ;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</header>

<script src="../../js/store.js"></script>

<?php
require 'footer_client.php';
?>
