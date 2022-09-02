@extends('layouts.weblayout')
@section('content')
<!-- Section Contact -->
<section id="contact" class="pages no-padding">
   <div class="jumbotron" data-stellar-background-ratio="0.5">
      <!-- Heading -->
      <div class="jumbo-heading" data-stellar-background-ratio="1.2">
         <h1>Contact Us</h1>
      </div>
   </div>
   <!-- container -->
   <div class="container">
      <div class="row">
         <!-- Contact Info -->
         <div class="col-lg-5 col-md-5">
            <h3>Information </h3>
            <ul class="list-inline">
               <li><i class="fa fa-envelope"></i><a href="mailto:youremailaddress">youremail@site.com</a></li>
               <li><i class="fa fa-phone margin-icon"></i>Call Us +1 456 7890</li>
               <li><i class="fa fa-map-marker margin-icon"></i>Lorem Ipsum 505</li>
            </ul>
            <!-- address info -->
            <p>Elit uasi quidem minus id omnis a nibh fusce mollis imperdie tlorem ipuset phas ellus ac sodales Lorem
               ipsum dolor Phas ellus
               adipisicing elit uasi quidem minus id omnis a nibh fusce mollis imperdie tlorem ipuset campas fincas
            </p>
            <img src="{{asset('public/Web/img/contactpage1.png')}}" alt="" class="img-rounded center-block img-responsive">
         </div>
         <!-- /col-lg-5-->
         <!-- Contact Form -->
         <div class="col-lg-6 col-md-6 col-lg-offset-1 col-md-offset-1 res-margin">
            <h3>Write us</h3>
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
         <!--/col-lg-6 -->
      </div>
      <!-- /row-->
   </div>
   <!-- /container-->
   <div class="container-fluid margin1">
      <!-- map-->
      <div id="map-canvas"></div>
   </div>
   <!-- /container-fluid-->
</section>
<!-- /Section ends -->
@endsection