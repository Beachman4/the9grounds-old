<form method="post" id="form">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    Number<input type="text" name="card-number" class="card-number">
    CVC<input type="text" name="card-cvc" class="card-cvc">
    month<input type="text" name="card-expiry-month" class="card-expiry-month">
    year<input type="text" name="card-expiry-year" class="card-expiry-year">
    <input type="submit" value="Submit">
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_lDzTdn3YHXdwQOvzIvTGUUo9');
        /*
         Stripe.card.createToken({
         number: $('.card-number').val(),
         cvc: $('.card-cvc').val(),
         exp_month: $('.card-expiry-month').val(),
         exp_year: $('.card-expiry-year').val()
         }, stripeResponseHandler);
         */
        $("#form").submit(function(event) {
            var $form = $(this);

            Stripe.card.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);

            return false;
        });
        function stripeResponseHandler(status, response) {
            var $form = $('#form');
            if (response.error) {

            } else {
                var token = response.id;
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                $form.get(0).submit();
            }
        }
    </script>
</form>