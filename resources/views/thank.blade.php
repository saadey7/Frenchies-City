@extends('layouts.weblayout')
@section('content')
<style>
.success {
    color: #fff;
    font-weight: 800;
    letter-spacing: .1px;
    font-size: 40px;
    margin-bottom: 10px;
    text-align: center;
}

.msg {
    color: #fff;
    font-size: 20px;
    margin: 0;
    text-align: center;
}

.checkmark {
    color: #9ABC66;
    font-size: 100px;
    line-height: 200px;
    margin-left: -15px;
}

.card {
    background: #fca0b9;
    padding: 60px;
    border-radius: 4px;
    box-shadow: 10px 10px 10px 10px #C8D0D8;
    display: inline-block;
    margin: 0 auto;
}
</style><section id="adoption" class="pages">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
                <h1>Successfull Purchase</h1>
            </div>
        </div>
    </section>
<section class="services-3" style="margin-top: -15%;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12" style="text-align:center;">
                <div class="card">
                    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                        <i class="checkmark">✓</i>
                    </div>
                    <h1 class="success">Success</h1>
                    <p class="msg">We received your purchase request;<br /> we'll be in touch shortly!</p>
                    <br>
                    <a href="home" class="btn btn-primary" style="font-size:15px;">Go Back</a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection