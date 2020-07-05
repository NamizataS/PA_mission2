<?php
require "header_client.php" ;
require "../functions.php";
?>

<?php
$eventId = $_GET['event'];
?>

<div class="hero-wrap hero-wrap-big" style="background-image: url('../../img/bg_1.jpg');">
    <div class="new-overlay"></div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="alert alert-success" role="alert" style="margin-top: 50px;">
        <p>
            <?php echo $text_confirm_unsuscribe_event ?>
        </p>
        <p>
            <a href="listOfEvents.php?deleteParticipation=<?php echo $eventId; ?>">
                <input type="submit" name="yes" class="btn btn-primary" value="<?php echo $text_yes?>"/>
            </a>
            <a href="listOfEvents.php">
                <input type="submit" name="no" class="btn btn-primary" value="<?php echo $text_no?>"/>
            </a>
        </p>

    </div>
</div>

<?php
require 'footer_franchise.php';
?>

