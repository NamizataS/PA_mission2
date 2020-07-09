<?php
require 'header_client.php';
require '../functions.php';

if (isset($_POST['oldPwd']) && isset($_POST['newPwd']) && isset($_POST['newPwdConf'])){
    $db = connectDB();
    $user = getUserByEmail($_SESSION['mail']);
    if ($user){
        if ( $user['password'] === cryptPassword( $_POST['oldPwd'] ) ){
            if ( $_POST['newPwd'] === $_POST['newPwdConf'] ){
                $query = $db->query( "UPDATE client SET password = '".cryptPassword($_POST['newPwd'])."' WHERE ID =".$user['ID']);
            }
            ?>
            <center>
                <b>
                    <?php
                    echo $text_added;
                    ?>
                </b>
            </center>
            <?php
        } else {
            ?>
            <center>
                <b>
                    <?php
                    echo $text_different;
                    ?>
                </b>
            </center>
            <?php
        }
} else {
?>
<center>
    <b>
        <?php
        echo $text_old_different;
        ?>
    </b>
</center>
<?php
        }
    }

?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto text-center">
                <div class="card card-register mx-auto mt-5" style="background-color: inherit">
                    <input type=button onclick=window.location.href='clientProfil.php' value='<?php echo $text_index?>'/>
                    <div class="card-header">
                        <h1><?php echo $text_change_pwd ?></h1>
                    </div>
                    <div class="card-body">
                        <div align="center">
                            <?php echo $text_old_pwd ?>
                        </div>
                        <form method="POST" action="changePwd.php">
                            <div class="form-group">
                                <div class="form-row justify-content-center">
                                    <div class="form-label-group">
                                        <input type="password" class="form-control" name="oldPwd" id="oldPwd"/>
                                    </div>
                                </div>
                                <div align="center">
                                    <?php echo $text_new_pwd_ask ?>
                                </div>
                                <div class="form-row justify-content-center" style="margin-top: 1%">
                                    <div class="form-label-group">
                                        <input type="password" class="form-control" name="newPwd" id="newPwd"/>
                                    </div>
                                </div>
                                <div align="center">
                                    <?php echo $text_new_pwd_confirm ?>
                                </div>
                                <div class="form-row justify-content-center" style="margin-top: 1%">
                                    <div class="form-label-group">
                                        <input type="password" class="form-control" name="newPwdConf" id="newPwdConf"/>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 3%">
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="<?php echo $text_submit ?>"/>
                            </div>
                            <div style="margin-top: 1%">
                                <a href="clientProfil.php">
                                    <button class="btn btn-lg btn-danger btn-block"><?php echo $text_cancel ?></button>
                                </a>
                            </div>
                        </form>
</div>
                    </div>
            </div>
        </div>
    </div>
</header>
