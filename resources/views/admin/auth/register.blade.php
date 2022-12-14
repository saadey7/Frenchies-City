<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<style>
.btn-color {
    background-color: #0e1c36;
    color: #fff;

}
.btn-color:hover{
    color:#000;
    background-color: #fff;
}

.profile-image-pic {
    height: 200px;
    width: 200px;
    object-fit: cover;
}



.cardbody-color {
    background-color: #ebf2fa;
}

a {
    text-decoration: none;
}
</style>

<body class="bg-dark">
    <section class="intro">
        <div class="bg-image h-100" style="background: #fff">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card my-5">

                                <form class="card-body cardbody-color p-lg-5" method="post" action="{{ route('admin.storeregister') }}">
                                    @csrf
                                    <div class="text-center">
                                        <img src="{{asset('public/Web/img/logo2.png')}}"
                                            class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                                            width="200px" alt="profile">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" id="Username"
                                            aria-describedby="emailHelp" placeholder="Enter User Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" id="Username"
                                            aria-describedby="emailHelp" placeholder="Enter Email">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="password">
                                    </div>
                                    <div class="text-center"><button type="submit"
                                            class="btn btn-color px-5 mb-5 w-100">Sign Up</button></div>
                                    @if(session()->has('error'))
                                        <div id="popmessage" class="text-danger  form-control-feedback">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    @if(session()->has('success'))
                                        <div id="popmessage" class="text-success  form-control-feedback">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Already Have An Account? 
                                        <a href="#" class="text-dark fw-bold"> Login </a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.includes.footer')
</body>

</html>