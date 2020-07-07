<?php
require 'header_client.php';
require '../functions.php';
?>


    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="products-container">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><?php echo $text_product; ?></th>
                                <th><?php echo $text_price; ?></th>
                                <th><?php echo $text_quantity; ?></th>
                                <th><?php echo $text_total; ?></th>
                            </tr>
                            </thead>
                            <tbody class="products"></tbody>
                        </table>
                        <div class="mx-auto">
                            <a class="btn btn-outline btn-xl" href="paymentForm.php" role="button"><?php echo $text_order; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="container">

</div>

<script src="../../js/store.js"></script>

<?php
require 'footer_client.php';
?>