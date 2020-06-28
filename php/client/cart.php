<?php
require 'header_client.php';
require '../functions.php';
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
        <div class="px-md-5">
            <input type="button" onclick=window.location.href='#' value="<?php echo $text_order; ?>">
        </div>
    </div>
</div>

<script src="../../js/store.js"></script>

<?php
require 'footer_client.php';
?>