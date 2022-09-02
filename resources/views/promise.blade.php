@extends('layouts.weblayout')
@section('content')
<!-- Section Adopt -->
<section id="adoption" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Frenchies City Promise</h1>
        </div>
    </div>
</section>
<!-- /Section ends -->
<!-- callout-->
<section class="callout container-fluid no-padding">
    <!-- row-fluid -->
    <div class="row-fluid">
        <div class="col-lg-8 col-md-12 no-padding" data-start="right: 20%;" data-center="right:0%;">
            <!-- image  -->
            <img src="{{asset('public/Web/img/promise4.jpg')}}" class="img-responsive img-rounded" alt="">
        </div>
        <!-- text box  -->
        <div class="callout-box col-lg-6 col-lg-offset-6 bg-darkcolor" data-start="left: 20%;" data-center="left:0%;">
            <h3>A Stellar Record of Satisfied Families</h3>
            <ol class="fa-ul">
                <li class="list-item"><span class="fa-li"><i class="glyph-icon flaticon-animal-paw-print"
                            style="color: palevioletred;"></i></span>We’ve placed over 200,000 healthy puppies in
                    happy homes.</li>
                <li class="list-item"><span class="fa-li"><i class="glyph-icon flaticon-animal-paw-print"
                            style="color: palevioletred;"></i></span>We have 11,000 genuine 5-star reviews, and an
                    overall rating
                    of 4.6 stars.</li>
                <li class="list-item"><span class="fa-li"><i class="glyph-icon flaticon-animal-paw-print"
                            style="color: palevioletred;"></i></span>We deliver joy. Don’t just take our word for
                    it, we’re vetted
                    by an entire community of dog lovers.</li>
            </ol>
            <a href="contact.html" class="btn">Contact us</a>
        </div>
        <!-- /callout-box  -->
    </div>
    <!-- /row-fluid -->
</section>
<!-- /callout -->
<section class="callout container-fluid">
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 margin1">
                <div id="lightbox">
                    <!-- Image 1 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 dogcat">
                        <div class="portfolio-item">
                            <div class="gallery-thumb">
                                <img class="img-responsive" src="{{asset('public/Web/img/promise1.jpg')}}" alt="">
                                <span class="overlay-mask"></span>
                                <a href="{{asset('public/Web/img/promise1.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered"
                                    title="You can add caption to pictures.">
                                    <i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Image 2 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 other">
                        <div class="portfolio-item">
                            <div class="gallery-thumb">
                                <img class="img-responsive" src="{{asset('public/Web/img/promise2.jpg')}}" alt="">
                                <span class="overlay-mask"></span>
                                <a href="{{asset('public/Web/img/promise2.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered"
                                    title="You can add caption to pictures.">
                                    <i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Image 3 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 other">
                        <div class="portfolio-item">
                            <div class="gallery-thumb">
                                <img class="img-responsive" src="{{asset('public/Web/img/promise3.jpg')}}" alt="">
                                <span class="overlay-mask"></span>
                                <a href="{{asset('public/Web/img/promise3.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered"
                                    title="You can add caption to pictures.">
                                    <i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /lightbox-->
            </div>
            <!-- /col-md-12-->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</section>
<!-- callout-->
<section class="callout container-fluid no-padding">
    <!-- row-fluid -->
    <div class="row-fluid">
        <div class="col-lg-8 col-md-12 no-padding" data-start="right: 20%;" data-center="right:0%;">
            <!-- image  -->
            <img src="{{asset('public/Web/img/promise5.jpg')}}" class="img-responsive img-rounded" alt="">
        </div>
        <!-- text box  -->
        <div class="callout-box col-lg-6 col-lg-offset-6 bg-darkcolor" data-start="left: 20%;" data-center="left:0%;">
            <h3>Nose-to-Tail Health Check</h3>
            <ol class="fa-ul">
                <li class="list-item"><span class="fa-li"><i class="glyph-icon flaticon-animal-paw-print"
                            style="color: palevioletred;"></i></span>Every puppy receives a nose-to-tail health check
                    before coming home.</li>
                <li class="list-item"><span class="fa-li"><i class="glyph-icon flaticon-animal-paw-print"
                            style="color: palevioletred;"></i></span>All our pups come with our industry-leading 10-year
                    health commitment.</li>
                <li class="list-item"><span class="fa-li"><i class="glyph-icon flaticon-animal-paw-print"
                            style="color: palevioletred;"></i></span>Our independent Scientific Advisory Board sets the
                    standards our whole company follows.</li>
            </ol>
            <a href="#" class="btn">Contact us</a>
        </div>
        <!-- /callout-box  -->
    </div>
    <!-- /row-fluid -->
</section>
<!-- /callout -->
<section class="callout container-fluid">
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 margin1">
                <div id="lightbox">
                    <!-- Image 1 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 dogcat">
                        <div class="portfolio-item">
                            <div class="gallery-thumb">
                                <img class="img-responsive" src="{{asset('public/Web/img/promise6.jpg')}}" alt="">
                                <span class="overlay-mask"></span>
                                <a href="{{asset('public/Web/img/promise6.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered"
                                    title="You can add caption to pictures.">
                                    <i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Image 2 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 other">
                        <div class="portfolio-item">
                            <div class="gallery-thumb">
                                <img class="img-responsive" src="{{asset('public/Web/img/promise7.jpg')}}" alt="">
                                <span class="overlay-mask"></span>
                                <a href="{{asset('public/Web/img/promise7.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered"
                                    title="You can add caption to pictures.">
                                    <i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Image 3 -->
                    <div class="col-sm-6 col-md-6 col-lg-4 other">
                        <div class="portfolio-item">
                            <div class="gallery-thumb">
                                <img class="img-responsive" src="{{asset('public/Web/img/promise8.jpg')}}" alt="">
                                <span class="overlay-mask"></span>
                                <a href="{{asset('public/Web/img/promise8.jpg')}}" data-gal="prettyPhoto[gallery]" class="link centered"
                                    title="You can add caption to pictures.">
                                    <i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /lightbox-->
            </div>
            <!-- /col-md-12-->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</section>
@endsection