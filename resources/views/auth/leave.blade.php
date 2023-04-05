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
        label.required::after {
            content: "* ";
            color: red;
        }

        .error {
            color: rgba(243, 16, 27, 0.823);
        }
    </style>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Add Leave</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    <ol class="breadcrumb">
                        <li>Dashboard</li>
                        <li>Leave</li>
                        <li class="active">Add leave page</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="row">
                            <span class='error'>
                                <p><strong>Remaining Leave: {{ $remaining_leaves }}</strong></p>
                            </span>
                            <form method="POST" action="{{ route('leave-request.store') }}" id="leave">
                                @csrf
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="leave_subject" class="required">Subject:</label>
                                                <input type="text" name="leave_subject" id="leave_subject"
                                                    class="form-control" value="{{ old('leave_subject') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="description" class="required">Description:</label>
                                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="required">Select leave dates and leaves types on start and end
                                                date</label>
                                            <div class="input-daterange input-group" id="date-range">
                                                <input type="date" name="start_date" id="start_date" class="form-control"
                                                    value="{{ old('start_date') }}" min="<?php echo date('Y-m-d'); ?>">
                                                <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                <input type="date" name="end_date" id="end_date" class="form-control"
                                                    value="{{ old('end_date') }}" min="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="total_days" id="total_days">

                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="required">Duration</label>
                                            <select name="duration" id="duration" class="form-control">
                                                <option value="">Select leave duration
                                                </option>
                                                <option value="full_day">Full day
                                                </option>
                                                <option value="half_day">Half Day
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="required">Leave type:</label>
                                            <select name="leave_type" id="leave_type" class="form-control">
                                                <option value="">Select a leave type
                                                </option>
                                                <option value="sick">Sick leave</option>
                                                <option value="vacation">Vacation leave
                                                </option>
                                                <option value="personal">Personal leave
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="required">Reason:</label>
                                            <textarea name="reason" id="reason" class="form-control">{{ old('leave_reason') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="required">Work Reliever details:</label>
                                            <input type="text" name="work_reliever" id="work_reliever"
                                                class="form-control" value="{{ old('work_reliever') }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('leave') }}" class="btn btn-primary">
                                    <span>Back</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                    <script>
                        $('#leave').validate({
                            rules: {
                                leave_subject: {
                                    required: true,
                                },
                                description: {
                                    required: true,
                                },

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
                                duration: {
                                    required: true,
                                },
                                work_reliever: {
                                    required: true,
                                },
                                reason: {
                                    required: true,

                                },
                            },
                            messages: {
                                leave_subject: {
                                    required: "<span class='error'>This field is required</span>",
                                },
                                description: {
                                    required: "<span class='error'>This field is required</span>",
                                },
                                start_date: {
                                    required: "<span class='error'>Please enter start date</span>",
                                },
                                end_date: {
                                    required: "<span class='error'>Please enter end date</span>",
                                },
                                leave_type: {
                                    required: "<span class='error'>Please select from the below options</span>",
                                },
                                duration: {
                                    required: "<span class='error'>Please select from the below options</span>",
                                },
                                work_reliever: {
                                    required: "<span class='error'>This field is required</span>",
                                },
                                reason: {
                                    required: "<span class='error'>please enter the reason</span>",

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
