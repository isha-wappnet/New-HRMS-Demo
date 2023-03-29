@extends('layout.auth')
@section('content')
    @include('layout.header')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"
            integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        <style>.cardStyle {
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
                    <h4 class="page-title">Leave</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Add leave page</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <h1>Add Leave Request</h1>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <form method="POST" action="{{ route('leave-request.store') }}" id="leave">
                            @csrf
                            <div class="inputDiv">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" placeholder="select start date">
                            </div>

                            <div class="inputDiv">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" placeholder="select end date">
                            </div>

                            <div class="inputDiv">
                                <input type="hidden" name="total_days" id="total_days">
                            </div>

                            <div class="inputDiv">
                                <label for="leave_type">Leave type:</label>
                                <select name="leave_type" id="leave_type" >
                                    <option value="">Select a leave type</option>
                                    <option value="sick">Sick leave</option>
                                    <option value="vacation">Vacation leave</option>
                                    <option value="personal">Personal leave</option>
                                </select>
                            </div>

                            <div class="inputDiv">
                                <label for="reason">Reason</label>
                                <textarea name="reason" id="reason" placeholder="Enter reason" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('dashboard') }}" class="btn btn-primary"> <span>Back</span></a>
                        </form>
                    </div>
                </div>
                <script>
                    $('#leave').validate({
                        rules: {

                            start_date: {
                                required: true,
                            },
                            end_date: {
                                required: true,
                                greaterThan: '#start_date',

                            },
                            leave_type: {
                                required: true,

                            },
                            reason: {
                                required: true,

                            },
                        },
                        messages: {

                            start_date: {
                                required: "Please enter start date",
                            },
                            end_date: {
                                required: "Please enter end date",
                            },
                            leave_type: {
                                required: "Please select from the below options" ,

                            },
                            reason: {
                                required: "please enter the reason",

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

                <script>
                    const start_date_input = document.querySelector('#start_date');
                    const end_date_input = document.querySelector('#end_date');
                    const total_days_input = document.querySelector('#total_days');

                    start_date_input.addEventListener('input', updateTotalDays);
                    end_date_input.addEventListener('input', updateTotalDays);

                    function updateTotalDays() {
                        const start_date = new Date(start_date_input.value);
                        const end_date = new Date(end_date_input.value);

                        const total_days = Math.floor((end_date - start_date) / (1000 * 60 * 60 * 24)) + 1;
                        total_days_input.value = total_days;
                    }
                </script>
                @include('layout.footer')
            @endsection
