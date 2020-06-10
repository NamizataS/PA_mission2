<?php

session_start();
require '../functions.php';
require 'header_client.php';
?>
<div>
    <form action="payment.php" id="paymentForm" method="post">
        <div>
            <input type="text" name="name" placeholder="name" required value="test"/>
        </div>
        <div>
            <input type="email" name="email" placeholder="email" required value="test@test.com"/>
        </div>
        <div>
            <input type="text" placeholder="Votre code de carte bleu" data-stripe="number" required value="4242 4242 4242 4242"/>
        </div>
        <div>
            <input type="text" placeholder="MM" data-stripe="exp_month" required value="10"/>
        </div>
        <div>
            <input type="text" placeholder="YY" data-stripe="exp_year" required value="21"/>
        </div>
        <div>
            <input type="text" placeholder="CVC" data-stripe="cvc" required value="123"/>
        </div>
        <p>
            <button type="submit" class="button">Acheter</button>
        </p>

    </form>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    Stripe.setPublishableKey('pk_test_51GrTSyGkPfKmwVQII3Zljyz7EglR7NHiAfoNqJdQiIXEIlltchHMBVRN7peXTyT3M0mRMfyWJzsSQ3eLwuTNvCdS00l5thmuLY')

    let $form = $('#paymentForm')

    $form.submit(function (e) {
        e.preventDefault();
        $form.find('.button').attr('disabled', true);
        Stripe.card.createToken($form, function (status, response){
            if (response.error){
                $form.find('.message').remove();

                $form.prepend('<div class="error"> ' + response.error.message + ' </div>');
            } else {
                let token = response.id;

                $form.append($('<input type="hidden" name="stripeToken">').val(token));
                $form.get(0).submit();
            }
        })
    })
</script>

<?php
require '../footer_homepage.php';
?>