@extends('layout.auth')

@section('content')
    @include('layout.header')

   

    <!-- Page Content -->
    <div>
        <div id="page-wrapper">
            <div class="container-fluid">
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
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        {{-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820"
                            target="_blank"
                            class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy
                            Now</a> --}}
                        <ol class="breadcrumb">
                           <h4>Dashboard</h4>
                           
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               <center><b><h1>Welcome to the Dashboard</h1></b></center>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    </body>

    @include('layout.footer')
@endsection
