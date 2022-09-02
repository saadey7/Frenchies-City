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
                                    Forgot Password</p>
                                <p class="text-muted mb-4"
                                    style="font-family: Poppins; font-weight: 400; color: #525252; font-size: 12px;">
                                    Enter the 4 digit code that you recieved in your e-mail ({{$email->email}})
                                    to continue to your account</p>
                                <form action="confirm-code" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="OTPInput" style="color: #828282;">Code</label>
                                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                            <input type="hidden" name="email" value="{{$email->email}}">
                                            <input class="m-2 text-center form-control rounded" name="token[]" type="text" id="first"
                                                maxlength="1" />
                                            <input class="m-2 text-center form-control rounded" name="token[]" type="text" id="second"
                                                maxlength="1" />
                                            <input class="m-2 text-center form-control rounded" name="token[]" type="text" id="third"
                                                maxlength="1" />
                                            <input class="m-2 text-center form-control rounded" name="token[]" type="text" id="fourth"
                                                maxlength="1" />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary1 ">Verify</button>
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
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            function OTPInput() {
                const inputs = document.querySelectorAll('#otp > *[id]');
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('keydown', function(event) {
                        if (event.key === "Backspace") {
                            inputs[i].value = 'token';
                            if (i !== 0) inputs[i - 1].focus();
                        } else {
                            if (i === inputs.length - 1 && inputs[i].value !== '') {
                                return true;
                            } else if (event.keyCode > 47 && event.keyCode < 58) {
                                inputs[i].value = event.key;
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            } else if (event.keyCode > 64 && event.keyCode < 91) {
                                inputs[i].value = String.fromCharCode(event.keyCode);
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            }
                        }
                    });
                }
            }
            OTPInput();
        });
    </script>
</body>

</html>