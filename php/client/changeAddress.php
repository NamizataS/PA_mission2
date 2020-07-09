<?php
require 'header_client.php';
require '../functions.php';
?>

<?php

if ( isset($_POST['num']) && isset($_POST['street']) && isset($_POST['postcode']) && isset($_POST['city'] ) ){
    $db = connectDB();
    $query = $db->query( "UPDATE client SET num='".$_POST['num']."', street='".$_POST['street']."', postcode='".$_POST['postcode']."',
    city='".$_POST['city']."' WHERE ID=".$_SESSION['ID']);
}
?>
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto text-center">
                <div class="card card-register mx-auto mt-5" style="background-color: inherit">
                    <input type=button onclick=window.location.href='clientProfil.php' value='<?php echo $text_index?>'/>
                    <div class="card-header">
                        <h1><?php echo $text_change_address; ?></h1>
                    </div>
                    <div class="card-body">
                        <div class="center">
                            <?php echo $text_new_address; ?>
                        </div>
                        <form action="changeAddress.php" method="post">
                            <div class="form-group">
                                <div class="form-row justify-content-center">
                                    <div class="form-label-group">
                                        <label for="num">N°</label>
                                        <input type="text" class="form-control" id="num" name="num"/>
                                    </div>
                                </div>
                                <div class="form-row justify-content-center">
                                    <div class="form-label-group">
                                        <label for="street"><?php echo $text_street; ?></label>
                                        <input type="text" class="form-control" id="street" name="street"/>
                                    </div>
                                </div>
                                <div class="form-row justify-content-center">
                                    <div class="form-label-group">
                                        <label for="postcode"><?php echo $text_postcode; ?></label>
                                        <input type="text" class="form-control" id="postcode" name="postcode"/>
                                    </div>
                                </div>
                                <div class="form-row justify-content-center">
                                    <div class="form-label-group">
                                        <label for="city"><?php echo $text_city; ?></label>
                                        <input type="text" class="form-control" id="city" name="city"/>
                                    </div>
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
