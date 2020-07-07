<?php

session_start();
require '../functions.php';
require 'header_client.php';
?>

<?php

?>
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 my-auto">
                    <div class="card card-register mx-auto mt-5" style="background-color: inherit">
                        <div class="card-header">
                            <h1 class="text-center"><?php echo $text_card_information; ?></h1>
                        </div>
                        <div class="card-body">
                            <form action="payment.php" id="paymentForm" method="post">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="<?php echo $text_name ?>" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="<?php echo $text_code ?>" data-stripe="number" required /> <?php echo $text_code_format ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="<?php echo $text_month ?>" data-stripe="exp_month" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="<?php echo $text_year ?>" data-stripe="exp_year" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="<?php echo $text_cvc ?>" data-stripe="cvc" required />
                                </div>
                                <p>
                                    <button type="submit" class="btn btn-outline btn-xl"><?php echo $text_pay ?></button>
                                </p>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="../../js/store.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        let newTotalCost = localStorage.getItem( 'totalCost');

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
                    $form.append($('<input type="hidden" name="totalCart">').val(newTotalCost));
                    $form.get(0).submit();
                }
            })
        })
    </script>

<?php
require '../footer_homepage.php';
?>