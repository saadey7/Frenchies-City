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

    .btn-primary:hover {
        background-color: #e58182;
        border: 1px solid #e58182;
        color: white;
    }

    .btn-primary:hover>.spantext {
        color: white;
    }

    .spantext {
        margin-left: 3%;
        font-family: 'Poppins';
        font-weight: 500;
        font-size: 12px;
        color: #828282;
    }

    .text-primary {
        color: #e58182;
    }

    label {
        font-size: 12px;
    }

    .forgot {
        font-family: 'Poppins';
        font-weight: 400;
        font-size: 12px;
        color: #7f265b;
    }

    .forgot:hover {
        color: #631845;
        text-decoration: underline;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The content half -->
            <div class="col-md-5 bg-white">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <img src="{{asset('public/Web/img/logo2.png')}}" alt="">
                                <p
                                    style="font-family: Poppins; font-weight: 600; font-size: 25px; color: #525252; margin-bottom: 0rem;">
                                    Change Password</p>
                                <p class="text-muted mb-4"
                                    style="font-family: Poppins; font-weight: 400; color: #525252; font-size: 12px;">
                                    Please Enter Your New Password</p>
                                <form action="reset" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="password">New Password</label>
                                        <input type="hidden" name="email" value="{{$passwordReset->email}}">
                                        <input type="hidden" name="token" value="{{$passwordReset->pin}}">
                                        <input id="inputPassword" type="password" name="password" required class="form-control"
                                            style="color:#E3A4A5;">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="confirmpassword">Confirm New Password</label>
                                        <input id="inputPassword" type="password" name="password_confirmation" required class="form-control"
                                            style="color:#E3A4A5;">
                                    </div>
                                    <button type="submit" class="btn btn-primary1 ">Update Password</button>
                                    <div class="text-center mt-1" style="color: red;">
                                        @if($errors->any())
                                            {{ implode('', $errors->all(':message')) }}
                                        @endif
                                    </div>
                                    <div class="text-center mt-4">
                                        <p>Do you need help? <a href="#" class="font-italic text-muted">
                                                <u>Customer Support</u></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div>


            <!-- The image half -->
            <div class="col-md-7 d-none d-md-flex bg-image"></div>

            <!-- End -->

        </div>
    </div>
</body>

</html>