@extends('layouts.weblayout')
@section('content')
<style type="text/css">
.panel-title {
    display: inline;
    font-weight: bold;
}

.display-table {
    display: table;
}

.display-tr {
    display: table-row;
}

.display-td {
    display: table-cell;
    vertical-align: middle;
    width: 61%;
}
</style>
<section id="adoption" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Purchase Puppy</h1>
        </div>
    </div>
</section>
<section class="services-3" style="margin-top: -10%;">
    <div class="container">
        <div class="text-center mt-1" style="color: red;">
            @if($errors->any())
            {{ implode('', $errors->all(':message')) }}
            @endif
        </div>
        <div class="row">

            <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="username">Username</label>
                            <input type="name" class="form-control" id="username" name="username"
                                placeholder="John Abraham" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Phone No</label>
                            <input type="phone" class="form-control" id="phone" name="phone" placeholder="" required="">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"
                            required="">
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St"
                            required="">
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="address">Country</label>
                            <input type="country" class="form-control" name="country" id="country"
                                placeholder="United State" required="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="address">State</label>
                            <input type="state" class="form-control" id="state" name="state" placeholder="California"
                                required="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="zipcode" id="zip" placeholder="" required="">
                        </div>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment</h4>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input autocomplete='off' class='form-control card-number'
                                onkeypress='return formats(this,event)' onkeyup="return numberValidation(event)"
                                maxlength="19" type='text'>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label> <input
                                class='form-control card-expiry-month' placeholder='Ex. 02' size='2' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> <input
                                class='form-control card-expiry-year' placeholder='Ex. 22' size='2' type='text'>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 order-md-2 mb-4" style="margin-top: 20px;">
                    <h4 class="mb-3">Order Detail</h4>
                    <ul class="list-group mb-3 sticky-top">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="title" style="color:#fff;">{{$puppy->puppy_name}}</h6>
                                    <p class="text" style="color:#fff; height:65px; overflow:hidden;">
                                        {{$puppy->puppy_short_description}}</p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <h6 class="price" style="color:#fff;">${{$puppy->puppy_price}}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="title" style="color:#fff;"><input type="checkbox" id="checkbox"
                                            value="200" name="meet"> &nbsp;Meet Up</h6>
                                </div>
                                <div class="col-md-4 text-right">
                                    <h6 class="price" style="color:#fff;">$200</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="title" style="color:#fff;"><input type="checkbox" id="checkbox"
                                            value="699" name="delivery"> &nbsp;Delivery on Home</h6>
                                </div>
                                <div class="col-md-4 text-right">
                                    <h6 class="price" style="color:#fff;">$699</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="row">
                                <div class="col-md-7">
                                    <h6 class="title" style="color:#fff;">Total</h6>
                                </div>
                                <div class="col-md-5 text-right">
                                    <h6 class="price" id="myText" style="color:#fff;">${{$puppy->puppy_price}}</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <input type="hidden" name="puppyId" value="{{$puppy->id}}">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </div>
            </form>
            <input type="hidden" id="price" value="{{$puppy->puppy_price}}">
        </div>
    </div>
</section>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }

    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>
<script>
function formats(ele, e) {
    if (ele.value.length < 19) {
        ele.value = ele.value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
        return true;
    } else {
        return false;
    }
}

function numberValidation(e) {
    e.target.value = e.target.value.replace(/[^\d ]/g, '');
    return false;
}
</script>
<script>
$(document).ready(function() {

    var count;
    var price;
    $('input[type="checkbox"]').on("change", function() {
        count = 0;
        price = 0;

        $('input[type="checkbox"]:checked').each(function() {

            count += parseInt($(this).val());
        });

        $('input[id="price"]').each(function() {

            price += parseInt($(this).val());
        });

        total = count + price;

        document.getElementById("myText").innerHTML = "$" + total;
    });
});
</script>
@endsection