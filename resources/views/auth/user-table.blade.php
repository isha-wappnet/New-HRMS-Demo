@extends('layout.auth')

@section('content')
@include('layout.header')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Laravel 9 Server Side Datatables Tutorial</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
        <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    </head>

    <body>

        <div>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">User Profile Page</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820"
                                target="_blank"
                                class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy
                                Now</a>
                            <ol class="breadcrumb">
                                <li><a href="#">usertable</a></li>
                                <li class="active">User details Page</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <table class="table table-bordered user_datatable">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('success') }}
                            </div>
                        @endif
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

    </body>
    <script type="text/javascript">
        jQuery(function($) {

            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        })
    </script>

    </html>

    @include('layout.footer')
@endsection
