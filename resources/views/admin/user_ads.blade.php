@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$user->fname.' '.$user->lname}} Ads</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">{{$user->fname.' '.$user->lname}} Ads</li>
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
                                <h3 class="card-title" id="form_result"></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="adsTable" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Location</th>
                                        <th>Seller Fname</th>
                                        <th>Seller</th>
                                        <th>Featured</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Location</th>
                                        <th>Seller Fname</th>
                                        <th>Seller</th>
                                        <th>Featured</th>
                                        <th>Active</th>
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


    <script>
        $(function () {
            $('#adsTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                paging: true,
                ajax: "{{ route('admin.ads')}}",
                columns: [
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'category.name', name: 'category.name'},
                    {data: 'description', name: 'description'},
                    {data: 'price', name: 'price'},
                    {data: 'county', name: 'county'},
                    {data: 'user.lname', name: 'lname', visible: false},
                    {
                        data: 'user.fname', name: 'user.fname', render: function (data, type, row) {
                            return data + ' ' + row['user']['lname'];
                        }
                    },
                    {data: 'is_featured', name: 'is_featured', orderable: false, searchable: false},
                    {data: 'is_active', name: 'is_active', orderable: false, searchable: false},

                ],
                columnDefs: [
                    {
                        targets: 3, render: function (data) {
                            var trimmedString = data.substring(0, 50);
                            return trimmedString + '...';
                        }
                    },
                    {
                        targets: 8, render: function (data) {
                            if (data === 1){
                                return '<span class="badge bg-success">Featured</span>';
                            }else{
                                return '<span class="badge bg-info">Not Featured</span>';
                            }
                        }
                    },
                    {
                        targets: 9, render: function (data) {
                            if (data === 1){
                                return '<span class="badge bg-success">Active</span>';
                            }else{
                                return '<span class="badge bg-info">InActive</span>';
                            }
                        }
                    },
                ]

            });

        });
        function deleteAd(id) {
            var action = confirm("Are you sure you want to delete?");
            if (action) {

                $.ajax({
                    url: '{{route('admin.ads.delete')}}',
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

                            $('#adsTable').DataTable().ajax.reload();
                        }

                    },
                    error: function (data) {
                        toastr.error("An error occurred.");
                    }

                });
            }
        }

        function toggleFeature(id) {
            $.ajax({
                url: '{{route('admin.ads.feature')}}',
                method: 'post',
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

                        $('#adsTable').DataTable().ajax.reload();
                    }

                },
                error: function (data) {
                    toastr.error("An error occurred.");
                }

            });

        }

        function toggleActivate(id) {

            $.ajax({
                url: '{{route('admin.ads.activate')}}',
                method: 'post',
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

                        $('#adsTable').DataTable().ajax.reload();
                    }

                },
                error: function (data) {
                    toastr.error("An error occurred.");
                }

            });

        }
    </script>
@endsection
