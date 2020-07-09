<?php
require "header_client.php";
require '../functions.php';

$franchiseid = $_GET['franchiseid'];
?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 my-auto">
                <?php
                $db = connectDB();
                $stmt = $db->query('SELECT * FROM recipe WHERE franchiseid='.$franchiseid);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $image_src = "../../img".$row['image_name'];
                    ?>

                    <div class="card mb-3 item border-warning" style="max-width: 540px;background-color: inherit">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src ="<?php echo $row['image_des'];?>" class="card-img-top proddes" name="productDesc"/>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-center" id="name" ><?php echo $row['name']; ?></h5>
                                    <h6 class="card-body"> <?php echo $row['description'] ?></h6>
                                    <h6 class="card-body price"> <?php echo $row['price']."€"; ?></h6>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="add-cart"><i class="fas fa-cart-plus"></i></a>
                    </div>
                    <br/>

                    <?php

                }
                ?>
            </div>
        </div>
    </div>
</header>

<div class="hero-wrap big-hero-wrap" style="background-color: #E36F65">
    <br/>
    <div class="container" style="background-color: #FFE5A8">
        <br/>

    </div>
</div>
<script src="../../js/store.js" async></script>

<?php
require 'footer_client.php';
?>



