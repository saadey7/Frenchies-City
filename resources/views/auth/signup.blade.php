<!DOCTYPE html>
<html lang="en">
    @include('admin.includes.head')
<style>
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
    .login,
    .image {
        min-height: 100vh;
    }

    .bg-image {
        background-image: url("{{asset('public/Web/img/login.jpg')}}");
        background-size: cover;
        background-position: center center;
    }


    .btn-primary1 {
        background-color: #E3A4A5;
        border: 1px solid #e29c9e;
        border-radius: 0.25rem;
        color: white;
        width: 100%;
    }

    .btn-primary1:hover {
        background-color: #e58182;
        color: white;
    }


    .btn-primary {
        background-color: #ffffff;
        border: 1px solid #e8e8e8;
        border-radius: 0.25rem;
        color: #828282;
        width: 100%;
    }

    .btn-primary:hover{
        background-color: #e58182;
        border: 1px solid #e58182;
        color: white;
    }
    .btn-primary:hover > .spantext{
        color: white;
    }
    .spantext{
        margin-left: 3%;
        font-family: 'Poppins';
        font-weight: 500;
        font-size: 12px;
        color: #828282;
    }

    .text-primary {
        color: #e58182;
    }

    label{
        font-size: 12px;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-7 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-5 bg-white">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <div style="text-align: center;">
                                    <img src="{{asset('public/Web/img/logo2.png')}}" alt="" style="width:100px;">
                                </div>
                                <p
                                    style="font-family: Poppins; font-weight: 600; font-size: 25px; color: #525252; margin-bottom: 0rem;">
                                    Sign
                                    Up to create Account</p>
                                <form action="storeregister" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="firstname">First Name</label>
                                                <input id="inputEmail" name="first_name" type="text" required autofocus=""
                                                    class="form-control" style="color:#E3A4A5;">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="lastname">Last Name</label>
                                                <input id="inputEmail" name="last_name" type="text" required autofocus=""
                                                    class="form-control" style="color:#E3A4A5;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input id="inputEmail" name="email" type="email" required autofocus="" class="form-control"
                                            style="color:#E3A4A5;">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="password">Password</label>
                                                <input id="inputPassword" name="password" type="password" required class="form-control"
                                                    style="color:#E3A4A5;">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="confirmpassword">Confirm Password</label>
                                                <input id="inputPassword" name="password_confirmation" type="password"  class="form-control"
                                                    style="color:#E3A4A5;">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Remember password</label>
                                    </div> -->
                                    <button type="submit" class="btn btn-primary1 ">Sign
                                        Up</button>
                                    <div class="text-center mt-1" style="color: red;">
                                        @if($errors->any())
                                            {{ implode('', $errors->all(':message')) }}
                                        @endif
                                    </div>
                                    <div class="text-center mt-4">
                                        <p>Already have an account? <a href="showlogin" class="font-italic text-muted">
                                                <u>Login</u></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div>
            <!-- End -->

        </div>
    </div>
</body>

</html>