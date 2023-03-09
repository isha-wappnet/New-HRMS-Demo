@extends('layout.auth')

@section('content')

    <head>
        <title>Login page</title>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
            integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
            integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">


                @if (session('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('error') }}
                    </div>
                @endif
                {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif --}}


                <form class="form-horizontal form-material" name="loginforms"id="loginforms" method="POST"
                    action="{{ route('user') }}">
                    @csrf
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text"id="name" name="email" placeholder="email" />
                         </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password" name="password"
                                placeholder="Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox" />
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="{{ route('forgotpassword') }}" id="to-recover" class="text-dark pull-right"><i
                                    class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">
                                Log In
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="javascript:void(0)" class="btn btn-facebook" data-toggle="tooltip"
                                    title="Login with Facebook">
                                    <i aria-hidden="true" class="fa fa-facebook"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"
                                    title="Login with Google">
                                    <i aria-hidden="true" class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>
                                Don't have an account?
                                <a href="register" class="text-primary m-l-5"><b>Sign Up</b></a>
                            </p>
                        </div>
                    </div>

            </div>
        </div>
    </section>


    <script>
        $('#loginforms').validate({
            rules: {
                email: {
                    required: true,
                },

                password: {
                    required: true,

                },

            },
            messages: {
                email: {
                    required: "Please Enter valid email",
                },

                password: {
                    required: "Please enter password",
                },

            },
        })
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
@endsection
