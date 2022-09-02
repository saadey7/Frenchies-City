@php
use App\Models\Breed;
$breed = Breed::all();
@endphp
<style>
.scrollar {
    max-height: 400px;
    overflow-y: scroll;
}

.scrollar::-webkit-scrollbar {
    display: none;
}
.button{
    display: block;
    width: 100%;
    background: none;
    border:none;
    padding: 13px 10px;
    clear: both;
    font-size: 15px;
    font-weight: 400;
    line-height: 20px;
    color: #fff;
    white-space: nowrap;
    border-radius: 0px;
    padding-top: 20px!important;
    padding-bottom: 20px!important;
    transition: all .2s ease-in-out;
}
.button:hover{
    background-color: #ffedbb;
}
</style>
<nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                <i class="fa fa-bars"></i>
            </button>
            <div class="navbar-brand navbar-brand-centered page-scroll">
                <a href="#page-top">
                    <!-- logo  -->
                    <img src="{{asset('public/Web/img/logo (2).png')}}" class="img-responsive" alt="">
                </a>
            </div>
        </div>
        <!--/navbar-header -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-brand-centered">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Puppies<b class="caret"></b></a>
                    <ul class="dropdown-menu scrollar">
                        <li>
                            <form action="/frenchdogs" method="post">
                                @csrf
                                <input type="hidden" name="breed" value="">
                                <button type="submit" class="button">View All Puppies</button>
                            </form>
                        </li>
                        @foreach($breed as $breed)
                        <li style="text-align: -webkit-center;">
                            <form action="/frenchdogs" method="post">
                                @csrf
                                <input type="hidden" name="breed" value="{{$breed->breed_name}}">
                                <button type="submit" class="button">{{$breed->breed_name}}</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Puppy Promise<b class="caret"></b></a>
                    <ul class="dropdown-menu scrollar">
                        <li><a href="/promise">Frenchies City Promise</a></li>
                        <li><a href="/puppyBreed">Breeder Standards</a></li>
                        <li><a href="/puppyTravel">Puppy Travels</a></li>
                        <li><a href="/puppyHealth">Health Check</a></li>
                        <li><a href="/reviews">Customer Reviews</a></li>
                        <li><a href="/gives_back">Frenchies City Gives Back</a></li>
                    </ul>
                </li>
                <li><a href="about">About Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Resource Center<b class="caret"></b></a>
                    <ul class="dropdown-menu scrollar">
                        <li><a href="/resource">Resource Center</a></li>
                        <li><a href="/article/Puppy Breeds">Puppy Breeds</a></li>
                        <li><a href="/article/Dog Ownership">Dog Ownership</a></li>
                        <li><a href="/article/Training">Training</a></li>
                        <li><a href="/article/Grooming">Grooming</a></li>
                        <li><a href="/article/Health & Care">Health & Care</a></li>
                    </ul>
                </li>
                <li><a href="/contactus">Contact</a></li>
                @auth
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-user-circle" style="font-size:20px; color:#fff;"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu scrollar">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">My Favourites</a></li>
                        <li><a href="#">My Order History</a></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </li>
                @endauth
                @guest
                <li><a href="/showlogin">Login</a></li>
                @endguest
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- /navbar ends -->