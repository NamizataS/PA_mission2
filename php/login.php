<?php
require 'header_homepage.php';
?>
<?php
require 'functions.php';
?>

<?php
session_start();
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
        $_SESSION['language'] = "fr";
        header( "Location: ./client/index_client.php?lang=fr");
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
        <div class="card card-register mx-auto mt-5" style="background-color: #FFE5A8">
            <input type=button onclick=window.location.href='index.php' value="<?php echo $return_home; ?>"/>
            <div class="card-header">
                <h1 class="text-center"><?php echo $connexion_sentence; ?></h1>
            </div>

            <div class="card-body">
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="email"><?php echo $email; ?></label>
                        <input type="email" name="mail" class="form-control" id="mail" aria-describedby="mail"/>
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo $password; ?></label>
                        <input type="password" name="password" class="form-control" id="password"/>
                    </div>
                    <button type="submit" name="checkLogin" class="btn btn-outline-primary"><?php echo $connexion; ?> </button>
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
