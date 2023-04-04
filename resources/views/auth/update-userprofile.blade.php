@extends('layout.auth')
@section('content')
    @include('layout.header')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
            integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <style>
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
                    <h4 class="page-title">User Profile Page</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820"
                        target="_blank"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy
                        Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">User Profile Page</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">

                        <form action="{{ route('update') }}" method="post" name="userprofile" id="userprofile">
                            <h2 class="formTitle">
                                Update Profile
                            </h2>
                            @csrf
                            <div class="inputDiv">
                                <label class="required">New name</label>
                                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}">
                            </div>

                            <div class="inputDiv">
                                <label class="required">New Email</label>
                                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="buttonWrapper">
                                <button type="submit" class="submitButton pure-button pure-button-primary">
                                    <span>Update Profile</span>

                                </button>
                            </div>

                        </form>
                    </div>
                </div>
                <script>
                    $('#userprofile').validate({
                        rules: {

                            name: {
                                required: true,
                            },
                            email: {
                                required: true,

                            },

                        },
                        messages: {

                            name: {
                                required: "Please enter new name",
                            },
                            email: {
                                required: "Please enter new email",
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
                @include('layout.footer')
            @endsection
