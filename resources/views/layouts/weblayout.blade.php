<!DOCTYPE html>
<html lang="en">
@include('includes.head')

@php
use App\Models\Breed;

$breed = Breed::all();
@endphp
<style>
    .gallery img{
        width: 180px;
        height: 180px;
    }
</style>
<body id="page-top">
    <div id="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
        </div>
    </div>
    @include('includes.header')
    <div class="modal fade" id="sell" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sell Puppy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_name">Puppy Name *</label>
                                    <input type="text" class="form-control" name="puppy_name" aria-label="Username"
                                        aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_lastname">Puppy Color *</label>
                                    <input type="text" class="form-control" name="puppy_color" aria-label="Username"
                                        aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_email">Puppy Price *</label>
                                    <input type="price" min="1" class="form-control" name="puppy_price"
                                        aria-label="Amount (to the nearest dollar)" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_need">Puppy Breed *</label>
                                    <select name="puppy_breed" class="form-control" required>
                                        <option selected disabled>Select Breed</option>
                                        @foreach($breed as $breed)
                                        <option value="{{$breed->breed_name}}">{{$breed->breed_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_email">Available *</label>
                                    <input type="price" min="1" class="form-control" name="available"
                                        aria-label="Amount (to the nearest dollar)" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_need">Puppy Gender *</label>
                                    <select name="puppy_gender" class="form-control" required>
                                        <option selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_email">Puppy Mom's Weight *</label>
                                    <input type="price" min="1" class="form-control" name="mom_weight"
                                        placeholder="ex. 12 lbs" aria-label="Amount (to the nearest dollar)" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_need">Puppy Dad's Weight *</label>
                                    <input type="price" min="1" class="form-control" name="dad_weight"
                                        placeholder="ex. 12 lbs" aria-label="Amount (to the nearest dollar)" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form_need">Select Image *</label><br>
                                    <input type="file" name="image" class="form-control" onchange="loadFile(event)"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="form_need">Puppy DOB *</label>
                                    <input type="date" class="form-control" name="puppy_dob" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="gallery"><img id="output" /></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="form_message">About Puppy</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                name="puppy_short_description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="window.location.reload()">Close</button>
                        <button type="submit" class="btn btn-primary">Add Puppy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @yield('content')
    @include('includes.sticky-footer')
    @include('includes.footer')
    @yield('page-script')
    <script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    </script>
</body>

</html>