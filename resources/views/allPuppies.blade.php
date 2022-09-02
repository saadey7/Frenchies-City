@extends('layouts.weblayout')
@section('content')
<!-- Section Adopt -->
<section id="adoption" class="pages">
   <div class="jumbotron" data-stellar-background-ratio="0.5">
      <!-- Heading -->
      <div class="jumbo-heading" data-stellar-background-ratio="1.2">
         <h1>All Puppies</h1>
      </div>
   </div>
   <!-- container-->
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-lg-6 col-md-6">
            <!-- image -->
            <img src="{{asset('public/Web/img/allPuppies1.jpg')}}" alt="" class="center-block img-responsive img-rounded" width="690px"
               height="500px">
         </div>
         <!-- /col-lg-6 -->
         <div class="col-lg-6 col-md-6 res-margin">
            <h3>Puppies For Sale</h3>
            <p>At Frenchies City, we know that our exclusive network of breeders produces the best dogs. That's why
               every
               puppy for sale is given a complete nose-to-tail checkup before being delivered right to your door. We
               then back that up with a full 10-year health commitment. We call it our Frenchies City Promise.
               <br>
               At PuppySpot, we have the widest selection of puppies for sale on the internet. Whether you're looking
               for a purebred Australian Shepherd, a hypoallergenic Mini Poodle, a dashing designer breed like the
               Goldendoodle or the Cavapoo, or the ever-popular Golden Retriever, we've got what you're looking for.
               Our exclusive network of breeders is second to none, which is why every puppy provided through us is
               backed by our industry-leading 10-year health commitment.
            </p>
         </div>
         <!-- /col-lg-6 -->
      </div>
      <!-- row -->
      <div class="row margin1">
         <div class="col-md-12 margin1">
            <h5>Filter By:</h5>
            <form action="frenchdogs" method="post">
               @csrf
               <div class="row">
                  <div class="col-md-4 col-sm-6 col-xs-6">
                     <label for="">Gender:</label>
                     <select name="gender" class="form-control">
                        <option selected disabled>Choose One</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                     </select>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-6">
                     <label for="">Breeds:</label>
                     <select name="breed" class="form-control">
                        <option selected disabled>Choose One</option>
                        @foreach($breed as $breed)
                        <option value="{{$breed->breed_name}}">{{$breed->breed_name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-6">
                     <label for="">Color:</label>
                     <select name="color" class="form-control">
                        <option selected disabled>Choose One</option>
                        <option value="black">Black</option>
                        <option value="white">White</option>
                     </select>
                  </div>
               </div>
               <div class="text-center">
                  <button class="btn btn-primary">Apply</button>
               </div>
            </form>
         </div>
         <!-- Adoption gallery -->
         <div class="col-md-12 margin1">
            <div id="lightbox">
               <!-- Image 1 -->
               @foreach($data as $data)
               <div class="col-lg-3 col-sm-6 col-md-6 dog">
                  <div class="isotope-item">
                     <div class="adoption-thumb">
                        <img class="img-responsive img-circle" src="{{$data->puppy_image}}" alt="" width="200px">
                        <!-- header-->
                        <div class="adopt-header">
                           <h4>{{$data->puppy_name}}</h4>
                           <form action="/puppy_details" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$data->id}}">
                              <button type="submit" class="btn btn-primary">Buy Puppy</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!--/isotope-item -->
               </div>
               @endforeach
               <!-- col-lg-3 -->
            </div>
            <!-- /lightbox-->
         </div>
         <!-- /col-lg-12 -->
      </div>
      <!-- /row-->
   </div>
   <!-- /container-->
</section>
<!-- /Section ends -->
@endsection