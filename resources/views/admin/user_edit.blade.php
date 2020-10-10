@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" id="usersForm">
                                    @csrf
                                    <input type="hidden"  value="{{$user->id}}" name="id">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="Fname">First Name</label>
                                            <input type="text" class="form-control" id="Fname" name="fname"
                                                   placeholder="Enter first name" value="{{$user->fname}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Lname">Last Name</label>
                                            <input type="text" class="form-control" id="Lname" name="lname"
                                                   placeholder="Enter last name" value="{{$user->lname}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="Enter email" value="{{$user->email}}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                   placeholder="Enter phone" value="{{$user->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" class="form-control" id="Password" name="password"
                                                   placeholder="Enter password" autocomplete="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="cPassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="cPassword"
                                                   name="password_confirmation"
                                                   placeholder="Repeat password" autocomplete="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="roles">Role</label>
                                            <select class="form-control" id="roles" name="roles[]">
                                                <option disabled selected value="">Select role</option>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->name}}" {{$user->hasRole($role->name) ? 'selected':''}}>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Profile Picture</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                                           name="profile_pic">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                            </div>
                                        </div>
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
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                paging: true,
                ajax: "{{ route('admin.users')}}",
                columns: [
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {
                        data: 'profile_pic', name: 'profile_pic',
                        render: function (data, type, full, meta) {
                            return "<img src={{ URL::to('') }}/ProfilePics/" + data + " width='70' class='img-thumbnail' />";
                        }, orderable: false
                    },
                    {data: 'lname', name: 'lname', visible: false},
                    {
                        data: 'fname', name: 'fname', render: function (data, type, row) {
                            return data + ' ' + row['lname'];
                        }
                    },
                    {data: 'email', name: 'email'},
                    {data: 'email_verified_at', name: 'email_verified_at'},
                    {data: 'phone', name: 'phone'},
                    {data: 'ads_count', name: 'ads_count'},
                    {data: 'roles', name: 'roles'},
                ],
                columnDefs: [
                    {
                        targets: 5, render: function (data) {
                            if (data != null) {
                                return '<span class="badge bg-success">Verified</span>';
                            } else {
                                return '<span class="badge bg-info">Not Verified</span>';
                            }
                        }
                    },
                ]

            });


            $("#usersForm").on("submit", function (event) {
                event.preventDefault();
                $(".overlay-wrapper").fadeIn();
                $.ajax({
                    url: "{{route('admin.user.update')}}",
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
                            $('#usersForm')[0].reset();
                            $('#usersTable').DataTable().ajax.reload();
                        }

                    },
                    error: function (xhr, status, error) {
                        $(".overlay-wrapper").fadeOut();
                        // var err = JSON.parse(xhr.responseText);
                        toastr.error(xhr.responseText);
                    }
                });
            });


        });

        function deleteCat(id) {
            var action = confirm("Are you sure you want to delete?");
            if (action) {
                var action2 = confirm("This action is not reversible!");
                if (action2) {
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

                                $('#usersTable').DataTable().ajax.reload();
                            }

                        },
                        error: function (data) {
                            toastr.error("An error occurred.");
                        }

                    });
                }
            }
        }

        function redirectTo(url) {
            location.href = url;
        }

    </script>
@endsection
