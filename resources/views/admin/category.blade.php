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
                            <li class="breadcrumb-item active">Categories</li>
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
                                <button type="button" class="btn btn-block bg-gradient-primary" data-toggle="modal"
                                        data-target="#category">Add Category
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="categoryTable" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                    </tr>
                                    </tfoot>
                                </table>
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


    <div class="modal fade" id="category">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="overlay-wrapper" style="display: none">
                    <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" id="categoryForm">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categoryname">Category Name</label>
                                <input type="text" class="form-control" id="categoryname" name="name"
                                       placeholder="Enter category name">
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
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <script>
        $(function () {
            $(document).ready(function () {
                bsCustomFileInput.init();
            });
            $('#categoryTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                paging: true,
                ajax: "{{ route('admin.categories')}}",
                columns: [
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {
                        data: 'icon_name', name: 'icon_name',
                        render: function (data, type, full, meta) {
                            return "<img src={{ URL::to('') }}/CategoryImages/" + data + " width='70' class='img-thumbnail' />";
                        }, orderable: false
                    },
                ],

            });


            $("#categoryForm").on("submit", function (event) {
                event.preventDefault();
                $(".overlay-wrapper").fadeIn();
                $.ajax({
                    url: "{{route('admin.category.add')}}",
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
                            $('#categoryForm')[0].reset();
                            $('#categoryTable').DataTable().ajax.reload();
                        }

                    },
                    error: function (data) {
                        $(".overlay-wrapper").fadeOut();
                        toastr.error("An error occurred.");
                    }
                });
            });


        });

        function deleteCat(id) {
            var action = confirm("Are you sure you want to delete?");
            if (action) {

                $.ajax({
                    url: '{{route('admin.category.delete')}}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (data) {
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

                            $('#categoryTable').DataTable().ajax.reload();
                        }

                    },
                    error: function (data) {
                        toastr.error("An error occurred.");
                    }

                });
            }
        }
        function redirectTo(url){
            location.href = url;
        }

    </script>
@endsection
