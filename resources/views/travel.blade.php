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
        color: black;
    }

    .box {
        border: 2px solid #fca0b9;
        padding: 10px;
        border-radius: 1.5rem;
        margin-bottom: 20px;
        height: 825px;
        text-align: center;
    }
</style>
<!-- Section Adopt -->
<section id="adoption" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Puppy Travels</h1>
        </div>
    </div>
</section>
<!-- /callout -->
<section class="callout container-fluid" style="background-color: #e6fffd; margin-top: -6%;">
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 text-left">
                <h4>Frenchies City oversees various trusted, USDA-certified transportation options.</h4>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                <img src="https://cdn.buttercms.com/w4hdfdCKRmGIViIyhgn3" alt="" class="img-responsive">
                <p style="text-align: left;">Whether your puppy travels on a commercial airline, in cabin with one of
                    our trained Chaperones,
                    or along one of our select ground routes, all of our puppies travel under USDA-guidelines for
                    proper animal care, and according to Frenchies City time limits.</p>
                <p style="text-align: left;">
                    Simply put, each travel option is designed to put the health and welfare of your puppy first. If
                    you wish to pick up your new puppy yourself, we can provide advice on how best to do that.
                </p>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</section>
<!-- callout-->
<!-- callout-->
<section class="callout container-fluid">
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <img src="https://cdn.buttercms.com/QpiyS5WSEKleE5fKswoc" alt="" class="img-responsive">
                <br>
                <img src="https://cdn.buttercms.com/9ZLqc9YiQHmPc2xLpu6W" alt="" class="img-responsive">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                <img src="https://cdn.buttercms.com/xlQDy5GfQxSS81k0JsCK" alt="" class="img-responsive"
                    style="height:828px;">
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</section>
<!-- /callout -->
<section class="callout container-fluid" style="margin-top: -8%;">
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <h4>Our transportation options ensure the health, comfort, quality, and communication from the
                    breeder’s doorstep to that first wet-nose moment.</h4>
                <p>
                    Here are the different ways to get your puppy home:
                </p>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</section>
<!-- callout-->
<section class="callout container-fluid" style="margin-top: -10%;">
    <div class="container">
        <div class="row" style="border: 2px solid #fca0b9; padding: 30px; margin-top: 10%; border-radius: 2rem;">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center" style="margin-bottom: 35px; margin-top: -12%;">
                <img src="{{asset('public/Web/img/logo2.png')}}" alt="safe" style="width: 200px; height: 200px;">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <img src="https://cdn.buttercms.com/wkIoe1eSFadWXC6ffZQ6" alt="safe" width="100px" height="100px">
                    <h4 style="margin-bottom:0px; color: #fec79e;">Breeder Meet Up</h4>
                    <p class="text-left">
                        Meet the breeder and your puppy at a location near the kennel. (Not
                        available on all Puppies)
                        <br><br>
                        This option is $299, which includes:
                        <br>
                        1. In person meet up with the breeder
                        <br>
                        2. Your puppy's health certificate
                        <br><br>
                        Please remember to bring:
                        <br>
                        1. A travel carrier, leash and collar
                        <br>
                        2. Food, water, and Nutri-Cal
                        <br>
                        3. Cleaning supplies and a toy from your PupPack
                        <br>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <img src="https://cdn.buttercms.com/TyY1SIqQlGGPUt5HFXc2" alt="safe" width="100px" height="100px">
                    <h4 style="margin-bottom:0px; color: #fec79e;">Pick Up Near Your Home</h4>
                    <p class="text-left">
                        Frenchies City works with trusted licensed professionals in the commercial air and private air
                        business to get your puppy to an airport or one of our pickup locations as close to your
                        home as possible. Keep in mind that air travel can be limited due to weather anywhere along
                        your puppy’s route, so we all need to be flexible with dates and times of arrival.
                        <br><br>
                        The Pickup Package is $699, which includes:
                        <br><br>
                        1. Airport delivery
                        <br>
                        2. Your puppy’s health certificate
                        <br>
                        3. Travel carrier
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <img src="https://cdn.buttercms.com/XgPfDdBeSBeugnsfR4xa" alt="safe" width="100px" height="100px">
                    <h4 style="margin-bottom:0px; color: #fec79e;">Weather, Heat, and Travel Information</h4>
                    <p class="text-left">
                        We try to get all our puppies home within 2-3 weeks. To do so, the puppy will need to meet
                        age, weight and health requirements before being authorized to travel.
                        <br><br>
                        The Travel team will then choose the best travel method for each puppy and customer based on
                        many factors,
                        including breeder and customer location, puppy age, and size.
                        <br><br>
                        As soon as we know the best
                        way to get your puppy home, you will be the first to know.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <img src="https://cdn.buttercms.com/5NM5oaTZTlOUI4bWs7qd" alt="safe" width="100px" height="100px">
                    <h4 style="margin-bottom:0px; color: #fec79e;">Puppy Chaperone</h4>
                    <p class="text-left">
                        A Puppy Chaperone brings your puppy to an airport near you. A Puppy Chaperone is a human
                        companion who accompanies your puppy in the cabin of the plane. The Puppy Chaperone will
                        personally greet you at the airport to deliver your healthy puppy directly to you. Keep in
                        mind that air travel can be limited due to weather anywhere along your puppy’s route, so we
                        all need to be flexible with dates and times of arrival.
                        <br><br>
                        Chaperone Airport Delivery is $1599, which includes:
                        <br>
                        1. Puppy Chaperone travel cost
                        <br>
                        2. Your puppy's health certificate
                        <br>
                        3. Travel carrier
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- callout-->
<section class="callout container-fluid no-padding" style="margin-bottom: 5%;">
    <!-- row-fluid -->
    <div class="row-fluid">
        <div class="col-lg-8 col-md-12 no-padding" data-start="right: 20%;" data-center="right:0%;">
            <!-- image  -->
            <img src="https://cdn.buttercms.com/VpPss9wsQ9FEG85ZtlkW" class="img-responsive img-rounded" alt="">
        </div>
        <!-- text box  -->
        <div class="callout-box col-lg-6 col-lg-offset-6 bg-darkcolor" data-start="left: 20%;" data-center="left:0%;">
            <h3>Our Fight Against Puppy Mills and Puppy Scammers</h3>
            <p>
                The Frenchies City Team is dedicated to working with key decision makers on Capitol Hill to fight
                against
                puppy mills and online pet scams. In an ongoing effort to ensure puppies come from responsible
                breeders, shelters or rescues, we are collecting any information from our community regarding
                possible pet scams. Help us win this fight.
            </p>
        </div>
        <!-- /callout-box  -->
    </div>
    <!-- /row-fluid -->
</section>
<!-- /callout -->
@endsection