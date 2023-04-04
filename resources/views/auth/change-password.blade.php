@extends('layout.auth')
@section('content')
    @include('layout.header')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .cardStyle {
            width: 500px;
            border-color: white;
            background: #fff;
            padding: 34px 0;
            border-radius: 4px;
            margin: 100px 0;
            box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);
        }

        .formTitle {
            font-weight: 600;
            margin-top: 20px;
            color: #2F2D3B;
            text-align: center;
        }

        .inputLabel {
            font-size: 12px;
            color: #555;
            margin-bottom: 6px;
            margin-top: 24px;
        }

        .inputDiv {
            width: 70%;
            display: flex;
            flex-direction: column;
            margin: auto;
        }

        input {
            height: 40px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            border: solid 1px #ccc;
            padding: 0 11px;
        }

        input:disabled {
            cursor: not-allowed;
            border: solid 1px #eee;
        }

        .buttonWrapper {
            margin-top: 40px;
        }

        .submitButton {
            width: 70%;
            height: 40px;
            margin: auto;
            display: block;
            color: #fff;
            background-color: #065492;
            border-color: #065492;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .submitButton:disabled,
        button[disabled] {
            border: 1px solid #cccccc;
            background-color: #cccccc;
            color: #666666;
        }

        #loader {
            position: absolute;
            z-index: 1;
            margin: -2px 0 0 10px;
            border: 4px solid #f3f3f3;
            border-radius: 50%;
            border-top: 4px solid #666666;
            width: 14px;
            height: 14px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        label.required::after {
            content: "* ";
            color: red;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Change password Page</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820"
                        target="_blank"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy
                        Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Change password Page</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>


            @if (session('error'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">

                        <form action="{{ route('change') }}" method="post" name="changepassword" id="changepassword">
                            <h2 class="formTitle">
                                Change Password
                            </h2>
                            @csrf
                            <div class="inputDiv">
                                <label class="required">Current Password</label>
                                <input type="password" id="currentpassword" name="currentpassword">
                            </div>
                            <div class="inputDiv">
                                <label class="required">New Password</label>
                                <input type="password" id="new_password" name="new_password">
                            </div>

                            <div class="inputDiv">
                                <label class="required">Confirm Password</label>
                                <input type="password" id="confirmPassword" name="confirmPassword">
                            </div>
                            <div class="buttonWrapper">
                                <button type="submit" class="submitButton pure-button pure-button-primary">
                                    <span>Continue</span>

                                </button>
                            </div>

                        </form>
                    </div>
                </div>
                <script>
                    $('#changepassword').validate({
                        rules: {

                            currentpassword: {
                                required: true,
                            },
                            new_password: {
                                required: true,

                            },
                            confirmPassword: {
                                required: true,
                                equalTo: '[name="new_password"]',
                            },
                        },
                        messages: {

                            currentpassword: {
                                required: "Please enter valid current password",
                            },
                            new_password: {
                                required: "Please enter password",
                            },
                            confirmPassword: {
                                required: "Confirm password is required",

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
                @if (session('error'))
                    <script>
                        swal("Opps!!!", "  {!! session('error') !!}", "error", {
                            button: "OK"
                        });
                    </script>
                @endif
                @include('layout.footer')
            @endsection
