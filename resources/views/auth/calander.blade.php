@extends('layout.auth')
@section('content')
    @include('layout.header')


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Full Calendar js</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>


    <body>


        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Calendar Page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Calendar Page</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Full Calander</h3>
                            <input type="date" onselect="">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="white-box">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#calendar').fullCalendar({

                    })
                });
                //     var calendar = $('#full_calendar_events').fullCalendar({
                //         editable: true,
                //         editable: true,
                //         events: SITEURL + "/calendar-event",
                //         displayEventTime: true,
                //         eventRender: function(event, element, view) {
                //             if (event.allDay === 'true') {
                //                 event.allDay = true;
                //             } else {
                //                 event.allDay = false;
                //             }
                //         },
                //         selectable: true,
                //         selectHelper: true,
                //         select: function(event_start, event_end, allDay) {
                //             var event_name = prompt('Event Name:');
                //             if (event_name) {
                //                 var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                //                 var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                //                 $.ajax({
                //                     url: SITEURL + "/calendar-crud-ajax",
                //                     data: {
                //                         event_name: event_name,
                //                         event_start: event_start,
                //                         event_end: event_end,
                //                         type: 'create'
                //                     },
                //                     type: "POST",
                //                     success: function(data) {
                //                         displayMessage("Event created.");
                //                         calendar.fullCalendar('renderEvent', {
                //                             id: data.id,
                //                             title: event_name,
                //                             start: event_start,
                //                             end: event_end,
                //                             allDay: allDay
                //                         }, true);
                //                         calendar.fullCalendar('unselect');
                //                     }
                //                 });
                //             }
                //         },
                //         eventDrop: function(event, delta) {
                //             var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                //             var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                //             $.ajax({
                //                 url: SITEURL + '/calendar-crud-ajax',
                //                 data: {
                //                     title: event.event_name,
                //                     start: event_start,
                //                     end: event_end,
                //                     id: event.id,
                //                     type: 'edit'
                //                 },
                //                 type: "POST",
                //                 success: function(response) {
                //                     displayMessage("Event updated");
                //                 }
                //             });
                //         },
                //         eventClick: function(event) {
                //             var eventDelete = confirm("Are you sure?");
                //             if (eventDelete) {
                //                 $.ajax({
                //                     type: "POST",
                //                     url: SITEURL + '/calendar-crud-ajax',
                //                     data: {
                //                         id: event.id,
                //                         type: 'delete'
                //                     },
                //                     success: function(response) {
                //                         calendar.fullCalendar('removeEvents', event.id);
                //                         displayMessage("Event removed");
                //                     }
                //                 });
                //             }
                //         }
                //     });
                // });

                // function displayMessage(message) {
                //     toastr.success(message, 'Event');
                // }
            </script>

    </body>

    </html>
    @include('layout.footer')
@endsection
