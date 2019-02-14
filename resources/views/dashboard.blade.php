@extends('layout')

@section('content')


    <link href="{{asset('js/fullcalendar-3.9.0/fullcalendar.min.css')}}" rel='stylesheet' />
    <link href="{{asset('js/fullcalendar-3.9.0/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
    <script src="{{asset('js/fullcalendar-3.9.0/lib/moment.min.js')}}"></script>
    <script src="{{asset('js/fullcalendar-3.9.0/lib/jquery.min.js')}}"></script>
    <script src="{{asset('js/fullcalendar-3.9.0/fullcalendar.min.js')}}"></script>
    <script>
        <?php  $data = \App\Http\Controllers\EventHandler::calendarData();   ?>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '{{today()}}',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                        @forEach($data as $val)
                    {
                        title: '{{$val->name}}',
                        url: '{{route('event.details',['event_id' => $val->id])}}',
                        start: '{{$val->starting_time}}'  ,
                        end: '{{$val->ending_time}}'

                    } ,
                    @endforeach
                ]
            });

        });

    </script>


    <div class="container py-5">
        <div class="row">

            <div class="col-md-12">
                {{\App\Http\Controllers\PagesHandler::notification()}}
                <h4 class=" font-weight-bold"><strong>Dashboard</strong></h4>
                <div class="row">
                    <div class="col-md-12">


                        <p class="font-weight-bold py-1 float-left">
                            <strong>Latest Events</strong>
                        </p>
                        <a href="{{route('event.create')}}" class="float-right btn btn-primary">

                            <i class="fa fa-plus"></i> Create a new Event
                        </a>

                    </div>
                </div>


                <div class="row">

                    @foreach($events as $event)

                       <div class="col-md-3" style="padding: 10px !important;margin-bottom: 10px !important;">

                             <div class="row" style="padding: 8px !important;">

                                 <div class="col-md-12 mb-2" style="height: 200px !important;background-image: url('{{url('storage/app')}}/{{$event->img_url}}');background-size: cover !important;background-repeat: no-repeat !important;background-position: center center !important;cursor: pointer !important;" >

                                 </div>

                                 <div class="col-md-6 text-center">

                                     <a target="_blank" href="{{route('event.details',['event_id'=>$event->id])}}" class="btn btn-primary">View Event</a>

                                 </div>
                                 <div class="col-md-6 text-center">

                                     <a target="_blank" href="" class="btn btn-success">Join</a>

                                 </div>

                             </div>
                           
                            </div>
                    @endforeach


                </div>
                <div class="row">
                    <div class="col-md-12">


                    <p class="font-weight-bold py-1 float-left">
                    <strong>Latest Teams created</strong>
                   </p>

                <a href="{{route('team.create')}}" class="float-right btn btn-primary">

                    <i class="fa fa-users"></i> Create a new Team
                </a>
                    </div>
                </div>

                <div class="row">

                    @foreach($teams as $team)

                        <div class="col-md-3" style="padding: 10px !important;margin-bottom: 10px !important;">

                            <div class="row" style="padding: 8px !important;">

                                <div class="col-md-12 mb-2" style="height: 200px !important;background-image: url('{{url('storage/app')}}/{{$team->img_url}}');background-size: cover !important;background-repeat: no-repeat !important;background-position: center center !important;cursor: pointer !important;" >

                                </div>

                                <div class="col-md-6 text-center">

                                    <a target="_blank" href="{{route('team.details',['team_id'=>$team->id])}}" class="btn btn-primary">View Team</a>

                                </div>
                                <div class="col-md-6 text-center">

                                    <a target="_blank" data-id="{{$team->id}}" class="btn btn-success join_team">Join</a>

                                </div>

                            </div>

                        </div>
                    @endforeach


                </div>

                <div class="row">
                    <div class="col-md-12">


                        <p class="font-weight-bold py-1 float-left">
                            <strong>Events Calendar</strong>
                        </p>

                        <a href="{{route('events.joined')}}" class="float-right btn btn-primary">

                            <i class="fa fa-check"></i> Events Joined
                        </a>
                    </div>
                </div>

                <div  id="calendar"></div>

            </div>

        </div>

    </div>

@endsection

@section ('script')
<script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
@endsection