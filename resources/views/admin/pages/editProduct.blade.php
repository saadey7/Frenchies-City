@extends('admin.layouts.layouts')
@section('content')
<style>
th,
td {
    text-align: center;
}
.gallery img{
    width: 150px;
    height: 150px;
}
.cross{
    background: none;
    border:none;
    position: absolute;
    top: 83px;
    padding-left: 40px;
}
.cross i{
    background: none;
    border:none;
    color:red;
}
.cross i:hover{
    color: black;
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
                    <h1 class="m-0 text-dark">Edit Puppy Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-dark">Edit Puppy Detail</li>
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
            <div class="row ">
                <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
        
                            <div class="container">
                                <form action="update" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_name">Puppy Name *</label>
                                                    <input type="text" class="form-control" name="puppy_name"
                                                        value="{{$data->puppy_name}}" aria-label="Username"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_lastname">Puppy Color *</label>
                                                    <input type="text" class="form-control" name="puppy_color"
                                                        value="{{$data->puppy_color}}" aria-label="Username"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_email">Puppy Price *</label>
                                                    <input type="price" min="1" class="form-control"
                                                        name="puppy_price" value="{{$data->puppy_price}}"
                                                        aria-label="Amount (to the nearest dollar)" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_need">Puppy Breed *</label>
                                                    <select name="puppy_breed" class="form-control" required>
                                                        <option selected disabled>{{$data->puppy_breed}}</option>
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
                                                    <label for="form_need">Select Image *</label><br>
                                                    <input type="file" name="image" class="form-control" onchange="loadFile(event)" value="{{$data->puppy_image}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="form_need">Puppy DOB *</label>
                                                    <input type="date" class="form-control" value="{{$data->puppy_dob}}"
                                                        name="puppy_dob" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="gallery">
                                                    <img id="output" src="{{$data->puppy_image}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="form_message">Puppy Short Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        name="puppy_short_description" rows="3">{{$data->puppy_short_description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"
                                                    value="Update Puppy">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.8 -->
                </div>
                <!-- /.row-->
            </div>
            
            <br>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {
        
                if (input.files) {
                    var filesAmount = input.files.length;
        
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
        
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }
        
                        reader.readAsDataURL(input.files[i]);
                    }
                }
        
            };
        
            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
    </script>
    <script>
        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            var token = $(this).data("token")
            $.ajax(
            {
                url: "deleteImg/"+id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){
                    location.reload(true);
                }
            });
           
        });
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