<?php
require 'header_client.php';
require '../functions.php';
?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto text-center">
                <div class="card card-register mx-auto mt-5" style="background-color: inherit">
                    <div class="card-header">
                        <h1 class="text-center"><?php echo $text_purchase; ?></h1>
                    </div>

                    <div class="card-body">
                        <table class="table-striped">
                            <thead>
                            <tr>
                                <th><?php echo $text_amount; ?></th>
                                <th><?php echo $text_date; ?></th>
                            </tr>
                            </thead>

                            <?php
                            $db = connectDB();
                            $query = $db->query( "SELECT * FROM purchase WHERE clientid=".$_SESSION['ID']);
                            while ( $row = $query->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $row['amount'].'€'; ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                </tr>
                                </tbody>
                                <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
