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

    $query2 = $db->prepare(" INSERT INTO participate ( client_id, event_id, deleted)
                                                VALUES (  :client_id, :event_id, :deleted ) ");

    $query2->execute([
        "client_id" => $userId,
        "event_id" => $eventParticipation,
        "deleted" => 0
    ]);

    $query1 = $db->query("SELECT * FROM event WHERE id=" . $eventParticipation);
    $amount = 0;
    while ($row2 = $query1->fetch(PDO::FETCH_ASSOC)) {
        $amount = intval($row2['guest']);
    }
    $amount += 1;

    $db->query('UPDATE event SET guest='. $amount .' WHERE id =' . $eventParticipation);

}

if(isset($_GET['eventUpdate'])){
    echo "congrat :" . $_GET['eventUpdate'] . ".";
    $eventUpdate = $_GET['eventUpdate'];

    $db->query('UPDATE participate SET deleted=0 WHERE client_id=' . $userId . " AND event_id=" . $eventUpdate);

    $query3 = $db->query("SELECT * FROM event WHERE id=" . $eventUpdate);
    $amount = 0;
    while ($row4 = $query3->fetch(PDO::FETCH_ASSOC)) {
        $amount = intval($row4['guest']);
    }
    $amount += 1;

    $db->query('UPDATE event SET guest='. $amount .' WHERE id =' . $eventUpdate);

}

if(isset($_GET['deleteParticipation'])){

    $deleteParticipation = $_GET['deleteParticipation'];

    $db->query('UPDATE participate SET deleted=1 WHERE client_id=' . $userId . " AND event_id=" . $deleteParticipation);

    $query2 = $db->query("SELECT * FROM event WHERE id=" . $deleteParticipation);
    $amount = 0;
    while ($row3 = $query2->fetch(PDO::FETCH_ASSOC)) {
        $amount = intval($row3['guest']);
    }
    $amount -= 1;

    $db->query('UPDATE event SET guest='. $amount .' WHERE id =' . $deleteParticipation);

}

$query = $db->query("SELECT * FROM event");
?>

<div class="hero-wrap hero-wrap-big">
    <br/>
    <div class="container">
        <div class="card card-register mx-auto mt-5"
             style="
                 background-color: rgba(0, 0, 255, 0);
                 border-style: none;"
        >
            <h4> <?php echo $text_list_event ; ?> </h4>
            <?php echo "Test :" . $_GET['eventUpdate']. "." ; ?>
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
