@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Categories edit {{$category->name}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                               Edit {{$category->name}}
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="overlay-wrapper" style="display: none">
                                    <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>
                                </div>
                                <form role="form" id="categoryForm">
                                    @csrf
                                    <input type="hidden"  name="id" value="{{$category->id}}" >
                                    <div class="form-group">
                                        <label for="categoryname">Category Name</label>
                                        <input type="text" class="form-control" id="categoryname" name="name"
                                               placeholder="Enter category name" value="{{$category->name}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Category Icon</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="icon">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(function () {
            $(document).ready(function () {
                bsCustomFileInput.init();
            });

            $("#categoryForm").on("submit", function (event) {
                event.preventDefault();
                $(".overlay-wrapper").fadeIn();
                $.ajax({
                    url: "{{route('admin.category.update')}}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",

                    success: function (data) {
                        $(".overlay-wrapper").fadeOut();
                        if (data.errors) {
                            for (
                                var count = 0;
                                count < data.errors.length;
                                count++
                            ) {
                                toastr.error(data.errors[count]);
                            }

                        }
                        if (data.error) {
                            toastr.error(data.error);

                        }
                        if (data.success) {
                            toastr.success(data.success);
                        }

                    },
                    error: function (data) {
                        $(".overlay-wrapper").fadeOut();
                        toastr.error("An error occurred.");
                    }
                });
            });


        });

    </script>
@endsection
