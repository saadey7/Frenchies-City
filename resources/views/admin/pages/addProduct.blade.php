@extends('admin.layouts.layouts')
@section('content')
<style>


.gallery img{
    width: 150px;
    height: 150px;
}

@media (max-width: 768px) {
    .table{

    }
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid shadow-sm p-3 bg-white rounded">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add/Views Puppies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-dark">Add/Views Puppies</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @include('admin.pages.flash-message')
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <table class="table shadow-sm p-3 mb-2 bg-white rounded">
                <div class="mt-2">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#myModal">
                        Add New Puppy
                    </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Puppy</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="store" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_name">Puppy Name *</label>
                                                    <input type="text" class="form-control" name="puppy_name"
                                                        aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_lastname">Puppy Color *</label>
                                                    <input type="text" class="form-control" name="puppy_color"
                                                        aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_email">Puppy Price *</label>
                                                    <input type="price" min="1" class="form-control"
                                                        name="puppy_price"
                                                        aria-label="Amount (to the nearest dollar)" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_need">Puppy Breed *</label>
                                                    <select name="puppy_breed" class="form-control" required>
                                                        <option selected disabled>Select Breed</option>
                                                        @foreach($breed as $breed)
                                                        <option value="{{$breed->breed_name}}">{{$breed->breed_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_email">Available *</label>
                                                    <input type="price" min="1" class="form-control"
                                                        name="available"
                                                        aria-label="Amount (to the nearest dollar)" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
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
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_email">Puppy Mom's Weight *</label>
                                                    <input type="price" min="1" class="form-control"
                                                        name="mom_weight" placeholder="ex. 12 lbs"
                                                        aria-label="Amount (to the nearest dollar)" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_need">Puppy Dad's Weight *</label>
                                                    <input type="price" min="1" class="form-control"
                                                        name="dad_weight" placeholder="ex. 12 lbs"
                                                        aria-label="Amount (to the nearest dollar)" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_need">Select Image *</label><br>
                                                    <input type="file" name="image" class="form-control" onchange="loadFile(event)"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="form_need">Puppy DOB *</label>
                                                    <input type="date" class="form-control"
                                                        name="puppy_dob" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="gallery"><img id="output"/></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="form_message">About Puppy</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                name="puppy_short_description" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal" onclick="window.location.reload()">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Puppy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Puppy Image</th>
                        <th scope="col">Puppy name</th>
                        <th scope="col">Puppy Price</th>
                        <th scope="col">Puppy Breed</th>
                        <th scope="col" style="text-align:left;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td><img src="{{$data->puppy_image}}" alt="" width="50" height="50"></td>
                        <td>{{$data->puppy_name}}</td>
                        <td>$ {{$data->puppy_price}}</td>
                        <td>{{$data->puppy_breed}}</td>
                        <td style="text-align:right;">
                            <div class="d-flex">
                                <form action="edit" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <button type="sumbit" class="btn btn-primary"><i class="fas fa-pen-square"></i></button>
                                </form>
                                &nbsp;&nbsp;
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete{{$data->id}}"><i class="fas fa-trash"></i></button>
                                <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Puppy</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
    
                                            <form action="delete" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{$data->id}}">
                                                    <p style="text-align: center;margin-bottom: 0rem;">Are you sure you want to delete this Puppy?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal" onclick="window.location.reload()">No</button>
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    </script>
    <script>
    $(document).ready(function() {
        $("#formname").on("change", "input:checkbox", function() {
            $("#formname").submit();
        });
    });
    </script>
</div>
@endsection