@extends('layout')

@section('content')

    <div class="container py-5">
        <div class="row">

            <div class="col-md-12">
                {{\App\Http\Controllers\PagesHandler::notification()}}
                <h4 class=" font-weight-bold"><strong>Team Details ({{$team->name}})</strong></h4>


                <div class="row">

                    <div class="col-md-5">

                        <img src="{{url('storage/app')}}/{{$team->img_url}}" class="img-fluid">

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
                                        {{$team->name}}
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        Type
                                    </td>
                                    <td>
                                        {{$team->type}}
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        Accessibility
                                    </td>
                                    <td>
                                        {{$team->access_type}}
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        Creator name
                                    </td>
                                    <td>
                                        {{$team->creator->first_name}} {{$team->creator->last_name}}
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        Creator Email
                                    </td>
                                    <td>
                                        {{$team->creator->email}}
                                    </td>
                                </tr>


                                <tr>

                                    <td>
                                        Created at
                                    </td>
                                    <td>
                                        {{$team->created_at}}
                                    </td>
                                </tr>
                                <tr>

                                    <td>
                                        Last Updated at
                                    </td>
                                    <td>
                                        {{$team->updated_at}}
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

                        {!! html_entity_decode($team->details) !!}

                    </div>

                </div>

                <p class=" font-weight-bold"><strong>Location</strong></p>

                <div class="row mb-2">

                    <div class="col-md-12">

                        {{$team->area}} , {{$team->zip}} , {{$team->city}} , {{$team->state}} , {{$team->country}}

                    </div>

                </div>

                    <p class="font-weight-bold">
                        <strong>Members Joined</strong>
                    </p>

                @if(!empty($team->members))
                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Email</th>

                                    <th>Joined at</th>
                                    <th>View more</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($team->members as $val)

                                    <tr>
                                        <td>{{$val->id}}</td>
                                        <td>{{$val->member->first_name}} {{$val->member->last_name}}</td>
                                        <td>{{$val->member->email}}</td>

                                        <td>{{$val->created_at}}</td>

                                        <td>
                                            <a class="btn btn-primary text-white">

                                                <i class="fa fa-book"></i>&nbsp;View

                                            </a>
                                        </td>





                                    </tr>

                                @endforeach


                                </tbody>

                            </table>


                        </div>

                @endif

            </div>

        </div>

    </div>

@endsection
