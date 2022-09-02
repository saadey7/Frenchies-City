@extends('layouts.weblayout')
@section('content')
<style>
    .list-item {
        color: white;
        font-size: 18px;
        line-height: 30px;
        font-family: 'arial';
    }

    .text-left {
        height: 200px;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: left;
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }

    .box {
        border: 1px solid #d8d8d8;
        padding: 32px;
        margin-bottom: 24px;
        border-radius: 16px;
        box-shadow: 4px 4px 4px 0 rgb(0 0 0 / 5%);
    }

    p {
        margin: 0px;
        color: black;
    }

    h4 {
        margin: 0px;
    }
</style>
<!-- Section Adopt -->
<section id="adoption" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Genuine Customer Reviews</h1>
        </div>
    </div>
</section>
<section style="margin-top: -15%;">
    <div class="container">
        <div class="row">
            <h1 style="font-size: 45px; text-align: center;">PuppySpot Reviews</h1>
        </div>
        <div class="row mt-5 text-center">
            <p>PuppySpot serves you best by putting the health and well-being of your puppy first. Don't take our
                word for it, here's what real customers have to say about PuppySpot.</p>
        </div>
    </div>
</section>
<!-- callout-->
<section class="callout container-fluid" style="margin-top: -5%;">
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <p>8/1/2022</p>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                    <h4>Denise V.</h4>
                    <p>California | Breed: Dachshund</p>
                    <hr>
                    <p>
                        Customer service was good. If you shipping your dog to you, it was challenging to make
                        happen unless you use the chaperone choice which was very expensive. Very expensive overall.
                    </p>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <p>8/1/2022</p>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                    <h4>Denise V.</h4>
                    <p>California | Breed: Dachshund</p>
                    <hr>
                    <p>
                        Customer service was good. If you shipping your dog to you, it was challenging to make
                        happen unless you use the chaperone choice which was very expensive. Very expensive overall.
                    </p>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</section>
<!-- callout-->
@endsection