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
</style>
    <!-- Section Adopt -->
    <section id="adoption" class="pages">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
                <h1>Article Detail</h1>
            </div>
        </div>
    </section>
    <section style="margin-top: -15%;">
        <div class="container">
            <div class="row text-center">
                <img src="{{$data->image}}" alt="" class="img-responsive" style="width:1170px; height: 483px; object-fit:none;">
                <h1 style="font-size: 50px; text-align: center;">{{$data->title}}</h1>
                <p>Reviewed By Frenchies City Team • {{$data->date}}</p>
            </div>
            <hr>
            <div class="row">
                <p>
                    {!! $data->article !!}
                </p>
            </div>
        </div>
    </section>
    <!-- /callout-->
    <!-- callout-->
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
    <!-- /callout -->
@endsection