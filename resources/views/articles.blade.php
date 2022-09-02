@extends('layouts.weblayout')
@section('content')
<style>
    .title {
        font-size: 26px;
        width: 95%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-family: 'Baloo Thambi', sans-serif;
        color: #108896;
    }

    .title:hover {
        color: #fca0b9;
    }

    .article {
        font-size: 16px;
        color: black;
        letter-spacing: .1px;
        line-height: 26px;
        margin-top: 20px;
    }

    .date {
        font-size: 16px;
        color: black;
        letter-spacing: .1px;
        line-height: 26px;
        margin-top:5px;
    }

    .img-responsive {
        margin-top: 5%;
        border-radius: 16px;
    }
</style>
<!-- Section Adopt -->
<section id="adoption" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>{{$name}}</h1>
        </div>
    </div>
</section>
<!--callout-->
<section style="margin-top: -15%;">
    <div class="container">
        <div class="row mt-5 text-center">
            <p>From dachshunds to poodles, there are a wide variety of breeds to choose from. But which is the best
                dog breed for you? Dog breeds have developed over time to enhance certain traits. Before you bring
                home your new pup, you'll want to consider what type of dog best fits your personality and
                lifestyle. Perhaps you need a family dog like a french bulldog or a hunting dog like a labrador
                retriever. Or maybe your best choice is a small dog breed like a Chihuahua or Yorkshire Terrier. Our
                most popular dog breeds include Frech Bulldogs, Goldendoodles, and Golden Retrievers. Below you will
                find all sorts of information to help figure out what type of breed you might be interested in.</p>
        </div>
    </div>
</section>
<!-- callout-->
<section style="margin-top: -15%;">
    <div class="container">
        <div class="row">
            <h1 style="font-size: 35px;">{{$data->count()}} Articles</h1>
        </div>
        <div class="row mt-5">
            @foreach($data as $data)
            <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="{{$data->image}}" alt="" class="img-responsive" style="width:555px; height: 224px; object-fit:none;">
                <a href="/articleDetail/{{$data->id}}" class="title">{{$data->title}}</a>
                <div style="max-height: 120px; overflow:hidden;">
                    <p class="article">{!! $data->article !!}</p>
                </div>
                <p class="date">By Frenchies City Team • {{$data->date}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /callout -->
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
<!-- /callout-->
@endsection