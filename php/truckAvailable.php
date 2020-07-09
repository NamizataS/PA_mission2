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

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto">
                <div class="card card-group mx-auto" style="background-color: inherit">
                    <?php
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                        $truckPostcode = intval( $row['postcode']/1000 );
                        if ( $postcode == $truckPostcode && $row['franchise_id'] != null && $row['name'] != null){
                            ?>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem;background-color: inherit">
                                        <img src="../img/foodtruck.jpg" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title truckName"><?php echo $row['name']; ?></h5>
                                            <a href="#" class="truckPage"><input type="submit" name="seeMore" class="btn btn-primary" value="<?php echo $text_see_more ?>"/></a>
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
        </div>
    </div>
</header>


<script>
    let trucks = document.querySelectorAll('.truckPage');
    for ( let i = 0; i < trucks.length; i++ ){
        trucks[i].addEventListener( 'click', ()=> {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Vous devez être connecté pour voir la carte',
                footer: '<a href="login.php?lat=<?php echo $lat?>&lon=<?php echo $lon?>">Se connecter</a> ' +
                    '\\' +
                    ' <a href="register.php">Créer un compte</a>'
            });
        });
    }

</script>

<?php
require 'footer_homepage.php';