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
    echo "Ajout effectué";
    header("Location: login.php");
}
?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto">
                <div class="card card-register mx-auto mt-5" style="background-color: inherit">
                    <input type=button onclick=window.location.href='index.php' value="<?php echo $text_return_home; ?>"/>
                    <div class="card-header">
                        <h1 class="text-center"><?php echo $text_create; ?></h1>
                    </div>

                    <div class="card-body">
                        <form method="post" action="register.php">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="lastname"><?php echo $text_lastname; ?></label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="firstname"><?php echo $text_firstname; ?></label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birthdate"><?php echo $text_birthdate; ?></label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate">
                                    <small id="birthdateHelp" class="form-text text-muted"><?php echo $text_birthdate_format; ?></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email"><?php echo $text_email; ?></label>
                                    <input type="email" class="form-control" id="email" name="email"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password"><?php echo $text_password; ?></label>
                                    <input type="password" class="form-control" id="password" name="password"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="num">N°</label>
                                    <input type="text" class="form-control" id="num" name="num"/>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="street"><?php echo $text_street; ?></label>
                                    <input type="text" class="form-control" id="street" name="street"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="postcode"><?php echo $text_postcode; ?></label>
                                    <input type="text" class="form-control" id="postcode" name="postcode"/>
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="city"><?php echo $text_city; ?></label>
                                    <input type="text" class="form-control" id="city" name="city"/>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-outline btn-xl" value="<?php echo $text_submit; ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php
require 'footer_homepage.php'
?>
