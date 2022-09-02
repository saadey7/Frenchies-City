@extends('admin.layouts.layouts')
@section('content')
<style>
.gallery img {
    width: 150px;
    height: 150px;
}

@media (max-width: 768px) {
    .table {}
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid shadow-sm p-3 bg-white rounded">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add/Views Articles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-dark">Add/Views Articles</li>
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
                        Add New Article
                    </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Article</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="storeArticle" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form_name">Article Title *</label>
                                                    <input type="text" class="form-control" name="title" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="form_need">Select Image *</label><br>
                                                    <input type="file" name="image" class="form-control"
                                                        onchange="loadFile(event)" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="gallery"><img id="output" /></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="form_need">Article Category *</label>
                                                    <select name="category" class="form-control" required>
                                                        <option selected disabled>Select Category</option>
                                                        <option value="Travels">Travels</option>
                                                        <option value="Dog Ownership">Dog Ownership</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Training">Training</option>
                                                        <option value="Health & Care">Health & Care</option>
                                                        <option value="Popular Breeds">Popular Breeds</option>
                                                        <option value="Exercise">Exercise</option>
                                                        <option value="Puppy Breeds">Puppy Breeds</option>
                                                        <option value="Grooming">Grooming</option>
                                                        <option value="Nutrition">Nutrition</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="form_message">Article</label>
                                            <textarea name="article" class="ckeditor form-control"
                                                placeholder="Write Article Here..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="window.location.reload()">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Article</button>
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
                        <th scope="col">Article Title</th>
                        <th scope="col">Article Category</th>
                        <th scope="col" style="text-align:left;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                    <tr>
                        <th scope="row">{{$loop->index}}</th>
                        <td>{{$data->title}}</td>
                        <td>{{$data->category}}</td>
                        <td>
                            <div class="row text-left">
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#edit{{$data->id}}"><i class="fas fa-pen-square"></i></button>
                                    <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Article</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="editArticle" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="form_name">Article Title *</label>
                                                                    <input type="text" class="form-control" name="title"
                                                                        value="{{$data->title}}" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="form_need">Select Image *</label><br>
                                                                    <input type="file" name="image" class="form-control"
                                                                        onchange="loadFile(event)" required value="{{$data->image}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="gallery"><img id="output" src="{{$data->image}}" /></div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="form_need">Article Category *</label>
                                                                    <select name="category" class="form-control"
                                                                        required>
                                                                        <option selected disabled>{{$data->category}}
                                                                        </option>
                                                                        <option value="Travels">Travels</option>
                                                                        <option value="Dog Ownership">Dog Ownership
                                                                        </option>
                                                                        <option value="Education">Education</option>
                                                                        <option value="Training">Training</option>
                                                                        <option value="Health & Care">Health & Care
                                                                        </option>
                                                                        <option value="Popular Breeds">Popular Breeds
                                                                        </option>
                                                                        <option value="Exercise">Exercise</option>
                                                                        <option value="Puppy Breeds">Puppy Breeds
                                                                        </option>
                                                                        <option value="Grooming">Grooming</option>
                                                                        <option value="Nutrition">Nutrition</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="form_message">Article</label>
                                                            <textarea name="article" class="ckeditor form-control"
                                                                placeholder="Write Article Here..."
                                                                required>{{$data->article}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal"
                                                            onclick="window.location.reload()">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add
                                                            Article</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete{{$data->id}}"><i class="fas fa-trash"></i></button>
                                    <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Article</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="deleteArticle" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                        <p style="text-align: center;margin-bottom: 0rem;">Are you sure
                                                            you
                                                            want to delete this Article?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal"
                                                            onclick="window.location.reload()">No</button>
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </div>
                                                </form>
                                            </div>
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