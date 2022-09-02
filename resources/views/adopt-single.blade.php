@extends('layouts.weblayout')
@section('content')
@php
use Carbon\Carbon;
$age = Carbon::parse($data->puppy_dob)->diff(Carbon::now())->m;
@endphp
<!-- Section Adoption -->
<section id="adoption" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>{{$data->puppy_name}} Detail</h1>
        </div>
    </div>
    <!-- container-->
    <div class="container">
        <!-- Breadcrumb -->
        <ul class="breadcrumb adopt">
            <li><a href="adoption.html">All Puppies</a> <span class="divider"></span></li>
            <li class="active">{{$data->puppy_name}}</li>
        </ul>
    </div>
    <div class="container margin1">
        <div class="row">
            <div class="col-md-5">
                <img src="{{$data->puppy_image}}" class="center-block img-rounded img-responsive" alt="">
            </div>
            <div class="col-md-7 res-margin">
                <div class="row">
                    <div class="col-sm-8 col-xs-8">
                        <h3>{{$data->puppy_name}}</h3>
                    </div>
                    <div class="col-sm-4  col-xs-4 text-right">
                        <h3>$ {{$data->puppy_price}}</h3>
                    </div>
                </div>
                <div class="pet-adopt-info">
                    <h6>Gender: {{$data->gender}}</h6>
                    <h6>Age: {{$age}} Month</h6>
                </div>
                <!-- ul custom-->
                <ul class="custom no-margin">
                    <li>DOB: {{$data->puppy_dob}}</li>
                    <li>Availale: {{$data->available}}</li>
                    <li>Color: {{$data->puppy_color}}</li>
                    <li>Mom's Weight: {{$data->mom_weight}} lbs</li>
                    <li>Dad's Weight: {{$data->dad_weight}} lbs</li>
                </ul>
                <div class="row">
                    <div>
                        @guest
                        <a href="/showlogin" class="btn btn-primary">Ask About Me</a>
                        @endguest
                        @auth
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aboutme">
                            Ask About Me
                        </button>
                        <div class="modal fade" id="aboutme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="border-bottom:none;">
                                        <button type="button" class="close" data-dismiss="aboutme"
                                            onclick="window.location.reload()" aria-label="Close"
                                            style="font-size:37px; color:black;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <div class="card p-3 bg-white">
                                                    <div class="about-product text-center mt-2"><img
                                                            src="{{$data->puppy_image}}" width="300">
                                                        <div>
                                                            <h5>{{$data->puppy_name}} is waiting for you!</h5>
                                                        </div>
                                                    </div>
                                                    <div class="stats mt-2">
                                                        <div class="d-flex justify-content-between p-price text-center" style="font-size: 15px; text-transform: uppercase; color: black !important;">
                                                            <span>{{$data->gender}}
                                                                &nbsp;&nbsp;</span>|<span>&nbsp;&nbsp; {{$age}}
                                                                Month</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between p-price text-center"
                                                            style="text-transform: uppercase;color: black;font-size: 15px;font-weight: 700;margin-top: 10px;"><span>{{$data->puppy_breed}}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-sm-7 col-xs-12">
                                                <h3>Finish Up & Ask About {{$data->puppy_name}}</h3>
                                                <form action="about_me" method="post">
                                                    @csrf
                                                    <textarea name="about_me" class="form-control" cols="30" rows="10"
                                                        placeholder="Tell us a little about your homr and family, so we can do our best to match you with your perfect puppy!"></textarea>
                                                    <input type="hidden" name="puppy_id" value="{{$data->id}}">
                                                    <button type="submit" class="btn btn-primary"
                                                        style="padding: 14px 30px; float:right;">Finish</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                    <div>
                        @auth
                        <form action="/stripeForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <br>
                            <input type="hidden" name="puppyId" value="{{$data->id}}">
                            <button type="submit" class="btn btn-primary">Take Me Home</button>
                        </form>
                        @endauth
                        @guest
                        <a href="/showlogin" class="btn btn-primary">Take Me Home</a>
                        @endguest
                    </div>
                </div>
            </div>
            <!-- /col-md-7-->
        </div>
        <br>
        <div class="row">
            <h5>About {{$data->puppy_name}}</h5>
            <p>
                {{$data->puppy_short_description}}
            </p>
        </div>
        <!-- /row -->
    </div>
    <div class="container">
        <div class="row" style="border: 2px solid #fca0b9; padding: 30px; margin-top: 10%; border-radius: 2rem;">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center" style="margin-bottom: 35px; margin-top: -12%;">
                <img src="{{asset('public/Web/img/logo2.png')}}" alt="safe" style="width: 200px; height: 200px;">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12"
                style="border: 2px solid #fca0b9; padding: 10px; border-radius: 1.5rem; margin-bottom: 20px;">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <img src="{{asset('public/Web/img/safe.jpg')}}" alt="safe" width="100px" height="100px">
                </div>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <h4 style="margin-bottom:0px; color: #fec79e;">Safe</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12"
                style="border: 2px solid #fca0b9; padding: 10px; border-radius: 1.5rem; margin-bottom: 20px;">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <img src="{{asset('public/Web/img/healthly.png')}}" alt="safe" width="100px" height="100px">
                </div>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <h4 style="margin-bottom:0px; color: #fec79e;">Healthy</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12"
                style="border: 2px solid #fca0b9; padding: 10px; border-radius: 1.5rem;">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <img src="{{asset('public/Web/img/comfy.jpg')}}" alt="safe" width="100px" height="100px">
                </div>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <h4 style="margin-bottom:0px; color: #fec79e;">Comfy</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
</section>
<!-- /Section ends -->
@endsection