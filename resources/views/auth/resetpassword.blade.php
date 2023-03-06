@extends('layout.auth')

@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">

            <div class="card text-center" style="width: 300px;">
                <div class="card-header h5 text-white bg-primary">Password Reset</div>
                <div class="card-body px-5">

@if (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">×</button>
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif
<center>
<form class="form-horizontal form-material" id="resetpassword" method="POST" action="{{route('submit', ['token' => $token])}}">
    @csrf
    <h3 class="box-title m-b-20">Reset password</h3>
    <div class="form-group">
        <div class="col-xs-12">

            <input class="form-control" type="text"id="name" name="email"  placeholder="email" />
            <input class="form-control" type="password" id="password" name="password"  placeholder="Enter new password" />
                </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="Enter confirm Password" />
            
          </div>
    </div>
    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                          type="submit">
                       Update password
                      </button>
    </form>               
 </center>

        <script>
         $('#resetpassword').validate({
        rules: {
            email: {
              required: true,
          },
        
            password: {
                required: true,

            },
        
                cpassword: {
                required: true,
                equalTo:'[name="password"]',
            },
        },
        messages: {
            
            email: {
              required: "Please Enter valid email",
          },
            password: {
                required: "Please enter password",
            },
            cpassword: {
                required: "Confirm password is required",
                
            },
        },
        })
    </script>    
     @endsection