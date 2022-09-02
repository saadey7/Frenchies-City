@extends('layouts.weblayout')
@section('content')
<!-- Section About -->
<section id="about" class="pages">
   <div class="jumbotron" data-stellar-background-ratio="0.5">
      <!-- Heading -->
      <div class="jumbo-heading" data-stellar-background-ratio="1.2">
         <h1>About Us</h1>
      </div>
   </div>
   <!-- container -->
   <div class="container">
      <div class="row">
         <div class="col-lg-7 col-md-6">
            <h1 style="font-size: 46px;">Our mission is to make lives better by placing healthy puppies in happy homes</h1>
         </div>
         <!-- /col-lg-7 -->
         <!-- image -->
         <div class="col-lg-5 col-md-6 res-margin">
            <img src="{{asset('public/Web/img/about (2).jpg')}}" class="img-rounded center-block img-responsive"
               alt="">
         </div>
         <!-- /col-lg-5-->
      </div>
      <div class="row margin1">
         <div class="col-lg-12 col-sm-12 res-margin">
            <h3 class="text-center">About Frenchies City</h3>
            <p style="text-align: center;">
               We are a community of dog lovers, committed to connecting the nation’s top breeders to caring,
               responsible individuals and families. We hold ourselves and our customers to the highest standards and
               aim to improve the life of each puppy, breeder and owner who joins our family.
            </p>
         </div>
         <!-- /col-lg-7 -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container-->
</section>
<!-- /Section ends -->
<section class="callout container-fluid" style="background-color: #e6fffd; margin-top: 0%; margin-bottom: 5%;">
   <!-- container-->
   <div class="container">
      <div class="row" style="background: #fff;">
         <div class="col-md-6 col-sm-6 col-xs-12 text-left">
            <h4 style="font-size: 46px; padding: 2em 1em 1em; grid-column: 1; grid-row: 1;">We have placed over 200,000
               puppies into over 200,000 homes.</h4>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12 text-center">
            <img src="https://cdn.buttercms.com/t3WV6cnQuSjBz6lZWs3E" alt="" class="img-responsive">
         </div>
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</section>
@endsection