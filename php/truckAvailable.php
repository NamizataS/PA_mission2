<?php
require '../vendor/autoload.php';
require 'functions.php';
require 'header_homepage.php';

if ( isset($_GET['lat']) && isset($_GET['lng']) ){
    $lat = $_GET['lat'];
    $lon = $_GET['lng'];
}
$query = ''.$lat.','.$lon;
$geocoder = new \OpenCage\Geocoder\Geocoder('0a056a691dd14afc9a3ef1cbcbfedec1');
try {
    $result = $geocoder->geocode($query);
} catch (Exception $e) {
    echo 'fail';
}
$postcode = intval($result['results'][0]['components']['postcode']/1000);
$db = connectDB();
$query = $db->query('SELECT * FROM truck');
$count = 0;
?>
<section class="masthead">
    <div class="container">
        <div class="card card-group mx-auto">
            <?php
            while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                $truckPostcode = intval( $row['postcode']/1000 );
                if ( $postcode == $truckPostcode && $row['franchise_id'] != null ){
                    ?>
                    <div class="row">
                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <img src="../img/foodtruck.jpg" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <a href="../php/client/truckPage.php?franchiseid=<?php echo $row['franchise_id']?>"><input type="submit" name="seeMore" class="btn btn-primary" value="<?php echo $text_see_more ?>"/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                }
            }
            if ( $count == 0 ){
                ?>
                <div class="alert alert warning" role="alert">
                    <?php echo "<br/>" . $text_no_truck ; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
require 'footer_homepage.php';