<?php
require "header_client.php";
require "../functions.php";
$user = getUserByEmail( $_SESSION['mail']);

$eventAvailable = 0;

$county = intval($user['postcode']);
$county = $county / 1000;
$county = intval($county);

$userId = $_SESSION['id'];

$db = connectDB();

if(isset($_GET['participateEvent'])){

    $eventParticipation = $_GET['participateEvent'];

    $query2 = $db->prepare(" INSERT INTO participate ( client_id, event_id, participate)
                                                VALUES (  :client_id, :event_id, :participate ) ");

    $query2->execute([
        "client_id" => $userId,
        "event_id" => $eventParticipation,
        "participate" => 0
    ]);

    $query1 = $db->query("SELECT * FROM event WHERE id=" . $eventParticipation);
    $amount = 0;
    while ($row2 = $query1->fetch(PDO::FETCH_ASSOC)) {
        $amount = intval(['guest']);
    }
    $amount += 1;

    $db->query('UPDATE event SET guest='. $amount .' WHERE id =' . $eventParticipation);

}

if(isset($_GET['deleteParticipation'])){

    $deleteParticipation = $_GET['deleteParticipation'];

    $db->query('UPDATE participate SET participate=1 WHERE event_id =' . $eventParticipation .' AND client_id=' . $userId);

    $query1 = $db->query("SELECT * FROM event WHERE id=" . $deleteParticipation);
    $amount = 0;
    while ($row2 = $query1->fetch(PDO::FETCH_ASSOC)) {
        $amount = intval(['guest']);
    }
    $amount -= 1;

    //$db->query('UPDATE event SET guest='. $amount .' WHERE id =' . $deleteParticipation);

}

$query = $db->query("SELECT * FROM event");
?>

<div class="hero-wrap hero-wrap-big">
    <br/>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <?php



            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo "<br/>";
                $postcode = intval($row['postcode']);
                $postcode = $postcode / 1000;
                $postcode = intval($postcode);
                if($postcode == $county && $row['id'] != NULL && $row['deleted'] == 0) {
                    ?>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <div>
                                <?php
                                echo $text_theme . " : <br/> ";
                                echo $row['theme'];
                                echo $text_event_location . " : <br/> ";
                                echo $row['street'] . ", " . $row['postcode'] . ", " . $row['city'];
                                echo $text_event_date . " : <br/> ";
                                echo $row['date'];
                                ?>
                            </div>
                            <a href="eventPage.php?eventid=<?php echo $row['id']?>"><input type="submit" name="seeMore" class="btn btn-primary" value="<?php echo $text_see_more ?>"/></a>

                        </div>
                    </div>

                    <?php
                    $eventAvailable++;
                }
            }

            echo $text_deleted_event;
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo "<br/>";
                if ($postcode == $county && $row['id'] != NULL && $row['deleted'] == 1) {
                    ?>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <div>
                                <?php
                                echo $text_theme . " : <br/> ";
                                echo $row['theme'] . "<br/> ";
                                echo $text_event_location . " : <br/> ";
                                echo $row['street'] . ", " . $row['postcode'] . ", " . $row['city'] . "<br/> ";
                                echo $text_event_date . " : <br/> ";
                                echo $row['date'] . "<br/> ";
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            if($eventAvailable == 0){
                echo "<br/>" . $text_no_event ;
            } ?>
        </div>
    </div>
</div>

<script src="../../js/store.js"></script>
