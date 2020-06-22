<?php
require 'header_client.php';
require '../functions.php';
require '../../js/store.js'
?>

<div class="container">
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
        <input type="button" onclick=window.location.href='paymentForm.php' value="<?php echo $text_order; ?>">
    </div>
</div>

<script src="../../js/store.js"></script>

<?php
require 'footer_client.php';
?>