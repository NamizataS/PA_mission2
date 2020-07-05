<?php

session_start();
require '../functions.php';
require 'header_client.php';
?>

<?php

?>
<div>
    <?php echo $text_card_information ?>
    <form action="payment.php" id="paymentForm" method="post">
        <div>
            <input type="text" name="name" placeholder="<?php echo $text_name ?>" required />
        </div>
        <div>
            <input type="text" placeholder="<?php echo $text_code ?>" data-stripe="number" required /> <?php echo $text_code_format ?>
        </div>
        <div>
            <input type="text" placeholder="<?php echo $text_month ?>" data-stripe="exp_month" required />
        </div>
        <div>
            <input type="text" placeholder="<?php echo $text_year ?>" data-stripe="exp_year" required />
        </div>
        <div>
            <input type="text" placeholder="<?php echo $text_cvc ?>" data-stripe="cvc" required />
        </div>
        <p>
            <button type="submit" class="button"><?php echo $text_pay ?></button>
        </p>

    </form>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    let totalCost = localStorage.getItem( 'totalCost');

    Stripe.setPublishableKey('pk_test_51GrTSyGkPfKmwVQII3Zljyz7EglR7NHiAfoNqJdQiIXEIlltchHMBVRN7peXTyT3M0mRMfyWJzsSQ3eLwuTNvCdS00l5thmuLY')

    let $form = $('#paymentForm')

    $form.submit(function (e) {
        e.preventDefault();
        //$form.find('.button').attr('disabled', true);
        Stripe.card.createToken($form, function (status, response){
            if (response.error){
                $form.find('.message').remove();

                $form.prepend('<div class="error"> ' + response.error.message + ' </div>');
            } else {
                let token = response.id;
                //console.log("total", totalCost);
                $form.append($('<input type="hidden" name="stripeToken">').val(token));
                $form.append($('<input type="hidden" name="totalCart">').val(totalCost));
                $form.get(0).submit();
            }
        })
    })
</script>

<?php
require '../footer_homepage.php';
?>