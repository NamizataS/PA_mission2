<?php
require "header_client.php";
require '../functions.php';

$eventId = $_GET['eventid'];
$userId = $_SESSION['id'];
?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto">
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
                        $eventDeleted = 0;
                        while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                            if ($row2['event_id'] == $eventId && $row2['deleted'] == 0){
                                $eventFound += 1;
                            } elseif ($row2['event_id'] == $eventId && $row2['deleted'] == 1){
                                $eventDeleted += 1;
                            }
                        }
                        if($eventFound == 0 && $eventDeleted == 0) {
                            ?>
                            <a href="participate.php?event=<?php echo $eventId ?>"
                            <button class="btn btn-lg btn-success btn-block"><?php echo $text_participate ?></button>
                            </a>
                            <?php
                        } elseif ($eventDeleted > 0) {
                            ?>
                            <a href="reparticipate.php?eventUpdate=<?php echo $eventId ?>"
                            <button class="btn btn-lg btn-success btn-block"><?php echo $text_participate ?></button>
                            </a>
                            <?php
                        }elseif ($eventFound > 0) {
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
    </div>
</header>


<?php
require 'footer_client.php';
?>

