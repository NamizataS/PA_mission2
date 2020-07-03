<?php
require 'header_homepage.php';


?>

<div id="page-content">
    <div class="container text-center">
        <div id="maPosition"></div>
        <button class="btn btn-primary" id="locationButton">Get Location</button>
    </div>
</div>

<script src="../js/localisation.js"></script>

<?php
$doc = new DOMDocument();
$doc->validateOnParse=true;
$position = $doc->getElementById('maPosition')->nodeValue;
echo $position;
?>

<?php
require 'footer_homepage.php' ?>
