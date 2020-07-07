<?php
require 'header_homepage.php';


?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-7 my-auto">
                <div class="header-content mx-auto">
                    <h1><?php echo $text_welcome; ?></h1>
                    <button onclick="getLocation()" class="btn btn-outline btn-xl"><?php echo $text_get_started; ?></button>
                    <a href="#infos" class="btn btn-outline btn-xl js-scroll-trigger"><?php echo $text_infos; ?></a>
                </div>
            </div>
            <div class="col-lg-5 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <img src="../img/food1.jpg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

<section class="infos bg-primary text-center" id="infos">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="section-heading"><?php echo $text_about; ?></h2>
                <p><?php echo $text_textAbout; ?></p>
                <img src="../img/carte.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<script src="../js/localisation.js"></script>
<script src="../js/new-age.min.js"></script>
<script src="../js/jquery.easing.min.js"></script>


<?php
require 'footer_homepage.php' ?>

