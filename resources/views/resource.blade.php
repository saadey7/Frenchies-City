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
    .smallcol{
        width: 251px;
        height: 188px;
        background-size: cover;
        display: flex;
        flex-direction: column-reverse;
        border-radius: 8px;
    }
    .bigcol{
        width: 540px;
        height: 188px;
        background-size: cover;
        background-position: 50%;
        display: flex;
        flex-direction: column-reverse;
        border-radius: 8px;
    }
    .heading5{
        margin-bottom: 0px;
        background-color: #0000009e;
        font-size: 22px;
        color: #fff;
        border-radius: 0px 0px 8px 8px;
    }
</style>
<!-- Section Adopt -->
<section id="adoption" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>PuppySpot Resource Center</h1>
        </div>
    </div>
</section>
<section style="margin-top: -15%;">
    <div class="container">
        <div class="row">
            <h1 style="font-size: 20px; text-align: center;">browse by topic</h1>
        </div>
        <div class="row d-flex">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <button style="background: none; border: none;">
                    <div class="smallcol"
                        style="background-image: url('https://cdn.buttercms.com/zxbCuYSRajQXFuBU9FDg');">
                        <h5 class="heading5">Travels</h5>
                    </div>
                </button>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                <button style="background: none; border: none;">
                    <div class="smallcol"
                        style="background-image: url('https://cdn.buttercms.com/M1JrzqoJTx6eI8D3kEMG');">
                        <h5 class="heading5">Dog Ownership</h5>
                    </div>
                </button>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <button style="background: none; border: none;">
                    <div class="bigcol"
                        style="background-image: url('https://cdn.buttercms.com/MGBtx2ldTfmfR5u1gUHl');">
                        <h5 class="heading5">Education</h5>
                    </div>
                </button>
            </div>
        </div>
        <br>
        <div class="row d-flex">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <button style="background: none; border: none;">
                    <div class="bigcol"
                        style="background-image: url('https://cdn.buttercms.com/36UnKH13SCWrpfBacnr7');">
                        <h5 class="heading5">Training</h5>
                    </div>
                </button>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <button style="background: none; border: none;">
                    <div class="smallcol"
                        style="background-image: url('https://cdn.buttercms.com/rWV3D7dhS7fR6JFDmdSK');">
                        <h5 class="heading5">Health & Care</h5>
                    </div>
                </button>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                <button style="background: none; border: none;">
                    <div class="smallcol"
                        style="background-image: url('https://cdn.buttercms.com/Kk5TU8gQQ6umRsBDFkz3');">
                        <h5 class="heading5">Popular Breeds</h5>
                    </div>
                </button>
            </div>
        </div>
        <br>
        <div class="row d-flex">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <button style="background: none; border: none;">
                    <div class="smallcol"
                        style="background-image: url('https://cdn.buttercms.com/ooPFpnt6RHO46vXej5zW');">
                        <h5 class="heading5">Exercise</h5>
                    </div>
                </button>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                <button style="background: none; border: none;">
                    <div class="smallcol"
                        style="background-image: url('https://cdn.buttercms.com/hq22bhraROWLeS5JmsR0');">
                        <h5 class="heading5">Puppy Breeds</h5>
                    </div>
                </button>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <button style="background: none; border: none;">
                    <div class="bigcol"
                        style="background-image: url('https://cdn.buttercms.com/yHaYDnpXSau61QfsRGCZ');">
                        <h5 class="heading5">Grooming</h5>
                    </div>
                </button>
            </div>
        </div>
        <br>
        <div class="row d-flex">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <button style="background: none; border: none;">
                    <div class="bigcol"
                        style="background-image: url('https://cdn.buttercms.com/XlwXQyeQRm6PLOAgM5bN');">
                        <h5 class="heading5">Nutrition</h5>
                    </div>
                </button>
            </div>
        </div>
        <br>
    </div>
</section>
<section class="callout container-fluid" style="background-color: #e6fffd; margin-top: 0%; margin-bottom: 5%;">
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <h4>Are you looking for a puppy?</h4>
                <br>
                <p>Search our amazing inventory today and take home the puppy of your dreams!</p>
                <br>
                <a href="allPuppies.html" class="btn btn-primary">Search Puppies</a>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</section>
<!-- callout-->
@endsection