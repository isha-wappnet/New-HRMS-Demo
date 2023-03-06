@extends('layout.auth')
@section('content')
    <title>Forgotpassword page</title>

    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">

                <div class="card text-center" style="width: 300px;">
                    <div class="card-header h5 text-white bg-primary">Password Reset</div>
                    <div class="card-body px-5">

                        <div class="white-box">
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
                            <p class="card-text py-2">
                                Enter your email address and we'll send you an email with instructions to reset your
                                password.
                            </p>
                            <form class="form-horizontal form-material" method="POST"    action="{{ route('forgotPasswordValidate') }}">
                             
                                @csrf
                                <input type="email" id="email" name="email" placeholder="Enter registerd email"
                                    class="form-control my-3" />
                                <br>
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">
                                    Submit
                                </button><br><br><br>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        <p>Go to login page!! <a href="login" class="text-primary m-l-5"><b>Login</b></a>
                                        </p>
                                    </div>
                                </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
            @include('layout.footer')
