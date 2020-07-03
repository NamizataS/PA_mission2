<?php
require "header_client.php";
require '../functions.php';

$eventId = $_GET['eventid'];
$userId = $_SESSION['id'];
?>

<div class="hero-wrap big-hero-wrap" style="background-color: #E36F65">
    <br/>
    <div class="container" style="
                 background-color: rgba(0, 0, 255, 0);
                 border-style: none;">
        <br/>
        <?php

        $db = connectDB();
        $stmt = $db->query('SELECT * FROM event WHERE id='. $eventId);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>

            <div class="card mb-3 item border-warning" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-center" id="name" ><?php echo $row['name']; ?></h5>
                            <h6 class="card-body"> <?php echo $row['description'] ?></h6>
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
                        </div>
                    </div>
                </div>
                <?php
                //echo "userId = " . $_SESSION['id'];
                $stmt2 = $db->query('SELECT * FROM participate WHERE client_id=' . $userId);

                $eventFound = 0;
                while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    if ($row2['event_id'] == $eventId && $row2['deleted'] == 0){
                        $eventFound += 1;
                    }
                }
                if($eventFound == 0 ||  $row2['deleted'] == 1) {
                    ?>
                    <a href="participate.php?event=<?php echo $eventId ?>"
                        <button class="btn btn-lg btn-success btn-block"><?php echo $text_participate ?></button>
                    </a>
                    <?php
                } elseif ($eventFound > 0) {
                    ?>
                    <a href="unsuscribe.php?event=<?php echo $eventId ?>"
                    <button class="btn btn-lg btn-danger btn-block"><?php echo $text_stop_participate ?></button>
                    </a>
                    <?php
                }
                ?>
            </div>
            <br/>

            <?php

        }
        ?>
    </div>
</div>

<?php
require 'footer_client.php';
?>

