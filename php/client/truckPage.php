<?php
require "header_client.php";
require '../functions.php';

$franchiseid = $_GET['franchiseid'];
?>
<div class="hero-wrap big-hero-wrap" id="page-content" style="background-color: #E36F65">
    <br/>
    <div class="container" style="background-color: #FFE5A8">
        <br/>
            <?php

            $db = connectDB();
            $stmt = $db->query('SELECT * FROM recipe WHERE franchiseid='.$franchiseid);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $image_src = "../../img".$row['image_name'];
                if ( $row['quantity'] > 0 ) {
                    ?>

                    <div class="card mb-3 item border-warning" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo $row['image_des']; ?>" class="card-img-top proddes"
                                     name="productDesc"/>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-center" id="name"><?php echo $row['name']; ?></h5>
                                    <h6 class="card-body"> <?php echo $row['description'] ?></h6>
                                    <h6 class="card-body price"> <?php echo $row['price'] . "€"; ?></h6>
                                    <span class="quantity"
                                          style="visibility:hidden"> <?php echo $row['quantity']; ?></span>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="add-cart"><i class="fas fa-cart-plus"></i></a>
                    </div>
                    <?php
                }
                    ?>
                <br/>

                <?php

            }
            ?>
    </div>
</div>
<script src="../../js/store.js" async></script>

<?php
require 'footer_client.php';
?>



