@extends('layout.auth')
@section('content')
    @include('layout.header')
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


            <form action="{{ route('edit') }}" method="post" name="useredit" id="useredit">
                <h2 class="formTitle">
                    Edit Profile
                </h2>
                @csrf
                @method('put')
                <div class="inputDiv">
                    <label>New name</label>
                    <input type="hidden" id="id" value="{{ $user->id }}" name="id">
                    <input type="text" id="name" value="{{ $user->name }}" name="name">
                    {{-- @error('new_name')
     <span class="text-danger">{{ $message }}</span>
 @enderror --}}
                </div>

                <div class="inputDiv">
                    <label>New Email</label>
                    <input type="email" id="email" value="{{ $user->email }}" name="email">
                    {{-- @error('new_email')
   <span class="text-danger">{{ $message }}</span>
@enderror --}}
                </div>



                <div class="buttonWrapper">
                    <button type="submit" class="submitButton pure-button pure-button-primary">
                        <span>Edit Profile</span>

                    </button>
                </div>

            </form>
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
            @include('layout.footer')
        @endsection
