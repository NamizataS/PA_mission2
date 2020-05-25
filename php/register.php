<?php
require 'header_homepage.php';
require 'functions.php';
?>

<?php
if ( isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['birthdate']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['num']) && isset($_POST['street']) && isset($_POST['postcode']) && isset($_POST['city'])) {
    $db = connectDB();
    $query = $db->prepare("INSERT INTO client (ID, lastname, firstname, birthdate, email, password, num, street, postcode, city)
                                    VALUES ( NULL, :lastname, :firstname, :birthdate, :email, :password, :num, :street, :postcode, :city)");
    $query->execute([
        "lastname"=>$_POST['lastname'],
        "firstname"=>$_POST['firstname'],
        "birthdate"=>$_POST['birthdate'],
        "email"=>$_POST['email'],
        "password"=>cryptPassword($_POST['password']),
        "num"=>$_POST['num'],
        "street"=>$_POST['street'],
        "postcode"=>$_POST['postcode'],
        "city"=>$_POST['city']
    ]);
} else {
    echo "des champs sont manquants";
}
?>

<div class="big-hero-wrap">
    <br/>
    <br/>
    <div class="container">
        <div class="card card-register mx-auto mt-5" style="background-color: #FFE5A8">
            <input type=button onclick=window.location.href='index.php' value="<?php echo $return_home; ?>"/>
            <div class="card-header">
                <h1 class="text-center"><?php echo $create; ?></h1>
            </div>

            <div class="card-body">
                <form method="post" action="register.php">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lastname"><?php echo $lastname; ?></label>
                            <input type="text" class="form-control" id="lastname" name="lastname"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="firstname"><?php echo $firstname; ?></label>
                            <input type="text" class="form-control" id="firstname" name="firstname"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="birthdate"><?php echo $birthdate; ?></label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate">
                            <small id="birthdateHelp" class="form-text text-muted"><?php echo $text_birthdate; ?></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email"><?php echo $email; ?></label>
                            <input type="email" class="form-control" id="email" name="email"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password"><?php echo $password; ?></label>
                            <input type="password" class="form-control" id="password" name="password"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="num">N°</label>
                            <input type="text" class="form-control" id="num" name="num"/>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="street"><?php echo $street; ?></label>
                            <input type="text" class="form-control" id="street" name="street"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="postcode"><?php echo $postcode; ?></label>
                            <input type="text" class="form-control" id="postcode" name="postcode"/>
                        </div>
                        <div class="form-group col-md-7">
                            <label for="city"><?php echo $city; ?></label>
                            <input type="text" class="form-control" id="city" name="city"/>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="<?php echo $submit; ?>">
                </form>
            </div>
        </div>
    </div>
</div>



<?php
require 'footer_homepage.php'
?>
