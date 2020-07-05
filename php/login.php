<?php
require 'header_homepage.php';
?>
<?php
require 'functions.php';
require '../vendor/autoload.php';
?>

<?php
session_start();
if ( isset($_GET['lat']) && isset($_GET['lng']) ){
    $lat = $_GET['lat'];
    $lon = $_GET['lng'];
}
$query = ''.$lat.','.$lon;
$geocoder = new \OpenCage\Geocoder\Geocoder('0a056a691dd14afc9a3ef1cbcbfedec1');
try {
    $result = $geocoder->geocode($query);
    $postcode = intval($result['results'][0]['components']['postcode']/1000);
} catch (Exception $e) {
    echo 'fail';
}
if( isset($_POST['checkLogin'])) {
    if ( $_POST['mail'] == NULL && $_POST['password'] == NULL ){
        echo 'Mauvais identifiant ou mot de passe !';
    }
    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        echo 'Email invalide';
    }

    $user = getUserByEmail( $_POST['mail']);
    if ($user && $user['password'] === cryptPassword($_POST['password'])) {
        $_SESSION['mail'] = $user['email'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['firstname'] = $user['firstname'];
        //$_SESSION['userPostcode'] = $user['postcode'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['language'] = "fr";
        $_SESSION['postcode'] = $postcode;

        header( "Location: ./client/availableTruck.php?lang=fr");
    }
    else {
        session_destroy();
        echo 'Identifiants invalides';
    }

}

?>

    <div class="hero-wrap-big">
        <br/>
        <br/>
        <br/>

        <div class="container">
            <div class="card card-register mx-auto mt-5">
                <input type=button onclick=window.location.href='index.php' value="<?php echo $text_return_home; ?>"/>
                <div class="card-header">
                    <h1 class="text-center"><?php echo $text_connexion_sentence; ?></h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="login.php?lat=<?php echo $_GET['lat']?>&lng=<?php echo $_GET['lng']?>">
                        <div class="form-group">
                            <label for="email"><?php echo $text_email; ?></label>
                            <input type="email" name="mail" class="form-control" id="mail" aria-describedby="mail"/>
                        </div>
                        <div class="form-group">
                            <label for="password"><?php echo $text_password; ?></label>
                            <input type="password" name="password" class="form-control" id="password"/>
                        </div>
                        <button type="submit" name="checkLogin" class="btn btn-outline-primary"><?php echo $text_connexion; ?> </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <br/>
    <br/>
    <br/>

<?php
require 'footer_homepage.php';
?>