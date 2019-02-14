@extends('layout')

@section('content')
  
    <div class="container py-5">
        <div class="row">

            <div class="col-md-12">
                {{\App\Http\Controllers\PagesHandler::notification()}}
                <h4 class=" font-weight-bold"><strong>Event Details ({{$event->name}})</strong></h4>


                <div class="row">

                    <div class="col-md-5">

                        <img src="{{url('storage/app')}}/{{$event->img_url}}" class="img-fluid">

                    </div>
                    <div class="col-md-7">

                        <div class="table-responsive">

                            <table class="table table-hover">

                                <tbody>


                                <tr>

                                    <td>
                                        Name
                                    </td>
                                    <td>
                                        {{$event->name}}
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        Type
                                    </td>
                                    <td>
                                        {{$event->type}}
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        Accessibility
                                    </td>
                                    <td>
                                        {{$event->access_type}}
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        Creator name
                                    </td>
                                    <td>
                                        {{$event->creator->first_name}} {{$event->creator->last_name}}
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        Creator Email
                                    </td>
                                    <td>
                                        {{$event->creator->email}}
                                    </td>
                                </tr>


                                <tr>

                                    <td>
                                        Created at
                                    </td>
                                    <td>
                                        {{$event->created_at}}
                                    </td>
                                </tr>
                                <tr>

                                    <td>
                                        Last Updated at
                                    </td>
                                    <td>
                                        {{$event->updated_at}}
                                    </td>
                                </tr>








                                </tbody>


                            </table>


                        </div>

                    </div>

                </div>

                <p class=" font-weight-bold"><strong>Description</strong></>

                <div class="row mb-2">

                    <div class="col-md-12">

                        {!! html_entity_decode($event->details) !!}

                    </div>

                </div>

                <p class=" font-weight-bold"><strong>Location</strong></p>

                <div class="row mb-2">

                    <div class="col-md-12">

                        {{$event->area}} , {{$event->zip}} , {{$event->city}} , {{$event->state}} , {{$event->country}}

                    </div>

                    <div class="col-md-12">
                        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>


                            <div id ="map-canvas">
                            
                        </div>

                    </div>


                </div>

                <p class=" font-weight-bold"><strong>Timelines</strong></p>

                <div class="row mb-2">
                    <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    Starting Date
                                </td>
                                <td>
                                    {{$event->starting_time}}
                                </td>
                            </tr>
                            <tr>
                                <td>Ending Date</td>
                                <td>{{$event->ending_time}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>


                </div>

                    <p class="font-weight-bold">
                        <strong>Teams Joined</strong>
                    </p>

                @if(!empty($event->members))
                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>Team Name</th>
                                    <th>Creator</th>

                                    <th>Type</th>
                                    <th>Accessibility</th>

                                    <th>Joined at</th>
                                    <th>View more</th>

                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($event->members as $member)
                                    @if($member->team != null)
                                        <tr>

                                            <td>{{$member->team->name}}</td>

                                            <td>{{$member->team->creator->first_name}} {{$member->team->creator->last_name}}</td>


                                            <td>{{$member->team->type}}</td>

                                            <td>{{$member->team->access_type}}</td>

                                            <td>{{$member->created_at}}</td>

                                            <td>
                                                <a href="{{route('team.details',['team_id' => $member->team->id])}}" target="_blank" class="btn btn-primary">
                                                    <i class="fa fa-book"></i> View
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{route('team.details',['team_id' => $member->team->id])}}"  class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>


                        </div>

                @endif

            </div>

        </div>

    </div>
@endsection
