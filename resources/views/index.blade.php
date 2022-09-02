@extends('layouts.weblayout')
@section('content')
<!-- ==== Slider ==== -->
<div class="container-fluid parallax-header" data-stellar-background-ratio="0.5">
   <div class="container">
      <div class="col-sm-5 text-light text-center bg-darkcolor" data--100-start="margin-top:100px;transform:scale(1)"
         data--100-top="margin-top:0px;transform:scale(0.7);">
         <h1>Welcome to Frenchies City</h1>
         <!--the div below is hidden on small screens  -->
         <div class="hidden-xs">
            <p class="header-p">Frenchies City is the best place to discover, learn about, and find your french
               bulldogs.</p>
            <form action="frenchdogs" method="post">
               @csrf
               <input type="hidden" name="breed" value="">
               <button type="submit" class="btn">Buy Puppies</button>
            </form>
         </div>
         <!--/d-none  -->
      </div>
   </div>
</div>
<!-- /container-fluid -->
<!-- SVG Curve Up -->
<svg id="curveUp" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100"
   preserveAspectRatio="none" fill="#fff">
   <path d="M0 100 C 20 0 50 0 100 100 Z" />
</svg>
<!-- Section Services-index -->
<section id="services-index" class="bg-pattern" data-bottom-top="background-position: 0px 10%,99% 10%;"
   data-top-bottom="background-position: 0px 80%,99% 80%;">
   <!-- container -->
   <div class="container">
      <div class="section-heading">
         <h2>Our Services</h2>
      </div>
      <!-- /section-heading-->
      <div class="col-md-7">
         <h3>Quality Services for your Pet</h3>
         <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam aliquam dui, nec blandit
               massa euismod ut.</strong></p>
         <p>Integer porttitor vestibulum metus, nec dapibus arcu eleifend eu. Maecenas imperdiet sagittis enim eu
            molestie. Donec quis diam condimentum, venenatis arcu a, ullamcorper elit. Nam vehicula libero nec sem
            feugiat, a convallis tellus commodo.</p>
         <p>Cras purus odio, vestibulum in vulputate at, tempus vi tempus viverra turpis. Fusce condimentum nunc ac nisi
            vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
         <!-- Button-->
         <a class="btn" href="contactus">Contact us</a>
      </div>
      <!-- /col-md-->
      <div class="col-md-5">
         <img src="{{asset('public/Web/img/home1.jpg')}}" class="img-responsive" alt="" style="border-radius: 15px;">
      </div>
      <!-- /col-md-->
   </div>
   <!-- /container-->
   <div class="container-fluid margin1">
      <div class="row">
         <!-- Services -->
         <div class="col-md-10 col-md-offset-1 ">
            <div id="owl-services" class="owl-carousel">
               <!-- Feature Box 1  -->
               <div class="col-xs-12">
                  <div class="services2 bg-lightcolor2">
                     <!-- image -->
                     <img src="{{asset('public/Web/img/brindle.jpg')}}" class="img-circle img-responsive" alt="" style="width: 256px; height:256px;">
                     <!-- text -->
                     <div class="services2-header bg-darkcolor">
                        <h4>Buy Puppy</h4>
                     </div>
                     <p>Nulla vel metus scelerisque ante sollicitudinlorem ipsuet commodo. Cras purus odio, vestibulum
                        in vulputate a Imperdiet interdum donec eget metus auguen unc vel lorem.</p>
                     <!-- Button-->
                     <form action="frenchdogs" method="post">
                        @csrf
                        <input type="hidden" name="breed" value="">
                        <button type="submit" class="btn">Read More</button>
                     </form>
                  </div>
                  <!-- /services2 -->
               </div>
               <!-- /col-xs -->
               <!-- Feature Box 2  -->
               <div class="col-xs-12">
                  <div class="services2 bg-lightcolor2">
                     <!-- image -->
                     <img src="{{asset('public/Web/img/promise6.jpg')}}" class="img-circle img-responsive" alt="" style="width: 256px; height:256px;">
                     <!-- text -->
                     <div class="services2-header bg-darkcolor">
                        <h4>Puppy Health</h4>
                     </div>
                     <p>Nulla vel metus scelerisque ante sollicitudinlorem ipsuet commodo. Cras purus odio, vestibulum
                        in vulputate a Imperdiet interdum donec eget metus auguen unc vel lorem.</p>
                     <!-- Button-->
                     <a class="btn" href="puppyHealth">Read More</a>
                  </div>
                  <!-- /services2 -->
               </div>
               <!-- /col-xs -->
               <!-- Feature Box 3  -->
               <div class="col-xs-12">
                  <div class="services2 bg-lightcolor2">
                     <!-- image -->
                     <img src="{{asset('public/Web/img/dogue.jpg')}}" class="img-circle img-responsive" alt="" style="width: 256px; height:256px;">
                     <!-- text -->
                     <div class="services2-header bg-darkcolor">
                        <h4>Puppy Service</h4>
                     </div>
                     <p>Nulla vel metus scelerisque ante sollicitudinlorem ipsuet commodo. Cras purus odio, vestibulum
                        in vulputate a Imperdiet interdum donec eget metus auguen unc vel lorem.</p>
                     <!-- Button-->
                     <a class="btn" href="promise">Read More</a>
                  </div>
                  <!-- /services2 -->
               </div>
               <!-- /col-xs -->
            </div>
            <!-- /owl-services -->
         </div>
         <!-- /col-md -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container-fluid-->
</section>
<!-- callout section -->
<section id="callout2" class="container-fluid bg-darkcolor small-section">
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-md-3">
            <!-- image  -->
            <img src="{{asset('public/Web/img/lilacc.jpg')}}" class="img-responsive callout-img" alt="">
         </div>
         <!-- text box  -->
         <div class="col-md-7 col-md-offset-1">
            <div class="page-scroll">
               <h3>Join us Today</h3>
               <p class="mb-4">Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in
                  vulputate attempus vi tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                  lacinia congue felis in faucibus.</p>
               <a href="contactus" class="btn btn-secondary">Contact us</a>
            </div>
            <!-- /page-scroll  -->
         </div>
         <!-- /col-lg  -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</section>
<!-- Section Stats -->
<section id="stats" class="bg-lightcolor2">
   <div class="section-heading text-center">
      <h2>Our Stats</h2>
   </div>
   <div class="container">
      <div class="col-lg-9 col-md-8 col-sm-8">
         <div class="text-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
               <!-- Number 1 -->
               <div class="numscroller" data-slno='1' data-min='0' data-max='180' data-delay='20' data-increment="19">0
               </div>
               <h5>Happy Customers</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
               <!-- Number 2 -->
               <div class="numscroller" data-slno='1' data-min='0' data-max='500' data-delay='20' data-increment="9">0
               </div>
               <h5>Sel Puppies</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
               <!-- Number 3 -->
               <div class="numscroller" data-slno='1' data-min='0' data-max='67' data-delay='20' data-increment="19">0
               </div>
               <h5>Puppy Travels Products</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
               <!-- Number 4 -->
               <div class="numscroller" data-slno='1' data-min='0' data-max='50' data-delay='10' data-increment="9">0
               </div>
               <h5>Puppy Food Products</h5>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Section Ends-->
<!-- callout-->
<section class="callout container-fluid no-padding">
   <!-- row-fluid -->
   <div class="row-fluid">
      <div class="col-lg-8 col-md-12 no-padding" data-start="right: 20%;" data-center="right:0%;">
         <!-- image  -->
         <img src="{{asset('public/Web/img/call1.jpg')}}" class="img-responsive img-rounded" alt="">
      </div>
      <!-- text box  -->
      <div class="callout-box col-lg-6 col-lg-offset-6 bg-darkcolor" data-start="left: 20%;" data-center="left:0%;">
         <h3>We Love Pets</h3>
         <p>Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, Nulla
            vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus vi
            tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in
            faucibus.</p>
         <a href="contactus" class="btn">Contact us</a>
      </div>
      <!-- /callout-box  -->
   </div>
   <!-- /row-fluid -->
</section>
<!-- /callout -->
<!-- Section Contact  -->
<section id="contact-index2" data-bottom-top="background-position: -50% 100%"
   data-top-bottom="background-position: 10% 100%">
   <div class="container">
      <div class="section-heading">
         <h2>Contact Us</h2>
      </div>
      <div class="col-md-4">
         <!-- contact info -->
         <h4>Information </h4>
         <ul class="list-unstyled margin-list">
            <li><i class="fa fa-envelope"></i><a href="mailto:youremailaddress">youremail@site.com</a></li>
            <li><i class="fa fa-phone margin-icon"></i>Call Us +1 456 7890</li>
            <li><i class="fa fa-map-marker margin-icon"></i>Lorem Ipsum 505</li>
         </ul>
         <!-- address info -->
      </div>
      <!-- /col-md-->
      <div class="col-md-6 col-md-offset-1">
         <h4>Send us a Message</h4>
         <!-- Form Starts -->
         <div id="contact_form">
            <div class="form-group">
               <label>Name<span class="required">*</span></label>
               <input type="text" name="name" class="form-control input-field" required="">
               <label>Email Adress <span class="required">*</span></label>
               <input type="email" name="email" class="form-control input-field" required="">
               <label>Subject</label>
               <input type="text" name="subject" class="form-control input-field" required="">
               <label>Message<span class="required">*</span></label>
               <textarea name="message" id="message" class="textarea-field form-control" rows="3"
                  required=""></textarea>
            </div>
            <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Send message</button>
         </div>
         <!-- Contact results -->
         <div id="contact_results"></div>
      </div>
      <!-- /col-md-5-->
   </div>
   <!-- /container -->
</section>
<!-- /Section ends -->
<div class="container-fluid">
   <!-- map-->
   <div id="map-canvas"></div>
</div>
@endsection