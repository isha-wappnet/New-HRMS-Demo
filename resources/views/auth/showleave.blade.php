
@extends('layout.auth')

@section('content')
    @include('layout.header')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Laravel 9 Server Side Datatables Tutorial</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
            integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    </head>

    <body>
        <div>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Data Table</h4>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Table</a></li>
                                <li class="active">Leave Table</li>
                            </ol>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div style="margin-right:5%; float:right;">
                        <a href="{{ route('leaves.create') }}"style="font-size:18px" background-color="white"
                            class="fa fa-table">Add leave</a>

                    </div>
                    <table id="leaves-table" class="table table-bordered">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('error') }}
                            </div>
                        @endif
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Id</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th >Status</th>
                              @role('admin')  <th>Action</th> @endrole
                                
                                {{-- <th width = "50px"><button type="button" name ="approved">Approved</button></th> --}}

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        {{-- @if(!empty($leaves))

                            
                       
                        @foreach ($leaves as $leave)          
              <tr>
                <td>{{$leave->id}}</td>
                <td>{{$leave->user_id}}</td>
                <td>{{$leave->start_date}}</td>
                <td>{{$leave->end_date}}</td>
                <td>{{$leave->status}}</td>
                <td>{{$leave->action}}</td>
                <td>
                    <a href="#" class="btn btn-success">Approve</a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger">Decline</a>
                    @endforeach
                    @endif --}}
                    </table>
                </div>
            </div>
        </div>

    </body>

    </html>
    <script type="text/javascript">
        jQuery(function($) {
            $('#leaves-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('leaves.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'reason',
                        name: 'reason'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                 @role('admin')   {
                        data: 'action',
                        name: 'action'
                    }@endrole
                ]
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"
        integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (session('success'))
        <script>
            swal("Congrulation!!", "  {!! session('success') !!}", "success", {
                button: "OK"
            });
        </script>
    @endif
    @include('layout.footer')
@endsection
